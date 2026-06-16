<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;

final class EducationController extends BaseController
{
    public function index(Request $request): Response
    {
        return $this->lecture($request);
    }

    public function lecture(Request $request): Response
    {
        return $this->view('education/list', [
            'title' => '공사비 교육',
            'kind' => 'lecture',
            'products' => $this->products('lecture'),
        ]);
    }

    public function book(Request $request): Response
    {
        return $this->view('education/list', [
            'title' => '교재 안내',
            'kind' => 'book',
            'products' => $this->products('book'),
        ]);
    }

    public function youtube(Request $request): Response
    {
        return $this->view('education/youtube', ['title' => '유튜브']);
    }

    public function lectureRegister(Request $request): Response
    {
        return $this->lecture($request);
    }

    /** @return array<int, array<string, mixed>> */
    private function products(string $kind): array
    {
        if ($kind === 'book') {
            return [
                ['code' => 'BOOK_ALL', 'name' => '공사비 실무 교재 세트', 'price' => 88000, 'description' => '공사비 산정 흐름을 정리한 실무 교재입니다.'],
            ];
        }

        return [
            ['code' => 'LECTURE_BASIC', 'name' => '공사비 산정 기본 과정', 'price' => 220000, 'description' => '공사비 구성, 단가, 내역서 흐름을 배우는 입문 강의입니다.'],
            ['code' => 'LECTURE_ADVANCED', 'name' => '공사비 실무 심화 과정', 'price' => 330000, 'description' => '검토, 조정, 보고서 작성까지 다루는 실무 과정입니다.'],
        ];
    }
}
