<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Repositories\BoardRepository;

final class HomeController extends BaseController
{
    public function index(Request $request): Response
    {
        return $this->view('home/index', [
            'title' => '공사비닷컴',
            'notices' => (new BoardRepository())->latest('notice', 5),
        ]);
    }
}
