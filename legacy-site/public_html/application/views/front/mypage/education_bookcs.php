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
                                <a class="nav-link" href="/front/mypage/education/lecture" role="tab">강의 신청</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/front/mypage/education/bookcs" role="tab">취소/교환/환불 신청</a>
                            </li>
                        </ul>
                        <div class="tab-content gongsabi-tab">
                            <div class="tab-pane fade show active p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <!-- <div class="single_shortcodes_title m-bottom-15">
                                    <h4>총 <?php echo number_format($board_count); ?>건</h4>
                                </div> -->
                                <div class="board_title">
                                    <p class="title">주문 취소</p>
                                    <p class="sub_title">취소하실 상품 내역</p>
                                </div>
                                <form method="post" action="/front/mypage/bookcs_proc">
                                <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                                    <colgroup>
                                        <col width="7%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="*">
                                        <col width="7%">
                                        <col width="15%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="15%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-gray">
                                            <th class="text-center"></th>
                                            <th class="text-center">주문번호</th>
                                            <th class="text-center" colspan="2">주문상품</th>
                                            <th class="text-center">수량</th>
                                            <th class="text-center">결제완료일</th>
                                            <th class="text-center">결제수단</th>
                                            <th class="text-center">결제금액</th>
                                            <th class="text-center">선택</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($board_list as $board) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php if ( $board->board_etc_3 != '7' && $board->board_etc_3 != '8' && $board->board_etc_3 != '9' ) { ?>
                                                <input type="checkbox" class="bookcs_chk" name="chk[]" value="<?php echo $board->board_seq; ?>">
                                                <input type="hidden" name="board_seq" value="<?php echo $board->board_seq; ?>">
                                                <input type="hidden" name="merchant_uid[<?php echo $board->board_seq; ?>]" value="<?php echo $board->merchant_uid; ?>">
                                                <?php } else { ?>
                                                <input type="checkbox" class="bookcs_chk" name="chk[]" value="<?php echo $board->board_seq; ?>" disabled="true">
                                                <?php } ?>
                                            </td>
                                            <td class="text-center"><?php echo $board->merchant_uid; ?></td>
                                            <td class="text-center">
                                                <a href="/front/education/book_info?num=<?php echo $board->board_category; ?>" target="_blank">
                                                    <img src="/static/img/book<?php echo $board->board_category; ?>.jpg" style="width:50px;">
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="/front/education/book_info?num=<?php echo $board->board_category; ?>" target="_blank">
                                                    <?php echo $this->config->item('BOOK_LIST')[$board->board_category]['name']; ?>
                                                </a>
                                            </td>
                                            <td class="text-center"><?php echo number_format($board->board_etc_2); ?></td>
                                            <td class="text-center">
                                            <?php
                                                if ( $board->status == 'paid' )
                                                    echo '결제완료<br>'.$board->paid_at;
                                                else
                                                    echo $this->config->item('PAY_STATUS')[$board->status];
                                            ?>
                                            </td>
                                            <td class="text-center"><?php echo $this->config->item('PAY_METHOD')[$board->pay_method]; ?></td>
                                            <td class="text-center"><?php echo number_format($board->paid_amount); ?>원</td>
                                            <td class="text-center">
                                            <?php if (
                                                $board->board_etc_3 == '9' // 주문취소
                                            ) { ?>
                                                주문취소
                                            <?php } else if (
                                                $board->board_etc_3 == '7' // 교환요청
                                            ) { ?>
                                                교환요청중
                                            <?php } else if (
                                                $board->board_etc_3 == '8' // 환불요청
                                            ) { ?>
                                                환불요청중
                                            <?php } else { ?>
                                                <select name="_action[<?php echo $board->board_seq; ?>]" class="form-control form-control-sm">
                                            <?php if ( 
                                                    $board->board_etc_3 == '1' // 주문접수
                                                ||  $board->board_etc_3 == '2' // 결제완료
                                                ||  $board->board_etc_3 == '3' // 상품준비중
                                                ||  $board->board_etc_3 == '4' // 배송준비중
                                            ) { ?>
                                                <option value="cancel" selected="true">주문취소</option>
                                            <?php } else if (
                                                    $board->board_etc_3 == '5' // 배송중
                                                ||  $board->board_etc_3 == '6' // 배송완료                                              
                                            ) { ?>
                                                <option value="exchange" selected="true">교환</option>
                                                <option value="refund">환불</option>
                                            <?php } ?>
                                                </select>   
                                            <?php } ?>       
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php if ( count($board_list) == 0 ) { ?>
                                        <tr>
                                            <td class="text-center" colspan="9">최근 주문 취소 목록이 없습니다.</td>
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
                                <div class="board_title">
                                    <p class="sub_title">주문 취소 사유</p>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-6">
                                        <select name="_cancel_reason" class="form-control form-control-sm" onchange="select_book_cancel_reason(this);">
                                            <option value="">취소사유 선택</option>
                                            <option value="결제수단변경">결제수단변경</option>
                                            <option value="구매정보변경">구매정보변경</option>
                                            <option value="회원 변심">회원 변심</option>
                                            <option value="상품 변경">상품 변경</option>
                                            <option value="입고 지연">입고 지연</option>
                                            <option value="기타">기타</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="cancel_reason_text" class="form-control form-control-sm" placeholder="취소 사유를 입력해 주세요.">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 text-center">
                                        <a href="/front/mypage/education/book" class="btn btn-outline-success mr-2">주문상세 가기</a>
                                        <button type="button" class="btn btn-success" onclick="go_cancel(this);">주문취소 신청</button>
                                    </div>
                                </div>
                                </form>
                                <div class="row mt-5">
                                    <div class="col-lg-12">
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="tab2-1-tab" data-toggle="tab" href="#tab2-1" role="tab" aria-controls="tab2-1" aria-selected="true">결제수단별<br>환불안내</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab2-2-tab" data-toggle="tab" href="#tab2-2" role="tab" aria-controls="tab2-2" aria-selected="false">교재<br>환불안내</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab2-3-tab" data-toggle="tab" href="#tab2-3" role="tab" aria-controls="tab2-3" aria-selected="false">오프라인 강의<br>환불안내</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab2-4-tab" data-toggle="tab" href="#tab2-4" role="tab" aria-controls="tab2-4" aria-selected="false">온라인 강의<br>환불안내</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content fsxs lhxlg">
                                            <div class="tab-pane fade show active p-15" id="tab2-1" role="tabpanel" aria-labelledby="tab2-1-tab">
                                                · <strong>전체취소란?</strong> 여러개의 상품을 한번에 결제후 <span class="mfc">모든상품을 한번에 취소(품절,반품)</span>하는 경우로, 결제한 전체금액이 취소되는 것입니다.<br>
                                                · <strong>부분취소란?</strong> 여러개의 상품을 한번에 결제후 <span class="mfc">일부 상품만을 취소(품절,반품)</span>하는 경우로, 결제금액중 일부금액이 취소되는 것입니다.<br>
                                                (상품A+상품B를 한번에 결제후 각각 1개씩 취소하여 결제한 전체금액이 취소된 경우도 부분취소에 해당됨)
                                                <table class="table table-bordered mt-2">
                                                    <tr>
                                                        <th class="text-center align-middle">
                                                            신용/체크 카드<br>
                                                            (간편결제 포함)<br>
                                                            (법인카드 포함)
                                                        </th>
                                                        <td>
                                                            - 전체취소 : 카드사 매입전은 결제일에 취소, 카드사 매입후는 약3일~2주(주말,공휴일 제외)후 취소 됩니다.<br>
                                                            - 부분취소 : 전체 취소 후 부분결제를 진행해 주세요.<br><br>
                                                            ※ 카드사 취소 처리 되는 시점에 카드사에서 취소 문자 전송됩니다. (단, 카드사 문자 신청한 경우만 전송됨)<br>
                                                            ※ 카드 승인 취소 내역은 해당 카드사에서 확인 가능합니다.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center align-middle">
                                                            실시간계좌이체<br>
                                                            (간편결제 포함)
                                                        </th>
                                                        <td>
                                                            - 전체취소 : 결제한 당일 실시간계좌이체서 결제한 본인 계좌로 입금됩니다.<br>
                                                            - 부분취소 : 전체 취소 후 부분결제를 진행해 주세요.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center align-middle">
                                                            무통장입금
                                                        </th>
                                                        <td>
                                                            - 전체취소 : 결제한 당일 무통장입금 이체시 결제한 본인 계좌로 입금됩니다.<br>
                                                            - 부분취소 : 전체 취소 후 부분결제를 진행해 주세요.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center align-middle">
                                                            가상계좌
                                                        </th>
                                                        <td>
                                                            - 전체취소 : 결제한 당일 가상계좌 이체시 결제한 본인 계좌로 입금됩니다.<br>
                                                            - 부분취소 : 전체 취소 후 부분결제를 진행해 주세요.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center align-middle">
                                                            휴대폰결제
                                                        </th>
                                                        <td>
                                                            - 전체취소 : 주문한 상품 모두 한번에 취소된 경우 즉시 취소 됩니다. (청구서 미반영)<br>
                                                            - 부분취소 : 전체 취소 후 부분결제를 진행해 주세요.
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade p-15" id="tab2-2" role="tabpanel" aria-labelledby="tab2-2-tab">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th class="text-center align-middle bg-gray">
                                                            취소/교환/환불 방법
                                                        </th>
                                                        <td>
                                                            · 환불을 원하실 때는 받으신 상태 그대로 반품하시면 확인 후 환불처리 진행해 드리겠습니다.<br>
                                                            · 부분 취소/교환/환불을 원하실 경우, 전체 취소 후 개별 결제를 다시 해주셔야 합니다.<br>
                                                            · 반송 택배비를 제외하고 환불이 될 수 있습니다.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center align-middle bg-gray">
                                                            취소/교환/환불<br>가능기간
                                                        </th>
                                                        <td>
                                                            · 변심반품의 경우 수령 후 7일 이내,<br>
                                                            상품의 결함 및 계약 내용과 다를 경우 문제점 발견 후 30일 이내 가능합니다.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center align-middle bg-gray">
                                                            취소/교환/환불 비용
                                                        </th>
                                                        <td>
                                                            · 변심 혹은 구매착오로 인한 취소/교환/환불은 반송료를 회원님이 부담하셔야 합니다.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center align-middle bg-gray">
                                                            취소/교환/환불<br>불가사유
                                                        </th>
                                                        <td>
                                                            다음 사유에 해당 시 취소/교환/환불이 가능합니다<br><br>
                                                            · 구매자의 책임 있는 사유로 상품 등이 손실 또는 훼손된 경우<br>
                                                            · 구매자의 사용, 비닐 포장 개봉에 의해 상품 등의 가치가 현저히 감소한 경우<br>
                                                            · 복제가 가능한 상품 등의 포장이 훼손된 경우<br>
                                                            · 시간의 경과에 의해 재판매가 곤란한 정도로 가치가 현저히 감소한 경우<br>
                                                            · 반품요청기간이 지난 경우<br>
                                                            · 전자상거래 등에서의 소비자보호에 관한 법률이 정하는 소비자 청약철회 제한 내용에 해당되는 경우
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center align-middle bg-gray">
                                                            상품 품절
                                                        </th>
                                                        <td>
                                                            · 공급사 (출판사) 재고 사정에 의해 품절/지연될 수 있으며, 품절 시 관련 사항에 대해서는<br>
                                                            이메일과 SNS로 안내드리겠습니다.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center align-middle bg-gray">
                                                            소비자 피해보상<br>환불지연에 따른 보상
                                                        </th>
                                                        <td>
                                                            · 상품의 불량에 의한 교환, A/S, 환불, 품질보증 및 피해보상 등에 관한 사항은 소비자 분쟁해결 기준<br>
                                                            (공정거래위원회 고시)에 준하여 처리됩니다.<br>
                                                            · 대금 환불 및 환불지연에 따른 배상금 지급 조건, 절차 등은 전자상거래 등에서의 소비자 보호에 관한 법률에 따라 처리합니다.
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade p-15" id="tab2-3" role="tabpanel" aria-labelledby="tab2-3-tab">
                                                · 예약 변경 및 취소/환불은 고객센터 (전화 : 02. 2202. 2258, 이메일, Q&A)를 통해 문의해주시기 바랍니다.<br>
                                                · 결제 취소 및 환불은 환불신청 접수 후 7일 이내에 처리해 드립니다.<br>
                                                · 강의 3일전까지 100% 환불 및 예약 변경이 가능합니다.<br><br>
                                                <p class="fb">< 환불 절차 ></p>
                                                <img src="/static/img/lecture_refund_process.jpg">
                                            </div>
                                            <div class="tab-pane fade p-15" id="tab2-4" role="tabpanel" aria-labelledby="tab2-4-tab">
                                                · 강의 취소/환불에 관해서는 온라인 강의를 신청하신 사이트에 별도로 문의해주시기 바랍니다.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>