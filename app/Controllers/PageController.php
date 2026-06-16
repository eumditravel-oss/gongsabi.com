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
        $map = [
            'company1' => ['대표이사 인사말', '공사비닷컴은 “왜?”라는 질문에서 시작되었습니다.', ['왜 건설 공사비는 쉽게 비교하기 어려운가.', '왜 내역서 작성에는 많은 시간과 비용이 필요한가.', '정확성을 바탕으로 한 빅데이터를 활용하여 공사기간과 예산을 절감합니다.']],
            'company2' => ['기업소개', 'Standard, Big Data, Innovation을 바탕으로 건설 공사비 정보를 제공합니다.', ['정확성을 바탕으로 한 공사비 데이터', '공사기간과 예산 절감을 위한 정보 서비스', '시간과 비용이 많이 소요되는 내역서 작성을 빠르게 지원']],
            'company3' => ['채용안내', '공사비 데이터와 건설 원가관리 서비스를 함께 만들어갈 인재를 기다립니다.', ['건축 적산 및 내역 검토', '공사비 데이터 관리', '교육 및 고객지원']],
            'company4' => ['오시는길', '공사비닷컴 위치 및 문의처입니다.', ['대표전화 02.2202.2258', '업무 및 파트너 제휴 partner@gongsabi.com', '고객센터 cs@gongsabi.com']],
        ];
        [$heading, $lead, $items] = $map[$page] ?? $map['company1'];
        return $this->view('pages/static', [
            'title' => $heading,
            'section' => '회사소개',
            'active' => $page,
            'menu' => [
                'company1' => ['대표이사 인사말', '/front/company/company1'],
                'company2' => ['기업소개', '/front/company/company2'],
                'company3' => ['채용안내', '/front/company/company3'],
                'company4' => ['오시는길', '/front/company/company4'],
            ],
            'heading' => $heading,
            'lead' => $lead,
            'items' => $items,
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
        return $this->view('pages/static', [
            'title' => '문의처',
            'section' => '고객센터',
            'active' => 'contact',
            'menu' => [
                'notice' => ['공지사항', '/front/customer/notice'],
                'pds' => ['자료실', '/front/customer/pds'],
                'faq' => ['자주 묻는 질문', '/front/customer/faq'],
                'qna' => ['Q&A', '/front/customer/qna'],
            ],
            'heading' => '문의처',
            'lead' => '공사비닷컴 서비스, 업무 제휴, 교육 관련 문의를 접수합니다.',
            'items' => ['대표전화 02.2202.2258', '업무 및 파트너 제휴 partner@gongsabi.com', '기타 문의 cs@gongsabi.com'],
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
