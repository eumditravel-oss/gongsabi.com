
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">고객센터</h2>
                        <p>
                            공사비닷컴은 회원님의 소리에 항상 귀 기울이겠습니다.<br>
                            자주 묻는 질문을 확인하시면 더욱 빨리 궁금증을 해결 할 수 있습니다.<br>
                            문의 신청 후 문자메세지로 답변완료를 안내드리며, 답변내용은 신청하신<br>
                            이메일 또는 마이페이지의 <b>[신청내역]</b>에서 확인 가능합니다.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main_menu_desc_wrapper">
        <div class="main_menu_desc_item notice">
            <div class="main_menu_desc">
                <a href="/front/customer/notice">
                    공지사항
                    <div class="main_menu_sub_desc">
                        공사비닷컴과 관련한 최신 정보를 확인할 수 있습니다.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item pds">
            <div class="main_menu_desc">
                <a href="/front/customer/pds">
                    자료실
                    <div class="main_menu_sub_desc">
                        공사비와 관련한 다양하고 유용한 정보를 제공합니다.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item faq">
            <div class="main_menu_desc">
                <a href="/front/customer/faq">
                    자주 묻는 질문
                    <div class="main_menu_sub_desc">
                        가장 많이 궁금해하시는 내역을 빠르게 해결하실 수 있습니다.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item qna">
            <div class="main_menu_desc">
                <a href="/front/customer/qna">
                    Q&A
                    <div class="main_menu_sub_desc">
                        궁금하신 점이나 불편하신 점이 있다면 언제든 문의주세요.
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