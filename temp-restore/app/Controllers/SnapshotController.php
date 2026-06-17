<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;

final class SnapshotController extends BaseController
{
    public function show(Request $request): Response
    {
        $name = trim($request->path, '/');
        $name = $name === '' ? 'index' : str_replace('/', '__', $name);
        $file = BASE_PATH . '/resources/snapshots/' . $name . '.html';

        if (!is_file($file)) {
            return $this->view('pages/404', ['title' => '페이지를 찾을 수 없습니다.']);
        }

        $html = file_get_contents($file);
        if ($html === false) {
            return new Response('스냅샷을 읽을 수 없습니다.', 500);
        }

        return new Response($html);
    }
}
