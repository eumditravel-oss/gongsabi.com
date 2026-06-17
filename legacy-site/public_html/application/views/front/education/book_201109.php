
	<section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are m-top-30">

                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>책 구매요청</h4>
                        </div>

                        <div class="row">

                            <?php foreach ($this->config->item('BOOK_LIST') as $key => $value) { ?>

                            <div class="col-6 col-lg-3 m-bottom-30">
                                <div class="single_service wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="single_service_img text-center m-bottom-15">
                                        <img src="/static/img/book<?php echo $key; ?>.jpg" style="height:250px;">
                                    </div>
                                    <div class="single_service_title text-center m-bottom-30">
                                        <p><?php echo $value['name']; ?></p>
                                        <h5><?php echo number_format($value['price']); ?>원</h5>
                                    </div>
                                    <div class="single_service_content text-center">
                                        <a class="btn btn-pill btn-success" href="/front/education/book_info?num=<?php echo $key; ?>">구매하기 <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>