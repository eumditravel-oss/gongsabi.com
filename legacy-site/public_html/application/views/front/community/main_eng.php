
    <div class="classy-hero-blocks hero-blocks-3 height-400 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Construction Market</h2>
                        <p>
                            It's information market regarding material, human resources, service, company for construction worker.<br>
                            Why not make a quick buck out of excess construction materials?<br>
                            Post job opening in your company for free and reach a right candidates effectively.<br>
                            For more information about querying for rough and difinitive quantity estimate, quantity inspection on construction site, see the Estimate Inquiry.<br><br>
                            <small>※ Buyer and seller shall take responsibility for trading process.  GongSaBi.com does not accept any responsibility and will not be liable for any loss or damage.</small>
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
                    Trade Field Materials
                    <div class="main_menu_sub_desc">
                        Online marketplace for Field Materials.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item recruit">
            <div class="main_menu_desc">
                <a href="/front/community/recruit">
                    Careers
                    <div class="main_menu_sub_desc">
                        Match the Right Person to the Right Job in Construction.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item gongsabi">
            <div class="main_menu_desc">
                <a href="/front/community/gongsabi">
                    Estimate Inquiry
                    <div class="main_menu_sub_desc">
                        Request rough and difinitive quantity estimate, quantity inspection on construction site, etc.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item partners">
            <div class="main_menu_desc">
                <a href="/front/community/partners">
                    Partners 
                    <div class="main_menu_sub_desc">
                        Our main partners and friends.
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