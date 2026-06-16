<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;

final class PageController extends BaseController
{
    public function company(Request $request): Response
    {
        return $this->view('pages/static', [
            'title' => '회사소개',
            'heading' => '공사비닷컴',
            'lead' => '건설 공사비 데이터, 교육, 산정 보고서를 한 곳에서 관리하는 플랫폼입니다.',
            'items' => [
                '공개 공사비 자료와 교육 콘텐츠를 제공합니다.',
                '회원별 보고서 작성 이력을 새 DB에 안전하게 저장합니다.',
                '관리자에서 게시글, 자료, 주문, 결제 현황을 직접 관리합니다.',
            ],
        ]);
    }

    public function community(Request $request): Response
    {
        return $this->view('pages/static', [
            'title' => '커뮤니티',
            'heading' => '공사비 커뮤니티',
            'lead' => '제휴사, 구인, 시장정보, 공사비 소식을 운영자가 직접 게시할 수 있습니다.',
            'items' => ['공사비 이야기', '마켓', '파트너스', '구인구직'],
        ]);
    }

    public function contact(Request $request): Response
    {
        return $this->view('pages/static', [
            'title' => '오시는 길',
            'heading' => '고객센터',
            'lead' => '문의 접수와 운영 안내를 이곳에서 관리합니다.',
            'items' => ['카카오 채널', '이메일 문의', '자료 요청'],
        ]);
    }

    public function privacy(Request $request): Response
    {
        return $this->view('pages/policy', [
            'title' => '개인정보처리방침',
            'heading' => '개인정보처리방침',
        ]);
    }

    public function terms(Request $request): Response
    {
        return $this->view('pages/policy', [
            'title' => '이용약관',
            'heading' => '이용약관',
        ]);
    }
}
