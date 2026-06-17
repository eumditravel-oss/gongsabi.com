
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">자주 묻는 질문</h2>
                        <p>
                            어떤 내용이 궁금하신가요?<br>
                            아래의 내용을 확인하시면 궁금하신 내용을 보다 빠르게 해결하실 수 있습니다.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="faq_category_wrapper">
        <ul class="faq_category_list">
            <li class="<?php echo ( $condition['board_category'] == '' ) ? 'on' : ''; ?>"><a href="/front/customer/faq">전체</a></li>
            <?php foreach ($this->config->item('FAQ_CATEGORY') as $key => $category) { ?>
            <li class="<?php echo ( $condition['board_category'] == $key ) ? 'on' : ''; ?>"><a href="/front/customer/faq?board_category=<?php echo $key; ?>"><?php echo $category['name']; ?></a></li>
            <?php } ?>
        </ul>
    </div>

    <section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30 p-bottom-15">
                            <div class="row">
                                <div class="col-lg-4 p-top-30">
                                    <h4>총 <?php echo number_format($board_count); ?>건</h4>
                                </div>
                                <div class="col-lg-8">
                                    <div class="search_wrapper sm">
                                        <form method="get" class="">
                                            <div class="row">
                                                <div class="col-12 col-md-4 m-xs-top-15">
                                                    <div class="form-group down_arrow">
                                                        <div class="dropdown">
                                                            <div class="dropdown-title">
                                                            <?php foreach ($this->config->item('FAQ_CATEGORY') as $key => $faq) { ?>
                                                                <?php echo ( $condition['board_category'] == $key ) ? $faq['name'] : ''; ?>
                                                            <?php } ?>
                                                                <?php echo ( $condition['board_category'] == '' ) ? '전체' : ''; ?>
                                                            </div>
                                                            <div class="custom-dropdown-menu">
                                                                <div class="dropdown-menu-option" data-value="">전체</div>
                                                            <?php foreach ($this->config->item('FAQ_CATEGORY') as $key => $faq) { ?>
                                                                <div class="dropdown-menu-option" data-value="<?php echo $key; ?>"><?php echo $faq['name']; ?></div>
                                                            <?php } ?>
                                                            </div>

                                                            <input type="hidden" name="board_category" value="<?php echo $condition['board_category']; ?>" class="dropdown-select">
                                                        </div>
                                                        <!-- <select name="board_category" id="board_category" class="form-control">
                                                            <option value="">전체</option>
                                                        <?php foreach ($this->config->item('FAQ_CATEGORY') as $key => $faq) { ?>
                                                            <option value="<?php echo $key; ?>"<?php if ( $condition['board_category'] == $key ) { ?> selected="true"<?php } ?>><?php echo $faq['name']; ?></option>
                                                        <?php } ?>
                                                        </select> -->
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 m-xs-top-15">
                                                    <div class="form-group">
                                                        <input type="text" name="keyword" id="keyword" value="<?php echo $condition['keyword']; ?>" class="form-control" placeholder="검색어를 입력해 주십시오.">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-2 m-xs-top-15">
                                                    <button type="submit" class="btn btn-block btn-default">검색</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                                <col width="15%">
                                <col width="*">
                            </colgroup>
                            <thead>
                                <tr class="bg-gray">
                                    <th>번호</th>
                                    <th>구분</th>
                                    <th>제목</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $board_list as $board ) { ?>
                                <tr class="question">
                                    <td class="text-center"><?php echo $board->rownum; ?></td>
                                    <td class="text-center"><?php echo $this->config->item('FAQ_CATEGORY')[$board->board_category]['name']; ?></td>
                                    <!-- <td class="text-left"><a href="/front/customer/faq_view/<?php echo $board->board_seq; ?>?keyword=<?php echo $condition['keyword']; ?>"><?php echo $board->board_title; ?></a></td> -->
                                    <td class="text-left title"><a href="#" onclick="view_answer(this);"><?php echo $board->board_title; ?></a></td>
                                </tr>
                                <tr class="answer">
                                    <td></td>
                                    <td></td>
                                    <td class="text-left">
                                        <?php echo nl2br($board->board_reply_content); ?><br>
                                        <hr>
                                        원하는 답변을 얻지 못하셨나요? [<a href="/front/customer/qna">Q&A</a>]를 이용해주세요.                                        
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } else { ?>
                            <?php foreach ( $board_list as $board ) { ?>
                            <div class="card mb-2">
                                <div class="card-body py-1">
                                    <div class="clearfix mb-2">
                                        <p class="float-left text-muted mb-0 fsxs"><i class="fa fa-tag" aria-hidden="true"></i> <?php echo $this->config->item('FAQ_CATEGORY')[$board->board_category]['name']; ?></h6>
                                        <p class="float-right text-muted mb-0 fsxs"><?php echo substr($board->ins_datetime, 0, 10); ?></p>
                                    </div>
                                    <h5 class="card-title"><a href="/front/customer/notice_view/<?php echo $board->board_seq; ?>?keyword=<?php echo $condition['keyword']; ?>"><?php echo $board->board_title; ?></a></h5>
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