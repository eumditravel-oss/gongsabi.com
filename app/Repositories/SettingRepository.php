<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Database;
use PDO;
use Throwable;

final class SettingRepository
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

    /** @return array<string, string> */
    public function all(): array
    {
        if (!$this->db) {
            return [];
        }
        try {
            $rows = $this->db->query('SELECT setting_key, setting_value FROM site_settings')->fetchAll();
        } catch (Throwable) {
            return [];
        }

        $settings = [];
        foreach ($rows as $row) {
            $settings[(string) $row['setting_key']] = (string) ($row['setting_value'] ?? '');
        }

        return $settings;
    }

    /** @param array<string, string> $settings */
    public function saveMany(array $settings): void
    {
        if (!$this->db) {
            return;
        }
        $exists = $this->db->prepare('SELECT setting_key FROM site_settings WHERE setting_key = :setting_key LIMIT 1');
        $insert = $this->db->prepare(
            'INSERT INTO site_settings (setting_key, setting_value, updated_at)
             VALUES (:setting_key, :setting_value, CURRENT_TIMESTAMP)'
        );
        $update = $this->db->prepare(
            'UPDATE site_settings SET setting_value = :setting_value, updated_at = CURRENT_TIMESTAMP
             WHERE setting_key = :setting_key'
        );

        foreach ($settings as $key => $value) {
            $exists->execute(['setting_key' => $key]);
            $stmt = $exists->fetchColumn() ? $update : $insert;
            $stmt->execute([
                'setting_key' => $key,
                'setting_value' => $value,
            ]);
        }
    }
}
