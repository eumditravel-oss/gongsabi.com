    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">공사비 작성 의뢰</h2>
                        <p>
                            개산 및 정미견적, 현장 물량 검증 용역, 설계변경, 감정 및 건설 클레임 등에 관해<br>
                            궁금하신 내용을 의뢰할 수 있습니다.<br>
                            회원가입 없이 간편하게 상담 신청을 할 수 있습니다.<br>
                            담당자가 확인 후 문자메세지로 답변완료를 안내드리며, 답변내용은 신청하신 이메일 또는 마이페이지의 [신청내역]에서 확인 가능합니다.
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
                            <h4>공사비 작성 의뢰 글 수정</h4>
                        </div>

                        <form action="/front/mypage/modify_proc/gongsabi" method="post" class="classy-form" enctype="multipart/form-data">
                            <input type="hidden" name="board_seq" value="<?php echo $board_data['list'][0]->board_seq; ?>">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_category">작업 범위</label>
                                    <select class="custom-select d-block w-100" name="board_category" id="board_category">
                                    <?php foreach ($this->config->item('GONGSABI_REQUEST_LIST') as $key => $gongsabi) { ?>
                                        <option value="<?php echo $key; ?>"<?php if ( $key == $board_data['list'][0]->board_category ) { ?> selected="true"<?php } ?>><?php echo $gongsabi; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_name">이름 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" name="board_name" id="board_name" placeholder="이름" value="<?php echo $board_data['list'][0]->board_name; ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="board_company">회사 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" name="board_company" id="board_company" placeholder="회사" value="<?php echo $board_data['list'][0]->board_company; ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_hp">휴대폰번호 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control handle-cell-phone" name="board_hp" id="board_hp" placeholder="휴대폰번호" value="<?php echo $board_data['list'][0]->board_hp; ?>" maxlength="13" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="board_email">이메일주소 <small class="text-danger">* 필수</small></label>
                                    <div class="form-email">
                                        <input type="hidden" name="board_email" value="<?php echo $board_data['list'][0]->board_email; ?>">
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
                                    <label for="board_content">요청사항 <small class="text-danger">* 필수</small></label>
                                    <textarea class="form-control" name="board_content" id="board_content" rows="15" placeholder="요청사항을 자세히 입력해 주세요."><?php echo $board_data['list'][0]->board_content; ?></textarea>
                                </div>
                            </div>
                            <div class="row m-top-15">
                                <div class="col-lg-6">
                                    <?php if ( !$this->input->get('ismypage') ) { ?>
                                    <a href="/front/community/gongsabi_view/<?php echo $board_data['list'][0]->board_seq; ?>" class="btn btn-outline-success">취소</a>
                                    <?php } else { ?>
                                    <a href="/front/mypage/request" class="btn btn-outline-success">취소</a>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button type="submit" class="btn btn-success">수정하기</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>