
    <section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are">
                        <table class="table classy-table table-bordered table-responsive gongsabi-table">
                            <colgroup>
                                <col width="15%">
                                <col width="*">
                                <col width="15%">
                                <col width="*">
                            </colgroup>
                            <thead>
                            <tbody>
                                <tr>
                                    <th class="text-center bg-gray">교육과정</th>
                                    <td class="text-left"><?php echo HP_GET_LECTURE_TEXT($board_data['list'][0]->board_category); ?></td>
                                    <th class="text-center bg-gray">등록일</th>
                                    <td class="text-left"><?php echo $board_data['list'][0]->ins_datetime; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">교육날짜</th>
                                    <td class="text-left"><?php echo $board_data['list'][0]->board_etc_2; ?></td>
                                    <th class="text-center bg-gray">참석인원</th>
                                    <td class="text-left"><?php echo $board_data['list'][0]->board_etc_2; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">회사</th>
                                    <td class="text-left"><?php echo HP_ENC_TEXT($board_data['list'][0]->board_company, !$this->session->userdata('MEMBER_SESSION')); ?></td>
                                    <th class="text-center bg-gray">이름</th>
                                    <td class="text-left"><?php echo HP_ENC_TEXT($board_data['list'][0]->board_name, !$this->session->userdata('MEMBER_SESSION')); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">요청사항</th>
                                    <td class="text-left" colspan="3">
                                        <?php echo nl2br($board_data['list'][0]->board_content); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                                <a href="/front/education/lecture" class="btn btn-outline-success">목록</a>
                            </div>
                            <div class="col-lg-6 text-right">
                                <?php if ( $board_data['list'][0]->ins_user == $this->session->userdata('MEMBER')['member_id'] ) { ?>
                                <a href="/front/mypage/modify/lecture/<?php echo $board_data['list'][0]->board_seq; ?>?ismypage=0" class="btn btn-success">수정</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>