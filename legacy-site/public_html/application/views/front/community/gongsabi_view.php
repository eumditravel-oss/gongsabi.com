
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">공사비 작성 의뢰</h2>
                        <p>
                            개산 및 정미견적, 현장 물량 검증 용역, 설계변경, 감정 및 건설 클레임 등에 관해<br>
                            궁금하신 내용을 의뢰할 수 있습니다.<br>
                            <span class="mfc fb">회원가입 없이</span> 간편하게 상담 신청을 할 수 있습니다.<br>
                            의뢰하신 내용의 답변은 문자 혹은 이메일로 안내드리며,<br>
                            로그인 후 의뢰시 <a href="/front/mypage/community/gongsabi"><span class="mfc fb">[마이페이지]-[공사비 작성 의뢰]</span></a>에서 추가로 확인할 수 있습니다.
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
                                <col width="*">
                                <col width="15%">
                                <col width="*">
                            </colgroup>
                            <thead>
                            <tbody>
                                <tr>
                                    <th class="text-center bg-gray">구분</th>
                                    <td class="text-left"><?php echo HP_GET_GONGSABI_REQUEST_TEXT($board_data['list'][0]->board_category); ?></td>
                                    <th class="text-center bg-gray">등록일</th>
                                    <td class="text-left"><?php echo $board_data['list'][0]->ins_datetime; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">이름</th>
                                    <td class="text-left"><?php echo HP_ENC_TEXT($board_data['list'][0]->board_name, !$this->session->userdata('MEMBER_SESSION')); ?></td>
                                    <th class="text-center bg-gray">회사</th>
                                    <td class="text-left"><?php echo HP_ENC_TEXT($board_data['list'][0]->board_company, !$this->session->userdata('MEMBER_SESSION')); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">휴대폰번호</th>
                                    <td class="text-left"><?php echo HP_ENC_TEXT($board_data['list'][0]->board_hp, !$this->session->userdata('MEMBER_SESSION')); ?></td>
                                    <th class="text-center bg-gray">이메일주소</th>
                                    <td class="text-left"><?php echo HP_ENC_TEXT($board_data['list'][0]->board_email, !$this->session->userdata('MEMBER_SESSION')); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">요청사항</th>
                                    <td class="text-left" colspan="3">
                                        <?php echo nl2br($board_data['list'][0]->board_content); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">첨부파일</th>
                                    <td class="text-left" colspan="3">                                         
                                        <?php if ( $board_data['list'][0]->board_attach_1 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('gongsabi', $board_data['list'][0]->board_seq, '1'); ?></p>
                                        <?php } ?>                                     
                                        <?php if ( $board_data['list'][0]->board_attach_2 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('gongsabi', $board_data['list'][0]->board_seq, '2'); ?></p>
                                        <?php } ?>                                     
                                        <?php if ( $board_data['list'][0]->board_attach_3 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('gongsabi', $board_data['list'][0]->board_seq, '3'); ?></p>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php if ( $board_data['list'][0]->board_reply_content ) { ?>
                                <tr>
                                    <th class="text-center bg-gray">답변</th>
                                    <td class="text-left" colspan="3">
                                        <?php echo nl2br($board_data['list'][0]->board_reply_content); ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                                <a href="/front/community/gongsabi" class="btn btn-outline-success">목록</a>
                            </div>
                            <div class="col-lg-6 text-right">
                                <?php if ( $board_data['list'][0]->ins_user == $this->session->userdata('MEMBER')['member_id'] ) { ?>
                                <a href="/front/mypage/modify/gongsabi/<?php echo $board_data['list'][0]->board_seq; ?>?ismypage=0" class="btn btn-success">수정</a>
                                <a href="#" class="btn btn-success" onclick="board_delete('gongsabi', '<?php echo $board_data['list'][0]->board_seq; ?>');">삭제</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>