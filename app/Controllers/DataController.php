<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;

final class DataController extends BaseController
{
    public function index(Request $request): Response
    {
        $path = trim($request->path, '/');
        $type = basename($path) ?: 'gongsabi';
        if ($type === 'data') {
            $type = 'gongsabi';
        }

        $filters = [
            'keyword' => trim((string) $request->input('keyword', '')),
            'building_type' => trim((string) $request->input('building_type', '')),
            'region' => trim((string) $request->input('region', '')),
            'area' => trim((string) $request->input('area', '')),
            'year' => trim((string) $request->input('year', '')),
            'price_type' => trim((string) $request->input('price_type', '')),
        ];

        return $this->view('data/index', [
            'title' => $this->pageTitle($type),
            'dataType' => $type,
            'pageTitle' => $this->pageTitle($type),
            'pageLead' => $this->pageLead($type),
            'filters' => $filters,
            'rows' => $this->rows($type, $filters),
            'isPaid' => $this->isPaidMember(),
        ]);
    }

    private function isPaidMember(): bool
    {
        $user = Auth::user();
        if (!$user) {
            return false;
        }
        return in_array(($user['role'] ?? ''), ['admin', 'paid', 'premium'], true);
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
            'danga' => '설계가, 도급가, 실행가를 검색할 수 있습니다.',
            'goljo' => '해당 건축물의 골조를 면적별 수량으로 검색할 수 있습니다.',
        ][$type] ?? '공사비 관련 자료를 검색합니다.';
    }

    /** @param array<string,string> $filters @return array<int, array<string, mixed>> */
    private function rows(string $type, array $filters): array
    {
        $rows = [
            'gongsabi' => [
                ['no'=>1,'sample'=>true,'category'=>'업무시설','name'=>'서울 업무시설 철근콘크리트 표준형','region'=>'서울','area_band'=>'3,000~5,000㎡','year'=>'2025','unit'=>'㎡','price'=>2148000,'desc'=>'지상 8층, 지하 1층, 중급 마감 기준 면적당 공사비 샘플입니다.'],
                ['no'=>2,'sample'=>true,'category'=>'근린생활시설','name'=>'수도권 근린생활시설 표준형','region'=>'경기/인천','area_band'=>'1,000~3,000㎡','year'=>'2024','unit'=>'㎡','price'=>1865000,'desc'=>'상가 및 근린생활시설 표준 마감 기준입니다.'],
                ['no'=>3,'sample'=>false,'category'=>'공동주택','name'=>'공동주택 RC 골조+마감 통합 단가','region'=>'전국','area_band'=>'10,000㎡ 이상','year'=>'2025','unit'=>'㎡','price'=>1980000,'desc'=>'유료회원용 상세 공사비 자료입니다.'],
                ['no'=>4,'sample'=>false,'category'=>'공장','name'=>'공장/창고 철골조 표준형','region'=>'지방','area_band'=>'5,000~10,000㎡','year'=>'2023','unit'=>'㎡','price'=>1325000,'desc'=>'유료회원용 물류/공장 공사비 자료입니다.'],
            ],
            'danga' => [
                ['no'=>1,'sample'=>true,'category'=>'철근콘크리트','name'=>'철근 가공조립 일반','region'=>'전국','area_band'=>'일반','year'=>'2025','unit'=>'ton','price'=>780000,'price_type'=>'도급가','desc'=>'설계가, 도급가, 실행가 비교용 샘플 단가입니다.'],
                ['no'=>2,'sample'=>true,'category'=>'철골공사','name'=>'H형강 제작 설치','region'=>'수도권','area_band'=>'일반','year'=>'2025','unit'=>'ton','price'=>2150000,'price_type'=>'설계가','desc'=>'철골 공사 단가 샘플입니다.'],
                ['no'=>3,'sample'=>false,'category'=>'마감공사','name'=>'석고보드 2겹+도장','region'=>'서울','area_band'=>'일반','year'=>'2024','unit'=>'㎡','price'=>42000,'price_type'=>'실행가','desc'=>'유료회원용 공사 단가 자료입니다.'],
                ['no'=>4,'sample'=>false,'category'=>'토공사','name'=>'터파기 및 잔토처리','region'=>'지방','area_band'=>'일반','year'=>'2023','unit'=>'㎥','price'=>18500,'price_type'=>'도급가','desc'=>'유료회원용 상세 단가 자료입니다.'],
            ],
            'goljo' => [
                ['no'=>1,'sample'=>true,'category'=>'RC조','name'=>'업무시설 골조 면적별 수량','region'=>'서울','area_band'=>'3,000~5,000㎡','year'=>'2025','unit'=>'㎡','price'=>690000,'concrete'=>'0.82㎥/㎡','rebar'=>'0.135ton/㎡','form'=>'4.9㎡/㎡','desc'=>'골조 수량 산출 샘플입니다.'],
                ['no'=>2,'sample'=>true,'category'=>'RC조','name'=>'근린생활시설 골조 면적별 수량','region'=>'수도권','area_band'=>'1,000~3,000㎡','year'=>'2024','unit'=>'㎡','price'=>610000,'concrete'=>'0.76㎥/㎡','rebar'=>'0.121ton/㎡','form'=>'4.4㎡/㎡','desc'=>'골조를 면적 기준 수량으로 환산한 샘플입니다.'],
                ['no'=>3,'sample'=>false,'category'=>'SRC조','name'=>'복합시설 골조 면적별 수량','region'=>'전국','area_band'=>'10,000㎡ 이상','year'=>'2025','unit'=>'㎡','price'=>830000,'concrete'=>'0.89㎥/㎡','rebar'=>'0.151ton/㎡','form'=>'5.1㎡/㎡','desc'=>'유료회원용 골조 상세 수량 자료입니다.'],
                ['no'=>4,'sample'=>false,'category'=>'철골조','name'=>'물류창고 골조 면적별 수량','region'=>'지방','area_band'=>'5,000~10,000㎡','year'=>'2023','unit'=>'㎡','price'=>540000,'concrete'=>'0.31㎥/㎡','rebar'=>'0.045ton/㎡','form'=>'1.8㎡/㎡','desc'=>'유료회원용 철골조 수량 자료입니다.'],
            ],
        ][$type] ?? [];

        $keyword = strtolower($filters['keyword'] ?? '');
        if ($keyword !== '') {
            $rows = array_values(array_filter($rows, static function (array $row) use ($keyword): bool {
                return str_contains(strtolower($row['name'] . ' ' . $row['category'] . ' ' . ($row['region'] ?? '')), $keyword);
            }));
        }
        if (($filters['region'] ?? '') !== '') {
            $regionMap = ['seoul'=>'서울','gyeonggi'=>'경기/인천','local'=>'지방','jeju'=>'제주'];
            $needle = $regionMap[$filters['region']] ?? $filters['region'];
            $rows = array_values(array_filter($rows, static fn(array $row): bool => ($row['region'] ?? '') === $needle || ($row['region'] ?? '') === '전국'));
        }
        if (($filters['year'] ?? '') !== '') {
            $rows = array_values(array_filter($rows, static fn(array $row): bool => (string)($row['year'] ?? '') === (string)$filters['year']));
        }
        if (($filters['price_type'] ?? '') !== '' && $type === 'danga') {
            $rows = array_values(array_filter($rows, static fn(array $row): bool => ($row['price_type'] ?? '') === $filters['price_type']));
        }
        return $rows;
    }
}
