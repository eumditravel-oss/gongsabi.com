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
        $boards = new BoardRepository();

        return $this->view('home/index', [
            'title' => '공사비닷컴',
            'notices' => $boards->latest('notice', 5),
            'banners' => [
                'main_section1.jpg',
                'main_section2.jpg',
                'main_section3.jpg',
                'main_section4.jpg',
            ],
        ]);
    }
}
