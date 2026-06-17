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

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    
                    <!--
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">

                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-soft-primary text-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Doug Dukes commented on Admin Dashboard
                                        <small class="text-muted">1 min ago</small>
                                    </p>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="/static/admin/assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Mario Drummond</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="/static/admin/assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">Karen Robinson</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Wow ! this admin looks good and awesome design</small>
                                    </p>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-soft-warning text-warning">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="text-muted">5 hours ago</small>
                                    </p>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">4 days ago</small>
                                    </p>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-secondary">
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <b>Admin</b>
                                        <small class="text-muted">13 days ago</small>
                                    </p>
                                </a>
                            </div>

                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>
                    -->

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="pro-user-name ml-1">
                                <?php echo $this->session->userdata('ADMIN_MEMBER')['admin_member_name']; ?> <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">환영합니다 !</h6>
                            </div>
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="remixicon-account-circle-line"></i>
                                <span>정보수정</span>
                            </a>
                            <div class="dropdown-divider"></div> -->
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
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <!-- <li class="menu-title">공사비 검색</li>
                            
                            <li class="menu-title mt-2">자재 및 노무비 단가 검색</li>
                            
                            <li class="menu-title mt-2">골조 면적별 수량 검색</li>
                            
                            <li class="menu-title mt-2">개산 견적</li> -->

                            <!-- <li class="menu-title">기초 코드 관리</li>

                            <li>
                                <a href="/admin/code/gongjong" class="waves-effect">
                                    <i class="remixicon-settings-3-line"></i>
                                    <span> 공종 코드 관리 </span>
                                </a>
                            </li> -->

                            <li class="menu-title">데이터 관리</li>

                            <li>
                                <a href="/admin/data/gongsabi" class="waves-effect">
                                    <i class="remixicon-function-line"></i>
                                    <span> 면적당 공사비 </span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/data/danga" class="waves-effect">
                                    <i class="remixicon-price-tag-3-line"></i>
                                    <span> 공사 단가 </span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/data/goljo" class="waves-effect">
                                    <i class="remixicon-stack-line"></i>
                                    <span> 골조 면적별 수량 </span>
                                </a>
                            </li>

                            <li class="menu-title mt-2">게시물 관리</li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="remixicon-edit-box-line"></i>
                                    <span> 공사비 교육 관리 </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
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
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="remixicon-building-2-line"></i>
                                    <span> 건설장터 관리 </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
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
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="remixicon-customer-service-2-line"></i>
                                    <span> 고객센터 관리 </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
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
                                <a href="/admin/contact" class="waves-effect">
                                    <i class="remixicon-briefcase-line"></i>
                                    <span> 업무 제휴</span>
                                </a>
                            </li>

                            <li class="menu-title mt-2">기타 관리</li>

                            <li>
                                <a href="/admin/member" class="waves-effect">
                                    <i class="remixicon-user-line"></i>
                                    <span> 회원 관리 </span>
                                </a>
                            </li>

                            <li>
                                <a href="/admin/banner" class="waves-effect">
                                    <i class="remixicon-image-fill"></i>
                                    <span> 배너 관리 </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="remixicon-pencil-line"></i>
                                    <span> 강의 관리 </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="/admin/lecture/lecture_table_modify">강의 표 수정</a>
                                    </li>
                                    <li>
                                        <a href="/admin/config/lecture">강의 관리</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="/admin/lecture/teacher" class="waves-effect">
                                    <i class="remixicon-user-line"></i>
                                    <span>  강사 관리 </span>
                                </a>
                            </li>

                            <li>
                                <a href="/admin/config/noti" class="waves-effect">
                                    <i class="remixicon-notification-line"></i>
                                    <span> 알림 설정 </span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">