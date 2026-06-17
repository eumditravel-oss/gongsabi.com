
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
                                            <?php foreach ($this->config->item('RECRUIT_TYPE') as $key => $gongsabi) { ?>
                                            <?php echo ( $condition['board_category'] == $key ) ? $gongsabi : ''; ?>
                                            <?php } ?>
                                        </div>

                                        <div class="custom-dropdown-menu">
                                            <div class="dropdown-menu-option" data-value="">전체</div>
                                            <?php foreach ($this->config->item('RECRUIT_TYPE') as $key => $gongsabi) { ?>
                                            <div class="dropdown-menu-option" data-value="<?php echo $key; ?>"><?php echo $gongsabi; ?></div>
                                            <?php } ?>
                                        </div>

                                        <input type="hidden" name="board_category" value="<?php echo $condition['board_category']; ?>" class="dropdown-select">
                                    </div>
                                    <!-- <select name="board_category" id="board_category" class="form-control select-align-center">
                                        <option value="" selected="true">= 전체 =</option>
                                        <option value="person"<?php echo ( $condition['board_category'] == 'person' ) ? ' selected="true"' : ''; ?>>구인</option>
                                        <option value="job"<?php echo ( $condition['board_category'] == 'job' ) ? ' selected="true"' : ''; ?>>구직</option>
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
                                <col width="10%">
                                <col width="*">
                                <col width="15%">
                                <col width="15%">
                                <col width="10%">
                                <col width="10%">
                            </colgroup>
                            <thead>
                                <tr class="bg-gray">
                                    <th>번호</th>
                                    <th>구분</th>
                                    <th>제목</th>
                                    <th>회사</th>
                                    <th>등록자</th>
                                    <th>등록일</th>
                                    <th>첨부파일</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $board_data['list'] as $board ) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $board->rownum; ?></td>
                                    <td class="text-center"><a href="/front/community/recruit_view/<?php echo $board->board_seq; ?>"><?php echo $this->config->item('RECRUIT_TYPE')[$board->board_category]; ?></a></td>
                                    <td class="text-center"><a href="/front/community/recruit_view/<?php echo $board->board_seq; ?>"><?php echo $board->board_title; ?></a></td>
                                    <td class="text-center"><a href="/front/community/recruit_view/<?php echo $board->board_seq; ?>"><?php echo HP_ENC_TEXT($board->board_company, !$this->session->userdata('MEMBER_SESSION')); ?></a></td>
                                    <td class="text-center"><a href="/front/community/recruit_view/<?php echo $board->board_seq; ?>"><?php echo HP_ENC_TEXT($board->board_name, !$this->session->userdata('MEMBER_SESSION')); ?></a></td>
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
                            <div class="col-lg-12 text-right">
                                <?php if ( $this->session->userdata('MEMBER_LEVEL') > 1 ) { ?>
                                <a href="/front/community/recruit_regist" class="btn btn-success">글 작성</a>
                                <?php } else { ?>
                                <a href="#" onclick="login_required();" class="btn btn-success">글 작성</a>
                                <?php } ?>
                            </div>
                        </div>
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