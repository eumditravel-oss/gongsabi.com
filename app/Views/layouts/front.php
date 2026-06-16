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
        <div class="gnb-inner">
            <div class="top-contact"><span>건설 공사비 데이터 플랫폼</span><b>02.2202.2258</b></div>
            <div class="top-right">
                <ul class="gnb-menu">
                    <li><a href="/front/customer/notice">고객센터 <i class="fa fa-caret-down"></i></a></li>
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
                    <li><a href="/">KOR</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-wrapper">
        <div class="logo-area">
            <a href="/" class="logo-link">
                <?php if ($logoUrl !== ''): ?>
                    <img src="<?= e($logoUrl) ?>" class="logo-img" alt="공사비닷컴">
                <?php else: ?>
                    <span class="logo-mark">G</span>
                    <span class="logo-text">공사비닷컴<em>Construction Cost Platform</em></span>
                <?php endif; ?>
            </a>
        </div>
        <nav class="menu-area" aria-label="주요 메뉴">
            <div class="menu-item">
                <a href="/front/company">회사소개</a>
                <div class="submenu">
                    <a href="/front/company/company1">회사개요</a>
                    <a href="/front/company/company2">인사말</a>
                    <a href="/front/company/company3">사업분야</a>
                    <a href="/front/company/company4">오시는 길</a>
                </div>
            </div>
            <div class="menu-item">
                <a href="/front/report/geonchuk">보고서</a>
                <div class="submenu">
                    <a href="/front/report/geonchuk">건축 공사비</a>
                    <a href="/front/report/goljo">골조 공사비</a>
                    <a href="/front/report/gigan">공사기간</a>
                    <a href="/front/report/ganjeob">간접비</a>
                </div>
            </div>
            <div class="menu-item">
                <a href="/front/data/gongsabi">공사비 자료</a>
                <div class="submenu">
                    <a href="/front/data/gongsabi">면적당 공사비</a>
                    <a href="/front/data/goljo">골조 자료</a>
                    <a href="/front/data/danga">단가 자료</a>
                </div>
            </div>
            <div class="menu-item">
                <a href="/front/education/lecture">공사비 교육</a>
                <div class="submenu">
                    <a href="/front/education/lecture">온라인 강의</a>
                    <a href="/front/education/book">교재</a>
                    <a href="/front/education/youtube">유튜브</a>
                </div>
            </div>
            <div class="menu-item">
                <a href="/front/community/gongsabi">커뮤니티</a>
                <div class="submenu">
                    <a href="/front/community/gongsabi">공사비 이야기</a>
                    <a href="/front/community/market">마켓</a>
                    <a href="/front/community/partners">파트너스</a>
                    <a href="/front/community/recruit">구인구직</a>
                </div>
            </div>
            <div class="menu-item">
                <a href="/front/customer/notice">고객센터</a>
                <div class="submenu">
                    <a href="/front/customer/notice">공지사항</a>
                    <a href="/front/customer/faq">FAQ</a>
                    <a href="/front/customer/qna">1:1 문의</a>
                    <a href="/front/customer/contact">문의처</a>
                </div>
            </div>
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
    <div class="footer-inner">
        <div>
            <strong>공사비닷컴</strong>
            <span>건설 공사비 데이터, 산정 보고서, 교육 서비스를 제공합니다.<br>업무 및 제휴 문의 partner@gongsabi.com · 고객센터 cs@gongsabi.com</span>
        </div>
        <div class="footer-links">
            <a href="/front/company/term">이용약관</a>
            <a href="/front/company/privacy">개인정보처리방침</a>
            <a href="/front/customer/contact">고객센터</a>
        </div>
    </div>
</footer>
<script src="<?= asset('js/site.js') ?>"></script>
</body>
</html>
