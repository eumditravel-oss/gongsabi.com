<?php

declare(strict_types=1);

namespace App\Core;

use App\Repositories\UserRepository;

final class Auth
{
    /** @return array<string, mixed>|null */
    public static function user(): ?array
    {
        if (empty($_SESSION['user_id'])) {
            return null;
        }

        return (new UserRepository())->find((int) $_SESSION['user_id']);
    }

    public static function id(): ?int
    {
        return isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : null;
    }

    public static function login(int $userId): void
    {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $userId;
    }

    public static function logout(): void
    {
        unset($_SESSION['user_id']);
        session_regenerate_id(true);
    }

    public static function isAdmin(): bool
    {
        $user = self::user();
        return $user !== null && ($user['role'] ?? '') === 'admin';
    }
}
