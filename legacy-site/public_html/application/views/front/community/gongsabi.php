
	<div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">공사비 작성 의뢰</h2>
                        <p>
                            개산 및 정미견적, 현장 물량 검증 용역, 설계변경, 감정 및 건설 클레임 등에 관해<br>
                            궁금하신 내용을 의뢰할 수 있습니다.<br>
                            <span class="mfc fb">회원가입 없이</span> 간편하게 상담 신청을 할 수 있습니다.<br>
                            의뢰하신 내용의 답변은 문자 혹은 이메일로 안내드리며,<br>
                            로그인 후 의뢰시 <a href="/front/mypage/community/gongsabi"><span class="mfc fb">[마이페이지]-[공사비 작성 의뢰]</span></a>에서 추가로 확인할 수 있습니다.
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
                                <select class="form-control" name="board_category" id="board_category">
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
                            <div class="col-md-12 mb-3">
                                <label for="board_content">요청사항 <small class="text-danger">* 필수</small></label>
                                <textarea class="form-control" name="board_content" id="board_content" rows="15" placeholder="요청사항을 자세히 입력해 주세요."></textarea>
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
                            ※ 첨부파일은 10MB 이하로 첨부해주세요. (첨부 가능한 파일 형식 : doc, docx, jpg, pdf, xls, xlsx 등)<br>
                            ※ 대용량 파일을 첨부해야 할 경우 이메일(cs@gongsabi.com)로 보내주시기 바랍니다. 
                        </small>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="button" class="btn btn-success" onclick="gongsabi_regist(this);">등록하기</button>
                            </div>
                        </div>

                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search_wrapper">
                    <form method="get" class="">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group down_arrow">
                                    <div class="dropdown">
                                        <div class="dropdown-title">
                                            <?php echo ( $condition['board_category'] == '' ) ? '전체' : ''; ?>
                                            <?php foreach ($this->config->item('GONGSABI_REQUEST_LIST') as $key => $gongsabi) { ?>
                                            <?php echo ( $condition['board_category'] == $key ) ? $gongsabi : ''; ?>
                                            <?php } ?>
                                        </div>

                                        <div class="custom-dropdown-menu">
                                            <div class="dropdown-menu-option" data-value="">전체</div>
                                            <?php foreach ($this->config->item('GONGSABI_REQUEST_LIST') as $key => $gongsabi) { ?>
                                            <div class="dropdown-menu-option" data-value="<?php echo $key; ?>"><?php echo $gongsabi; ?></div>
                                            <?php } ?>
                                        </div>

                                        <input type="hidden" name="board_category" value="<?php echo $condition['board_category']; ?>" class="dropdown-select">
                                    </div>
                                    <!-- <select name="board_category" id="board_category" class="form-control select-align-center">
                                        <option value="" selected="true">= 전체 =</option>
                                        <?php foreach ($this->config->item('GONGSABI_REQUEST_LIST') as $key => $gongsabi) { ?>
                                            <option value="<?php echo $key; ?>"<?php if ( $key == $condition['board_category'] ) { ?> selected="true"<?php } ?>><?php echo $gongsabi; ?></option>
                                        <?php } ?>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-6 m-xs-top-15">
                                <div class="form-group">
                                    <input type="text" name="keyword" id="keyword" value="<?php echo $condition['keyword']; ?>" class="form-control" placeholder="검색어를 입력해 주십시오.">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <button type="submit" class="btn btn-block btn-default">검색</button>
                            </div>
                        </div>
                    </form>
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
                            <h4>총 <?php echo number_format($board_data['count']); ?>건</h4>
                        </div>
                        <div class="row m-bottom-15">
                        	<div class="col-lg-6">
							</div>
                        	<div class="col-lg-6 text-right">
                        	</div>
                        </div>
                        <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                        	<colgroup>
                        		<col width="7%">
                                <col width="*">
                                <col width="15%">
                                <col width="15%">
                        		<col width="10%">
                                <col width="10%">
                        	</colgroup>
							<thead>
								<tr class="bg-gray">
									<th>번호</th>
                                    <th>작업 범위</th>
									<th>회사</th>
                                    <th>이름</th>
									<th>등록일</th>
                                    <th>첨부파일</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ( $board_data['list'] as $board ) { ?>
								<tr>
									<td class="text-center"><?php echo $board->rownum; ?></td>

                                    <?php if ( $this->session->userdata('MEMBER_SESSION') && $board->ins_user == $this->session->userdata('MEMBER')['member_id'] ) { ?>

                                    <td class="text-center"><a href="/front/community/gongsabi_view/<?php echo $board->board_seq; ?>"><?php echo $this->config->item('GONGSABI_REQUEST_LIST')[$board->board_category]; ?></a></td>
                                    <td class="text-center"><a href="/front/community/gongsabi_view/<?php echo $board->board_seq; ?>"><?php echo $board->board_company; ?></a></td>
                                    <td class="text-center"><a href="/front/community/gongsabi_view/<?php echo $board->board_seq; ?>"><?php echo $board->board_name; ?></a></td>

                                    <?php } else { ?>

                                    <td class="text-center"><a href="#" onclick="not_access();"><?php echo $this->config->item('GONGSABI_REQUEST_LIST')[$board->board_category]; ?></a></td>
                                    <td class="text-center"><a href="#" onclick="not_access();"><?php echo HP_ENC_TEXT($board->board_company); ?></a></td>
                                    <td class="text-center"><a href="#" onclick="not_access();"><?php echo HP_ENC_TEXT($board->board_name); ?></a></td>

                                    <?php } ?>

									<td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                    <td class="text-center">
                                        <?php if ( $board->board_attach_1 || $board->board_attach_2 || $board->board_attach_3 ) { ?>
                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                        <?php } ?>
                                    </td>
								</tr>
                                <?php } ?>
							</tbody>
                        </table>
                        <div class="row m-top-15">
                            <div class="col-lg-12">
                                <nav>
                                    <?php echo $pagination; ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>