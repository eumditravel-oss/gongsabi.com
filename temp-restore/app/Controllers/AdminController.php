<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Repositories\BoardRepository;
use App\Repositories\InquiryRepository;
use App\Repositories\OrderRepository;
use App\Repositories\SettingRepository;

final class AdminController extends BaseController
{
    public function dashboard(Request $request): Response
    {
        if (!Auth::isAdmin()) {
            Flash::set('error', '관리자 로그인이 필요합니다.');
            return $this->redirect('/front/auth/login');
        }

        return $this->view('admin/dashboard', [
            'title' => '관리자',
            'noticeCount' => (new BoardRepository())->count('notice'),
            'inquiryCount' => (new InquiryRepository())->countOpen(),
            'orders' => (new OrderRepository())->latest(8),
        ]);
    }

    public function settings(Request $request): Response
    {
        if (!Auth::isAdmin()) {
            Flash::set('error', '관리자 로그인이 필요합니다.');
            return $this->redirect('/front/auth/login');
        }

        return $this->view('admin/settings', [
            'title' => '사이트 설정',
            'settings' => (new SettingRepository())->all(),
            'fields' => $this->settingFields(),
        ]);
    }

    public function saveSettings(Request $request): Response
    {
        if (!Auth::isAdmin()) {
            Flash::set('error', '관리자 로그인이 필요합니다.');
            return $this->redirect('/front/auth/login');
        }

        if ($response = $this->requireCsrf($request)) {
            return $response;
        }

        $allowed = array_keys($this->settingFields());
        $payload = [];
        foreach ($allowed as $key) {
            $payload[$key] = trim((string) $request->input($key, ''));
        }

        (new SettingRepository())->saveMany($payload);
        Flash::set('success', '사이트 설정이 저장되었습니다.');

        return $this->redirect('/admin/settings');
    }

    /** @return array<string, array{label: string, group: string, type: string}> */
    private function settingFields(): array
    {
        return [
            'site_logo_url' => ['label' => '로고 이미지 URL 또는 경로', 'group' => '기본 이미지', 'type' => 'text'],
            'site_favicon_url' => ['label' => '파비콘 URL 또는 경로', 'group' => '기본 이미지', 'type' => 'text'],
            'hero_image_url' => ['label' => '메인 첫 화면 이미지', 'group' => '기본 이미지', 'type' => 'text'],
            'main_section_data_image_url' => ['label' => '자료 섹션 이미지', 'group' => '기본 이미지', 'type' => 'text'],
            'main_section_education_image_url' => ['label' => '교육 섹션 이미지', 'group' => '기본 이미지', 'type' => 'text'],
            'lecture_image_url' => ['label' => '강의 상품 이미지', 'group' => '상품 이미지', 'type' => 'text'],
            'book_image_url' => ['label' => '교재 상품 이미지', 'group' => '상품 이미지', 'type' => 'text'],
            'ad_top_image_url' => ['label' => '상단 광고 이미지', 'group' => '광고', 'type' => 'text'],
            'ad_top_link_url' => ['label' => '상단 광고 링크', 'group' => '광고', 'type' => 'text'],
            'ad_side_image_url' => ['label' => '측면 광고 이미지', 'group' => '광고', 'type' => 'text'],
            'ad_side_link_url' => ['label' => '측면 광고 링크', 'group' => '광고', 'type' => 'text'],
            'ad_bottom_image_url' => ['label' => '하단 광고 이미지', 'group' => '광고', 'type' => 'text'],
            'ad_bottom_link_url' => ['label' => '하단 광고 링크', 'group' => '광고', 'type' => 'text'],
        ];
    }
}
