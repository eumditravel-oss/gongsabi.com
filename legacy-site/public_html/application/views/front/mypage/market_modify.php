    
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">현장 자재 거래</h2>
                        <p>
                            현장의 남는 건설 자재들을 거래하는 장터입니다.<br><br>
                            <small>* 본 게시판을 통한 모든 상거래 책임은 구매자와 판매자에게 있으며, 공사비닷컴에서는 일체의 법적 책임을 지지 않습니다.</small><br>
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
                            <h4>현장 자재 거래 글 수정</h4>
                        </div>

                        <form action="/front/mypage/modify_proc/market" method="post" class="classy-form" enctype="multipart/form-data">
                            <input type="hidden" name="board_seq" value="<?php echo $board_data['list'][0]->board_seq; ?>">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="board_category">구분 <small class="text-danger">* 필수</small></label>
                                    <select class="custom-select d-block w-100" id="board_category" name="board_category">
                                        <option value="buy"<?php if ( 'buy' == $board_data['list'][0]->board_category ) { ?> selected="true"<?php } ?>>삽니다</option>
                                        <option value="sell"<?php if ( 'sell' == $board_data['list'][0]->board_category ) { ?> selected="true"<?php } ?>>팝니다</option>
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
                                <div class="col-md-12 mb-3">
                                    <label for="board_title">제목 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_title" name="board_title" placeholder="제목" value="<?php echo $board_data['list'][0]->board_title; ?>" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_content">내용 <small class="text-danger">* 필수</small></label>
                                    <textarea class="form-control" id="board_content" name="board_content" rows="15" placeholder="내용을 자세히 입력해 주세요." required="true"><?php echo $board_data['list'][0]->board_content; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_attach_1">첨부파일 1</label>
                                    <input type="file" class="form-control" id="board_attach_1" name="board_attach_1">
                                    <?php if ( $board_data['list'][0]->board_attach_1 ) { ?>
                                    <p class="mb-0 my-2"><?php echo GET_FILE_LINK('market', $board_data['list'][0]->board_seq, 1); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_attach_2">첨부파일 2</label>
                                    <input type="file" class="form-control" id="board_attach_2" name="board_attach_2">
                                    <?php if ( $board_data['list'][0]->board_attach_2 ) { ?>
                                    <p class="mb-0 my-2"><?php echo GET_FILE_LINK('market', $board_data['list'][0]->board_seq, 2); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="board_attach_3">첨부파일 3</label>
                                    <input type="file" class="form-control" id="board_attach_3" name="board_attach_3">
                                    <?php if ( $board_data['list'][0]->board_attach_3 ) { ?>
                                    <p class="mb-0 my-2"><?php echo GET_FILE_LINK('market', $board_data['list'][0]->board_seq, 3); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row m-top-15">
                                <div class="col-lg-6">
                                    <?php if ( !$this->input->get('ismypage') ) { ?>
                                    <a href="/front/community/market_view/<?php echo $board_data['list'][0]->board_seq; ?>" class="btn btn-outline-success">취소</a>
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