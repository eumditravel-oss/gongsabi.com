
    <div class="classy-hero-blocks hero-blocks-3 height-400 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">구인 / 구직</h2>
                        <p>
                            건설 산업의 인재와 회사를 이어주는 구인 / 구직 장터입니다.<br>
                            ㈜공사비닷컴은 고객님의 개인정보를 중요시하며,<br>
                            「정보통신망 이용촉진 및 정보보호에 관한 법률」을 준수하고 있습니다.<br>
                            로그인 후 모든 정보를 이용할 수 있습니다.<br><br>
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
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>구인 / 구직 글등록</h4>
                        </div>

                        <form action="/front/community/recruit_regist_proc" method="post" class="classy-form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_category">구분 <small class="text-danger">* 필수</small></label>
                                    <select class="custom-select d-block w-100" id="board_category" name="board_category">
                                        <option value="person" selected="true">구인</option>
                                        <option value="job">구직</option>
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
                                <div class="col-md-12 mb-3">
                                    <label for="board_title">제목 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_title" name="board_title" placeholder="제목" value="" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_content">내용 <small class="text-danger">* 필수</small></label>
                                    <textarea class="form-control" id="board_content" name="board_content" rows="15" placeholder="내용을 자세히 입력해 주세요." required="true"></textarea>
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
                            <small class="text-danger">
                                ※ 첨부파일은 10MB 이하로 첨부해주세요. (첨부 가능한 파일 형식 : doc, docx, jpg, pdf, xls, xlsx 등)
                            </small>
                            <div class="row m-top-15">
                                <div class="col-lg-6">
                                    <a href="/front/community/recruit" class="btn btn-outline-success">취소</a>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button type="button" class="btn btn-success" onclick="market_regist(this);">글 등록</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>