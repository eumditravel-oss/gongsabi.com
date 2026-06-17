
    <div class="classy-hero-blocks hero-blocks-3 height-400 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">건설 장터</h2>
                        <p>
                            건설인이 자재, 인력, 서비스, 회사에 대한 정보를 검색할 수 있는 장터입니다.<br>
                            건설 현장 간 남은 자재를 거래할 수 있을 뿐만 아니라<br>
                            건설 현장에 필요한 적재적소의 인재를 만날 수 있는 인력풀을 제공합니다.<br>
                            개산 및 정미 견적, 현장 물량 검증 등 궁금한 점이 있으시다면 맞춤 의뢰를 진행하실 수 있습니다.<br><br>
                            <small>※ 본 게시판을 통한 모든 상거래 및 구인,구직의 책임은 구매자와 판매자에게 있으며, 공사비닷컴에서는 일체의 법적 책임을 지지 않습니다.</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main_menu_desc_wrapper">
        <div class="main_menu_desc_item market">
            <div class="main_menu_desc">
                <a href="/front/community/market">
                    현장 자재 거래
                    <div class="main_menu_sub_desc">
                        현장의 남는 자재들을 사고 파는<br>장터입니다.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item recruit">
            <div class="main_menu_desc">
                <a href="/front/community/recruit">
                    구인 / 구직
                    <div class="main_menu_sub_desc">
                        건설 산업의 인재와 회사를 이어주는<br>구인 / 구직 장터입니다.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item gongsabi">
            <div class="main_menu_desc">
                <a href="/front/community/gongsabi">
                    공사비 작성 의뢰
                    <div class="main_menu_sub_desc">
                        개산 및 정미견적, 현장 물량 검증 등<br>에 관해 궁금하신 내용을 의뢰할 수<br>있습니다.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item partners">
            <div class="main_menu_desc">
                <a href="/front/community/partners">
                    Partners
                    <div class="main_menu_sub_desc">
                        공사비닷컴의 주요 협력사들<br>입니다.
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