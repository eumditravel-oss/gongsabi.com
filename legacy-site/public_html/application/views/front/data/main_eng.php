
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Construction Cost Analysis</h2>
                        <p>                            
                            Construction cost per area can be estimated based on the type of building, area, city and the year of construction.
                        </p>
                        <p class="fsxs mt-5">※ GongSaBi.com shall not in any event be liable for economic loss in any form, such as indirect or consequential loss or damage, loss of profits or earnings, punitive or special damages however caused, or for any loss to purchasers and other third parties to the other, and reliability of data.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main_menu_desc_wrapper data">
        <div class="main_menu_desc_item gongsabi">
            <div class="main_menu_desc">
                <a href="/front/data/gongsabi">
                    Construction Cost Per Area
                    <div class="main_menu_sub_desc">
                        Construction cost per area can be estimated based on the type of building, area, city and the year of construction.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item danga">
            <div class="main_menu_desc">
                <a href="/front/data/danga">
                    Unit Price Estimating
                    <div class="main_menu_sub_desc">
                        We provide cost of the contract, procurement price and execution price for construction works, civil works, mechanical works, electrical works, etc.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item goljo">
            <div class="main_menu_desc">
                <a href="/front/data/goljo">
                    Analysis of  Structural Frame Quantity Per Area
                    <div class="main_menu_sub_desc">
                        You are able to search the frame quantity per area.
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