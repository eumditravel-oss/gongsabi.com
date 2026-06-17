<?php

declare(strict_types=1);

namespace App\Services;

use App\Core\Config;
use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use RuntimeException;

final class PaymentService
{
    private OrderRepository $orders;
    private PaymentRepository $payments;

    public function __construct()
    {
        $this->orders = new OrderRepository();
        $this->payments = new PaymentRepository();
    }

    /** @param array<string, mixed> $payload */
    public function createOrder(array $payload): array
    {
        $product = $this->product((string) ($payload['product_code'] ?? ''));
        if (!$product) {
            throw new RuntimeException('상품 정보를 찾을 수 없습니다.');
        }

        $merchantUid = 'gongsabi_' . date('YmdHis') . '_' . bin2hex(random_bytes(4));
        $orderId = $this->orders->create([
            'merchant_uid' => $merchantUid,
            'user_id' => $payload['user_id'] ?? null,
            'product_code' => $product['code'],
            'product_name' => $product['name'],
            'amount' => $product['price'],
            'buyer_name' => trim((string) ($payload['buyer_name'] ?? '')),
            'buyer_email' => trim((string) ($payload['buyer_email'] ?? '')),
            'buyer_tel' => trim((string) ($payload['buyer_tel'] ?? '')),
        ]);

        return [
            'id' => $orderId,
            'merchant_uid' => $merchantUid,
            'name' => $product['name'],
            'amount' => $product['price'],
            'buyer_name' => $payload['buyer_name'] ?? '',
            'buyer_email' => $payload['buyer_email'] ?? '',
            'buyer_tel' => $payload['buyer_tel'] ?? '',
            'merchant_code' => Config::get('PORTONE_MERCHANT_CODE', 'imp97740463'),
        ];
    }

    public function verifyAndComplete(string $impUid, string $merchantUid): array
    {
        if ($impUid === '' || $merchantUid === '') {
            throw new RuntimeException('결제 식별값이 누락되었습니다.');
        }

        $order = $this->orders->findByMerchantUid($merchantUid);
        if (!$order) {
            throw new RuntimeException('주문 정보를 찾을 수 없습니다.');
        }

        $payment = $this->fetchPortOnePayment($impUid, $merchantUid, (int) $order['amount']);
        $paidAmount = (int) ($payment['amount'] ?? 0);
        $status = (string) ($payment['status'] ?? '');
        $providerMerchantUid = (string) ($payment['merchant_uid'] ?? '');

        if ($providerMerchantUid !== $merchantUid) {
            throw new RuntimeException('주문번호가 일치하지 않습니다.');
        }

        if ($paidAmount !== (int) $order['amount']) {
            throw new RuntimeException('결제 금액이 주문 금액과 일치하지 않습니다.');
        }

        if ($status !== 'paid') {
            throw new RuntimeException('결제가 완료 상태가 아닙니다.');
        }

        $paymentId = $this->payments->create([
            'order_id' => $order['id'],
            'merchant_uid' => $merchantUid,
            'imp_uid' => $impUid,
            'amount' => $paidAmount,
            'status' => $status,
            'paid_at' => isset($payment['paid_at']) && $payment['paid_at'] ? date('Y-m-d H:i:s', (int) $payment['paid_at']) : date('Y-m-d H:i:s'),
            'raw_payload' => json_encode($payment, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        ]);

        $this->orders->markPaid($merchantUid);

        return [
            'id' => $paymentId,
            'merchant_uid' => $merchantUid,
            'imp_uid' => $impUid,
            'amount' => $paidAmount,
            'status' => $status,
        ];
    }

    /** @return array<string, mixed>|null */
    private function product(string $code): ?array
    {
        return [
            'LECTURE_BASIC' => ['code' => 'LECTURE_BASIC', 'name' => '공사비 산정 기본 과정', 'price' => 220000],
            'LECTURE_ADVANCED' => ['code' => 'LECTURE_ADVANCED', 'name' => '공사비 실무 심화 과정', 'price' => 330000],
            'BOOK_ALL' => ['code' => 'BOOK_ALL', 'name' => '공사비 실무 교재 세트', 'price' => 88000],
            'REPORT_SINGLE' => ['code' => 'REPORT_SINGLE', 'name' => '공사비 보고서 1회 이용권', 'price' => 55000],
        ][$code] ?? null;
    }

    /** @return array<string, mixed> */
    private function fetchPortOnePayment(string $impUid, string $merchantUid, int $expectedAmount): array
    {
        $verify = Config::bool('PAYMENT_VERIFY', false);
        $key = Config::get('PORTONE_API_KEY', '');
        $secret = Config::get('PORTONE_API_SECRET', '');

        if (!$verify || $key === '' || $secret === '') {
            if (Config::get('APP_ENV', 'local') === 'production') {
                throw new RuntimeException('운영 결제 검증 키가 설정되지 않았습니다.');
            }

            return [
                'imp_uid' => $impUid,
                'merchant_uid' => $merchantUid,
                'amount' => $expectedAmount,
                'status' => 'paid',
                'paid_at' => time(),
                'demo' => true,
            ];
        }

        $token = $this->requestPortOneToken($key, $secret);
        $response = $this->httpJson('GET', 'https://api.iamport.kr/payments/' . rawurlencode($impUid), null, [
            'Authorization: ' . $token,
        ]);

        if (($response['code'] ?? -1) !== 0 || empty($response['response']) || !is_array($response['response'])) {
            throw new RuntimeException('결제 검증 응답을 확인할 수 없습니다.');
        }

        return $response['response'];
    }

    private function requestPortOneToken(string $key, string $secret): string
    {
        $response = $this->httpJson('POST', 'https://api.iamport.kr/users/getToken', [
            'imp_key' => $key,
            'imp_secret' => $secret,
        ]);

        $token = $response['response']['access_token'] ?? null;
        if (!is_string($token) || $token === '') {
            throw new RuntimeException('결제 검증 토큰 발급에 실패했습니다.');
        }

        return $token;
    }

    /**
     * @param array<string, mixed>|null $payload
     * @param array<int, string> $headers
     * @return array<string, mixed>
     */
    private function httpJson(string $method, string $url, ?array $payload = null, array $headers = []): array
    {
        $headers[] = 'Content-Type: application/json';
        $context = stream_context_create([
            'http' => [
                'method' => $method,
                'header' => implode("\r\n", $headers),
                'content' => $payload === null ? '' : json_encode($payload),
                'timeout' => 10,
                'ignore_errors' => true,
            ],
        ]);

        $raw = file_get_contents($url, false, $context);
        $decoded = json_decode((string) $raw, true);
        if (!is_array($decoded)) {
            throw new RuntimeException('결제 서버 응답을 해석할 수 없습니다.');
        }

        return $decoded;
    }
}
