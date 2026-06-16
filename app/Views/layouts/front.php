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
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200">
    <meta name="description" content="대한민국 건물의 건물종류별, 지역별, 면적별, 연도별 면적당 공사비 검색 서비스">
    <title><?= e($title) ?> | 공사비닷컴</title>
    <?php if ($faviconUrl !== ''): ?>
        <link rel="shortcut icon" href="<?= e($faviconUrl) ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="<?= asset('css/site.css') ?>">
    <script src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
    <script>
        window.GONGSABI = {
            csrf: <?= json_encode(\App\Core\Csrf::token()) ?>,
            merchantCode: <?= json_encode($merchantCode) ?>
        };
    </script>
</head>
<body class="legacy-site">
<div class="top-strip">
    <div class="wrap top-strip-inner">
        <p>대한민국 공사비 정보 플랫폼</p>
        <ul>
            <li><a href="/front/customer/notice">고객센터</a></li>
            <?php if ($user): ?>
                <li><a href="/front/mypage/info/info2">마이페이지</a></li>
                <?php if (($user['role'] ?? '') === 'admin'): ?><li><a href="/admin">관리자</a></li><?php endif; ?>
                <li><form method="post" action="/front/auth/logout" class="inline-form"><?= csrf_field() ?><button type="submit">로그아웃</button></form></li>
            <?php else: ?>
                <li><a href="/front/auth/login">로그인</a></li>
                <li><a href="/front/auth/regist">회원가입</a></li>
            <?php endif; ?>
            <li><a href="/">KOR</a></li>
        </ul>
    </div>
</div>
<header class="site-header">
    <div class="wrap header-inner">
        <h1 class="site-logo">
            <a href="/">
                <?php if ($logoUrl !== ''): ?>
                    <img src="<?= e($logoUrl) ?>" alt="공사비닷컴">
                <?php else: ?>
                    <span class="logo-symbol">G</span><span class="logo-name">공사비닷컴</span><em>GONGSABI.COM</em>
                <?php endif; ?>
            </a>
        </h1>
        <div class="header-call">
            <span>대표전화</span><strong>02.2202.2258</strong>
        </div>
    </div>
    <nav class="main-nav" aria-label="주요 메뉴">
        <div class="wrap nav-inner">
            <div class="nav-item"><a href="/front/company/company1">회사소개</a>
                <div class="nav-sub"><a href="/front/company/company1">대표이사 인사말</a><a href="/front/company/company2">기업소개</a><a href="/front/company/company3">채용안내</a><a href="/front/company/company4">오시는길</a></div>
            </div>
            <div class="nav-item"><a href="/front/report/geonchuk">보고서</a>
                <div class="nav-sub"><a href="/front/report/geonchuk">건축 내역서 작성</a><a href="/front/report/goljo">골조 내역서 작성</a><a href="/front/report/gigan">공사기간 산정</a><a href="/front/report/ganjeob">간접 공사비 계산</a></div>
            </div>
            <div class="nav-item"><a href="/front/data/gongsabi">공사비 자료</a>
                <div class="nav-sub"><a href="/front/data/gongsabi">면적당 공사비 검색</a><a href="/front/data/danga">공사 단가 검색</a><a href="/front/data/goljo">골조 면적별 수량</a></div>
            </div>
            <div class="nav-item"><a href="/front/education/lecture">공사비 교육</a>
                <div class="nav-sub"><a href="/front/education/lecture">공사비 교육</a><a href="/front/education/book">교재 안내</a><a href="/front/education/youtube">동영상 강의</a></div>
            </div>
            <div class="nav-item"><a href="/front/community">커뮤니티</a>
                <div class="nav-sub"><a href="/front/community">건설 장터</a><a href="/front/community/gongsabi">공사비 작성 의뢰</a><a href="/front/community/partners">Partners</a><a href="/front/community/recruit">구인 / 구직</a></div>
            </div>
            <div class="nav-item"><a href="/front/customer/notice">고객센터</a>
                <div class="nav-sub"><a href="/front/customer/notice">공지사항</a><a href="/front/customer/pds">자료실</a><a href="/front/customer/faq">자주 묻는 질문</a><a href="/front/customer/qna">Q&amp;A</a></div>
            </div>
        </div>
    </nav>
</header>

<?php foreach (Flash::all() as $flash): ?>
    <div class="flash flash-<?= e($flash['type']) ?>"><?= e($flash['message']) ?></div>
<?php endforeach; ?>

<?php if (!empty($siteSettings['ad_top_image_url'])): ?>
    <div class="ad-slot ad-top wrap"><a href="<?= e($siteSettings['ad_top_link_url'] ?: '#') ?>"><img src="<?= e($siteSettings['ad_top_image_url']) ?>" alt="상단 광고"></a></div>
<?php endif; ?>

<main>
    <?= $content ?>
</main>

<?php if (!empty($siteSettings['ad_bottom_image_url'])): ?>
    <div class="ad-slot ad-bottom wrap"><a href="<?= e($siteSettings['ad_bottom_link_url'] ?: '#') ?>"><img src="<?= e($siteSettings['ad_bottom_image_url']) ?>" alt="하단 광고"></a></div>
<?php endif; ?>

<footer class="site-footer">
    <div class="wrap footer-menu"><a href="/front/company/term">이용약관</a><a href="/front/company/privacy">개인정보처리방침</a><a href="/front/company/company4">오시는길</a></div>
    <div class="wrap footer-info">
        <h2>공사비닷컴</h2>
        <dl>
            <div><dt>법인명</dt><dd>(주)공사비닷컴</dd></div>
            <div><dt>대표이사</dt><dd>현동명</dd></div>
            <div><dt>사업자등록번호</dt><dd>152-87-00466</dd></div>
            <div><dt>통신판매업</dt><dd>2017-서울송파-2115호</dd></div>
            <div><dt>개인정보책임자</dt><dd>이서진</dd></div>
            <div><dt>주소</dt><dd>(05585) 서울특별시 송파구 백제고분로 509, 대종빌딩</dd></div>
            <div><dt>대표전화</dt><dd>02.2202.2258</dd></div>
            <div><dt>업무 및 파트너 제휴</dt><dd>partner@gongsabi.com</dd></div>
            <div><dt>고객센터</dt><dd>cs@gongsabi.com</dd></div>
        </dl>
        <p class="copyright">COPYRIGHT (C) gongsabi.com. All rights reserved.</p>
    </div>
</footer>
<script src="<?= asset('js/site.js') ?>"></script>
</body>
</html>
