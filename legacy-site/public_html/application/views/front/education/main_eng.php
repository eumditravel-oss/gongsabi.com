
    <div class="classy-hero-blocks hero-blocks-3 height-400 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Education</h2>
                        <p>                            
                            It is a specialized institution for training Construction Cost Consultant to be able to prepare the BOQ and quantity surveying with 『Construction Cost Estimating For Field Engineer』 books series 1-6 via online and offline classes.<br><br>
                            For offline courses registration, please enter [Education Inquiry] page.<br>
                            All training services except sample lecture must be paid separately. (The same applies to paid members.)
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
                    Online Courses
                    <div class="main_menu_sub_desc">
                        Access free sample lecture and expert-led courses.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item book">
            <div class="main_menu_desc">
                <a href="/front/education/book">
                    Purchase Book
                    <div class="main_menu_sub_desc">
                        See industry-ready book series 『Construction Cost Estimating For Field Engineer』.
                    </div>
                </a>
            </div>
        </div>
        <div class="main_menu_desc_item lecture">
            <div class="main_menu_desc">
                <a href="/front/education/lecture">
                    Education Inquiry
                    <div class="main_menu_sub_desc">
                        Learn various courses with top-notch experts with real-world experience.
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