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

        return $this->view('report/form', [
            'title' => '공사비 보고서',
            'reportType' => $type,
            'serviceName' => $this->serviceName($type),
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
            'structure' => (string) $request->input('structure', 'reinforced_concrete'),
            'finish_grade' => (string) $request->input('finish_grade', 'standard'),
            'region' => (string) $request->input('region', 'seoul'),
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
            'gigan' => '공사기간',
            'ganjeob' => '간접비',
        ][$type] ?? '공사비';
    }
}
