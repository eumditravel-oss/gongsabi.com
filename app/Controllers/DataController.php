<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;

final class DataController extends BaseController
{
    public function index(Request $request): Response
    {
        $path = trim($request->path, '/');
        $type = basename($path) ?: 'gongsabi';
        if ($type === 'data') {
            $type = 'index';
        }

        if ($type === 'index') {
            return $this->view('data/index', [
                'title' => '공사비 검색',
                'dataType' => 'index',
                'pageTitle' => '공사비 검색',
                'pageLead' => '건물의 종류 / 면적 / 지역 / 착공년도를 선택하시면 면적당 공사비 정보를 찾으실 수 있습니다.',
                'keyword' => '',
                'condition' => [],
                'rows' => [],
            ]);
        }

        $keyword = trim((string) $request->input('keyword', ''));
        $condition = [
            'building_type' => (string) $request->input('building_type', ''),
            'region' => (string) $request->input('region', ''),
            'area_range' => (string) $request->input('area_range', ''),
            'start_year' => (string) $request->input('start_year', ''),
        ];

        return $this->view('data/index', [
            'title' => $this->pageTitle($type),
            'dataType' => $type,
            'pageTitle' => $this->pageTitle($type),
            'pageLead' => $this->pageLead($type),
            'keyword' => $keyword,
            'condition' => $condition,
            'rows' => $this->sampleRows($type, $keyword, $condition),
        ]);
    }

    private function pageTitle(string $type): string
    {
        return [
            'gongsabi' => '면적당 공사비 검색',
            'danga' => '공사 단가 검색',
            'goljo' => '골조 면적별 수량',
        ][$type] ?? '공사비 검색';
    }

    private function pageLead(string $type): string
    {
        return [
            'gongsabi' => '건물의 종류 / 면적 / 지역 / 착공년도를 선택하시면 면적당 공사비 정보를 찾으실 수 있습니다.',
            'danga' => '건축, 토목, 기계, 전기 등 각 공종별 공사 자재의 설계가, 도급가, 실행가를 검색할 수 있습니다.',
            'goljo' => '해당 건축물의 골조를 면적별 수량으로 검색할 수 있습니다.',
        ][$type] ?? '조건을 선택하시면 공사비 정보를 검색할 수 있습니다.';
    }

    /** @param array<string, string> $condition @return array<int, array<string, mixed>> */
    private function sampleRows(string $type, string $keyword, array $condition): array
    {
        $sets = [
            'gongsabi' => [
                ['category' => '업무시설', 'name' => '서울 업무시설 철근콘크리트 표준형', 'area' => '3,000㎡ 이상', 'region' => '서울', 'year' => '2024', 'unit' => '㎡', 'price' => 2185000, 'member' => '샘플'],
                ['category' => '공동주택', 'name' => '경기 공동주택 지상 골조+마감 표준형', 'area' => '5,000㎡ 이상', 'region' => '경기/인천', 'year' => '2023', 'unit' => '㎡', 'price' => 1960000, 'member' => '유료'],
                ['category' => '근린생활시설', 'name' => '지방 근린생활시설 중소형', 'area' => '1,000㎡ 미만', 'region' => '지방', 'year' => '2022', 'unit' => '㎡', 'price' => 1740000, 'member' => '유료'],
                ['category' => '공장', 'name' => '철골조 공장 기본형', 'area' => '10,000㎡ 이상', 'region' => '지방', 'year' => '2024', 'unit' => '㎡', 'price' => 1420000, 'member' => '샘플'],
            ],
            'danga' => [
                ['category' => '건축', 'name' => '철근콘크리트 타설', 'area' => '공종 단가', 'region' => '전국', 'year' => '2024', 'unit' => '㎥', 'price' => 128000, 'member' => '샘플'],
                ['category' => '토목', 'name' => '터파기 및 잔토처리', 'area' => '공종 단가', 'region' => '전국', 'year' => '2024', 'unit' => '㎥', 'price' => 19500, 'member' => '유료'],
                ['category' => '기계', 'name' => '위생배관 설치', 'area' => '공종 단가', 'region' => '전국', 'year' => '2023', 'unit' => 'm', 'price' => 42000, 'member' => '유료'],
                ['category' => '전기', 'name' => '전력간선 배관배선', 'area' => '공종 단가', 'region' => '전국', 'year' => '2023', 'unit' => 'm', 'price' => 36500, 'member' => '샘플'],
            ],
            'goljo' => [
                ['category' => '철근', 'name' => 'RC 업무시설 철근 수량', 'area' => '3,000㎡ 이상', 'region' => '서울', 'year' => '2024', 'unit' => 'kg/㎡', 'price' => 72, 'member' => '샘플'],
                ['category' => '콘크리트', 'name' => 'RC 공동주택 콘크리트 수량', 'area' => '5,000㎡ 이상', 'region' => '경기/인천', 'year' => '2024', 'unit' => '㎥/㎡', 'price' => 0.64, 'member' => '유료'],
                ['category' => '거푸집', 'name' => '근린생활시설 거푸집 수량', 'area' => '1,000㎡ 미만', 'region' => '지방', 'year' => '2023', 'unit' => '㎡/㎡', 'price' => 4.8, 'member' => '유료'],
                ['category' => '철골', 'name' => '철골조 공장 강재 수량', 'area' => '10,000㎡ 이상', 'region' => '지방', 'year' => '2024', 'unit' => 'kg/㎡', 'price' => 58, 'member' => '샘플'],
            ],
        ];

        $rows = $sets[$type] ?? $sets['gongsabi'];
        return array_values(array_filter($rows, static function (array $row) use ($keyword, $condition): bool {
            if ($keyword !== '' && !str_contains($row['name'] . $row['category'], $keyword)) {
                return false;
            }
            if (($condition['building_type'] ?? '') !== '' && $row['category'] !== $condition['building_type']) {
                return false;
            }
            if (($condition['region'] ?? '') !== '' && $row['region'] !== $condition['region']) {
                return false;
            }
            if (($condition['area_range'] ?? '') !== '' && $row['area'] !== $condition['area_range']) {
                return false;
            }
            if (($condition['start_year'] ?? '') !== '' && $row['year'] !== $condition['start_year']) {
                return false;
            }
            return true;
        }));
    }
}
