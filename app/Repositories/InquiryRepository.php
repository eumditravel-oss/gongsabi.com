<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Database;
use PDO;

final class InquiryRepository
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
            'INSERT INTO inquiries (user_id, name, email, title, content, status, created_at, updated_at)
             VALUES (:user_id, :name, :email, :title, :content, :status, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => 'open',
        ]);

        return (int) $this->db->lastInsertId();
    }

    public function countOpen(): int
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM inquiries WHERE status = 'open'");
        return (int) $stmt->fetchColumn();
    }
}
