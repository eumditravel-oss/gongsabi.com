<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Database;
use PDO;

final class ReportRepository
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
            'INSERT INTO reports (user_id, report_type, input_json, result_json, created_at)
             VALUES (:user_id, :report_type, :input_json, :result_json, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            'user_id' => $data['user_id'],
            'report_type' => $data['report_type'],
            'input_json' => $data['input_json'],
            'result_json' => $data['result_json'],
        ]);

        return (int) $this->db->lastInsertId();
    }
}
