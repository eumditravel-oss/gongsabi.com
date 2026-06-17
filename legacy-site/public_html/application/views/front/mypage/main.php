    <section class="breadcumb_area background-overlay section_padding_50" style="background-image: url(/static/img/community.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb_section">
                        <div class="page_title">
                            <h4><a href="/front/mypage">마이페이지</a></h4>
                        </div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/front/mypage/info">회원정보수정</a></li>
                            <li class="breadcrumb-item"><a href="/front/mypage/request">신청내역</a></li>
                            <?php if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) { ?>
                            <li class="breadcrumb-item"><a href="/front/mypage/scrap">스크랩내역</a></li>
                            <?php } ?>
                            <li class="breadcrumb-item"><a href="/front/auth/logout">로그아웃</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="classy-hero-blocks hero-blocks-3 height-200 background-overlay-white" style="background-image: url(/static/img/slider.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30">마이페이지</h2>
                        <p>
                            회원 정보 수정 및 각종 신청 내역을 확인할 수 있습니다.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="special_feature_area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-6 pb-3">
                    <div class="single_feature wow fadeInUp">
                        <a href="/front/mypage/info">
                        <div class="feature_img hexagon">
                            <i class="ion-compose" aria-hidden="true"></i>
                        </div>
                        <div class="feature_text">
                            <h4>회원정보수정</h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-lg-6 pb-3">
                    <div class="single_feature wow fadeInUp">
                        <a href="/front/mypage/request">
                        <div class="feature_img hexagon">
                            <i class="ion-card" aria-hidden="true"></i>
                        </div>
                        <div class="feature_text">
                            <h4>신청내역</h4>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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