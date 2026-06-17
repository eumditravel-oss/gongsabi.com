
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">구인 / 구직</h2>
                        <p>
                            건설 산업의 인재와 회사를 이어주는 구인 / 구직 장터입니다.<br><br>
                            <small>* 본 게시판을 통한 모든 구인, 구직의 책임은 구매자와 판매자에게 있으며, 공사비닷컴에서는 일체의 법적 책임을 지지 않습니다.</small><br>
                            <small>* 각 게시물은 관리자 확인 후, 해당내용과 관련없는 게시물은 삭제될 수 있습니다.</small>
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
                            <thead>
                            <tbody>
                                <tr>
                                    <th class="text-center bg-gray">구분</th>
                                    <td class="text-left"><?php echo $this->config->item('RECRUIT_TYPE')[$board_data['list'][0]->board_category]; ?></td>
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
                                    <th class="text-center bg-gray">제목</th>
                                    <td class="text-left" colspan="3">
                                        <?php echo $board_data['list'][0]->board_title; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">내용</th>
                                    <td class="text-left" colspan="3">
                                        <?php echo nl2br($board_data['list'][0]->board_content); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center bg-gray">첨부파일</th>
                                    <td class="text-left" colspan="3">                                           
                                        <?php if ( $board_data['list'][0]->board_attach_1 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('recruit', $board_data['list'][0]->board_seq, '1'); ?></p>
                                        <?php } ?>                                     
                                        <?php if ( $board_data['list'][0]->board_attach_2 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('recruit', $board_data['list'][0]->board_seq, '2'); ?></p>
                                        <?php } ?>                                     
                                        <?php if ( $board_data['list'][0]->board_attach_3 ) { ?>
                                        <p class="mb-0 my-2"><?php echo HP_GET_FILE('recruit', $board_data['list'][0]->board_seq, '3'); ?></p>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                                <a href="/front/community/recruit" class="btn btn-outline-success">목록</a>
                            </div>
                            <div class="col-lg-6 text-right">
                                <?php if ( $board_data['list'][0]->ins_user == $this->session->userdata('MEMBER')['member_id'] ) { ?>
                                <a href="/front/mypage/modify/recruit/<?php echo $board_data['list'][0]->board_seq; ?>?ismypage=0" class="btn btn-success">수정</a>
                                <a href="#" class="btn btn-success" onclick="board_delete('recruit', '<?php echo $board_data['list'][0]->board_seq; ?>');">삭제</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>