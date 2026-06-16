<?php

declare(strict_types=1);

namespace App\Core;

final class Response
{
    /** @param array<string, string> $headers */
    public function __construct(
        private readonly string $body = '',
        private readonly int $status = 200,
        private readonly array $headers = ['Content-Type' => 'text/html; charset=UTF-8']
    ) {
    }

    /** @param array<string, mixed> $payload */
    public static function json(array $payload, int $status = 200): self
    {
        return new self(json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?: '{}', $status, [
            'Content-Type' => 'application/json; charset=UTF-8',
        ]);
    }

    public static function redirect(string $location): self
    {
        return new self('', 302, ['Location' => $location]);
    }

    public function send(): void
    {
        http_response_code($this->status);
        foreach ($this->headers as $name => $value) {
            header($name . ': ' . $value);
        }
        echo $this->body;
    }
}
