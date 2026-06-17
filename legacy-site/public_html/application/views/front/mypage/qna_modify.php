
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Q&A</h2>
                        <p>
                            공사비 닷컴의 회원이시면 로그인 후 편리하게 사용 가능합니다.<br>
                            회원님이 보내주신 문의에 대한 답변 내용은 <b>[마이페이지] - [Q&A]</b>에서 확인하실 수 있습니다. 
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
                            <h4>Q&amp;A 글 수정</h4>
                        </div>

                        <form action="/front/mypage/modify_proc/qna" method="post" class="classy-form">
                            <input type="hidden" name="board_seq" value="<?php echo $board_data['list'][0]->board_seq; ?>">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_name">이름 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_name" name="board_name" placeholder="이름" value="<?php echo $board_data['list'][0]->board_name; ?>" required="true">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="board_company">회사명</label>
                                    <input type="text" class="form-control" id="board_company" name="board_company" placeholder="회사명" value="<?php echo $board_data['list'][0]->board_company; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_email">이메일 <small class="text-danger">* 필수</small></label>
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
                                <div class="col-md-6 mb-3">
                                    <label for="board_phone">연락처 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_phone" name="board_phone" placeholder="연락처" value="<?php echo $board_data['list'][0]->board_phone; ?>" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_title">제목 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_title" name="board_title" placeholder="제목" value="<?php echo $board_data['list'][0]->board_title; ?>" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="board_content">내용 <small class="text-danger">* 필수</small></label>
                                    <textarea class="form-control" id="board_content" name="board_content" cols="30" rows="10" placeholder="내용을 자세히 입력해 주세요." required="true"><?php echo $board_data['list'][0]->board_content; ?></textarea>
                                </div>
                            </div>
                            <div class="row m-top-15">
                                <div class="col-lg-6">
                                    <?php if ( !$this->input->get('ismypage') ) { ?>
                                    <a href="/front/customer/qna_view/<?php echo $board_data['list'][0]->board_seq; ?>" class="btn btn-outline-success">취소</a>
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