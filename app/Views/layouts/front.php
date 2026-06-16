<?php

use App\Core\Auth;
use App\Core\Config;
use App\Core\Flash;

$user = Auth::user();
$title = $title ?? '공사비닷컴';
$merchantCode = Config::get('PORTONE_MERCHANT_CODE', 'imp97740463');
$siteSettings = $siteSettings ?? [];
$logoUrl = trim((string) ($siteSettings['site_logo_url'] ?? ''));
$faviconUrl = trim((string) ($siteSettings['site_favicon_url'] ?? ''));
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

$mainMenus = [
    ['label' => '회사소개', 'href' => '/front/company/company1', 'match' => '/front/company', 'children' => [
        ['대표이사 인사말', '/front/company/company1'],
        ['공사비닷컴 소개', '/front/company/company2'],
        ['사업분야', '/front/company/company3'],
        ['오시는길', '/front/company/company4'],
    ]],
    ['label' => '보고서', 'href' => '/front/report/geonchuk', 'match' => '/front/report', 'children' => [
        ['건축 공사비', '/front/report/geonchuk'],
        ['골조 공사비', '/front/report/goljo'],
        ['공사기간의 산정', '/front/report/gigan'],
        ['간접 공사비 계산', '/front/report/ganjeob'],
    ]],
    ['label' => '공사비 자료', 'href' => '/front/data/gongsabi', 'match' => '/front/data', 'children' => [
        ['면적당 공사비 검색', '/front/data/gongsabi'],
        ['공사 단가 검색', '/front/data/danga'],
        ['골조 면적별 수량', '/front/data/goljo'],
    ]],
    ['label' => '공사비 교육', 'href' => '/front/education/lecture', 'match' => '/front/education', 'children' => [
        ['공사비 교육', '/front/education/lecture'],
        ['교재 안내', '/front/education/book'],
        ['동영상 강의', '/front/education/youtube'],
    ]],
    ['label' => '커뮤니티', 'href' => '/front/community', 'match' => '/front/community', 'children' => [
        ['건설 장터', '/front/community'],
        ['공사비 작성 의뢰', '/front/community/gongsabi'],
        ['현장 자재 거래', '/front/community/market'],
        ['Partners', '/front/community/partners'],
        ['구인 / 구직', '/front/community/recruit'],
    ]],
    ['label' => '고객센터', 'href' => '/front/customer/notice', 'match' => '/front/customer', 'children' => [
        ['공지사항', '/front/customer/notice'],
        ['자료실', '/front/customer/pds'],
        ['자주 묻는 질문', '/front/customer/faq'],
        ['Q&A', '/front/customer/qna'],
        ['업무 제휴', '/front/customer/contact'],
    ]],
];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200">
    <meta name="description" content="대한민국 공사비 정보 플랫폼, 공사비닷컴">
    <title><?= e($title) ?> | 공사비닷컴</title>
    <?php if ($faviconUrl !== ''): ?><link rel="shortcut icon" href="<?= e($faviconUrl) ?>"><?php endif; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="<?= asset('css/site.css') ?>">
    <script src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
    <script>
        window.GONGSABI = { csrf: <?= json_encode(\App\Core\Csrf::token()) ?>, merchantCode: <?= json_encode($merchantCode) ?> };
    </script>
</head>
<body class="kor">
<div class="top-util">
    <div class="wrap util-inner">
        <div class="util-left">대한민국 공사비 정보 플랫폼</div>
        <ul class="util-right">
            <li><a href="/front/customer/notice">고객센터</a></li>
            <?php if ($user): ?>
                <li><a href="/front/mypage/info/info2">마이페이지</a></li>
                <?php if (($user['role'] ?? '') === 'admin'): ?><li><a href="/admin">관리자</a></li><?php endif; ?>
                <li><form method="post" action="/front/auth/logout" class="logout-form"><?= csrf_field() ?><button type="submit">로그아웃</button></form></li>
            <?php else: ?>
                <li><a href="/front/auth/login">로그인</a></li>
                <li><a href="/front/auth/regist">회원가입</a></li>
            <?php endif; ?>
            <li><a href="/">KOR</a></li>
        </ul>
    </div>
</div>
<header class="header">
    <div class="wrap header-inner">
        <h1 class="logo">
            <a href="/">
                <?php if ($logoUrl !== ''): ?>
                    <img src="<?= e($logoUrl) ?>" alt="공사비닷컴">
                <?php else: ?>
                    <span class="logo-symbol">G</span><span class="logo-ko">공사비닷컴</span><span class="logo-en">GONGSABI.COM</span>
                <?php endif; ?>
            </a>
        </h1>
        <div class="header-copy">
            <strong>건물종류별 · 지역별 · 면적별 · 연도별</strong>
            <span>면적당 공사비 / 공사 단가 / 골조 수량 / 교육 / 커뮤니티</span>
        </div>
    </div>
    <nav class="gnb" aria-label="주요 메뉴">
        <div class="wrap gnb-inner">
            <?php foreach ($mainMenus as $menu): ?>
                <?php $active = str_starts_with($currentPath, $menu['match']); ?>
                <div class="gnb-item<?= $active ? ' active' : '' ?>">
                    <a href="<?= e($menu['href']) ?>"><?= e($menu['label']) ?></a>
                    <div class="gnb-sub">
                        <?php foreach ($menu['children'] as $child): ?>
                            <a href="<?= e($child[1]) ?>"><?= e($child[0]) ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </nav>
</header>

<?php foreach (Flash::all() as $flash): ?>
    <div class="wrap flash flash-<?= e($flash['type']) ?>"><?= e($flash['message']) ?></div>
<?php endforeach; ?>

<main class="site-main">
    <?php if (!empty($siteSettings['ad_top_image_url'])): ?>
        <div class="wrap ad-slot ad-top"><a href="<?= e($siteSettings['ad_top_link_url'] ?: '#') ?>"><img src="<?= e($siteSettings['ad_top_image_url']) ?>" alt="상단 광고"></a></div>
    <?php endif; ?>
    <?= $content ?>
    <?php if (!empty($siteSettings['ad_bottom_image_url'])): ?>
        <div class="wrap ad-slot ad-bottom"><a href="<?= e($siteSettings['ad_bottom_link_url'] ?: '#') ?>"><img src="<?= e($siteSettings['ad_bottom_image_url']) ?>" alt="하단 광고"></a></div>
    <?php endif; ?>
</main>

<footer class="footer">
    <div class="wrap footer-links"><a href="/front/company/term">이용약관</a><a href="/front/company/privacy">개인정보처리방침</a><a href="/front/company/company4">오시는길</a></div>
    <div class="wrap footer-info">
        <div class="footer-logo">공사비닷컴</div>
        <div class="company-lines">
            <p><b>법인명</b> (주)공사비닷컴 <b>대표이사</b> 현동명 <b>사업자등록번호</b> 152-87-00466 <b>통신판매업</b> 2017-서울송파-2115호</p>
            <p><b>개인정보책임자</b> 이서진 <b>주소</b> (05585) 서울특별시 송파구 백제고분로 509, 대종빌딩</p>
            <p><b>대표전화</b> 02.2202.2258 <b>업무 및 파트너 제휴</b> partner@gongsabi.com <b>고객센터</b> cs@gongsabi.com</p>
            <p class="copy">COPYRIGHT (C) gongsabi.com. All rights reserved.</p>
        </div>
    </div>
</footer>
<div class="detail-modal" id="detailModal" aria-hidden="true">
    <div class="modal-box"><button type="button" class="modal-close" data-modal-close>×</button><div id="modalContent"></div></div>
</div>
<script src="<?= asset('js/site.js') ?>"></script>
</body>
</html>
