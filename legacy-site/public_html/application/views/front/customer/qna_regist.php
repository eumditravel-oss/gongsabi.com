
	<section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are m-top-100">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>Q&amp;A 글등록</h4>
                        </div>

                        <form action="/front/customer/qna_regist_proc" method="post" class="classy-form">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_name">이름 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_name" name="board_name" placeholder="이름" value="<?php echo $this->session->userdata('MEMBER')['member_name']; ?>" required="true">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="board_company">회사명</label>
                                    <input type="text" class="form-control" id="board_company" name="board_company" placeholder="회사명" value="<?php echo $this->session->userdata('MEMBER')['member_company']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_email">이메일 <small class="text-danger">* 필수</small></label>
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
                                <div class="col-md-6 mb-3">
                                    <label for="board_phone">연락처 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_phone" name="board_phone" placeholder="연락처" value="<?php echo $this->session->userdata('MEMBER')['member_hp']; ?>" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_title">제목 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_title" name="board_title" placeholder="제목" value="" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="board_content">내용 <small class="text-danger">* 필수</small></label>
                                    <textarea class="form-control" id="board_content" name="board_content" cols="30" rows="10" placeholder="내용을 자세히 입력해 주세요." required="true"></textarea>
                                </div>
                            </div>
                            <div class="row m-top-15">
                                <div class="col-lg-6">
                                    <a href="/front/customer/qna" class="btn btn-outline-success">취소</a>
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