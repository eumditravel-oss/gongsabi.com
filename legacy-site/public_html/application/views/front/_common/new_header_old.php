<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>공사비닷컴</title>

    <link rel="shortcut icon" href="/static/img/favicon.ico">

    <!-- <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">

    <link href="/static/front/slidea-assets/css/slidea/slidea.css" rel="stylesheet">
    <link href="/static/front/slidea-assets/css/slidea/themes/default.css" rel="stylesheet">
    <link href="/static/front/slidea-assets/css/slidea/ui/default.css" rel="stylesheet">

    <link rel="stylesheet" href="/static/front/css/core-style.css">
    <link rel="stylesheet" href="/static/front/css/style.css?version=<?php echo time(); ?>">

    <link rel="stylesheet" href="/static/front/css/responsive/responsive.css">

    <script src="/static/front/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="/static/front/js/bootstrap/popper.min.js"></script>
    <script src="/static/front/js/bootstrap/bootstrap.min.js"></script>

    <script src="/static/js/util.js"></script>

    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
    <script>
        var IMP = window.IMP; // 생략가능
        IMP.init('imp97740463'); // 'iamport' 대신 부여받은 "가맹점 식별코드"를 사용

        function go_book_pay(price, method, email, name, tel, addr)
        {
            IMP.request_pay({
                pg : 'inicis', // version 1.1.0부터 지원.
                pay_method : method,
                merchant_uid : 'gbp_' + new Date().getTime(),
                name : '공사비닷컴-책구매',
                amount : price,
                buyer_email : email,
                buyer_name : name,
                buyer_tel : tel,
                buyer_addr : addr,
                // buyer_postcode : '123-456',
                // m_redirect_url : 'https://www.yourdomain.com/payments/complete'
            }, function(rsp) {
                if ( rsp.success ) {
                    var msg = '결제가 완료되었습니다.';
                    // msg += '\n고유ID : ' + rsp.imp_uid;
                    // msg += '\n상점 거래ID : ' + rsp.merchant_uid;
                    // msg += '\n결제 금액 : ' + rsp.paid_amount;
                    // msg += '\n카드 승인번호 : ' + rsp.apply_num;
                    // alert(msg);
                    $('#imp_uid').val(rsp.imp_uid);
                    $('#merchant_uid').val(rsp.merchant_uid);
                    $('#pay_method').val(rsp.pay_method);
                    $('#paid_amount').val(rsp.paid_amount);
                    $('#status').val(rsp.status);
                    $('#apply_num').val(rsp.apply_num);
                    $('#vbank_num').val(rsp.vbank_num);
                    $('#vbank_name').val(rsp.vbank_name);
                    $('#vbank_holder').val(rsp.vbank_holder);
                    $('#vbank_date').val(rsp.vbank_date);
                    $('#frm_book').submit();
                } else {
                    var msg = '결제에 실패하였습니다.';
                    msg += '\n에러내용 : ' + rsp.error_msg;
                    alert(msg);
                }
            });
        }
    </script>
</head>

<body>
    <div id="preloader">
        <div class="classy-load"></div>
    </div>

    <header class="header_area">
        <div class="main_header_area animated">
            <div class="container">
                <nav id="navigation1" class="navigation">
                    <div class="nav-header">
                        <a class="nav-brand" href="/front/main_new"><img src="/static/img/logo.png"></a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>
                        <a href="/front/auth/logout" class="nav-button btn-pill bg-mat-green align-to-right">로그아웃</a>
                        <?php } else { ?>
                        <a href="/front/auth/login" class="nav-button btn-pill bg-mat-green align-to-right">로그인</a>
                        <?php } ?>
                        <ul class="nav-menu align-to-right" id="nav">
                            <li class="<?php echo ( $this->uri->segment(2) == 'main_new' ) ? 'active' : ''; ?>"><a href="/front/main_new">홈</a></li>
                            <li class="<?php echo ( $this->uri->segment(2) == 'company' ) ? 'active' : ''; ?>"><a href="/front/company">회사소개</a></li>
                            <li class="<?php echo ( $this->uri->segment(2) == 'data' ) ? 'active' : ''; ?>">
                                <a href="/front/data">공사비 검색<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="/front/data/gongsabi">면적당 공사비 검색</a></li>
                                    <li><a href="/front/data/danga">공사 단가 검색</a></li>
                                    <li><a href="/front/data/goljo">골조 면적별 수량</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo ( $this->uri->segment(2) == 'make' ) ? 'active' : ''; ?>">
                                <a href="#" onclick="alert('준비중입니다.');">내역서 작성<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="#" onclick="alert('준비중입니다.');">건축 내역서 작성</a></li>
                                    <li><a href="#" onclick="alert('준비중입니다.');">골조 내역서 작성</a></li>
                                    <li><a href="#" onclick="alert('준비중입니다.');">공사기간 산정</a></li>
                                    <li><a href="#" onclick="alert('준비중입니다.');">간접 공사비 계산</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo ( $this->uri->segment(2) == 'education' ) ? 'active' : ''; ?>">
                                <a href="/front/education">공사비 교육<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="/front/education/youtube">동영상 교육</a></li>
                                    <li><a href="/front/education/book">교재 구매</a></li>
                                    <li><a href="/front/education/lecture">공사비 강의 신청</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo ( $this->uri->segment(2) == 'community' ) ? 'active' : ''; ?>">
                                <a href="/front/community">건설 장터<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="/front/community/market">현장 자재 사고팔기</a></li>
                                    <li><a href="/front/community/recruit">구인, 구직</a></li>
                                    <li><a href="/front/community/gongsabi">공사비 작성 의뢰</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo ( $this->uri->segment(2) == 'customer' ) ? 'active' : ''; ?>">
                                <a href="/front/customer">고객센터<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="/front/customer/notice">공지사항</a></li>
                                    <li><a href="/front/customer/pds">자료실</a></li>
                                    <li><a href="/front/customer/faq">자주묻는질문</a></li>
                                    <li><a href="/front/customer/qna">Q&amp;A</a></li>
                                </ul>
                            </li>
                            <?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>
                            <li class="<?php echo ( $this->uri->segment(2) == 'mypage' ) ? 'active' : ''; ?>">
                                <a href="/front/mypage">마이페이지<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="/front/mypage/info">회원정보수정</a></li>
                                    <li><a href="/front/mypage/request">신청내역</a></li>
                                    <?php if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) { ?>
                                    <li><a href="/front/mypage/scrap">스크랩내역</a></li>
                                    <?php } ?>
                                    <li><a href="/front/auth/logout">로그아웃</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>