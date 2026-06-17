
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">자료실</h2>
                        <p>
                            공사비 닷컴의 회원이시면 로그인 후 편리하게 사용 가능합니다.<br>
                            공사비와 관련한 다양하고 유용한 정보를 제공합니다.
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
                            <div class="col-12 col-md-9 m-xs-top-15">
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
                                <col width="10%">
                            </colgroup>
                            <thead>
                                <tr class="bg-gray">
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>등록일</th>
                                    <th>첨부파일</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $board_list as $board ) { ?>
                                <?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $board->rownum; ?></td>
                                    <td class="text-left"><a href="/front/customer/pds_view/<?php echo $board->board_seq; ?>?keyword=<?php echo $condition['keyword']; ?>"><?php echo $board->board_title; ?></a></td>
                                    <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                    <td class="text-center">
                                        <?php if ( $board->board_attach_1 || $board->board_attach_2 || $board->board_attach_3 ) { ?>
                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } else { ?>
                                <tr>
                                    <td class="text-center"><?php echo $board->rownum; ?></td>
                                    <td class="text-left"><a href="#" onclick="login_required();"><?php echo $board->board_title; ?></a></td>
                                    <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                    <td class="text-center">
                                        <?php if ( $board->board_attach_1 || $board->board_attach_2 || $board->board_attach_3 ) { ?>
                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } else { ?>
                            <?php foreach ( $board_list as $board ) { ?>
                            <?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>
                            <div class="card mb-2">
                                <div class="card-body py-1">
                                    <div class="clearfix mb-2">
                                        <p class="float-right text-muted mb-0 fsxs"><?php echo substr($board->ins_datetime, 0, 10); ?></p>
                                    </div>
                                    <h5 class="card-title"><a href="/front/customer/notice_view/<?php echo $board->board_seq; ?>?keyword=<?php echo $condition['keyword']; ?>"><?php echo $board->board_title; ?></a></h5>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="clearfix mb-2">
                                        <p class="float-right text-muted mb-0 fsxs"><?php echo substr($board->ins_datetime, 0, 10); ?></p>
                                    </div>
                                    <h5 class="card-title"><a href="#" onclick="login_required();"><?php echo $board->board_title; ?></a></h5>
                                </div>
                            </div>
                            <?php } ?>
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