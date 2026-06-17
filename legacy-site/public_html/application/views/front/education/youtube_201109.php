
	<div class="search_course_area education-version section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="course_search">
                        <form method="get" class="">
                            <div class="row">
                                <div class="col-12 col-md-9 m-xs-top-15">
                                    <div class="form-group">
                                    	<input type="text" name="keyword" id="keyword" value="<?php echo $condition['keyword']; ?>" class="form-control" placeholder="검색어를 입력해 주십시오.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 m-xs-top-15">
                                    <button type="submit" class="btn btn-default">검색</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>총 <?php echo number_format($board_data['count']); ?>건</h4>
                        </div>

                        <div class="row">
                            
                            <?php foreach ( $board_data['list'] as $board ) { ?>

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
                                    </div>
                                </div>
                            </div>

                            <?php } ?>

                        </div>

                        <div class="row m-top-15">
                        	<div class="col-12">
		                        <nav>
									<?php echo $pagination; ?>
								</nav>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>