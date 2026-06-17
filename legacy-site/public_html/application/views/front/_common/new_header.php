<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=1280">

    <title>공사비닷컴</title>

    <link rel="shortcut icon" href="/static/img/favicon.ico">

    <!-- <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <!-- DatePicker -->
    <link rel="stylesheet" href="/static/vendor/air-datepicker/css/datepicker.min.css">

    <link rel="stylesheet" href="/static/front/css/core-style.css">
    <link rel="stylesheet" href="/static/front/css/style.css?version=<?php echo time(); ?>">

    <link rel="stylesheet" href="/static/front/css/responsive/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="/static/js/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="/static/js/slick/slick-theme.css"/>
    
    <link rel="stylesheet" type="text/css" href="/static/js/modal-video/modal-video.min.css"/>

    <script src="/static/front/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="/static/front/js/bootstrap/popper.min.js"></script>
    <script src="/static/front/js/bootstrap/bootstrap.min.js"></script>

    <!-- slick (http://kenwheeler.github.io/slick) -->
    <script src="/static/js/slick/slick.min.js"></script>
    <!-- jquery modal video (https://appleple.github.io/modal-video) -->
    <script src="/static/js/modal-video/jquery-modal-video.min.js"></script>

    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
    <script>
        var IMP = window.IMP; // 생략가능
        IMP.init('imp97740463'); // 'iamport' 대신 부여받은 "가맹점 식별코드"를 사용
    </script>
</head>

<body class="<?php echo strtolower($this->config->item('SITE_LANGUAGE')); ?>">
    <header>
        <div class="gnb_area">
            <ul class="gnb_menu">
                <li>
                    <a href="/front/customer"><?php echo $this->config->item('TOP_MENU')[$this->config->item('SITE_LANGUAGE')]['CUSTOMER_CENTER']['name']; ?>&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
                    <ul class="sub_menu">
                        <li><a href="/front/customer/notice"><?php echo $this->config->item('TOP_MENU')[$this->config->item('SITE_LANGUAGE')]['NOTICE']['name']; ?></a></li>
                        <li><a href="/front/customer/pds"><?php echo $this->config->item('TOP_MENU')[$this->config->item('SITE_LANGUAGE')]['PDS']['name']; ?></a></li>
                        <li><a href="/front/customer/faq"><?php echo $this->config->item('TOP_MENU')[$this->config->item('SITE_LANGUAGE')]['FAQ']['name']; ?></a></li>
                        <li><a href="/front/customer/qna"><?php echo $this->config->item('TOP_MENU')[$this->config->item('SITE_LANGUAGE')]['QNA']['name']; ?></a></li>
                    </ul>
                </li>
                <?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>
                <li><a href="/front/mypage"><?php echo $this->config->item('TOP_MENU')[$this->config->item('SITE_LANGUAGE')]['MYPAGE']['name']; ?></a></li>
                <li><a href="/front/auth/logout"><?php echo $this->config->item('TOP_MENU')[$this->config->item('SITE_LANGUAGE')]['LOGOUT']['name']; ?></a></li>
                <?php } else { ?>
                <li><a href="/front/auth/regist"><?php echo $this->config->item('TOP_MENU')[$this->config->item('SITE_LANGUAGE')]['JOIN']['name']; ?></a></li>
                <li><a href="/front/auth/login"><?php echo $this->config->item('TOP_MENU')[$this->config->item('SITE_LANGUAGE')]['LOGIN']['name']; ?></a></li>
                <?php } ?>
            </ul>
            <ul class="translate_menu">
                <li>
                    <a href="#"><?php echo $this->config->item('SITE_LANGUAGE'); ?></a>
                    <ul class="sub_menu">
                        <li><a href="#" onclick="change_language('KOR');">KOR</a></li>
                        <li><a href="#" onclick="change_language('ENG');">ENG</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="header_wrapper">
            <div class="header_logo">
                <div class="logo_area">
                    <a href="/"><img src="/static/img/logo.png" class="logo_img"></a>
                </div>
            </div>
            <div class="header_menu">
                <div class="banner_area">
                </div>
                <div class="menu_area">
                    <a href="#" class="all_menu"><i class="fa fa-bars"></i></a>
                    <ul class="all_menu_wrapper">
                        <?php
                        foreach ($this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')] as $menu) {
                            if ( $menu['root'] == false )
                                continue;
                        ?>
                        <li class="<?php echo ( $this->uri->segment(2) == $menu['id'] ) ? 'on' : ''; ?>"><a href="/front/<?php echo $menu['id']; ?>"><?php echo $menu['name']; ?></a>
                            <ul class="sub_menu">
                                <?php foreach ($menu['child'] as $link => $child) { ?>
                                <li><a href="/front/<?php echo $menu['id']; ?>/<?php echo $link; ?>"><?php echo $child; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                    <ul class="root_menu">
                        <?php
                        foreach ($this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')] as $menu) {
                            if ( $menu['root'] == false )
                                continue;
                        ?>
                        <li class="<?php echo ( $this->uri->segment(2) == $menu['id'] ) ? 'on' : ''; ?>"><a href="/front/<?php echo $menu['id']; ?>"><?php echo $menu['name']; ?></a>
                            <ul class="sub_menu">
                                <?php foreach ($menu['child'] as $link => $child) { ?>
                                <li><a href="/front/<?php echo $menu['id']; ?>/<?php echo $link; ?>"><?php echo $child; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <script>
    $(function() {
        $('.gnb_menu > li')
        .on('mouseenter', function() {
            $(this).addClass('on').find('.sub_menu').show();
        })
        .on('mouseleave', function() {
            $(this).removeClass('on').find('.sub_menu:visible').hide();
        });

        $('.translate_menu > li')
        .on('mouseenter', function() {
            $(this).addClass('on').find('.sub_menu').show();
        })
        .on('mouseleave', function() {
            $(this).removeClass('on').find('.sub_menu:visible').hide();
        });

        $('.root_menu > li')
        .on('mouseenter', function() {
            $(this).addClass('on').find('.sub_menu').show();
        })
        .on('mouseleave', function() {
            $(this).removeClass('on').find('.sub_menu:visible').hide();
        });
    });
    </script>