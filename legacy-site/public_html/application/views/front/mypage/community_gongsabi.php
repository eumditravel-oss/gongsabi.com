    <section class="shortcodes_content_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <?php require 'mypage_left.php'; ?>
                </div>
                <div class="col-9">
                    <?php require 'mypage_top.php'; ?>

                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>건설 장터</h4>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="/front/mypage/community/market" role="tab">현장 자재 거래</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/front/mypage/community/recruit" role="tab">구인 / 구직</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/front/mypage/community/gongsabi" role="tab">공사비 작성 의뢰</a>
                            </li>
                        </ul>
                        <div class="tab-content gongsabi-tab">
                            <div class="tab-pane fade show active p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <div class="single_shortcodes_title m-bottom-15">
                                    <h4>총 <?php echo number_format($board_count); ?>건</h4>
                                </div>
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <colgroup>
                                        <col width="10%">
                                        <col width="*">
                                        <!-- <col width="15%"> -->
                                        <!-- <col width="15%"> -->
                                        <col width="15%">
                                        <col width="10%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th>번호</th>
                                            <th>작업 범위</th>
                                            <!-- <th>회사</th> -->
                                            <!-- <th>이름</th> -->
                                            <th>등록일</th>
                                            <th>삭제</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $board_list as $board ) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $board->rownum; ?></td>
                                            <td class=""><a href="/front/community/gongsabi_view/<?php echo $board->board_seq; ?>"><?php echo HP_GET_GONGSABI_REQUEST_TEXT($board->board_category); ?></a></td>
                                            <!-- <td class="text-center"><a href="/front/mypage/modify/gongsabi/<?php echo $board->board_seq; ?>"><?php echo $board->board_company; ?></a></td> -->
                                            <!-- <td class="text-center"><a href="/front/mypage/modify/gongsabi/<?php echo $board->board_seq; ?>"><?php echo $board->board_name; ?></a></td> -->
                                            <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                            <td class="text-center"><button type="button" class="btn btn-sm btn-outline-danger" onclick="board_delete('gongsabi', '<?php echo $board->board_seq; ?>', 'Y');">삭제</button></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="row m-top-15">
                                    <div class="col-lg-12 text-center">
                                        <nav>
                                            <?php echo $pagination; ?>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>