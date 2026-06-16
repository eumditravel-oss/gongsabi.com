<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;

final class DataController extends BaseController
{
    public function index(Request $request): Response
    {
        $keyword = trim((string) $request->input('keyword', ''));

        return $this->view('data/index', [
            'title' => '공사비 자료',
            'keyword' => $keyword,
            'rows' => $this->sampleRows($keyword),
        ]);
    }

    /** @return array<int, array<string, mixed>> */
    private function sampleRows(string $keyword): array
    {
        $rows = [
            ['name' => '철근콘크리트 표준형', 'category' => '건축', 'unit' => '㎡', 'price' => 1850000],
            ['name' => '철골조 물류시설', 'category' => '골조', 'unit' => '㎡', 'price' => 1420000],
            ['name' => '사무실 인테리어', 'category' => '마감', 'unit' => '㎡', 'price' => 720000],
        ];

        if ($keyword === '') {
            return $rows;
        }

        return array_values(array_filter($rows, static fn (array $row): bool => str_contains($row['name'], $keyword)));
    }
}
