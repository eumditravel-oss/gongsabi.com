<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Csrf;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Core\View;

abstract class BaseController
{
    /** @param array<string, mixed> $data */
    protected function view(string $template, array $data = []): Response
    {
        return new Response(View::render($template, $data));
    }

    protected function redirect(string $location): Response
    {
        return Response::redirect($location);
    }

    protected function requireCsrf(Request $request): ?Response
    {
        if (Csrf::verify((string) $request->input('_csrf', ''))) {
            return null;
        }

        Flash::set('error', '요청이 만료되었습니다. 다시 시도해 주세요.');
        return $this->redirect($request->server['HTTP_REFERER'] ?? '/');
    }
}
