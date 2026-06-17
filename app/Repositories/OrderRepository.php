<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Database;
use PDO;

final class OrderRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connection();
    }

    /** @param array<string, mixed> $data */
    public function create(array $data): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO orders (merchant_uid, user_id, product_code, product_name, amount, buyer_name, buyer_email, buyer_tel, status, created_at, updated_at)
             VALUES (:merchant_uid, :user_id, :product_code, :product_name, :amount, :buyer_name, :buyer_email, :buyer_tel, :status, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            'merchant_uid' => $data['merchant_uid'],
            'user_id' => $data['user_id'],
            'product_code' => $data['product_code'],
            'product_name' => $data['product_name'],
            'amount' => $data['amount'],
            'buyer_name' => $data['buyer_name'],
            'buyer_email' => $data['buyer_email'],
            'buyer_tel' => $data['buyer_tel'],
            'status' => $data['status'] ?? 'pending',
        ]);

        return (int) $this->db->lastInsertId();
    }

    /** @return array<string, mixed>|null */
    public function findByMerchantUid(string $merchantUid): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM orders WHERE merchant_uid = :merchant_uid LIMIT 1');
        $stmt->execute(['merchant_uid' => $merchantUid]);
        $row = $stmt->fetch();

        return is_array($row) ? $row : null;
    }

    public function markPaid(string $merchantUid): void
    {
        $stmt = $this->db->prepare("UPDATE orders SET status = 'paid', updated_at = CURRENT_TIMESTAMP WHERE merchant_uid = :merchant_uid");
        $stmt->execute(['merchant_uid' => $merchantUid]);
    }

    /** @return array<int, array<string, mixed>> */
    public function latest(int $limit = 10): array
    {
        $stmt = $this->db->prepare('SELECT * FROM orders ORDER BY id DESC LIMIT :limit');
        $stmt->bindValue('limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll() ?: [];
    }
}
