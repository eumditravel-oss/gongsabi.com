<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;

final class PageController extends BaseController
{
    public function company(Request $request): Response
    {
        $path = trim($request->path, '/');
        $page = basename($path) ?: 'company1';
        if ($page === 'company') {
            $page = 'company1';
        }
        $tab = (string) $request->input('tab', '');
        if ($page === 'company3' && $tab === '') {
            $tab = 'talent';
        }

        $titles = [
            'company1' => '대표이사 소개',
            'company2' => '왜, 공사비닷컴인가?',
            'company3' => '채용안내',
            'company4' => '오시는 길',
        ];

        return $this->view('pages/company', [
            'title' => $titles[$page] ?? '회사소개',
            'section' => '회사소개',
            'active' => $page,
            'tab' => $tab,
        ]);
    }

    public function community(Request $request): Response
    {
        $path = trim($request->path, '/');
        $page = basename($path) ?: 'market';
        if ($page === 'community') {
            $page = 'market';
        }
        $map = [
            'market' => ['건설 장터', '현장의 남는 건설 자재들을 거래하는 장터입니다.', ['본 게시판을 통한 모든 상거래 책임은 구매자와 판매자에게 있습니다.', '자재명, 수량, 지역, 담당자 연락처를 등록할 수 있습니다.']],
            'gongsabi' => ['공사비 작성 의뢰', '개산 및 정미견적, 현장 물량 검증 용역, 설계변경, 감정 및 공사비 작성에 관해 의뢰할 수 있습니다.', ['개산견적 및 정미견적', '현장 물량 검증 용역', '설계변경 및 감정 자료 검토']],
            'partners' => ['Partners', '공사비닷컴의 주요 협력사입니다.', ['전체', '종합건설 / 설계 / 시행', '가설 / 토공 / 골조', '타일 / 석공 / 창호 / 유리', '전기 / 설비 / 장비']],
            'recruit' => ['구인 / 구직', '건설 산업의 인재와 회사를 이어주는 구인 / 구직 장터입니다.', ['구인 공고 등록', '구직 정보 등록', '기업과 인재 매칭']],
        ];
        [$heading, $lead, $items] = $map[$page] ?? $map['market'];
        return $this->view('pages/static', [
            'title' => $heading,
            'section' => '커뮤니티',
            'active' => $page,
            'menu' => [
                'market' => ['건설 장터', '/front/community/market'],
                'gongsabi' => ['공사비 작성 의뢰', '/front/community/gongsabi'],
                'partners' => ['Partners', '/front/community/partners'],
                'recruit' => ['구인 / 구직', '/front/community/recruit'],
            ],
            'heading' => $heading,
            'lead' => $lead,
            'items' => $items,
        ]);
    }

    public function contact(Request $request): Response
    {
        return $this->view('pages/company', [
            'title' => '오시는 길',
            'section' => '회사소개',
            'active' => 'company4',
            'tab' => '',
        ]);
    }

    public function privacy(Request $request): Response
    {
        return $this->view('pages/policy', ['title' => '개인정보처리방침', 'heading' => '개인정보처리방침']);
    }

    public function terms(Request $request): Response
    {
        return $this->view('pages/policy', ['title' => '이용약관', 'heading' => '이용약관']);
    }
}
