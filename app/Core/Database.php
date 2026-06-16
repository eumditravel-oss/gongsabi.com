<?php

declare(strict_types=1);

namespace App\Core;

use PDO;

final class Database
{
    private static ?PDO $pdo = null;

    public static function connection(): PDO
    {
        if (self::$pdo instanceof PDO) {
            return self::$pdo;
        }

        $driver = Config::get('DB_DRIVER', 'sqlite');
        if ($driver === 'mysql') {
            $dsn = sprintf(
                'mysql:host=%s;port=%s;dbname=%s;charset=%s',
                Config::get('DB_HOST', '127.0.0.1'),
                Config::get('DB_PORT', '3306'),
                Config::get('DB_DATABASE', 'gongsabi'),
                Config::get('DB_CHARSET', 'utf8mb4')
            );
            self::$pdo = new PDO($dsn, Config::get('DB_USERNAME', 'root'), Config::get('DB_PASSWORD', ''));
        } else {
            $relative = Config::get('DB_SQLITE_PATH', 'storage/gongsabi.sqlite');
            $path = str_starts_with((string) $relative, DIRECTORY_SEPARATOR)
                ? (string) $relative
                : BASE_PATH . '/' . $relative;
            $dir = dirname($path);
            if (!is_dir($dir)) {
                mkdir($dir, 0775, true);
            }
            self::$pdo = new PDO('sqlite:' . $path);
        }

        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return self::$pdo;
    }
}
