<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Database;
use PDO;
use Throwable;

final class ReportRepository
{
    private ?PDO $db = null;

    public function __construct()
    {
        try {
            $this->db = Database::connection();
        } catch (Throwable) {
            $this->db = null;
        }
    }

    /** @param array<string, mixed> $data */
    public function create(array $data): int
    {
        if (!$this->db) {
            return 0;
        }
        try {
            $stmt = $this->db->prepare(
                'INSERT INTO reports (user_id, report_type, input_json, result_json, created_at)
                 VALUES (:user_id, :report_type, :input_json, :result_json, CURRENT_TIMESTAMP)'
            );
            $stmt->execute([
                'user_id' => $data['user_id'] ?? null,
                'report_type' => $data['report_type'],
                'input_json' => $data['input_json'],
                'result_json' => $data['result_json'],
            ]);
            return (int) $this->db->lastInsertId();
        } catch (Throwable) {
            return 0;
        }
    }
}
