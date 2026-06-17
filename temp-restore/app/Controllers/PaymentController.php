<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Services\PaymentService;
use Throwable;

final class PaymentController extends BaseController
{
    public function prepare(Request $request): Response
    {
        if (!Csrf::verify((string) $request->input('_csrf', ''))) {
            return Response::json(['ok' => false, 'message' => '요청이 만료되었습니다.'], 419);
        }

        try {
            $order = (new PaymentService())->createOrder([
                'user_id' => Auth::id(),
                'product_code' => (string) $request->input('product_code', ''),
                'buyer_name' => (string) $request->input('buyer_name', ''),
                'buyer_email' => (string) $request->input('buyer_email', ''),
                'buyer_tel' => (string) $request->input('buyer_tel', ''),
            ]);

            return Response::json(['ok' => true, 'order' => $order]);
        } catch (Throwable $e) {
            return Response::json(['ok' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function complete(Request $request): Response
    {
        if (!Csrf::verify((string) $request->input('_csrf', ''))) {
            return Response::json(['ok' => false, 'message' => '요청이 만료되었습니다.'], 419);
        }

        try {
            $payment = (new PaymentService())->verifyAndComplete(
                (string) $request->input('imp_uid', ''),
                (string) $request->input('merchant_uid', '')
            );

            return Response::json(['ok' => true, 'payment' => $payment]);
        } catch (Throwable $e) {
            return Response::json(['ok' => false, 'message' => $e->getMessage()], 422);
        }
    }
}
