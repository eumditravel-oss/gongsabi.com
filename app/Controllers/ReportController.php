<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;
use App\Repositories\ReportRepository;
use App\Services\ReportEstimator;

final class ReportController extends BaseController
{
    public function index(Request $request): Response
    {
        return $this->form($request);
    }

    public function form(Request $request): Response
    {
        $path = trim($request->path, '/');
        $type = basename($path) ?: 'geonchuk';
        if ($type === 'report') {
            $type = 'geonchuk';
        }

        return $this->view('report/form', [
            'title' => $this->serviceName($type),
            'reportType' => $type,
            'serviceName' => $this->serviceName($type),
            'serviceLead' => $this->serviceLead($type),
        ]);
    }

    public function estimate(Request $request): Response
    {
        if (!Csrf::verify((string) $request->input('_csrf', ''))) {
            return Response::json(['ok' => false, 'message' => '요청이 만료되었습니다.'], 419);
        }

        $payload = [
            'report_type' => (string) $request->input('report_type', 'geonchuk'),
            'area' => (float) $request->input('area', 0),
            'floors' => (int) $request->input('floors', 1),
            'basement' => (int) $request->input('basement', 0),
            'structure' => (string) $request->input('structure', 'reinforced_concrete'),
            'finish_grade' => (string) $request->input('finish_grade', 'standard'),
            'region' => (string) $request->input('region', 'seoul'),
            'building_type' => (string) $request->input('building_type', 'office'),
        ];

        $result = (new ReportEstimator())->estimate($payload);
        (new ReportRepository())->create([
            'user_id' => Auth::id(),
            'report_type' => $payload['report_type'],
            'input_json' => json_encode($payload, JSON_UNESCAPED_UNICODE),
            'result_json' => json_encode($result, JSON_UNESCAPED_UNICODE),
        ]);

        return Response::json(['ok' => true, 'result' => $result]);
    }

    private function serviceName(string $type): string
    {
        return [
            'geonchuk' => '건축 공사비',
            'goljo' => '골조 공사비',
            'gigan' => '공사기간의 산정',
            'ganjeob' => '간접 공사비 계산',
        ][$type] ?? '공사비';
    }

    private function serviceLead(string $type): string
    {
        return [
            'geonchuk' => '비교할 수 있는 내역서를 제공합니다.',
            'goljo' => '골조 공사비와 주요 수량을 기준 조건에 따라 산정합니다.',
            'gigan' => '건물 규모와 층수 조건으로 공사기간을 산정해주는 서비스입니다.',
            'ganjeob' => '건물 종류별 간접 공사비를 계산해주는 서비스입니다.',
        ][$type] ?? '공사비 관련 산정 서비스를 제공합니다.';
    }
}
