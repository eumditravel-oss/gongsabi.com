<?php

use App\Core\Auth;
use App\Core\Config;
use App\Core\Flash;

$user = Auth::user();
$title = $title ?? '공사비닷컴';
$merchantCode = Config::get('PORTONE_MERCHANT_CODE', 'imp97740463');
$siteSettings = $siteSettings ?? [];
$faviconUrl = trim((string) ($siteSettings['site_favicon_url'] ?? ''));
$flash = Flash::all();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200">
    <meta name="description" content="GongSaBi.Com - 건축 공사수량 산출 및 내역서 작성, 공사비 검색, 공사비 교육, 건설 장터">
    <title><?= e($title) ?> | GongSaBi.Com</title>
    <?php if ($faviconUrl !== ''): ?>
        <link rel="shortcut icon" href="<?= e($faviconUrl) ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap">
    <link rel="stylesheet" href="<?= asset('css/site.css') ?>">
    <script src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
    <script>
        window.GONGSABI = {
            csrf: <?= json_encode(\App\Core\Csrf::token()) ?>,
            merchantCode: <?= json_encode($merchantCode) ?>
        };
    </script>
</head>
<body class="gongsabi-home-style">
<header class="gs-header">
    <div class="gs-util-wrap">
        <ul class="gs-util">
            <li><a href="/front/customer/notice">고객센터</a></li>
            <li><a href="/front/auth/regist">회원가입</a></li>
            <?php if ($user): ?>
                <li><a href="/front/mypage/info/info2">마이페이지</a></li>
                <?php if (($user['role'] ?? '') === 'admin'): ?><li><a href="/admin">관리자</a></li><?php endif; ?>
                <li><form method="post" action="/front/auth/logout" class="inline-form"><?= csrf_field() ?><button type="submit">로그아웃</button></form></li>
            <?php else: ?>
                <li><a href="/front/auth/login">로그인</a></li>
            <?php endif; ?>
            <li><a href="/">KOR</a></li>
        </ul>
    </div>
    <div class="gs-logo-zone">
        <a href="/" class="gs-logo-link"><img src="<?= asset('img/gongsabi-logo.png') ?>" alt="GongSaBi.Com"></a>
    </div>
    <nav class="gs-nav" aria-label="주요 메뉴">
        <div class="gs-nav-inner">
            <button type="button" class="gs-menu-icon" aria-label="전체 메뉴"><span></span><span></span><span></span></button>
            <a href="/front/company">회사소개</a>
            <em>|</em>
            <a href="/front/data/gongsabi">공사비 검색</a>
            <em>|</em>
            <a href="/front/report/geonchuk">내역서 작성</a>
            <em>|</em>
            <a href="/front/education/lecture">공사비 교육</a>
            <em>|</em>
            <a href="/front/community/market">건설 장터</a>
        </div>
    </nav>
</header>

<?php if (!empty($flash)): ?>
    <div class="gs-flash">
        <?php foreach ($flash as $type => $messages): ?>
            <?php foreach ((array) $messages as $message): ?>
                <p class="<?= e((string) $type) ?>"><?= e((string) $message) ?></p>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<main>
    <?= $content ?>
</main>

<footer class="gs-footer">
    <div class="gs-footer-inner">
        <div class="gs-footer-links">
            <a href="/front/company/term">이용약관</a>
            <a href="/front/company/privacy">개인정보처리방침</a>
            <a href="/front/customer/contact">오시는길</a>
        </div>
        <div class="gs-footer-body">
            <dl class="gs-company-info">
                <div><dt>법인명</dt><dd>(주)공사비닷컴</dd></div>
                <div><dt>대표이사</dt><dd>현동명</dd></div>
                <div><dt>사업자등록번호</dt><dd>152-87-00466 사업자정보확인</dd></div>
                <div><dt>통신판매업</dt><dd>2017-서울송파-2115호</dd></div>
                <div><dt>개인정보책임자</dt><dd>이치선</dd></div>
                <div><dt>주소</dt><dd>(05585) 서울특별시 송파구 백제고분로 372 6 송원빌딩 6층</dd></div>
            </dl>
            <div class="gs-contact-info">
                <div class="gs-sns"><span></span><span></span><span></span></div>
                <dl>
                    <div><dt>채용문의</dt><dd>slee@gongsabi.com</dd></div>
                    <div><dt>업무 및 파트너 제휴</dt><dd>partner@gongsabi.com</dd></div>
                    <div><dt>기타 문의</dt><dd>cs@gongsabi.com</dd></div>
                    <div><dt>대표전화</dt><dd>02.2202.2258</dd></div>
                </dl>
            </div>
        </div>
        <p class="gs-copy">COPYRIGHT ⓒ gongsabi.com. All rights reserved.</p>
    </div>
</footer>
<a class="gs-top" href="#top" onclick="window.scrollTo({top:0,behavior:'smooth'}); return false;">↑</a>
<script src="<?= asset('js/site.js') ?>"></script>
</body>
</html>
