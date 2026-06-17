    <!--

    <?php if ( !$this->agent->is_mobile() ) { ?>

    <div class="main_banner_wrapper left">

    <?php if ( count($left_banner_list) > 0 ) { ?>
    <?php foreach ($left_banner_list as $banner) { ?>
        <a class="main_banner" href="<?php echo $banner->w_link; ?>" target="<?php echo $banner->w_target; ?>"><img src="/static/data/banner/<?php echo $banner->area; ?>/<?php echo $banner->w_image; ?>"></a>
    <?php } ?>
    <?php } ?>

    </div>

    <div class="main_banner_wrapper right">

    <?php if ( count($right_banner_list) > 0 ) { ?>
    <?php foreach ($right_banner_list as $banner) { ?>
        <a class="main_banner" href="<?php echo $banner->w_link; ?>" target="<?php echo $banner->w_target; ?>"><img src="/static/data/banner/<?php echo $banner->area; ?>/<?php echo $banner->w_image; ?>"></a>
    <?php } ?>
    <?php } ?>

    </div>

    <?php } ?>

    <style>
        .main_banner_wrapper {
            /*display: none;*/
            position: absolute;
            z-index: 9998;
            top: 870px;
            width: 150px;
        }

        .main_banner_wrapper .main_banner {
            display: block;
            margin-bottom: 10px;
        }
    </style>

    <script>
    $(function() {
        var win_width = window.innerWidth;
        var doc_width = 1140;
        var win_center = win_width / 2;

        var banner_left = ( ( win_width - doc_width ) / 2 ) - 150;
        var banner_right = ( win_center + ( doc_width / 2 ) );

        $('.main_banner_wrapper.left').css({
            'left': banner_left
        });

        $('.main_banner_wrapper.right').css({
            'left': banner_right
        });

        /*
        $(window).scroll(function(event) {
            var now = $(window).scrollTop();

            if ( now > 150 )
                $('.main_banner_wrapper').show();
            else
                $('.main_banner_wrapper').hide();
        });
        */
    });
    </script>

    -->
    
    <section class="welcome_area height_600" id="home">
        <div class="slidea" id="slidea">
            <div class="slidea-slide" id="default_slidea_slide_one">
                <div class="slidea-content slidea-content-center">
                    <div class="slidea-content-container">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6 text-left">
                                    <div class="s-obj default-title mb-3" id="title-one">
                                        <h4>건설 정보 플랫폼</h4>
                                        <h2>공사비닷컴</h2>
                                    </div>
                                    <div class="s-obj default-description midnight_blue" id="description-one">
                                        <p>대한민국 건설공사비를 건물종류, 위치, 면적, 연도별로<br>설계가, 도급가, 실행가 공사비를 찾아보실 수 있습니다.</p>
                                    </div>
                                    <div class="s-obj" id="btn-one">
                                        <a href="#" class="btn default-button">공사비닷컴 사용법 다운로드</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="slidea-background" src="/static/img/slider.jpg" alt="">
            </div>
            <div class="slidea-slide" id="default_slidea_slide_two">
                <div class="slidea-content slidea-content-center">
                    <div class="slidea-content-container">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-6 ml-md-auto text-right">
                                    <div class="s-obj default-title mb-3" id="title-two">
                                        <h4>건설 정보 플랫폼</h4>
                                        <h2>공사비닷컴</h2>
                                    </div>
                                    <div class="s-obj default-description" id="description-two">
                                        <p>대한민국 건설공사비를 건물종류, 위치, 면적, 연도별로<br>설계가, 도급가, 실행가 공사비를 찾아보실 수 있습니다.</p>
                                    </div>
                                    <div class="s-obj" id="btn-two">
                                        <a href="#" class="btn btn-pill btn-outline btn-mat-green">공사비닷컴 사용법 다운로드</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="slidea-background" src="/static/img/slider4.jpg" alt="">
            </div>
        </div>
    </section>

    <section class="special_feature_area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3 pb-3">
                    <div class="single_feature wow fadeInUp">
                        <a href="/front/data">
                        <div class="feature_img hexagon">
                            <i class="ion-map" aria-hidden="true"></i>
                        </div>
                        <div class="feature_text">
                            <h4>공사비 검색</h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-lg-3 pb-3">
                    <div class="single_feature wow fadeInUp">
                        <a href="#" onclick="alert('준비중입니다.');">
                        <div class="feature_img hexagon">
                            <i class="ion-compose" aria-hidden="true"></i>
                        </div>
                        <div class="feature_text">
                            <h4>내역서 작성</h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-lg-3 pb-3">
                    <div class="single_feature wow fadeInUp">
                        <a href="/front/education">
                        <div class="feature_img hexagon">
                            <i class="ion-university" aria-hidden="true"></i>
                        </div>
                        <div class="feature_text">
                            <h4>공사비 교육</h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-lg-3 pb-3">
                    <div class="single_feature wow fadeInUp">
                        <a href="/front/community">
                        <div class="feature_img hexagon">
                            <i class="ion-card" aria-hidden="true"></i>
                        </div>
                        <div class="feature_text">
                            <h4>건설 장터</h4>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="service_details" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog custom-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">공사비의 개념과 주요성 이해법</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="service_details_content p-15">
                        <div class="service_details_thumb">
                            <iframe width="1088" height="725" src="https://www.youtube.com/embed/7vpjbkX--Cc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="single_part_content m-top-30">
                            <h5>제23-1강 가설/ 철콘/ 철골공사의 아이템 사진설명 (요약)</h5>
                            <p>공통 / 건축 가설공사의 항목별 이해,<br>레미콘 / 거푸집 / 철근 / 동바리 등의 항목별 사진을 통한 설명,<br>철골 부재의 종류 및 내역서의 항목을 사진으로 설명</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="why_choose_us_area section_padding_100 background-pattern pattern-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 text-center">
                    <img src="/static/img/book9.png" alt="" style="height:400px;">
                </div>
                <div class="col-12 col-lg-6">
                    <div class="why_choose_us_text m-md-top-50 m-xs-top-50">
                        <h3 class="m-bottom-30 text-mat-green font-weight-bold">건축견적 이야기 (총 6권)</h3>
                        <p>
                            1권 : 도면을 이해하고 도면이 어떻게 공사비로 바뀌나 이해하자!<br>
                            2권 : 골조 수량 산출법 실습<br>
                            3권 : 마감공사 항목의 산출법 실습<br>
                            4권 : 내역서 작성 및 검토 방법<br>
                            5권 : 공종별 아이템의 이해<br>
                            6권 : 설계변경의 접근 및 진행 방법
                        </p>
                        <a class="btn btn-pill btn-mat-green m-top-15" href="/front/education/book">구매하기</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="about_us_one cool_facts_area section_padding_100_70 bg-flat-green">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="cool_fact_text wow fadeInUpBig">
                        <h2><span class="counter">300,000</span>+</h2>
                        <h5>면적당 공사비 DB</h5>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="cool_fact_text wow fadeInUpBig">
                        <h2><span class="counter">1,000</span>+</h2>
                        <h5>자재 단가 DB</h5>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="cool_fact_text wow fadeInUpBig">
                        <h2><span class="counter">3,000</span></h2>
                        <h5>골조 면적별 수량 DB</h5>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="cool_fact_text wow fadeInUpBig">
                        <h2><span class="counter">300</span>+</h2>
                        <h5>회원 수</h5>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="what_we_do_area section_padding_100_70" id="service">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_heading">
                        <h3>
                            동영상 강의 시청 및 구매
                            <a href="/front/education/youtube" class="btn btn-sm btn-pill btn-outline-success float-right">더보기 <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </h3>
                    </div>
                </div>
            </div>

            <!-- <div class="row py-4 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h5 class="m-bottom-15">1) 우리 회사도 교육비 지원을 받을 수 있습니다.</h5>
                        <p class="m-bottom-30">사업주 직업능력개발 훈련 과정</p>
                        <h5 class="m-bottom-15">2) 내일배움카드를 통해 최대 70% 지원받아 수강</h5>
                        <p class="m-bottom-30">국민내일배움카드 지원 과정</p>
                    </div>
                </div>
            </div> -->

            <div class="row">                            
                <?php foreach ( $youtube['list'] as $board ) { ?>

                <div class="col-md-6 col-lg-4">
                    <div class="single_service wow fadeInUp" data-wow-delay="0.2s">
                        <div class="single_service_img">
                            <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $board->board_etc_1; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="single_service_title">
                            <h5><?php echo $board->board_title; ?></h5>
                        </div>
                        <div class="single_service_content">
                            <p><?php echo $board->board_content; ?></p>
                            <!-- <a class="btn btn-pill btn-mat-green" data-target="#service_details" data-toggle="modal" href="#">자세히보기 <i class="fa fa-angle-double-right" aria-hidden="true"></i></a> -->
                        </div>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
    </section>

    <section class="faq_question_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="section_heading text-left">
                        <h3>
                            공사비닷컴 FAQ
                            <a href="/front/customer/faq" class="btn btn-sm btn-pill btn-outline-success float-right">더보기 <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </h3>
                    </div>
                    <div class="faq_area">
                        <div class="accordions" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php foreach ( $faq['list'] as $key => $board ) { ?>

                            <div class="panel single-accordion">
                                <h6>
                                    <a role="button" class="collapsed" aria-expanded="true" aria-controls="collapse<?php echo $key; ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>"><?php echo $board->board_title; ?>
                                    <span class="accor-open"><i class="fa fa-sort-desc" aria-hidden="true"></i></span>
                                    <span class="accor-close"><i class="fa fa-sort-asc" aria-hidden="true"></i></span>
                                    </a>
                                </h6>
                                <div id="collapse<?php echo $key; ?>" class="accordion-content collapse">
                                    <p><?php echo nl2br($board->board_reply_content); ?></p>
                                </div>
                            </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="testimonials_area m-xs-top-50">
                        <div class="testimonials">
                            <!-- Single testimonial area start  -->
                            <div class="single_testimonial_area">
                                <!-- Single testimonial thumb  -->
                                <div class="testimonial_author_thumb">
                                    <img src="/static/img/person.png" alt="">
                                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                                </div>
                                <!-- Single testimonial text  -->
                                <div class="testimonial_text">
                                    <p>공사비 검색시 정말 도움이 많이 됐어요.</p>
                                </div>
                                <div class="testimonial_author_name">
                                    <h5>현동명</h5>
                                    <h6>시공사</h6>
                                </div>
                            </div>

                            <!-- Single testimonial area start  -->
                            <div class="single_testimonial_area">
                                <!-- Single testimonial thumb  -->
                                <div class="testimonial_author_thumb">
                                    <img src="/static/img/person.png" alt="">
                                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                                </div>
                                <!-- Single testimonial text  -->
                                <div class="testimonial_text">
                                    <p>공사비 검색시 정말 도움이 많이 됐어요.</p>
                                </div>
                                <div class="testimonial_author_name">
                                    <h5>현동명</h5>
                                    <h6>시공사</h6>
                                </div>
                            </div>

                            <!-- Single testimonial area start  -->
                            <div class="single_testimonial_area">
                                <!-- Single testimonial thumb  -->
                                <div class="testimonial_author_thumb">
                                    <img src="/static/img/person.png" alt="">
                                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                                </div>
                                <!-- Single testimonial text  -->
                                <div class="testimonial_text">
                                    <p>공사비 검색시 정말 도움이 많이 됐어요.</p>
                                </div>
                                <div class="testimonial_author_name">
                                    <h5>현동명</h5>
                                    <h6>시공사</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** FAQ Area End ***** -->

    <section class="blog_area section_padding_0_70" id="news">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading">
                        <h3>
                            공사비닷컴 소식
                            <a href="/front/customer/notice" class="btn btn-sm btn-pill btn-outline-success float-right">더보기 <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ( $notice['list'] as $board ) { ?>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single_latest_news_area m-bottom-15">
                        <div class="single_latest_news_img_area">
                            <img src="/static/data/board/<?php echo explode('|', $board->board_image)[0]; ?>" alt="">
                        </div>
                        <div class="single_latest_news_text_area p-15">
                            <div class="post-meta">
                                <a href="#"><?php echo substr($board->ins_datetime, 0, 10); ?></a>
                            </div>
                            <p><?php echo $board->board_title; ?></p>
                            <a class="btn btn-pill btn-success m-top-15" href="/front/customer/notice_view/<?php echo $board->board_seq; ?>">자세히보기</a>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
    </section>

    <!-- <section class="message_now_area bg-gray section_padding_100_70" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="message_title">
                        <div class="section_heading">
                            <h3 class="mb-3">업무제휴 및 문의하기</h3>
                            <p>공사비닷컴에 문의하기</p>
                        </div>
                    </div>

                    <div class="contact_from">
                        <form method="post" id="frm_contact">
                            <div class="contact_input_area">
                                <div id="success_fail_info"></div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="board_company" id="board_company" placeholder="회사명" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="board_name" id="board_name" placeholder="이름" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="board_email" id="board_email" placeholder="이메일주소" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control handle-cell-phone" name="board_phone" id="board_phone" placeholder="연락처" maxlength="13" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="board_content" class="form-control" id="board_content" cols="30" rows="10" placeholder="문의 내용" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-pill btn-mat-green regist-contact">신청하기</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    $(function() {
        $('.regist-contact').on('click', function() {
            var company = $('#board_company').val();
            var name = $('#board_name').val();
            var email = $('#board_email').val();
            var phone = $('#board_phone').val();
            var content = $('#board_content').val();

            if ( company == '' ) {
                alert('회사명을 입력해 주세요.');
                return false;
            } else if ( name == '') {
                alert('이름을 입력해 주세요.');
                return false;
            } else if ( email == '') {
                alert('이메일주소를 입력해 주세요.');
                return false;
            } else if ( phone == '') {
                alert('연락처를 입력해 주세요.');
                return false;
            } else if ( content == '' ) {
                alert('문의 내용을 입력해 주세요.');
                return false;
            } else {
                $('#frm_contact').attr('action', '/front/customer/contact_regist_proc').submit();
            }
        });
    });
    </script> -->

    <?php if ( count($banner_list) > 0 ) { ?>
    <section class="section_padding_30">
        <div class="container text-center">
            <?php if ( !$this->agent->is_mobile() ) { ?>
            <a href="<?php echo $banner_list[0]->w_link; ?>" target="<?php echo $banner_list[0]->w_target; ?>"><img src="/static/data/banner/<?php echo $banner_list[0]->area; ?>/<?php echo $banner_list[0]->w_image; ?>"></a>
            <?php } else { ?>
            <a href="<?php echo $banner_list[0]->m_link; ?>" target="<?php echo $banner_list[0]->m_target; ?>"><img src="/static/data/banner/<?php echo $banner_list[0]->area; ?>/<?php echo $banner_list[0]->m_image; ?>"></a>
            <?php } ?>
        </div>
    </section>
    <?php } ?>