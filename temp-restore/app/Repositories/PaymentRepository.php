<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Database;
use PDO;

final class PaymentRepository
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
            'INSERT INTO payments (order_id, merchant_uid, imp_uid, provider, amount, status, paid_at, raw_payload, created_at)
             VALUES (:order_id, :merchant_uid, :imp_uid, :provider, :amount, :status, :paid_at, :raw_payload, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            'order_id' => $data['order_id'],
            'merchant_uid' => $data['merchant_uid'],
            'imp_uid' => $data['imp_uid'],
            'provider' => $data['provider'] ?? 'portone',
            'amount' => $data['amount'],
            'status' => $data['status'],
            'paid_at' => $data['paid_at'],
            'raw_payload' => $data['raw_payload'],
        ]);

        return (int) $this->db->lastInsertId();
    }
}
