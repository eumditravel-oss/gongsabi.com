
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Q&A</h2>
                        <p>
                            공사비 닷컴의 회원이시면 로그인 후 편리하게 사용 가능합니다.<br>
                            <a href="/front/customer/faq"><span class="mfc fb">[자주 묻는 질문]</span></a>을 확인하시면 더욱 빨리 긍금증을 해결할 수 있습니다.<br>
                            회원님이 보내주신 문의에 대한 답변 내용은 <a href="/front/mypage/customer/qna"><span class="mfc fb">[마이페이지] - [Q&A]</span></a>에서 확인하실 수 있습니다.
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
                                <col width="15%">
                        		<col width="35%">
                                <col width="15%">
                                <col width="35%">
                        	</colgroup>
							<tbody>
                                <tr>
                                    <th class="text-center bg-gray">제목</th>
                                    <td class="text-left"><?php echo $board_list[0]->board_title; ?></td>
                                    <th class="text-center bg-gray">등록일</th>
                                    <td class="text-left"><?php echo substr($board_list[0]->ins_datetime, 0, 10); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">내용</th>
                                    <td class="text-left" colspan="3"><?php echo nl2br($board_list[0]->board_content); ?></td>
                                </tr>
                                <?php if ( $board_list[0]->board_reply_content ) { ?>
                                <tr>
                                    <th class="text-center bg-gray">답변</th>
                                    <td class="text-left" colspan="3">
                                        <?php echo nl2br($board_list[0]->board_reply_content); ?>
                                    </td>
                                </tr>
                                <?php } ?>
							</tbody>
                        </table>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                                <a href="/front/customer/qna" class="btn btn-outline-success">목록</a>
                            </div>
                            <div class="col-lg-6 text-right">
                                <?php if ( $board_list[0]->ins_user == $this->session->userdata('MEMBER')['member_id'] ) { ?>
                                <a href="/front/customer/qna_modify/<?php echo $board_list[0]->board_seq; ?>?ismypage=0" class="btn btn-success">수정</a>
                                <a href="#" class="btn btn-success" onclick="board_delete('qna', '<?php echo $board_list[0]->board_seq; ?>', 'Y');">삭제</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>