
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">공사비 교육</h2>
                        <p>                            
                            공사비에 대한 기초부터 건축 적산(수량산출) 및 내역서 작성 실습항목의 이해 및 설계변경에 대해 심도있게 배울 수 있습니다.<br>
                            궁금하거나 필요하신 교육내용을 요청하시면 자유강의도 가능합니다.<br>
                            강의 장소 및 강의료 상담은 02.2202.2258로 문의주시기 바랍니다.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shortcodes_content_area p-top-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <ul class="nav nav-tabs" id="tab1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab1-1-tab" data-toggle="tab" href="#tab1-1" role="tab" aria-controls="tab1-1" aria-selected="true">강의 주제</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab1-2-tab" data-toggle="tab" href="#tab1-2" role="tab" aria-controls="tab1-2" aria-selected="false">강의 신청</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab1-3-tab" data-toggle="tab" href="#tab1-3" role="tab" aria-controls="tab1-3" aria-selected="false">강사 소개</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <!-- <table class="table table-bordered classy-table gongsabi-table lecture-list-table m-top-30 m-bottom-30">
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
                                </table> -->
                                <img src="/static/data/lecture_table/lecture_table.jpg">
                            </div>
                            <div class="tab-pane fade p-15" id="tab1-2" role="tabpanel" aria-labelledby="tab1-2-tab">
                                <form action="/front/education/lecture_regist_proc" method="post" class="m-top-30 classy-form">
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
                                            <input type="text" class="form-control air-datepicker" name="board_etc_1" id="board_etc_1" placeholder="교육 날짜" value="" maxlength="10" required autocomplete="off">
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
                                            <label for="board_email">이메일주소</label>
                                            <div class="form-email">
                                                <input type="hidden" name="board_email" value="<?php echo $this->session->userdata('MEMBER')['member_id']; ?>">
                                                <span class="email-part"><input type="text" class="form-control" name="email_id"></span>
                                                <span class="email-at">@</span>
                                                <span class="email-part pr-1"><input type="text" class="form-control" name="email_address"></span>
                                                <span class="email-part">
                                                    <select name="email_address_list" class="form-control">
                                                        <option value="">직접입력</option>
                                                        <option value="gmail.com">gmail.com</option>
                                                        <option value="naver.com">naver.com</option>
                                                        <option value="daum.net">daum.net</option>
                                                        <option value="nate.com">nate.com</option>
                                                    </select>
                                                </span>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="board_content">요청사항</label>
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
                            <div class="tab-pane fade p-15" id="tab1-3" role="tabpanel" aria-labelledby="tab1-3-tab">
                                <p class="mt-3">총 <span class="mfc fb"><?php echo count($teacher_list); ?></span>명의 강사가 있습니다.</p>
                                <ul class="teacher_list">
                                <?php foreach ($teacher_list as $teacher) { ?>
                                    <li>
                                        <div class="teacher_info_wrapper">
                                            <div class="teacher_image"><img src="/static/data/teacher/<?php echo $teacher->teacher_photo; ?>"></div>
                                            <div class="teacher_info">
                                                <p class="teacher_name"><?php echo $teacher->teacher_name; ?></p>
                                                <div class="teacher_desc">
                                                    <?php echo nl2br($teacher->teacher_desc); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>