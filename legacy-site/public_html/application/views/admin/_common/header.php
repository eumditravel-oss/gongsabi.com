<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $this->config->item('site_name'); ?> 관리자 페이지</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="/static/img/favicon.ico">

        <!-- App css -->
        <link href="/static/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/static/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/static/admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="/static/css/admin/style.css?version=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    </head>

	<body>

        <div id="wrapper">

            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="pro-user-name ml-1">
                                <?php echo $this->session->userdata('ADMIN_MEMBER')['admin_member_name']; ?> <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <a href="/admin/auth/logout" class="dropdown-item notify-item">
                                <i class="remixicon-logout-box-line"></i>
                                <span>로그아웃</span>
                            </a>
                        </div>
                    </li>

                </ul>

                <div class="logo-box" style="background-color:#fff;border-bottom:1px solid #eee;">
                    <a href="/admin" class="logo text-center">
                        <span class="logo-lg">
                            <img src="/static/img/logo.png" alt="<?php echo $this->config->item('site_name'); ?>" style="width:130px;">
                        </span>
                        <span class="logo-sm">
                            <img src="/static/img/logo_s.png" alt="" style="width:40px;">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
                </ul>
            </div>

            <div class="left-side-menu">
                <div class="slimscroll-menu">
                    <div id="sidebar-menu">
                        <ul class="metismenu" id="side-menu">
                            <li>
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="remixicon-home-8-line"></i>
                                    <span> 홈 화면 </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="#">메인 슬라이드</a>
                                    </li>
                                    <li>
                                        <a href="#">중하단</a>
                                    </li>
                                    <li>
                                        <a href="#">최하단</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="remixicon-pencil-line"></i>
                                    <span> 게시물 관리 </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="#">회사소개</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" aria-expanded="false">공사비교육
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-third-level" aria-expanded="false" style="">
                                            <li>
                                                <a href="/admin/youtube">동영상 교육</a>
                                            </li>
                                            <li>
                                                <a href="/admin/book">교재 구매</a>
                                            </li>
                                            <li>
                                                <a href="/admin/book/review">교재 리뷰 관리</a>
                                            </li>
                                            <li>
                                                <a href="/admin/lecture">강의 신청</a>
                                            </li>
                                            <li>
                                                <a href="/admin/lecture/lecture_table_modify">강의 표 수정</a>
                                            </li>
                                            <li>
                                                <a href="/admin/config/lecture">강의 관리</a>
                                            </li>
                                            <li>
                                                <a href="/admin/lecture/teacher">강사 관리</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" aria-expanded="false">건설장터
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-third-level" aria-expanded="false" style="">
                                            <li>
                                                <a href="/admin/market">현장 자재 거래</a>
                                            </li>
                                            <li>
                                                <a href="/admin/recruit">구인, 구직</a>
                                            </li>
                                            <li>
                                                <a href="/admin/gongsabi">공사비 작성 의뢰</a>
                                            </li>
                                            <li>
                                                <a href="/admin/partners">Partners</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" aria-expanded="false">고객센터
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-third-level" aria-expanded="false" style="">
                                            <li>
                                                <a href="/admin/board/notice">공지사항</a>
                                            </li>
                                            <li>
                                                <a href="/admin/board/pds">자료실</a>
                                            </li>
                                            <li>
                                                <a href="/admin/board/faq">자주묻는질문</a>
                                            </li>
                                            <li>
                                                <a href="/admin/board/qna">Q&A</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/admin/contact">업무제휴</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="remixicon-building-2-line"></i>
                                    <span> 데이터 관리 </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);" aria-expanded="false">공사비검색
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-third-level" aria-expanded="false" style="">
                                            <li>
                                                <a href="/admin/data/gongsabi">면적당공사비</a>
                                            </li>
                                            <li>
                                                <a href="/admin/data/danga">공사단가</a>
                                            </li>
                                            <li>
                                                <a href="/admin/data/goljo">골조 면적별 수량</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" aria-expanded="false">내역서작성
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-third-level" aria-expanded="false" style="">
                                            <li>
                                                <a href="javascript: void(0);">건축내역서 작성</a>
                                            </li>
                                            <li>
                                                <a href="javascript: void(0);">골조 내역서 작성</a>
                                            </li>
                                            <li>
                                                <a href="javascript: void(0);">공사 기간 산정</a>
                                            </li>
                                            <li>
                                                <a href="javascript: void(0);">간접 공사비 계산</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="remixicon-settings-5-line"></i>
                                    <span> 기타 관리 </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="/admin/member">회원관리</a>
                                    </li>
                                    <li>
                                        <a href="/admin/banner">배너관리</a>
                                    </li>
                                    <li>
                                        <a href="#">팝업창</a>
                                    </li>
                                    <li>
                                        <a href="#">서비스 약관</a>
                                    </li>
                                    <li>
                                        <a href="/admin/config/noti">알림 설정</a>
                                    </li>
                                    <li>
                                        <a href="#">매출 현황</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="content-page">