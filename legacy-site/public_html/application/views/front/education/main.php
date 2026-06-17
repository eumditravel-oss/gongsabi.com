
    <div class="classy-hero-blocks hero-blocks-3 height-400 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">공사비 교육</h2>
                        <p>                            
                            총 6권을 세트로 한 『건축견적 이야기』 교재와<br>
                            온, 오프라인 교육을 통해 건축 수량 산출 및 내역서 작성을 전문으로 할 수 있는<br>
                            원가 관리사를 양성하는 전문 기관입니다.<br><br>
                            오프라인 강의 신청을 원하시면 [강의 신청] 페이지를 이용하시기 바랍니다.<br>
                            샘플 강의를 제외한 모든 교육 서비스는 별도의 결제를 진행하셔야 합니다. (유료회원도 동일 적용됩니다.)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main_menu_desc_wrapper data">
        <div class="main_menu_desc_item youtube">
            <div class="main_menu_desc">
                <a href="/front/education/youtube">
                    동영상 교육
                    <div class="main_menu_sub_desc">
                        샘플 강의 및 유료 강의를 제공합니다.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item book">
            <div class="main_menu_desc">
                <a href="/front/education/book">
                    교재 구매
                    <div class="main_menu_sub_desc">
                        공사비 원가 부분 필수 실무서인『건축견적 이야기』<br>강의 교재를 만나보세요.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item lecture">
            <div class="main_menu_desc">
                <a href="/front/education/lecture">
                    강의 신청
                    <div class="main_menu_sub_desc">
                        다양한 주제의 강의를 신청할 수 있습니다.
                    </div>
                </a>
            </div>
        </div>
    </div>

    <?php if ( count($banner_list) > 0 ) { ?>
    <div class="main_banner_wrapper">
        <div class="banner_slider_container">
            <div class="banner_slider_wrapper">
            <?php if ( count($banner_list) > 0 ) { ?>
            <?php foreach ( $banner_list as $banner ) { ?>
                <div class="banner_slider">
                <?php if ( !$this->agent->is_mobile() ) { ?>
                <a href="<?php echo $banner->w_link; ?>" target="<?php echo $banner->w_target; ?>"><img src="/static/data/banner/<?php echo $banner->area; ?>/<?php echo $banner->w_image; ?>"></a>
                <?php } else { ?>
                <a href="<?php echo $banner->m_link; ?>" target="<?php echo $banner->m_target; ?>"><img src="/static/data/banner/<?php echo $banner->area; ?>/<?php echo $banner->m_image; ?>"></a>
                <?php } ?>
                </div>
            <?php } ?>
            <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>

<script type="text/javascript">
$(function() {
  $('.banner_slider_wrapper').slick({
    autoplay: true,
    autoplaySpeed: 2000
  });
});
</script>