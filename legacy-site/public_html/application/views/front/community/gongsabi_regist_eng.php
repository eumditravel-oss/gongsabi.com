
	<section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <form action="/front/community/gongsabi_regist_proc" method="post" class="classy-form" enctype="multipart/form-data">

                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>개인정보처리방침</h4>
                        </div>
                        <div class="termarea">
<pre style="white-space:pre-line;"><?php echo $privacy; ?></pre>
                        </div>
                        <div class="termcheck">
                            <label for="agree"><input type="checkbox" name="agree" id="agree" value="1">&nbsp;개인정보처리방침에 동의합니다.</label>
                        </div>
                    </div>

                    <div class="single_shortcodes_are m-top-50">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>공사비 작성 의뢰 등록</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="board_category">작업 범위</label>
                                <select class="custom-select d-block w-100" name="board_category" id="board_category">
                                <?php foreach ($this->config->item('GONGSABI_REQUEST_LIST') as $key => $gongsabi) { ?>
                                    <option value="<?php echo $key; ?>"<?php if ( $key == '1' ) { ?> selected="true"<?php } ?>><?php echo $gongsabi; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="board_name">이름 <small class="text-danger">* 필수</small></label>
                                <input type="text" class="form-control" name="board_name" id="board_name" placeholder="이름" value="<?php echo $this->session->userdata('MEMBER')['member_name']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="board_company">회사 <small class="text-danger">* 필수</small></label>
                                <input type="text" class="form-control" name="board_company" id="board_company" placeholder="회사" value="<?php echo $this->session->userdata('MEMBER')['member_company']; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="board_hp">휴대폰번호 <small class="text-danger">* 필수</small></label>
                                <input type="text" class="form-control handle-cell-phone" name="board_hp" id="board_hp" placeholder="휴대폰번호" value="<?php echo $this->session->userdata('MEMBER')['member_hp']; ?>" maxlength="13" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="board_email">이메일주소 <small class="text-danger">* 필수</small></label>
                                <div class="form-email">
                                    <input type="hidden" name="board_email" value="<?php echo $this->session->userdata('MEMBER')['member_id']; ?>">
                                    <span class="email-part"><input type="text" class="form-control" name="email_id" required></span>
                                    <span class="email-at">@</span>
                                    <span class="email-part pr-1"><input type="text" class="form-control" name="email_address" required></span>
                                    <span class="email-part">
                                        <select name="email_address_list" class="form-control" required>
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
                                <textarea class="form-control" name="board_content" id="board_content" rows="15" placeholder="요청사항을 자세히 입력해 주세요."></textarea>
                            </div>
                        </div>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                                <a href="/front/community/gongsabi" class="btn btn-outline-success">취소</a>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="button" class="btn btn-success btn-regist">등록하기</button>
                            </div>
                        </div>

                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
    $(function() {
        $('.btn-regist').on('click', function() {
            if ( $('#agree').length > 0 && !$('#agree').is(':checked') ) {
                alert('개인정보처리방침에 동의해야 합니다.');
                return false;
            }
            else {
                if ( confirm('등록 하시겠습니까 ?') )
                    $(this).closest('form').submit();   
                else
                    return false;
            }
        });
    });
    </script>