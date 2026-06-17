
	<div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">공지사항</h2>
                        <p>
                            공사비닷컴과 관련한 최신 정보를 확인할 수 있습니다.
                        </p>
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
                            <h4>총 <?php echo number_format($board_count); ?>건</h4>
                        </div>
                        <div class="row m-bottom-15">
                        	<div class="col-lg-6">
							</div>
                        	<div class="col-lg-6 text-right">
                        	</div>
                        </div>
                        <?php if ( !$this->agent->is_mobile() ) { ?>
                        <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                        	<colgroup>
                        		<col width="10%">
                        		<col width="*">
                        		<col width="15%">
                        	</colgroup>
							<thead>
								<tr class="bg-gray">
									<th>번호</th>
									<th>제목</th>
									<th>등록일</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ( $board_list as $board ) { ?>
								<tr>
									<td class="text-center"><?php echo $board->rownum; ?></td>
									<td class="text-left"><a href="/front/customer/notice_view/<?php echo $board->board_seq; ?>?keyword=<?php echo $condition['keyword']; ?>"><?php echo $board->board_title; ?></a></td>
									<td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
								</tr>
                                <?php } ?>
							</tbody>
                        </table>
                        <?php } else { ?>
                            <?php foreach ( $board_list as $board ) { ?>
                            <div class="card mb-2">
                                <div class="card-body py-1">
                                    <div class="clearfix mb-2">
                                        <p class="float-right text-muted mb-0 fsxs"><?php echo substr($board->ins_datetime, 0, 10); ?></p>
                                    </div>
                                    <h5 class="card-title"><a href="/front/customer/notice_view/<?php echo $board->board_seq; ?>?keyword=<?php echo $condition['keyword']; ?>"><?php echo $board->board_title; ?></a></h5>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } ?>
                        <div class="row m-top-15">
                            <div class="col-lg-12 text-center">
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