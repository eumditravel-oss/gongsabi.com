<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;

final class PageController extends BaseController
{
    public function company(Request $request): Response
    {
        $slug = basename(trim($request->path, '/')) ?: 'company1';
        if ($slug === 'company') {
            $slug = 'company1';
        }
        $pages = [
            'company1' => ['대표이사 인사말', '여러분들 진심으로 환영합니다.', ['공사비닷컴은 지난 30년간 모아진 견적 데이터베이스와 축적된 기술 노하우를 바탕으로 국내 공사비 정보 플랫폼을 제공합니다.', '건설 사업 초기 단계부터 원가검토가 가능하도록 데이터와 교육, 산정 서비스를 제공합니다.']],
            'company2' => ['공사비닷컴 소개', '“왜?”라는 질문에서 시작되었습니다.', ['왜 건설시장에는 믿을 수 있는 공사비의 표준이 없을까?', '왜 원가검토는 공사 이전부터 이루어져야 할까?', '공사비닷컴은 이 질문을 바탕으로 건물종류별, 지역별, 면적별, 연도별 공사비 정보를 제공합니다.']],
            'company3' => ['사업분야', '건설 원가 정보를 데이터화합니다.', ['면적당 공사비 검색', '공사 단가 검색', '골조 면적별 수량', '공사기간 산정', '간접 공사비 계산', '공사비 교육 및 컨설팅']],
            'company4' => ['오시는길', '공사비닷컴 위치 및 문의처', ['주소: 서울특별시 송파구 백제고분로 509, 대종빌딩', '대표전화: 02.2202.2258', '업무 및 파트너 제휴: partner@gongsabi.com', '고객센터: cs@gongsabi.com']],
        ];
        [$heading, $lead, $items] = $pages[$slug] ?? $pages['company1'];
        return $this->view('pages/static', ['title' => $heading, 'section' => '회사소개', 'heading' => $heading, 'lead' => $lead, 'items' => $items, 'activeSlug' => $slug, 'menu' => $this->menu('company')]);
    }

    public function community(Request $request): Response
    {
        $slug = basename(trim($request->path, '/')) ?: 'community';
        if ($slug === 'community') {
            $heading = '건설 장터';
            $lead = '건설 현장의 거래와 제휴, 구인/구직 정보를 공유합니다.';
            $items = ['※ 본 게시판을 통한 모든 상거래 및 구인,구직의 책임은 구매자와 판매자에게 있으며, 공사비닷컴에서는 일체의 법적 책임을 지지 않습니다.', '현장 자재 거래', '공사비 작성 의뢰', '구인 / 구직'];
        } elseif ($slug === 'market') {
            $heading = '현장 자재 거래';
            $lead = '현장의 남는 건설 자재들을 거래하는 장터입니다.';
            $items = ['철근, 형강, 가설재 등 현장 잔여 자재 등록', '지역 및 품목 검색', '거래 책임은 구매자와 판매자에게 있습니다.'];
        } elseif ($slug === 'partners') {
            $heading = 'Partners';
            $lead = '공사비닷컴의 주요 협력사입니다.';
            $items = ['전체', '종합건설 / 설계 / 시행', '가설 / 토공 / 골조', '타일 / 석공 / 창호 / 유리', '조적 / 방수 / 미장', '도장 / 수장 / 장비', '전기 / 설비'];
        } elseif ($slug === 'recruit') {
            $heading = '구인 / 구직';
            $lead = '건설 산업의 인재와 회사를 이어주는 구인 / 구직 장터입니다.';
            $items = ['견적/적산 담당자', '건축시공/공무', '현장관리', '프리랜서 견적 지원'];
        } else {
            $heading = '공사비 작성 의뢰';
            $lead = '공사비 작성 및 검토 의뢰를 접수합니다.';
            $items = ['건축 공사비 작성', '골조 공사비 작성', '내역서 검토', '공사기간 및 간접비 검토'];
        }
        return $this->view('pages/static', ['title' => $heading, 'section' => '커뮤니티', 'heading' => $heading, 'lead' => $lead, 'items' => $items, 'activeSlug' => $slug, 'menu' => $this->menu('community')]);
    }

    public function contact(Request $request): Response
    {
        return $this->view('pages/contact', ['title' => '업무 제휴']);
    }

    public function privacy(Request $request): Response
    {
        return $this->view('pages/policy', ['title' => '개인정보처리방침', 'heading' => '개인정보처리방침']);
    }

    public function terms(Request $request): Response
    {
        return $this->view('pages/policy', ['title' => '이용약관', 'heading' => '이용약관']);
    }

    /** @return array<int, array{0:string,1:string,2:string}> */
    private function menu(string $type): array
    {
        if ($type === 'community') {
            return [['건설 장터','/front/community','community'], ['공사비 작성 의뢰','/front/community/gongsabi','gongsabi'], ['현장 자재 거래','/front/community/market','market'], ['Partners','/front/community/partners','partners'], ['구인 / 구직','/front/community/recruit','recruit']];
        }
        return [['대표이사 인사말','/front/company/company1','company1'], ['공사비닷컴 소개','/front/company/company2','company2'], ['사업분야','/front/company/company3','company3'], ['오시는길','/front/company/company4','company4']];
    }
}
