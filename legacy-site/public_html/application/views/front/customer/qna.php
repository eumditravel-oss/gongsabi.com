
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Q&A</h2>
                        <p>
                            공사비 닷컴의 회원이시면 로그인 후 편리하게 사용 가능합니다.<br>
                            <a href="/front/customer/faq"><span class="mfc fb">[자주 묻는 질문]</span></a>을 확인하시면 더욱 빨리 긍금증을 해결할 수 있습니다.<br>
                            회원님이 보내주신 문의에 대한 답변 내용은 <a href="/front/mypage/customer/qna"><span class="mfc fb">[마이페이지] - [Q&A]</span></a>에서 확인하실 수 있습니다.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are">
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
                                    <label for="board_phone">연락처 <small class="text-danger">* 필수</small></label>
                                    <input type="text" class="form-control" id="board_phone" name="board_phone" placeholder="연락처" value="<?php echo $this->session->userdata('MEMBER')['member_hp']; ?>" required="true">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="board_email">이메일</label>
                                    <input type="text" class="form-control" id="board_email" name="board_email" placeholder="이메일" value="<?php echo $this->session->userdata('MEMBER')['member_id']; ?>">
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
                                <div class="col-lg-12 text-right">
                                    <button type="button" class="btn btn-success" onclick="qna_regist(this);">글 등록</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>총 <?php echo number_format($board_count); ?>건</h4>
                        </div>
                        <div class="row m-bottom-15">
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-6 text-right">
                            </div>
                        </div>
                        <?php if ( !$this->agent->is_mobile() ) { ?>
                        <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                            <colgroup>
                                <col width="10%">
                                <col width="*">
                                <col width="15%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                                <tr class="bg-gray">
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>이름</th>
                                    <th>등록일</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $board_list as $board ) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $board->rownum; ?></td>
                                    <?php if ( $board->ins_user == $this->session->userdata('MEMBER')['member_id'] ) { ?>
                                    <td class="text-left"><a href="/front/customer/qna_view/<?php echo $board->board_seq; ?>?keyword=<?php echo $condition['keyword']; ?>"><?php echo $board->board_title; ?></a></td>
                                    <?php } else { ?>
                                    <td class="text-left"><a href="#" onclick="not_access();"><?php echo $board->board_title; ?></a></td>
                                    <?php } ?>
                                    <td class="text-center"><?php echo HP_ENC_TEXT($board->board_name, ( $board->ins_user == $this->session->userdata('MEMBER')['member_id'] ) ? false : true); ?></td>
                                    <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } else { ?>
                            <?php foreach ( $board_list as $board ) { ?>
                            <div class="card mb-2">
                                <div class="card-body py-1">
                                    <div class="clearfix mb-2">
                                        <p class="float-left text-muted mb-0 fsxs"><i class="fa fa-user" aria-hidden="true"></i> <?php echo HP_ENC_TEXT($board->board_name, ( $board->ins_user == $this->session->userdata('MEMBER')['member_id'] ) ? false : true); ?></h6>
                                        <p class="float-right text-muted mb-0 fsxs"><?php echo substr($board->ins_datetime, 0, 10); ?></p>
                                    </div>
                                    <?php if ( $board->ins_user == $this->session->userdata('MEMBER')['member_id'] ) { ?>
                                    <h5 class="card-title"><a href="/front/customer/notice_view/<?php echo $board->board_seq; ?>?keyword=<?php echo $condition['keyword']; ?>"><?php echo $board->board_title; ?></a></h5>
                                    <?php } else { ?>
                                    <h5 class="card-title"><a href="#" onclick="not_access();"><?php echo $board->board_title; ?></a></h5>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } ?>
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