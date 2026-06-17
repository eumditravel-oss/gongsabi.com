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
                                <a class="nav-link active" href="/front/mypage/education/book" role="tab">교재 구매</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/front/mypage/education/lecture" role="tab">강의 신청</a>
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
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <!-- <colgroup>
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="*">
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="10%">
                                    </colgroup> -->
                                    <thead>
                                        <tr class="bg-gray">
                                            <th class="text-center">주문일</th>
                                            <th class="text-center">주문번호</th>
                                            <th class="text-center" colspan="2">주문상품</th>
                                            <th class="text-center">주문금액</th>
                                            <th class="text-center">수량</th>
                                            <th class="text-center">주문상태</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($board_list as $board) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
                                            <td class="text-center"><?php echo $board->merchant_uid; ?></td>
                                            <td class="text-center">
                                                <a href="/front/education/book_info?num=<?php echo $board->board_category; ?>" target="_blank">
                                                    <img src="/static/img/book<?php echo $board->board_category; ?>.jpg" style="width:50px;">
                                                </a>
                                            </td>
                                            <td class="text-left ml-2">
                                                <a href="/front/education/book_info?num=<?php echo $board->board_category; ?>" target="_blank">
                                                    <?php echo $this->config->item('BOOK_LIST')[$board->board_category]['name']; ?>
                                                </a>
                                            </td>
                                            <td class="text-center"><?php echo number_format($board->paid_amount); ?>원</td>
                                            <td class="text-center"><?php echo number_format($board->board_etc_2); ?></td>
                                            <td class="text-center">
                                                <a href="/front/mypage/modify/book/<?php echo $board->board_seq; ?>"><?php echo $this->config->item('ORDER_STATUS')[$board->board_etc_3]['name']; ?></a>
                                                <?php if ( $board->board_etc_3 == 4 || $board->board_etc_3 == 5 ) { ?>
                                                <br>(<a href="https://tracker.delivery/#/<?php echo $board->board_etc_6; ?>/<?php echo $board->board_etc_7; ?>" target="_blank"><?php echo $this->config->item('CARRIERS')[$board->board_etc_6]['name']; ?><br><?php echo $board->board_etc_7; ?></a>)
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php if ( $board_count == 0 ) { ?>
                                        <tr>
                                            <td class="text-center" colspan="7">최근 주문 내용 목록이 없습니다.</td>
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
                                <div class="row mt-3">
                                    <div class="order_guide_wrapper">
                                        <p class="order_guide_title">주문/배송안내</p>
                                        <div class="order_guide_table_wrapper">
                                            <span class="guide_arrow arrow1">주문취소/배송주소 변경 가능</span>
                                            <span class="guide_arrow arrow2">교환/환불 신청</span>
                                            <table class="order_guide">
                                                <tr>
                                                    <th>1. 주문접수</th>
                                                    <th>2. 결제완료</th>
                                                    <th>3. 상품준비중</th>
                                                    <th>4. 배송준비중</th>
                                                    <th>5. 배송중</th>
                                                    <th>6. 배송완료</th>
                                                </tr>
                                                <tr>
                                                    <td>결제전상태입니다.</td>
                                                    <td>결제가 완료되어<br>주문처리가 진행<br>됩니다.</td>
                                                    <td>주문한 상품을<br>준비중에 있습니다.<br>품절/절판이 발생할 수<br>있습니다.</td>
                                                    <td>준비된 상품 찾기 및<br>추가 준비, 포장작업을<br>진행중에 있습니다.<br>물량이 급증할 경우<br>출고가 지연될 수<br>있습니다.</td>
                                                    <td>포장된 상품이<br>택배사로 전달되어,<br>택배사에서 배송진행<br>하는 단계입니다.</td>
                                                    <td>주문하신 상품이<br>고객님께 전달된<br>상태입니다.</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <ul class="order_guide_etc">
                                            <li>상품준비중 재고가 부족할 경우 출판사 발주가 진행되며, 품절/절판시엔 메일 및 SMS로 안내 드립니다.</li>
                                            <li>택배사로 상품 전달 후 배송조회가 되며, 보통 1-2일 내에 배송이 완료 됩니다.<br>(배송방법 및 배송지역에 따라 배송 소요기간이 조금씩 다를 수 있습니다.)</li>
                                            <li>배송완료 후 <span class="mfc">교환/환불 신청</span>이 가능합니다.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>