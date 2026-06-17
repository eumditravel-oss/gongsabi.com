
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">업무 제휴</h2>
                        <p>
                            공사비닷컴과의 업무제휴를 환영합니다.<br>
                            아래 사항을 입력하여 보내주시면 담당자가 확인 후 연락드리겠습니다.
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
                            <h4>업무 제휴</h4>
                        </div>
                        <form action="/front/customer/contact_regist_proc" method="post" class="classy-form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_name">이름 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_name" name="board_name" placeholder="이름" value="<?php echo $this->session->userdata('MEMBER')['member_name']; ?>" required="true">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="board_company">회사 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_company" name="board_company" placeholder="회사" value="<?php echo $this->session->userdata('MEMBER')['member_company']; ?>" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_hp">휴대폰번호 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_hp" name="board_hp" placeholder="휴대폰번호" value="<?php echo $this->session->userdata('MEMBER')['member_hp']; ?>" required="true">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="board_email">이메일주소 <small class="text-danger">* 필수</small></label>
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
                                <div class="col-md-12 mb-3">
                                    <label for="board_content">요청사항 <small class="text-danger">* 필수</small></label>
                                    <textarea class="form-control" id="board_content" name="board_content" cols="30" rows="10" placeholder="요청사항을 자세히 입력해 주세요." required="true"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_attach_1">첨부파일 1</label>
                                    <input type="file" class="form-control" id="board_attach_1" name="board_attach_1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_attach_2">첨부파일 2</label>
                                    <input type="file" class="form-control" id="board_attach_2" name="board_attach_2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_attach_3">첨부파일 3</label>
                                    <input type="file" class="form-control" id="board_attach_3" name="board_attach_3">
                                </div>
                            </div>
                            <small class="text-danger">※ 첨부파일은 10MB 이하로 첨부해주세요. (첨부 가능한 파일 형식 : doc, docx, jpg, pdf 등)</small>
                            <div class="row m-top-15">
                                <div class="col-lg-12 text-right">
                                    <button type="button" class="btn btn-success" onclick="contact_regist(this);">등록하기</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>