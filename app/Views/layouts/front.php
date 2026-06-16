<?php

use App\Core\Auth;
use App\Core\Config;
use App\Core\Flash;

$user = Auth::user();
$title = $title ?? '공사비닷컴';
$merchantCode = Config::get('PORTONE_MERCHANT_CODE', 'imp97740463');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1280">
    <title><?= e($title) ?></title>
    <link rel="shortcut icon" href="/static/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/static/vendor/air-datepicker/css/datepicker.min.css">
    <link rel="stylesheet" href="/static/front/css/core-style.css">
    <link rel="stylesheet" href="/static/front/css/style.css">
    <link rel="stylesheet" href="/static/front/css/responsive/responsive.css">
    <link rel="stylesheet" href="/static/css/clone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/static/js/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/static/js/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/static/js/modal-video/modal-video.min.css">
    <script src="/static/front/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="/static/front/js/bootstrap/popper.min.js"></script>
    <script src="/static/front/js/bootstrap/bootstrap.min.js"></script>
    <script src="/static/js/slick/slick.min.js"></script>
    <script src="/static/js/modal-video/jquery-modal-video.min.js"></script>
    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
    <script>
        var IMP = window.IMP;
        if (IMP) IMP.init(<?= json_encode($merchantCode) ?>);
        window.GONGSABI = {
            csrf: <?= json_encode(\App\Core\Csrf::token()) ?>,
            merchantCode: <?= json_encode($merchantCode) ?>
        };
    </script>
</head>
<body class="kor">
<header>
    <div class="gnb_area">
        <ul class="gnb_menu">
            <li>
                <a href="/front/customer">고객센터&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
                <ul class="sub_menu">
                    <li><a href="/front/customer/notice">공지사항</a></li>
                    <li><a href="/front/customer/pds">자료실</a></li>
                    <li><a href="/front/customer/faq">자주 묻는 질문</a></li>
                    <li><a href="/front/customer/qna">Q&A</a></li>
                </ul>
            </li>
            <?php if ($user): ?>
                <li><a href="/front/mypage/info/info2">마이페이지</a></li>
                <?php if (($user['role'] ?? '') === 'admin'): ?>
                    <li><a href="/admin">관리자</a></li>
                <?php endif; ?>
                <li>
                    <form method="post" action="/front/auth/logout" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" style="border:0;background:transparent;padding:0;color:inherit;">로그아웃</button>
                    </form>
                </li>
            <?php else: ?>
                <li><a href="/front/auth/regist">회원가입</a></li>
                <li><a href="/front/auth/login">로그인</a></li>
            <?php endif; ?>
        </ul>
        <ul class="translate_menu">
            <li>
                <a href="#">KOR</a>
                <ul class="sub_menu">
                    <li><a href="#">KOR</a></li>
                    <li><a href="#">ENG</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="header_wrapper">
        <div class="header_logo">
            <div class="logo_area">
                <a href="/"><img src="/static/img/logo.png" class="logo_img" alt="공사비닷컴"></a>
            </div>
        </div>
        <div class="header_menu">
            <div class="banner_area"></div>
            <div class="menu_area">
                <a href="#" class="all_menu"><i class="fa fa-bars"></i></a>
                <?php require BASE_PATH . '/app/Views/partials/menu.php'; ?>
            </div>
        </div>
    </div>
</header>

<script>
$(function() {
    $('.gnb_menu > li, .translate_menu > li, .root_menu > li, .all_menu_wrapper > li')
    .on('mouseenter', function() {
        $(this).addClass('on').find('.sub_menu').show();
    })
    .on('mouseleave', function() {
        $(this).removeClass('on').find('.sub_menu:visible').hide();
    });

    $('.all_menu').on('click', function(e) {
        e.preventDefault();
        $('.all_menu_wrapper').toggle();
    });
});
</script>

<?php foreach (Flash::all() as $flash): ?>
    <div class="alert alert-<?= e($flash['type'] === 'error' ? 'danger' : 'success') ?>" style="width:1110px;margin:15px auto;">
        <?= e($flash['message']) ?>
    </div>
<?php endforeach; ?>

<?= $content ?>

<footer>
    <div class="footer_wrapper">
        <div class="footer_left_area">
            <ul class="footer_menu">
                <li><a href="/front/company/term">이용약관</a></li>
                <li><a href="/front/company/privacy">개인정보처리방침</a></li>
                <li><a href="/front/company/company4">오시는길</a></li>
            </ul>
            <table class="footer_info">
                <tr><th>법인명</th><td><b>(주)공사비닷컴</b></td></tr>
                <tr><th>대표이사</th><td>현동명</td></tr>
                <tr><th>사업자등록번호</th><td>152-87-00466&nbsp;<a href="https://www.ftc.go.kr/bizCommPop.do?wrkr_no=1528700466" target="_blank">사업자정보확인</a></td></tr>
                <tr><th>통신판매업</th><td>2017-서울송파-2115호</td></tr>
                <tr><th>개인정보책임자</th><td>이서진</td></tr>
                <tr><th>주소</th><td>(05585) 서울특별시 송파구 백제고분로 37길 6 송원빌딩 6층</td></tr>
            </table>
        </div>
        <div class="footer_right_area">
            <ul class="footer_sns">
                <li><a href="https://pf.kakao.com/_sxlUZK" target="_blank"><span class="sns sns_kakao"></span></a></li>
                <li><a href="https://www.youtube.com/channel/UCiUVqgF9TAgkL36F-w4CGcg" target="_blank"><span class="sns sns_youtube"></span></a></li>
                <li><a href="https://www.instagram.com/gongsabi_" target="_blank"><span class="sns sns_instagram"></span></a></li>
            </ul>
            <table class="footer_contact">
                <tr><th>채용문의</th><td><a href="mailto:sjlee@gongsabi.com">sjlee@gongsabi.com</a></td></tr>
                <tr><th>업무 및 파트너 제휴</th><td><a href="mailto:partner@gongsabi.com">partner@gongsabi.com</a></td></tr>
                <tr><th>기타 문의</th><td><a href="mailto:cs@gongsabi.com">cs@gongsabi.com</a></td></tr>
                <tr><th>대표전화</th><td><a href="tel:02.2202.2258">02.2202.2258</a></td></tr>
            </table>
            <p>COPYRIGHT (C) <a href="http://www.gongsabi.com" target="_blank">gongsabi.com</a>. All rights reserved.</p>
        </div>
    </div>
</footer>
<div class="modal_content_wrapper"></div>
<script src="/static/js/util.js"></script>
<script src="/static/js/gongsabi.js"></script>
<script src="/static/js/site.js"></script>
</body>
</html>
