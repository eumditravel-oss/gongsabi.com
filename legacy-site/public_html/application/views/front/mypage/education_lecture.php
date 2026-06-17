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
                            <h4>공사비 교육</h4>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="/front/mypage/education/book" role="tab">교재 구매</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/front/mypage/education/lecture" role="tab">강의 신청</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/front/mypage/education/bookcs" role="tab">취소/교환/환불 신청</a>
                            </li>
                        </ul>
                        <div class="tab-content gongsabi-tab">
                            <div class="tab-pane fade show active p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <div class="single_shortcodes_title m-bottom-15">
                                    <h4>총 <?php echo number_format($board_count); ?>건</h4>
                                </div>
                                <div class="row m-bottom-15">
                                    <div class="col-lg-6">
                                        <nav>
                                            <?php echo $pagination; ?>
                                        </nav>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                    </div>
                                </div>
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <colgroup>
                                        <col width="7%">
                                        <col width="*">
                                        <col width="12%">
                                        <col width="10%">
                                        <col width="12%">
                                        <col width="15%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th>번호</th>
                                            <th>교육과정</th>
                                            <th>교육날짜</th>
                                            <th>참석인원</th>
                                            <th>등록일</th>
                                            <th>신청상태</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $board_list as $board ) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $board->rownum; ?></td>
                                            <td class=""><a href="/front/mypage/modify/lecture/<?php echo $board->board_seq; ?>?ismypage=1"><?php echo HP_GET_LECTURE_TEXT($board->board_category); ?></a></td>
                                            <td class="text-center"><a href="/front/mypage/modify/lecture/<?php echo $board->board_seq; ?>?ismypage=1"><?php echo $board->board_etc_1; ?></a></td>
                                            <td class="text-center"><a href="/front/mypage/modify/lecture/<?php echo $board->board_seq; ?>?ismypage=1"><?php echo $board->board_etc_2; ?></a></td>
                                            <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                            <td class="text-center">
                                            <?php
                                                $lecture_date= new DateTime($board->board_etc_1);
                                                $now_date = new DateTime(date('Y-m-d'));
                                                $diff = date_diff($lecture_date, $now_date);
                                                if ( $board->board_etc_3 < 3 && ( 0 < ( $diff->d ) && ( $diff->d ) <= 7 ) ) {
                                                    echo 'D - '.( $diff->d );
                                                }
                                                else
                                                    echo $this->config->item('LECTURE_STATUS')[$board->board_etc_3]['name'];
                                            ?>                                                
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php if ( count($board_list) == 0 ) { ?>
                                        <tr>
                                            <td colspan="6" class="text-center">최근 강의 신청내역이 없습니다.</td>
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