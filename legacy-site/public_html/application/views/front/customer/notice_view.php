
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
                        <table class="table classy-table table-bordered table-responsive gongsabi-table">
                        	<colgroup>
                        		<col width="*">
                                <col width="15%">
                                <col width="15%">
                        	</colgroup>
                            <thead>
                                <tr class="bg-gray">
                                    <th class="text-left"><?php echo $board_list[0]->board_title; ?></th>
                                    <th class="text-center">등록일</th>
                                    <th class="text-center"><?php echo substr($board_list[0]->ins_datetime, 0, 10); ?></th>
                                </tr>
                            </thead>
							<tbody>
                                <tr>
                                    <td class="text-left" colspan="3">
                                        <?php if ( $board_list[0]->board_image ) { ?>
                                        <img src="/static/data/board/<?php echo explode('|', $board_list[0]->board_image)[0]; ?>" class="mb-2"><br>
                                        <?php } ?>
                                        <?php echo nl2br($board_list[0]->board_content); ?>
                                        <br><br>
                                        첨부파일<br>
                                        <?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>    

                                        <?php if ( $board_list[0]->board_attach_1 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('notice', $board_list[0]->board_seq, '1'); ?></p>
                                        <?php } ?>                                     
                                        <?php if ( $board_list[0]->board_attach_2 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('notice', $board_list[0]->board_seq, '2'); ?></p>
                                        <?php } ?>                                     
                                        <?php if ( $board_list[0]->board_attach_3 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('notice', $board_list[0]->board_seq, '3'); ?></p>
                                        <?php } ?>

                                        <?php } else { ?>

                                        <?php if ( $board_list[0]->board_attach_1 ) { ?>
                                        <p class="mb-0 my-2"><?php echo explode('|', $board_list[0]->board_attach_1)[1]; ?></p>
                                        <?php } ?>                                     
                                        <?php if ( $board_list[0]->board_attach_2 ) { ?>
                                        <p class="mb-0 my-2"><?php echo explode('|', $board_list[0]->board_attach_2)[1]; ?></p>
                                        <?php } ?>                                     
                                        <?php if ( $board_list[0]->board_attach_3 ) { ?>
                                        <p class="mb-0 my-2"><?php echo explode('|', $board_list[0]->board_attach_3)[1]; ?></p>
                                        <?php } ?>

                                        <?php } ?>                                          
                                    </td>
                                </tr>
							</tbody>
                        </table>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                                <a href="/front/customer/notice" class="btn btn-outline-success">목록</a>
                            </div>
                            <div class="col-lg-6 text-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>