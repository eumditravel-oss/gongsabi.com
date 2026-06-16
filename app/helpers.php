<?php

declare(strict_types=1);

use App\Core\Config;
use App\Core\Csrf;

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function url(string $path = ''): string
{
    if ($path === '') {
        return rtrim(Config::get('APP_URL', ''), '/');
    }

    if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
        return $path;
    }

    return '/' . ltrim($path, '/');
}

function asset(string $path): string
{
    return url('/static/' . ltrim($path, '/'));
}

function csrf_field(): string
{
    return '<input type="hidden" name="_csrf" value="' . e(Csrf::token()) . '">';
}

function selected(string $actual, string $expected): string
{
    return $actual === $expected ? ' selected' : '';
}

function money(int|float $amount): string
{
    return number_format((float) $amount) . '원';
}
