
    <section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are">
                        <table class="table classy-table table-bordered table-responsive gongsabi-table">
                            <colgroup>
                                <col width="20%">
                                <col width="*">
                                <col width="20%">
                                <col width="*">
                            </colgroup>
                            <thead>
                            <tbody>
                                <tr>
                                    <th class="text-center">등록일</th>
                                    <td class="text-left"><?php echo $board_data['list'][0]->ins_datetime; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center">책</th>
                                    <td class="text-left"><?php echo HP_GET_LECTURE_TEXT($board_data['list'][0]->board_category); ?></td>
                                    <th class="text-center">수량</th>
                                    <td class="text-left"><?php echo $board_data['list'][0]->ins_datetime; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center">회사</th>
                                    <td class="text-left"><?php echo mb_substr($board_data['list'][0]->board_company, '0', -2) . "**"; ?></td>
                                    <th class="text-center">이름</th>
                                    <td class="text-left"><?php echo HP_ENC_TEXT($board_data['list'][0]->board_name); ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center">휴대폰번호</th>
                                    <td class="text-left"><?php echo $board_data['list'][0]->board_etc_2; ?></td>
                                    <th class="text-center">이메일주소</th>
                                    <td class="text-left"><?php echo $board_data['list'][0]->board_etc_2; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center">배송주소</th>
                                    <td class="text-left" colspan="3">
                                        <?php echo nl2br($board_data['list'][0]->board_content); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center">요청사항</th>
                                    <td class="text-left" colspan="3">
                                        <?php echo nl2br($board_data['list'][0]->board_content); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table classy-table table-bordered table-responsive gongsabi-table">
                            <colgroup>
                                <col width="20%">
                                <col width="*">
                                <col width="20%">
                                <col width="*">
                            </colgroup>
                            <thead>
                            <tbody>
                                <tr>
                                    <th class="text-center">결제일</th>
                                    <td class="text-left"><?php echo $board_data['list'][0]->ins_datetime; ?></td>
                                    <th class="text-center">주문번호</th>
                                    <td class="text-left"><?php echo $board_data['list'][0]->ins_datetime; ?></td>
                                </tr>
                                <tr>
                                    <th class="text-center">결제수단</th>
                                    <td class="text-left"><?php echo HP_GET_LECTURE_TEXT($board_data['list'][0]->board_category); ?></td>
                                    <th class="text-center">결제금액</th>
                                    <td class="text-left"><?php echo mb_substr($board_data['list'][0]->board_company, '0', -2) . "**"; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                                <a href="/front/education/lecture" class="btn btn-outline-success">목록</a>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="/front/education/lecture_regist" class="btn btn-success">강의 요청</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>