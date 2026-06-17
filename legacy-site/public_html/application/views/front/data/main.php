
    <div class="classy-hero-blocks hero-blocks-3 height-400 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">공사비 검색</h2>
                        <p>                            
                            건물의 종류 | 면적 | 지역 | 착공년도를 선택하시면<br>
                            면적당 공사비 정보를 찾으실 수 있습니다.<br>
                            비회원과 무료회원일 경우, 샘플만 검색이  가능하고<br>
                            <a href="<?php echo ( !$this->session->userdata('MEMBER_SESSION') ) ? '/front/auth/regist' : '/front/mypage/info/info2'; ?>"><span class="mfc fb">유료회원 가입</span></a>을 하시면 공사비의 모든 정보를 검색하실 수 있습니다.
                        </p>
                        <p class="fsxs mt-5">※ 공사비닷컴에서 제공되는 서비스 및 자료는 참고용이므로<br>손실이나 손해에 관하여 법적책임을 지지 않습니다.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main_menu_desc_wrapper data">
        <div class="main_menu_desc_item gongsabi">
            <div class="main_menu_desc">
                <a href="/front/data/gongsabi">
                    면적당 공사비 검색
                    <div class="main_menu_sub_desc">
                        건물의 종류, 면적, 지역, 착공년도 별<br>공사비 정보를 찾으실 수 있습니다.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item danga">
            <div class="main_menu_desc">
                <a href="/front/data/danga">
                    공사 단가 검색
                    <div class="main_menu_sub_desc">
                        건축, 토목, 기계, 전기 등 각 공종별 공사 자재의<br>설계가,도급가, 실행가를 검색할 수 있습니다.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item goljo">
            <div class="main_menu_desc">
                <a href="/front/data/goljo">
                    골조 면적별 수량
                    <div class="main_menu_sub_desc">
                        해당 건축물의 골조를 면적별로 수량을<br>검색할 수 있습니다.
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