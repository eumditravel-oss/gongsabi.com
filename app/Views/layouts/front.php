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
    <meta name="viewport" content="width=1280">
    <title><?= e($title) ?></title>
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
<body class="kor">
<header class="site-header">
    <div class="gnb-area">
        <ul class="gnb-menu">
            <li><a href="/front/customer">고객센터 <i class="fa fa-caret-down"></i></a></li>
            <?php if ($user): ?>
                <li><a href="/front/mypage/info/info2">마이페이지</a></li>
                <?php if (($user['role'] ?? '') === 'admin'): ?>
                    <li><a href="/admin">관리자</a></li>
                <?php endif; ?>
                <li>
                    <form method="post" action="/front/auth/logout" class="inline-form">
                        <?= csrf_field() ?>
                        <button type="submit">로그아웃</button>
                    </form>
                </li>
            <?php else: ?>
                <li><a href="/front/auth/regist">회원가입</a></li>
                <li><a href="/front/auth/login">로그인</a></li>
            <?php endif; ?>
        </ul>
        <ul class="translate-menu">
            <li><a href="/">KOR</a></li>
        </ul>
    </div>
    <div class="header-wrapper">
        <div class="logo-area">
            <a href="/" class="logo-link">
                <?php if ($logoUrl !== ''): ?>
                    <img src="<?= e($logoUrl) ?>" class="logo-img" alt="공사비닷컴">
                <?php else: ?>
                    <span class="logo-text">공사비닷컴</span>
                <?php endif; ?>
            </a>
        </div>
        <nav class="menu-area" aria-label="주요 메뉴">
            <a href="/front/company">회사소개</a>
            <a href="/front/report/geonchuk">보고서</a>
            <a href="/front/data/gongsabi">공사비 자료</a>
            <a href="/front/education/lecture">공사비 교육</a>
            <a href="/front/community/gongsabi">커뮤니티</a>
            <a href="/front/customer/notice">고객센터</a>
        </nav>
    </div>
</header>

<?php foreach (Flash::all() as $flash): ?>
    <div class="flash flash-<?= e($flash['type']) ?>"><?= e($flash['message']) ?></div>
<?php endforeach; ?>

<main>
    <?php if (!empty($siteSettings['ad_top_image_url'])): ?>
        <div class="ad-slot ad-top">
            <a href="<?= e($siteSettings['ad_top_link_url'] ?: '#') ?>">
                <img src="<?= e($siteSettings['ad_top_image_url']) ?>" alt="상단 광고">
            </a>
        </div>
    <?php endif; ?>
    <?= $content ?>
    <?php if (!empty($siteSettings['ad_bottom_image_url'])): ?>
        <div class="ad-slot ad-bottom">
            <a href="<?= e($siteSettings['ad_bottom_link_url'] ?: '#') ?>">
                <img src="<?= e($siteSettings['ad_bottom_image_url']) ?>" alt="하단 광고">
            </a>
        </div>
    <?php endif; ?>
</main>

<footer class="site-footer">
    <div>
        <strong>공사비닷컴</strong>
        <span>건설 공사비 데이터와 교육 서비스를 제공합니다.</span>
    </div>
    <div class="footer-links">
        <a href="/front/company/term">이용약관</a>
        <a href="/front/company/privacy">개인정보처리방침</a>
        <a href="/front/customer/contact">고객센터</a>
    </div>
</footer>
<script src="<?= asset('js/site.js') ?>"></script>
</body>
</html>
