
	<section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are m-top-100">

                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>강의 신청 등록</h4>
                        </div>

                        <table class="table table-bordered classy-table gongsabi-table lecture-list-table m-bottom-30">
                        <colgroup>
                            <col width="*">
                            <col width="15%">
                            <col width="*">
                        </colgroup>
                        <thead>
                            <tr class="bg-gray">
                                <th>교육 제목</th>
                                <th>교육 시간</th>
                                <th>교육 내용</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->config->item('LECTURE_LIST') as $key => $lecture) { ?>
                            <tr>
                                <td class=""><?php echo $lecture['title']; ?></td>
                                <td class="text-center"><?php echo $lecture['time']; ?></td>
                                <td class=""><?php echo $lecture['desc']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        </table>

                        <hr>

                        <form action="/front/education/lecture_regist_proc" method="post" class="classy-form">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_category">교육 과정 <small class="text-danger">* 필수</small></label>
                                    <select class="custom-select d-block w-100" name="board_category" id="board_category">
                                    <?php foreach ($this->config->item('LECTURE_LIST') as $key => $lecture) { ?>
                                        <option value="<?php echo $key; ?>"<?php if ( $key == '1' ) { ?> selected="true"<?php } ?>><?php echo $lecture['title']; ?> (<?php echo $lecture['time']; ?>)</option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_etc_1">교육 날짜 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" name="board_etc_1" id="board_etc_1" placeholder="교육 날짜" value="" maxlength="10" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="board_etc_2">참석인원 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" name="board_etc_2" id="board_etc_2" placeholder="참석인원" value="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_company">회사 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" name="board_company" id="board_company" placeholder="회사" value="<?php echo $this->session->userdata('MEMBER')['member_company']; ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="board_name">이름 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" name="board_name" id="board_name" placeholder="이름" value="<?php echo $this->session->userdata('MEMBER')['member_name']; ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_hp">휴대폰번호 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control handle-cell-phone" name="board_hp" id="board_hp" placeholder="휴대폰번호" value="<?php echo $this->session->userdata('MEMBER')['member_hp']; ?>" maxlength="13" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="board_email">이메일주소 <small class="text-danger">* 필수</small></label>
                                    <input type="email" class="form-control" name="board_email" id="board_email" placeholder="이메일주소" value="<?php echo $this->session->userdata('MEMBER')['member_id']; ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="board_content">요청사항 <small class="text-danger">* 필수</small></label>
                                    <textarea class="form-control" name="board_content" id="board_content" cols="30" rows="10" placeholder="요청사항을 자세히 입력해 주세요."></textarea>
                                </div>
                            </div>
                            <div class="row m-top-15">
                                <div class="col-lg-6">
                                    <!-- <a href="/front/education/lecture" class="btn btn-outline-success">취소</a> -->
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button type="submit" class="btn btn-success">등록하기</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>