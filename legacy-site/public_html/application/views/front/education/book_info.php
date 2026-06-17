
    <section class="shortcodes_content_area p-top-50">
        <div class="container">
            <div class="row">
                <div class="col-4 text-center">
                    <img src="/static/img/book<?php echo $selected_book; ?>.jpg" alt="" style="height:350px;" class="book-image my-3">
                </div>
                <div class="col-6 pl-5 p-top-50 book_info">
                    <h3>현장기술자를 위한 건축견적이야기</h3>
                    <?php if ( $selected_book == '9' ) { // 1-6부 ?>
                    <span class="book_label">제 1부 - 제 6부</span>
                    <?php } else { ?>
                    <span class="book_label">제 <?php echo $selected_book; ?>부</span>
                    <?php } ?>
                    <p class="mt-4">현동명 저 | 건설경제 | 2020년 7월 10일</p>
                    <ul class="book_price">
                        <li>
                            <p>정가</p>
                            <p class="price fcg"><?php echo number_format($this->config->item('BOOK_LIST')[$selected_book]['org_price']); ?>원</p>
                        </li>
                        <li>
                            <p>회원 할인가</p>
                            <p class="price mfc"><?php echo number_format($this->config->item('BOOK_LIST')[$selected_book]['price']); ?>원 <small>( 10% 할인 )</small></p>
                        </li>
                    </ul>
                    <p class="fcg mt-3">낱권 구매시 우체국 택배 (착불) | 세트 구매시 배송비 무료</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <ul class="book_thumbnail_list">
                        <li><a href="/front/education/book_info?num=9"><img src="/static/img/book9.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['9']['name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=1"><img src="/static/img/book1.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['1']['name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=2"><img src="/static/img/book2.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['2']['name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=3"><img src="/static/img/book3.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['3']['name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=4"><img src="/static/img/book4.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['4']['name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=5"><img src="/static/img/book5.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['5']['name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=6"><img src="/static/img/book6.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['6']['name']; ?>"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="shortcodes_content_area p-top-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <ul class="nav nav-tabs" id="tab1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $tab == 'buy' || $tab == '') ? ' active' : ''; ?>" id="tab1-3-tab" data-toggle="tab" href="#tab1-3" role="tab" aria-controls="tab1-3" aria-selected="true">교재 구매</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $tab == 'info') ? ' active' : ''; ?>" id="tab1-1-tab" data-toggle="tab" href="#tab1-1" role="tab" aria-controls="tab1-1" aria-selected="false">교재 정보</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $tab == 'agenda') ? ' active' : ''; ?>" id="tab1-2-tab" data-toggle="tab" href="#tab1-2" role="tab" aria-controls="tab1-2" aria-selected="false">목차</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $tab == 'review') ? ' active' : ''; ?>" id="tab1-4-tab" data-toggle="tab" href="#tab1-4" role="tab" aria-controls="tab1-4" aria-selected="false">리뷰</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $tab == 'cs') ? ' active' : ''; ?>" id="tab1-5-tab" data-toggle="tab" href="#tab1-5" role="tab" aria-controls="tab1-5" aria-selected="false">교환/반품/배송</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade<?php echo ( $tab == 'buy' || $tab == '') ? ' show active' : ''; ?> p-30" id="tab1-3" role="tabpanel" aria-labelledby="tab1-3-tab">
                                <form action="/front/education/book_order_proc" method="post" class="classy-form" id="frm_book">
                                <input type="hidden" name="is_mobile" value="<?php echo ( $this->agent->is_mobile() ) ? 'Y' : 'N'; ?>">
                                <!-- 아임포트 거래 고유 번호 -->
                                <input type="hidden" name="imp_uid" id="imp_uid" value="">
                                <!-- 가맹점에서 생성/관리하는 고유 주문번호 -->
                                <input type="hidden" name="merchant_uid" id="merchant_uid" value="">
                                <!-- 결제수단 -->
                                <input type="hidden" name="pay_method" id="pay_method" value="">
                                <!-- 결제금액 -->
                                <input type="hidden" name="paid_amount" id="paid_amount" value="">
                                <!-- 결제상태 -->
                                <input type="hidden" name="status" id="status" value="">
                                <!-- 주문명 -->
                                <input type="hidden" name="name" id="name" value="">
                                <!-- 결제승인/시도된 PG사 -->
                                <input type="hidden" name="pg_provider" id="pg_provider" value="">
                                <!-- PG사 거래고유번호 -->
                                <input type="hidden" name="pg_tid" id="pg_tid" value="">
                                <!-- 결제승인시각 -->
                                <input type="hidden" name="paid_at" id="paid_at" value="">
                                <!-- PG사에서 발행되는 거래 매출전표 URL -->
                                <input type="hidden" name="receipt_url" id="receipt_url" value="">
                                <!-- 카드사 승인번호 -->
                                <input type="hidden" name="apply_num" id="apply_num" value="">
                                <!-- 가상계좌 입금계좌번호 -->
                                <input type="hidden" name="vbank_num" id="vbank_num" value="">
                                <!-- 가상계좌 은행명 -->
                                <input type="hidden" name="vbank_name" id="vbank_name" value="">
                                <!-- 가상계좌 예금주 -->
                                <input type="hidden" name="vbank_holder" id="vbank_holder" value="">
                                <!-- 가상계좌 입금기한 -->
                                <input type="hidden" name="vbank_date" id="vbank_date" value="">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="board_category">책 선택 <small class="text-danger">* 필수</small></label>
                                                <select class="custom-select d-block w-100" name="board_category" id="board_category">
                                                <?php foreach ($this->config->item('BOOK_LIST') as $key => $book) { ?>
                                                    <option value="<?php echo $key; ?>|<?php echo $book['price']; ?>"<?php if ( $key == $selected_book ) { ?> selected="true"<?php } ?>><?php echo $book['name']; ?></option>
                                                <?php } ?>
                                                </select>
                                                <?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>
                                                <input type="hidden" class="book-price" value="<?php echo $this->config->item('BOOK_LIST')[$selected_book]['price']; ?>">
                                                <input type="hidden" class="order-price" value="<?php echo $this->config->item('BOOK_LIST')[$selected_book]['price']; ?>">
                                                <?php } else { ?>
                                                <input type="hidden" class="book-price" value="<?php echo $this->config->item('BOOK_LIST')[$selected_book]['org_price']; ?>">
                                                <input type="hidden" class="order-price" value="<?php echo $this->config->item('BOOK_LIST')[$selected_book]['org_price']; ?>">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="board_etc_2">수량 <small class="text-danger">* 필수</small></label>
                                                <input type="number" class="form-control" name="board_etc_2" id="board_etc_2" placeholder="수량" value="1" min="1" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="board_name">이름 <small class="text-danger">* 필수</small></label>
                                                <input type="text" class="form-control" name="board_name" id="board_name" placeholder="이름" value="<?php echo $this->session->userdata('MEMBER')['member_name']; ?>" required>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="board_company">회사</label>
                                                <input type="text" class="form-control" name="board_company" id="board_company" placeholder="회사" value="<?php echo $this->session->userdata('MEMBER')['member_company']; ?>">
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="board_hp">휴대폰번호 <small class="text-danger">* 필수</small></label>
                                                <input type="text" class="form-control handle-cell-phone" name="board_hp" id="board_hp" placeholder="휴대폰번호" value="<?php echo $this->session->userdata('MEMBER')['member_hp']; ?>" maxlength="13" required>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="board_email">이메일주소</label>
                                                <div class="form-email">
                                                    <input type="hidden" name="board_email" value="<?php echo $this->session->userdata('MEMBER')['member_id']; ?>">
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
                                            <div class="col-md-12">
                                                <label for="board_etc_1">배송주소 <small class="text-danger">* 필수</small></label><br>
                                                <button class="btn btn-success mb-2" type="button" onclick="execDaumPostcode()">주소 검색</button><br>
                                                <div id="wrap" class="mb-2" style="display:none;border:1px solid;width:500px;height:300px;position:relative;">
                                                    <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
                                                </div>
                                                <input type="text" class="form-control mb-2" name="board_etc_1" id="board_etc_1" placeholder="배송주소" value="" required="true" readonly="true">
                                                <input type="text" class="form-control mb-3" name="board_etc_4" id="board_etc_4" placeholder="상세주소를 입력해주세요" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="_board_content">배송메시지</label>
                                                <select class="custom-select d-block w-100" name="_board_content" id="_board_content">
                                                    <option value="">배송메모를 선택해 주세요.</option>
                                                    <option value="배송 전 연락바랍니다.">배송 전 연락바랍니다.</option>
                                                    <option value="경비실에 맡겨주세요.">경비실에 맡겨주세요.</option>
                                                    <option value="집앞에 놔주세요.">집앞에 놔주세요.</option>
                                                    <option value="택배함에 놔주세요.">택배함에 놔주세요.</option>
                                                    <option value="부재시 핸드폰으로 연락주세요.">부재시 핸드폰으로 연락주세요.</option>
                                                    <option value="부재시 경비실에 맡겨주세요.">부재시 경비실에 맡겨주세요.</option>
                                                    <option value="부재시 집 앞에 놔주세요.">부재시 집 앞에 놔주세요.</option>
                                                    <option value="직접 입력">직접 입력</option>
                                                </select>
                                                <input type="text" class="form-control mt-3 hide" name="board_content" id="board_content" value="">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">결제방식 <small class="text-danger">* 필수</small></label>
                                                <div class="pay_method_wrapper">
                                                    <div class="pay_method_item">
                                                        <label for="pay_method_card"><input type="radio" name="_pay_method" value="card" id="pay_method_card" checked="true"><span>신용카드</span></label>
                                                    </div>
                                                    <div class="pay_method_item">
                                                        <label for="pay_method_bank"><input type="radio" name="_pay_method" value="bank" id="pay_method_bank"><span>무통장입금</span></label>
                                                    </div>
                                                    <div class="pay_method_item">
                                                        <label for="pay_method_trans"><input type="radio" name="_pay_method" value="trans" id="pay_method_trans"><span>실시간계좌이체</span></label>
                                                    </div>
                                                    <div class="pay_method_item">
                                                        <label for="pay_method_vbank"><input type="radio" name="_pay_method" value="vbank" id="pay_method_vbank"><span>가상계좌</span></label>
                                                    </div>
                                                    <div class="pay_method_item">
                                                        <label for="pay_method_phone"><input type="radio" name="_pay_method" value="phone" id="pay_method_phone"><span>휴대폰</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="book_buy_warning">
                                                    ※ 회원가입을 진행하지 않고 회원할인가를 입금 시 결제로 인정되지 않습니다. 회원가입을 하고 결제를 진행해주시기 바랍니다.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-top-15">
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-success" onclick="go_book_pay();">구매하기</button>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>
                                
                                <div class="gongsabi-comment-area pay_method_desc pay_method_desc_bank">
                                    <div class="comment">
                                        입금 계좌번호 : <span class="mfc fb">301-0247-5970-21</span> (농협은행)<br>
                                        예금주 : 공사비닷컴<br>
                                        <!-- ※ 송금 수수료는 회원 부담입니다.<br> -->
                                        ※ 입금자와 회원명이 다른 경우에는 반드시 연락하여 주시기 바랍니다.
                                    </div>
                                    <div class="comment">
                                        <p class="title">무통장입금</p>
                                        <table class="pay_method_desc_table">
                                            <colgroup>
                                                <col width="13%">
                                                <col width="25%">
                                                <col width="13%">
                                                <col width="25%">
                                                <col width="24%">
                                            </colgroup>
                                            <tbody>
                                            <tr>
                                                <th>계좌번호 :</th>
                                                <td>
                                                    <select name="bank_list" class="form-control form-control-sm">
                                                        <option value="">은행 선택</option>
                                                    <?php foreach ($this->config->item('BANK_LIST') as $bank) { ?>
                                                        <option value="<?php echo $bank; ?>"><?php echo $bank; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </td>
                                                <td colspan="2"><input type="text" class="form-control form-control-sm" name="bank_account" placeholder="계좌번호"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>예금주 :</th>
                                                <td><input type="text" class="form-control form-control-sm" name="bank_account_name" placeholder="예금주"></td>
                                                <th>입금일자 :</th>
                                                <td><input type="text" class="form-control form-control-sm" name="bank_date" placeholder="입금일자" maxlength="10"></td>
                                                <td><small>(입력방법 예시 : 2020-09-07)</small></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="comment">
                                        <p class="title">환불계좌 정보</p>
                                        <p class="sub_title">입력하신 환불정보는 환불처리 이외의 목적으로는 이용되지 않으며, 환불대상이 아닌 환불 정보는<br>1개월 후 파기합니다.</p>
                                        <table class="pay_method_desc_table">
                                            <colgroup>
                                                <col width="13%">
                                                <col width="25%">
                                                <col width="13%">
                                                <col width="25%">
                                                <col width="24%">
                                            </colgroup>
                                            <tbody>
                                            <tr>
                                                <th>계좌번호 :</th>
                                                <td>
                                                    <select name="refund_list" class="form-control form-control-sm">
                                                        <option value="">은행 선택</option>
                                                    <?php foreach ($this->config->item('BANK_LIST') as $bank) { ?>
                                                        <option value="<?php echo $bank; ?>"><?php echo $bank; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </td>
                                                <td colspan="2"><input type="text" class="form-control form-control-sm" name="refund_account" placeholder="계좌번호"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>예금주 :</th>
                                                <td><input type="text" class="form-control form-control-sm" name="refund_account_name" placeholder="예금주"></td>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- <div class="gongsabi-comment-area">
                                    <h3>※ 안내사항</h3>
                                    <div class="comment">
                                        도서소득공제
                                        <button type="button" class="btn btn-sm btn-outline btn-mat-gray float-right" id="btn_book_gongje">도서소득공제 안내</button>
                                        <ul class="mt-2 default_ul">
                                            <li>카드결제는 카드 명의자 기분으로, 현금결제는 개인공제용으로 현금영수증 신청한 기준으로 국세청에 자동 반영됩니다.</li>
                                            <li>도서 소득공제 가능 결제 수단 : 신용카드(개인카드에 한함), 무통장 입금, 가상계좌, 실시간 계좌이체, 카카오페이, KPAY, 삼성페이</li>
                                        </ul>
                                    </div>
                                </div> -->
                                </form>
                            </div>
                            <div class="tab-pane fade<?php echo ( $tab == 'info') ? ' show active' : ''; ?> p-30" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <table class="table table-bordered classy-table gongsabi-table lecture-list-table m-top-30 m-bottom-50">
                                <colgroup>
                                    <col width="15%">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                <?php if ( $selected_book == '9' ) { // 1-6부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761463(1188761463)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">쪽수</th>
                                        <td>2230쪽</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">크기</th>
                                        <td>260 * 197 * 138 mm /5470g</td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '1' ) { // 1부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761470(1188761471)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">쪽수</th>
                                        <td>370쪽</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">크기</th>
                                        <td>179 * 249 * 22 mm /936g </td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '2' ) { // 2부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761487(118876148X)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">쪽수</th>
                                        <td>420쪽</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">크기</th>
                                        <td>178 * 248 * 25 mm /997g</td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '3' ) { // 3부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761494(1188761498)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">쪽수</th>
                                        <td>460쪽</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">크기</th>
                                        <td>177 * 248 * 28 mm /1094g</td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '4' ) { // 4부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761500(1188761501)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">쪽수</th>
                                        <td>302쪽</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">크기</th>
                                        <td>178 * 248 * 19 mm /745g</td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '5' ) { // 5부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761517(118876151X)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">쪽수</th>
                                        <td>262쪽</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">크기</th>
                                        <td>178 * 248 * 17 mm /663g</td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '6' ) { // 6부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761524(1188761528)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">쪽수</th>
                                        <td>339쪽</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">크기</th>
                                        <td>178 * 248 * 20 mm /828g</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                </table>
                                <h3 class="mb-4">책소개</h3>
                                <div class="mb-5">
                                <?php if ( $selected_book == '9' ) { // 1-6부 ?>
                                    건축 적산(수량 산출) 및 내역서 작성 실습항목의 이해 및 설계변경에 대해 심도있게 배울 수 있습니다.<br>
                                    건축주, 설계사, 시행사, 종사자, 건설원가 관리사 자격증을 준비하시는 학생분들을 위한 교재로 적합합니다. 
                                <?php } ?>
                                <?php if ( $selected_book == '1' ) { // 1부 ?>
                                    우리 생활 환경과 밀접하게 연관된 건설산업에 연관된 건축주, 설계사, 시행사, 종사자 등을 위한 교재입니다.<br>
                                    건설 산업 전반과 건축 현장의 기본이 되는 공사비에 대해 정확한 이해를 도와줍니다.<br>
                                    도면과 산출 결과를 확인할 수 있는 다양한 자료들이 부록에 참고자료로 들어 있습니다. 
                                <?php } ?>
                                <?php if ( $selected_book == '2' ) { // 2부 ?>
                                    적산(수량 산출) 중 골조 수량 산출과 관련한 내용을 담고 있습니다.<br>
                                    구조 수량을 산출하기 전, 실습, 산출 후 분석 과정까지 총괄적인 내용과 철골 부재의 수량 산출을 학습하실 수 있습니다. 
                                <?php } ?>
                                <?php if ( $selected_book == '3' ) { // 3부 ?>
                                    적산(수량 산출) 중 마감 수량 산출과 관련한 내용을 담고 있습니다.<br>
                                    마감 수량을 산출하기 전, 각 부재의 수량 산출 실습, 산출 후 분석 과정까지 총괄적인 내용을 학습하실 수 있습니다.
                                <?php } ?>
                                <?php if ( $selected_book == '4' ) { // 4부 ?>
                                    적산(수량 산출) 중 가장 핵심이라 할 수 있는 내역서에 관하여 심층적으로 파악하고 작성해볼 수 있도록 구성되어 있습니다.<br>
                                    부록으로 건축 내역서의 다양한 예시가 있습니다.
                                <?php } ?>
                                <?php if ( $selected_book == '5' ) { // 5부 ?>
                                    내역서를 구성하는 마감과 구조의 공종별 항목에 대한 교재입니다.<br>
                                    해당 공종들의 항목을 자세하게 배울 수 있습니다.
                                <?php } ?>
                                <?php if ( $selected_book == '6' ) { // 6부 ?>
                                    설계변경, 공사원가를 개선하는 방법과 건설클레임까지 전문적인 내용을 다루는 교재입니다.<br>
                                    건설원가 관리사 자격증을 대비할 수 있도록 예상문제를 수록하였습니다. 
                                <?php } ?>
                                </div>
                                <div class="mb-5 mfc book_info_preview">
                                    ※ 책의 일부를 미리 보실 수 있습니다. 
                                    <button type="button" id="btn_book_preview" class="btn btn-success float-right" data-book-num="<?php echo $selected_book; ?>">교재 미리보기</button>
                                </div>
                                <h3 class="mb-4">저자소개</h3>
                                <div class="mb-5">
                                    30년 이상 현직에 근무하고 있는 저자는 건설원가관리 전문가로 활동해온 베테랑 엔지니어로, 국내외 주요<br>
                                    건설현장 경험과 한양대학교 겸임교수, 적산 전문기업인 (주)컨코스트 대표 등의 경력을 가지고 있습니다.<br>
                                    현장에서의 풍부한 경험과 노하우를 담은 건축 견적 실무서인 『현장기술자를 위한 건축견적 이야기』,<br>
                                    『튼튼하고 아름다운 건축시공 이야기』,『나의 가족이야기』 등을 집필한 인기 저자이기도 합니다.
                                </div>
                            </div>
                            <div class="tab-pane fade<?php echo ( $tab == 'agenda') ? ' show active' : ''; ?> p-30" id="tab1-2" role="tabpanel" aria-labelledby="tab1-2-tab">
                                <h3 class="mb-4">목차</h3>
                                <div class="book_agenda hidden mb-3">
                                <?php if ( $selected_book == '9' ) { // 1-6부 ?>
                                    제1부 도면을 이해하고 어떻게 공사비로 바뀌나 이해하자!<br>
                                    제1강 : 건설산업과 공사비<br>
                                    제2강 : 건축 도면의 이해<br>
                                    제3강 : 건축적산 및 견적의 이해<br><br>

                                    부 록 : 적산(수량산출)용 마감도면<br>
                                    적산(수량산출)용 구조도면<br>
                                    마감수량 산출 결과표<br><br>

                                    제2부 골조 수량 산출법을 실습하고 남들이 한것을 이해하자!<br>
                                    제4강 : 구조 수량 산출 전 숙지할 구조 상식<br>
                                    제5강 : 기초 부재 수량산출 이해 및 실습<br>
                                    제6강 : 슬래브, 옹벽 부재 수량산출 이해 및 실습<br>
                                    제7강 : 보, 기둥 부재 수량산출 이해 및 실습<br>
                                    제8강 : 계단 부재 수량산출 이해 및 실습과 산출 후 집계<br>
                                    제9강 : 프로그램을 통한 구조 산출의 이해(RC-6.0)<br>
                                    제10강 : 구조 산출 후 집계, 분석방법<br>
                                    제11강 : 철골 부재 수량산출 이해 및 실습<br><br>

                                    제3부 마감수량 산출법을 실습하고 남들이 한 것을 이해하자!<br>
                                    제12강 : 마감수량 산출 전 숙지할 상식<br>
                                    제13강 : 창호수량 산출의 이해 및 실습<br>
                                    제14강 : 조적수량 산출의 이해 및 실습<br>
                                    제15강 : 내부수량 산출의 이해 및 실습<br>
                                    제16강 : 외부수량 산출의 이해 및 실습<br>
                                    제17강 : 가설수량 산출의 이해 및 실습<br>
                                    제18강 : 프로그램을 통한 마감산출의 이해(FIN-6.2)<br>
                                    제19강 : 마감 산출 후 집계, 분석<br><br>

                                    제4부 공사비에 가장 중요한 내역서를 알고 문제점을 찾아내자!<br>
                                    제20강 : 내역서 작성방법 및 간접공사비 작성<br>
                                    제21강 : 내역서 검토를 통한 공사비 및 수량의 검토<br>
                                    제22강 : 내역서의 종류(국내/해외공사)<br>
                                    부 록 : 건축내역서 작성<br><br>

                                    제5부 내역서를 구성하는 공종별 항목을 이해하자!<br>
                                    제23강 : 가설, 철근 콘크리트, 철골공사 공종별 항목의 설명<br>
                                    제24강 : 조적, 방수, 미장공사 공종별 항목의 설명<br>
                                    제25강 : 타일, 석, 목공사 공종별 항목의 설명<br>
                                    제26강 : 금속, 창호, 유리공사 공종별 항목의 설명<br>
                                    제27강 : 도장, 수장, 잡공사 공종별 항목의 설명<br><br>

                                    제6부 설계변경과 건설클레임을 알고 대처하자!<br>
                                    건설원가관리사 자격증으로!<br><br>

                                    제28강 : 설계변경의 이해와 접근 방법<br>
                                    제29강 : 공사원가를 개선하는 방법과 건설클레임<br>
                                    제30강 : 한국형 Q.S제도(건설원가관리사 KQS) Korea Quantitles Surveyor<br><br>

                                    부 록 : 마감수량 산출 결과표<br>
                                    건설원가관리사 예상문제<br>
                                    건설원가관리사 예상문제 정답 및 해설
                                <?php } ?>
                                <?php if ( $selected_book == '1' ) { // 1부 ?>
                                    1강. 건설산업과 공사비<br>
                                    1. 왜? 공사비인가?<br>
                                    2. 교육방법과 목표<br>
                                    3. 건설산업의 이해<br>
                                    4. 4차 산업혁명<br><br>

                                    2강. 건축 도면의 이해<br>
                                    1. 도면의 분류<br>
                                    2. 적산을 위해 필요한 마감 도면<br>
                                    3. 적산을 위해 필요한 구조 도면<br>
                                    4. 건축공사 시방서<br>
                                    5. 공사 시작 전 챙겨야 할 7가지 도서<br><br>

                                    3강. 건축적산 및 견적의 이해<br>
                                    1. 적산과 견적의 개념<br>
                                    2. 수량산출 시 유의사항<br>
                                    3. 단가 산정의 개념<br>
                                    4. 표준품셈과 일위대가<br>
                                    5. 공사 원가율의 이해<br><br>

                                    부 록 : 적산(수량산출)용 마감도면<br>
                                    적산(수량산출)용 구조도면<br>
                                    마감수량 산출 결과표
                                <?php } ?>
                                <?php if ( $selected_book == '2' ) { // 2부 ?>
                                    4강. 구조 수량 산출 전 숙지할 구조 상식<br>
                                    1. 구조 설계법<br>
                                    2. 구조의 종류<br>
                                    3. 구조 수량 산출 6가지 부재<br>
                                    4. 부재가 만나는 중첩의 처리<br>
                                    5. 층별 집계표의 이해<br>
                                    6. 구조 산출 항목<br>
                                    7. 부재별 산출 공식<br><br>

                                    5강. 기초 부재 수량산출 이해 및 실습<br>
                                    1. 기초의 산출 개념<br>
                                    2. 독립기초의 산출<br>
                                    3. 줄기초의 산출<br>
                                    4. 매트기초의 산출<br><br>

                                    6강. 슬래브, 옹벽 부재 수량산출 이해 및 실습<br>
                                    1. 슬래브 부재 산출 개념<br>
                                    2. 슬래브 부재 산출 실습<br>
                                    3. 데크 및 PC 슬래브의 산출<br>
                                    4. 옹벽 부재 산출 개념<br>
                                    5. 옹벽 부재 산출 실습<br><br>

                                    7강. 보, 기둥 부재 수량산출 이해 및 실습<br>
                                    1. 보 부재(G1/B1)의 산출 개념<br>
                                    2. 보 부재 산출 실습<br>
                                    3. 기둥 부재 산출 개념<br>
                                    4. 기둥의 산출 실습<br><br>

                                    8강. 계단 부재 수량산출 이해 및 실습과 산출 후 집계<br>
                                    1. 계단 부재(SS1) 산출 개념<br>
                                    2. 계단 부재 산출 실습<br>
                                    3. 산출 결과 내역 이기<br>
                                    4. 자재할증(LOSS)의 정의<br>
                                    5. 지입/지급자재의 구분<br><br>

                                    9강. 프로그램을 통한 구조 산출의 이해(RC-6.0)<br>
                                    1. 공사 등록 방법<br>
                                    2. 기초 배근 입력 및 산출방법<br>
                                    3. 기둥 배근 입력 및 산출방법<br>
                                    4. 보 배근 입력 및 산출방법<br>
                                    5. 슬래브 배근 입력 및 산출방법<br>
                                    6. 옹벽 배근 입력 및 산출방법<br>
                                    7. 계단 배근 입력 및 산출방법<br>
                                    8. 산출 부재의 주요 변수<br><br>

                                    10강. 구조 산출 후 집계, 분석방법<br>
                                    1. 산출 후의 수량 집계 결과<br>
                                    2. 집계표의 종류<br>
                                    3. 물량확인법<br><br>

                                    11강. 철골 부재 수량산출 이해 및 실습<br>
                                    1. 철골의 산출 개념<br>
                                    2. 철골 자재의 종류 및 이해<br>
                                    3. 보 부재 산출 실습<br>
                                    4. 기둥 부재 산출 실습<br>
                                    5. 프로그램으로 산출
                                <?php } ?>
                                <?php if ( $selected_book == '3' ) { // 3부 ?>
                                    12강. 마감 수량 산출 전 숙지할 상식<br>
                                    1. 마감의 산출 개념<br>
                                    2. 마감의 5가지 부재 산출<br>
                                    3. 일반건물과 아파트의 산출 차이<br>
                                    4. 부자재의 산출<br>
                                    5. 엑셀 전환 파일의 활용<br><br>

                                    13강. 창호 수량 산출의 이해 및 실습<br>
                                    1. 창호의 산출 개념<br>
                                    2. 창호의 기호와 종류<br>
                                    3. 창호의 개수 산출<br>
                                    4. 문틀사춤 및 코킹 산출<br>
                                    5. 하드웨어의 산출<br>
                                    6. 창호의 도장 배수<br>
                                    7. 유리 및 유리코킹 산출<br>
                                    8. 구조, 웨더코킹, 노턴테이프 산출<br>
                                    9. FIN-6.2 프로그램으로 산출<br><br>

                                    14강. 조적 수량 산출의 이해 및 실습<br>
                                    1. 조적의 산출 개념<br>
                                    2. 벽체의 기호와 종류<br>
                                    3. 시멘트 벽돌 쌓기<br>
                                    4. 시멘트 블록 쌓기<br>
                                    5. 경량칸막이 설치<br>
                                    6. 인방 및 부자재<br>
                                    7. FIN-6.2 프로그램으로 산출<br><br>

                                    15강. 내부 수량 산출의 이해 및 실습<br>
                                    1. 내부의 산출 개념<br>
                                    2. 재료 마감표의 이해<br>
                                    3. 바닥/천정의 산출<br>
                                    4. 벽체의 산출<br>
                                    5. 걸레받이/몰딩의 산출<br>
                                    6. 기타 자재의 산출<br>
                                    7. FIN-6.2 프로그램으로 산출 검토<br><br>

                                    16강. 외부 수량 산출의 이해 및 실습<br>
                                    1. 외부의 산출 개념<br>
                                    2. 외부 산출 시 참고 도면<br>
                                    3. 바탕과 마감의 산출<br>
                                    4. 산출 단위의 중요성<br>
                                    5. 외벽의 산출 실습<br>
                                    6. FIN-6.2 프로그램으로 산출<br><br>

                                    17강. 가설 수량 산출의 이해 및 실습<br>
                                    1. 가설의 산출 개념<br>
                                    2. 공통가설과 건축가설의 차이<br>
                                    3. 공통가설공사의 항목 이해<br>
                                    4. 건축가설공사의 항목 이해<br>
                                    5. 가설공사의 수량 검토<br>
                                    6. FIN 6.2 프로그램으로 산출<br><br>

                                    18강. 프로그램을 통한 마감 산출의 이해 (FIN 6.2)<br>
                                    1. 공사 등록 방법<br>
                                    2. 창호의 산출<br>
                                    3. 조적의 산출<br>
                                    4. 내부의 산출<br>
                                    5. 외부의 산출<br>
                                    6. 가설의 산출<br>
                                    7. 산출 항목의 주요 변수<br>
                                    8. 집계표<br><br>

                                    19강. 마감 산출 후 집계, 분석<br>
                                    1. 집계표를 통한 수량 검토<br>
                                    2. 바닥/천정면적 대비 개요면적 비교<br>
                                    3. 외부 개산면적 대비 외부항목의 합계 비교<br>
                                    4. 프로그램을 통한 검토<br>
                                    5. 수량 산출 후 확인 및 검토
                                <?php } ?>
                                <?php if ( $selected_book == '4' ) { // 4부 ?>
                                    20강. 내역서 작성방법 및 간접공사비 작성<br>
                                    1. 산출 후 내역서 작성과정<br>
                                    2. 내역 연계(산출→내역 프로그램 이기)<br>
                                    3. 산출 결과물(엑셀)<br>
                                    4. 간접공사비의 작성<br>
                                    5. 총 공사비의 구성<br><br>

                                    21강. 내역서 검토를 통한 공사비 및 수량의 검토<br>
                                    1. 가설공사로 검토<br>
                                    2. 자재할증(LOSS)으로 검토<br>
                                    3. 바탕과 마감재의 비교 검토<br>
                                    4. 건물별 평당금액 비교로 검토<br>
                                    5. 공종별 평당금액 비교로 검토<br><br>

                                    22강. 내역서의 종류(국내/해외공사)<br>
                                    1. 내역서의 이해<br>
                                    2. 내역서의 종류<br><br>

                                    부록 : 건축내역서 작성
                                <?php } ?>
                                <?php if ( $selected_book == '5' ) { // 5부 ?>
                                    23강. 가설, 철근 콘크리트, 철골공사 공종별 항목의 설명<br>
                                    1. 공통 가설공사의 항목<br>
                                    2. 건축 가설공사의 항목<br>
                                    3. 철근 콘크리트 공사의 항목<br>
                                    4. 철골공사의 항목<br><br>

                                    24강. 조적, 방수, 미장공사 공종별 항목의 설명<br>
                                    1. 조적공사의 항목<br>
                                    2. 방수공사의 항목<br>
                                    3. 미장공사의 항목<br><br>

                                    25강. 타일, 석, 목공사 공종별 항목의 설명<br>
                                    1. 타일공사의 항목<br>
                                    2. 석공사의 항목<br>
                                    3. 목공사의 항목<br><br>

                                    26강. 금속/창호/유리공사 공종별 항목의 설명<br>
                                    1. 금속공사의 항목<br>
                                    2. 창호공사의 항목<br>
                                    3. 유리공사의 항목<br><br>

                                    27강. 도장/수장/잡공사 공종별 항목의 설명<br>
                                    1. 도장공사의 항목<br>
                                    2. 수장공사의 항목(바닥)<br>
                                    3. 수장공사의 항목(천정)<br>
                                    4. 수장공사의 항목(벽체)<br>
                                    5. 수장공사의 항목(몰딩/걸레받이)<br>
                                    6. 잡공사의 항목
                                <?php } ?>
                                <?php if ( $selected_book == '6' ) { // 6부 ?>
                                    28강. 설계변경의 이해와 접근 방법<br>
                                    1. 설계변경의 정의<br>
                                    2. 수량의 증감<br>
                                    3. 단가의 변경<br>
                                    4. 공사조건의 변경<br>
                                    5. 에스컬레이션(ESCALATION)<br>
                                    6. 설계변경의 접근 방법<br><br>

                                    29강. 공사원가를 개선하는 방법과 건설클레임<br>
                                    1. 공사원가율의 개념<br>
                                    2. 공사원가 개선 방법<br>
                                    3. 건설클레임의 개념<br>
                                    4. 건설클레임의 서류 검토<br>
                                    5. 논리적인 글쓰기<br><br>

                                    30강. 한국형 Q.S제도(건설원가관리사KQS) Korea Quantity Surveyor<br>
                                    1. 건설공사비 원가 관리<br>
                                    2. 해외의 공사비 관리 제도<br>
                                    3. 한국의 건설원가관리사 자격증 제도<br>
                                    4. 순수내역 입찰방식<br>
                                    5. 한국형 QS<br>
                                    6. 견적 전문가의 역할<br>
                                    7. 정년없이 평생을 책임지는 직업<br><br>

                                    부 록 : 마감수량 산출 결과표<br>
                                    건설원가관리사 예상문제<br>
                                    건설원가관리사 예상문제 정답 및 해설
                                <?php } ?>
                                </div>
                                <div class="text-center">
                                    <button type="button" id="btn_show_agenda" class="btn btn-success">목차 더보기 +</button>
                                </div>
                            </div>
                            <div class="tab-pane fade<?php echo ( $tab == 'review') ? ' show active' : ''; ?> p-30" id="tab1-4" role="tabpanel" aria-labelledby="tab1-4-tab">
                                <div class="book_review_wrapper mt-5">
                                    <h3>공사비닷컴 회원이 평가한 평균별점</h3>
                                    <div class="book_review_number mt-4">
                                        <img src="/static/img/star_big.png">
                                        <img src="/static/img/star_big.png">
                                        <img src="/static/img/star_big.png">
                                        <img src="/static/img/star_big.png">
                                        <img src="/static/img/star_big.png">
                                        <span class="mfc ml-3"><?php echo $review_avarage; ?></span>
                                        <span class="small">/ 10.0</span>
                                    </div>
                                    <div class="book_review_rate mt-5">
                                        <div class="rate_item">
                                            <div class="rate_item_star">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_on.png">
                                            </div>
                                            <div class="rate_stick">
                                                <?php
                                                    $on = (int)$review_summary_count['score5'];
                                                    $off = 100 - (int)$review_summary_count['score5'];
                                                ?>                                          
                                                <?php if ( $on == 0 ) { ?>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                                <?php if ( 0 < $on && $on < 15 ) { ?>
                                                <div class="stick hide" style="width:<?php echo $on; ?>%">-</div>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%;"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                                <?php if ( 15 <= $on && $on < 100 ) { ?>
                                                <div class="stick" style="width:<?php echo $on; ?>%"><?php echo $on; ?>%</div>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%"></div>
                                                <?php } ?>
                                                <?php if ( $on == 100 ) { ?>
                                                <div class="stick" style="width:<?php echo $on; ?>%"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="rate_item">
                                            <div class="rate_item_star">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_off.png">
                                            </div>
                                            <div class="rate_stick">
                                                <?php
                                                    $on = (int)$review_summary_count['score4'];
                                                    $off = 100 - (int)$review_summary_count['score4'];
                                                ?>                                          
                                                <?php if ( $on == 0 ) { ?>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                                <?php if ( 0 < $on && $on < 15 ) { ?>
                                                <div class="stick hide" style="width:<?php echo $on; ?>%">-</div>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%;"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                                <?php if ( 15 <= $on && $on < 100 ) { ?>
                                                <div class="stick" style="width:<?php echo $on; ?>%"><?php echo $on; ?>%</div>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%"></div>
                                                <?php } ?>
                                                <?php if ( $on == 100 ) { ?>
                                                <div class="stick" style="width:<?php echo $on; ?>%"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="rate_item">
                                            <div class="rate_item_star">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_off.png">
                                                <img src="/static/img/star_mid_off.png">
                                            </div>
                                            <div class="rate_stick">
                                                <?php
                                                    $on = (int)$review_summary_count['score3'];
                                                    $off = 100 - (int)$review_summary_count['score3'];
                                                ?>                                                
                                                <?php if ( $on == 0 ) { ?>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                                <?php if ( 0 < $on && $on < 15 ) { ?>
                                                <div class="stick hide" style="width:<?php echo $on; ?>%">-</div>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%;"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                                <?php if ( 15 <= $on && $on < 100 ) { ?>
                                                <div class="stick" style="width:<?php echo $on; ?>%"><?php echo $on; ?>%</div>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%"></div>
                                                <?php } ?>
                                                <?php if ( $on == 100 ) { ?>
                                                <div class="stick" style="width:<?php echo $on; ?>%"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="rate_item">
                                            <div class="rate_item_star">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_off.png">
                                                <img src="/static/img/star_mid_off.png">
                                                <img src="/static/img/star_mid_off.png">
                                            </div>
                                            <div class="rate_stick">
                                                <?php
                                                    $on = (int)$review_summary_count['score2'];
                                                    $off = 100 - (int)$review_summary_count['score2'];
                                                ?>                                          
                                                <?php if ( $on == 0 ) { ?>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                                <?php if ( 0 < $on && $on < 15 ) { ?>
                                                <div class="stick hide" style="width:<?php echo $on; ?>%">-</div>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%;"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                                <?php if ( 15 <= $on && $on < 100 ) { ?>
                                                <div class="stick" style="width:<?php echo $on; ?>%"><?php echo $on; ?>%</div>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%"></div>
                                                <?php } ?>
                                                <?php if ( $on == 100 ) { ?>
                                                <div class="stick" style="width:<?php echo $on; ?>%"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="rate_item">
                                            <div class="rate_item_star">
                                                <img src="/static/img/star_mid_on.png">
                                                <img src="/static/img/star_mid_off.png">
                                                <img src="/static/img/star_mid_off.png">
                                                <img src="/static/img/star_mid_off.png">
                                                <img src="/static/img/star_mid_off.png">
                                            </div>
                                            <div class="rate_stick">
                                                <?php
                                                    $on = (int)$review_summary_count['score1'];
                                                    $off = 100 - (int)$review_summary_count['score1'];
                                                ?>                                          
                                                <?php if ( $on == 0 ) { ?>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                                <?php if ( 0 < $on && $on < 15 ) { ?>
                                                <div class="stick hide" style="width:<?php echo $on; ?>%">-</div>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%;"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                                <?php if ( 15 <= $on && $on < 100 ) { ?>
                                                <div class="stick" style="width:<?php echo $on; ?>%"><?php echo $on; ?>%</div>
                                                <div class="off_stick" style="width:<?php echo $off; ?>%"></div>
                                                <?php } ?>
                                                <?php if ( $on == 100 ) { ?>
                                                <div class="stick" style="width:<?php echo $on; ?>%"><?php echo $on; ?>%</div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="mt-5">북로그 리뷰</h3>
                                    <div class="book_review_write mt-4">
                                        <p>리뷰 쓰기 <small>로그인을 하시면 리뷰를 쓰실 수 있습니다.</small></p>
                                        <form method="post" id="frm_review_regist">
                                        <input type="hidden" name="book_num" value="<?php echo $selected_book; ?>">
                                        <input type="hidden" name="review_seq" value="">
                                        <input type="hidden" name="mode" value="ins">
                                        <table class="book_review_write_table">
                                            <colgroup>
                                                <col width="100px">
                                                <col width="540px">
                                                <col width="*">
                                            </colgroup>
                                            <tbody>
                                            <tr>
                                                <th>교재&nbsp;평점</th>
                                                <td colspan="2">
                                                    <label for="review_score5"><input type="radio" name="review_score" id="review_score5" value="5" checked="true"> <img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"></label>
                                                    <label for="review_score4"><input type="radio" name="review_score" id="review_score4" value="4"> <img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"></label>
                                                    <label for="review_score3"><input type="radio" name="review_score" id="review_score3" value="3"> <img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"></label>
                                                    <label for="review_score2"><input type="radio" name="review_score" id="review_score2" value="2"> <img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"></label>
                                                    <label for="review_score1"><input type="radio" name="review_score" id="review_score1" value="1"> <img src="/static/img/star_mid_on.png"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>내&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;용</th>
                                                <td><textarea name="review_comment" rows="3" style="resize:none;"></textarea></td>
                                                <td>
                                                    <button type="button" class="review_ins" onclick="<?php echo ( $this->session->userdata('MEMBER_SESSION') ) ? 'review_regist(this);' : 'is_not_login();'; ?>">등록하기</button>
                                                    <?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>
                                                    <button type="button" class="review_mod" onclick="review_modify_proc(this);">수정하기</button>
                                                    <button type="button" class="review_cancel" onclick="review_modify_cancel(this);">취소</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </form>
                                    </div>
                                    <div class="book_review_list">
                                        <div class="book_review_filter_area">
                                            <form method="get" id="frm_review_order">
                                            <input type="hidden" name="num" value="<?php echo $selected_book; ?>">
                                            <input type="hidden" name="order_by" value="">
                                            <ul class="book_review_filter">
                                                <li><button type="button" onclick="set_order('score');">도움순</button></li>
                                                <li><button type="button" onclick="set_order('new');">최신순</button></li>
                                            </ul>
                                            </form>
                                        </div>
                                        <table class="book_review_list_table">
                                            <?php if ( $review_count == 0 ) { ?>
                                            <tr>
                                                <td>등록된 리뷰가 없습니다.</td>
                                            </tr>
                                            <?php } ?>
                                            <?php
                                            foreach ($review_list as $review) {
                                                $on_count = (int)$review->review_score;
                                                $off_count = 5 - (int)$review->review_score;
                                                if ( strpos($review->ins_user, '@') !== false )
                                                    $user = explode('@', $review->ins_user)[0];
                                                else
                                                    $user = $review->ins_user;
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="review_top"><?php echo HP_ENC_TEXT($user); ?> <span class="date"><?php echo substr($review->ins_datetime, 0, 16); ?></span> <span class="star"><?php for ( $i = 0; $i < $on_count; $i++ ) { ?><img src="/static/img/star_small_on.png"><?php } ?><?php for ( $i = 0; $i < $off_count; $i++ ) { ?><img src="/static/img/star_small_off.png"><?php } ?></span>
                                                        <?php if ( $this->session->userdata('MEMBER_SESSION') && $this->session->userdata('MEMBER')['member_id'] == $review->ins_user ) { ?>
                                                            <div class="review_action">
                                                                <button type="button" onclick="review_modify('<?php echo $review->review_seq; ?>');">수정</button>
                                                                <button type="button" onclick="review_delete('<?php echo $review->review_seq; ?>', 'kor');">삭제</button>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="review_bottom"><?php echo nl2br($review->review_comment); ?></div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade<?php echo ( $tab == 'cs') ? ' show active' : ''; ?> p-30" id="tab1-5" role="tabpanel" aria-labelledby="tab1-5-tab">
                                <p>※ 상품 설명에 반품/교환 관련한 안내가 있는 경우 그 내용을 우선으로 합니다. (업체 사정에 따라 달라질 수 있습니다.)</p>
                                <table class="table table-bordered classy-table gongsabi-table lecture-list-table m-top-30 m-bottom-30">
                                <colgroup>
                                    <col width="20%">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="text-center bg-gray bg-gray">
                                            배송방법
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>
                                                    택배배송 (세트 구매의 경우, 배송비가 무료이나 개별 구매 시 착불로 배송이 됩니다.)<br>
                                                    결제 완료기준 1-2일 이내 출고 됩니다.
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            반품/교환 방법
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>
                                                    공사비닷컴 로그인 > 마이페이지 > 공사비교육 > 교재구매 > <a href="/front/mypage/education/bookcs" class="mfc">주문취소/교환/환불신청</a>,<br>
                                                    고객센터 (02.2202.2258) 또는 <a href="/front/customer/qna" class="mfc">Q&A</a> 를 이용해주시기 바랍니다.<br>
                                                    환불을 원하실 때는 받으신 상태 그대로 반품하시면 확인하고 환불처리 진행해 드리도록 하겠습니다.<br>
                                                    부분 취소/교환/환불을 원하실 경우, 전체 취소 후 개별 결제를 다시 해주셔야 합니다.
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            반품/교환가능 기간
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>
                                                    변심반품의 경우 수령 후 7일 이내,<br>
                                                    상품의 결함 및 계약내용과 다를 경우 문제점 발견 후 30일 이내 가능합니다. 
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            반품/교환 비용
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>
                                                    변심 혹은 구매착오로 인한 주문 취소 / 교환 / 환불은 반송료를 회원님이 부담하셔야 합니다.
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            환불/교환 불가 사유
                                        </th>
                                        <td>
                                            다음 사유에 해당 시 취소 / 교환 / 환불은 불가합니다.<br>
                                            <ul class="mt-2 default_ul">
                                                <li>구매자의 책임 있는 사유로 상품 등이 손실 또는 훼손된 경우</li>
                                                <li>구매자의 사용, 비닐 포장 개봉에 의해 상품 등의 가치가 현저히 감소한 경우</li>
                                                <li>복제가 가능한 상품 등의 포장이 훼손된 경우</li>
                                                <li>시간의 경과에 의해 재판매가 곤란한 정도로 가치가 현저히 감소한 경우</li>
                                                <li>반품요청기간이 지난 경우</li>
                                                <li>전자상거래 등에서의 소비자보호에 관한 법률이 정하는 소비자 청약철회 제한 내용에 해당되는 경우</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            상품품절
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>공급사 (출판사) 재고 사정에 의해 품절/지연될 수 있으며, 품절 시 관련 사항에 대해서는 이메일과 SNS로 안내드리겠습니다.</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            소비자 피해보상 환불 지연에 따른 보상
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>상품의 불량에 의한 교환, A/S, 환불, 품질보증 및 피해보상 등에 관한 사항은 소비자 분쟁해결 기준 (공정거래위원회 고시)에 준하여 처리됩니다.</li>
                                                <li>대금 환불 및 환불지연에 따른 배상금 지급 조건, 절차 등은 전자상거래 등에서의 소비자 보호에 관한 법률에 따라 처리합니다.</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 미리보기 MODAL -->
    <div class="modal fade" id="book_preview_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog custom-modal" role="document">
            <div class="modal-content">
                <div class="modal-body p-30">
                    <ul class="nav nav-tabs<?php echo ( $selected_book == '9' ) ? ' justify-content-center' : ''; ?>" id="tab-preview" role="tablist">
                        <?php if ( $selected_book == '9' || $selected_book == '1' ) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-preview-1-tab" data-toggle="tab" href="#tab-preview-1" role="tab" aria-controls="tab-preview-1" aria-selected="true">제 1부</a>
                        </li>
                        <?php } ?>
                        <?php if ( $selected_book == '9' || $selected_book == '2' ) { ?>
                        <li class="nav-item">
                            <a class="nav-link<?php echo ( $selected_book != '9' ) ? ' active' : ''; ?>" id="tab-preview-2-tab" data-toggle="tab" href="#tab-preview-2" role="tab" aria-controls="tab-preview-2" aria-selected="false">제 2부</a>
                        </li>
                        <?php } ?>
                        <?php if ( $selected_book == '9' || $selected_book == '3' ) { ?>
                        <li class="nav-item">
                            <a class="nav-link<?php echo ( $selected_book != '9' ) ? ' active' : ''; ?>" id="tab-preview-3-tab" data-toggle="tab" href="#tab-preview-3" role="tab" aria-controls="tab-preview-3" aria-selected="false">제 3부</a>
                        </li>
                        <?php } ?>
                        <?php if ( $selected_book == '9' || $selected_book == '4' ) { ?>
                        <li class="nav-item">
                            <a class="nav-link<?php echo ( $selected_book != '9' ) ? ' active' : ''; ?>" id="tab-preview-4-tab" data-toggle="tab" href="#tab-preview-4" role="tab" aria-controls="tab-preview-4" aria-selected="false">제 4부</a>
                        </li>
                        <?php } ?>
                        <?php if ( $selected_book == '9' || $selected_book == '5' ) { ?>
                        <li class="nav-item">
                            <a class="nav-link<?php echo ( $selected_book != '9' ) ? ' active' : ''; ?>" id="tab-preview-5-tab" data-toggle="tab" href="#tab-preview-5" role="tab" aria-controls="tab-preview-5" aria-selected="false">제 5부</a>
                        </li>
                        <?php } ?>
                        <?php if ( $selected_book == '9' || $selected_book == '6' ) { ?>
                        <li class="nav-item">
                            <a class="nav-link<?php echo ( $selected_book != '9' ) ? ' active' : ''; ?>" id="tab-preview-6-tab" data-toggle="tab" href="#tab-preview-6" role="tab" aria-controls="tab-preview-6" aria-selected="false">제 6부</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content">
                        <?php if ( $selected_book == '9' || $selected_book == '1' ) { ?>
                        <div class="tab-pane text-center fade show active" id="tab-preview-1" role="tabpanel" aria-labelledby="tab-preview-1-tab">
                            <img src="/static/img/book_preview1.png">
                        </div>
                        <?php } ?>
                        <?php if ( $selected_book == '9' || $selected_book == '2' ) { ?>
                        <div class="tab-pane text-center fade<?php echo ( $selected_book != '9' ) ? ' show active' : ''; ?>" id="tab-preview-2" role="tabpanel" aria-labelledby="tab-preview-2-tab">
                            <img src="/static/img/book_preview2.png">
                        </div>
                        <?php } ?>
                        <?php if ( $selected_book == '9' || $selected_book == '3' ) { ?>
                        <div class="tab-pane text-center fade<?php echo ( $selected_book != '9' ) ? ' show active' : ''; ?>" id="tab-preview-3" role="tabpanel" aria-labelledby="tab-preview-3-tab">   
                            <img src="/static/img/book_preview3.png">
                        </div>
                        <?php } ?>
                        <?php if ( $selected_book == '9' || $selected_book == '4' ) { ?>
                        <div class="tab-pane text-center fade<?php echo ( $selected_book != '9' ) ? ' show active' : ''; ?>" id="tab-preview-4" role="tabpanel" aria-labelledby="tab-preview-4-tab">
                            <img src="/static/img/book_preview4.png">
                        </div>
                        <?php } ?>
                        <?php if ( $selected_book == '9' || $selected_book == '5' ) { ?>
                        <div class="tab-pane text-center fade<?php echo ( $selected_book != '9' ) ? ' show active' : ''; ?>" id="tab-preview-5" role="tabpanel" aria-labelledby="tab-preview-5-tab">
                            <img src="/static/img/book_preview5.png">
                        </div>
                        <?php } ?>
                        <?php if ( $selected_book == '9' || $selected_book == '6' ) { ?>
                        <div class="tab-pane text-center fade<?php echo ( $selected_book != '9' ) ? ' show active' : ''; ?>" id="tab-preview-6" role="tabpanel" aria-labelledby="tab-preview-6-tab">
                            <img src="/static/img/book_preview6.png">
                        </div>
                        <?php } ?>
                    </div>
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">닫기</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 도서소득공제안내 MODAL -->
    <div class="modal fade" id="book_gongje_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog custom-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mfc">도서소득공제 안내</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body p-30">
                    <h6 class="mb-3">도서 소득공제란 ?</h6>
                    <p class="mb-1">2018년 7월 1일 부터 근로소득자가 신용카드 등으로 도서구입 및 공연을 관람하기 위해 사용한 금액이 추가 공제됩니다. (추가 공제한도 100만원까지 인정)</p>
                    <ul class="mb-4 default_ul">
                        <li>총 급여 7,000만원 이하 근로소득자 중 신용카드, 직불카드 등 사용액이 총급여의 25%가 넘는 사람에게 적용</li>
                        <li>현재 '신용카드 등 사용금액'의 소득 공제한도는 300만원이고 신용카드 사용액의 소득공제율은 15%이지만, 도서·공연 사용분은 추가로 100만원의 소득 공제한도가 인정되고 공제율은 30%로 적용</li>
                        <li>시행시기 이후 도서·공연 사용액에 대해서는 "2018년 귀속 근로소득 연말 정산시기(19.1.15~)에 국세청 홈택스 연말정산간소화 서비스 제공</li>
                    </ul>
                    <h6 class="mb-3">도서 소득공제 가능 결제수단</h6>
                    <ul class="mb-4 default_ul">
                        <li>카드결제 : 신용카드 (개인카드에 한함)</li>
                        <li>현금결제 : 실시간계좌이체, 무통장입금, 가상계좌</li>
                        <li>간편결제 : 삼성페이, 카카오페이, KPAY</li>
                        <li>현금결제는 현금영수증을 개인소득공제용으로 신청 시에만 도서 소득공제 됩니다.</li>
                        <li>휴대폰 결제는 도서 소득공제 불가</li>
                    </ul>
                    <h6 class="mb-3">도서 소득공제 불가 안내</h6>
                    <ul class="mb-4 default_ul">
                        <li>법인카드로 결제한 경우</li>
                        <li>현금영수증을 사업자증빙용으로 신청한 경우</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(function() {
        $('#btn_book_preview').on('click', function() {
            var num = $(this).attr('data-book-num');
            $('#book_preview_modal').modal('show');
        });

        $('#btn_show_agenda').on('click', function() {
            if ( $('.book_agenda').hasClass('hidden') )
                $('.book_agenda').removeClass('hidden');
            else
                $('.book_agenda').addClass('hidden');
        });

        $('#btn_pay').on('click', function() {
            var price = $('.book-price').val();
            var method = $('.pay-method').val();
            var email = $('#board_email').val();
            var name = $('#board_name').val();
            var tel = $('#board_hp').val();
            var addr = $('#board_etc_1').val();
            var addr_detail = $('#board_etc_4').val();
            var order_price = $('.order-price').val();

            if ( name == '' )
            {
                alert('이름을 입력해 주십시오.');
                return false;
            }
            else if ( tel == '' )
            {
                alert('휴대폰번호를 입력해 주십시오.');
                return false;
            }
            else if ( addr == '' )
            {
                alert('배송주소를 입력해 주십시오.');
                return false;
            }
            else
            {
                go_book_pay(order_price, method, email, name, tel, addr);
            }
        });

        $('#board_category').on('change', function() {
            var book_info = $(this).val();
            var book_number = book_info.split('|')[0];
            var book_price = parseInt(book_info.split('|')[1]);
            $('.book-image').attr('src', '/static/img/book' + book_number + '.jpg');
            $('.book-price').val(book_price);
            var qty = parseInt($('#board_etc_2').val());
            var order_price = book_price * qty;
            $('.order-price').val(order_price);
            $('.book-price-text').text(numberWithCommas(order_price) + '원');
        });

        // 수량 변경시
        $('#board_etc_2').on('change', function() {
            var book_price = parseInt($('.book-price').val());
            var qty = parseInt($(this).val());
            var order_price = book_price * qty;
            $('.order-price').val(order_price);
            $('.book-price-text').text(numberWithCommas(order_price) + '원');
        });

        // 배송 메모 선택시
        $('#_board_content').on('change', function() {
            var memo = $(this).val();
            if ( memo == '직접 입력' ) {
                $('#board_content').removeClass('hide').val('');
            } else {
                $('#board_content').addClass('hide').val(memo);
            }
        });

        $('#btn_book_gongje').on('click', function() {
            $('#book_gongje_modal').modal('show');
        });
    });

    function set_order(type)
    {
        $('[name=order_by]').val(type);
        $('#frm_review_order').submit();
    }
    </script>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
        // 우편번호 찾기 찾기 화면을 넣을 element
        var element_wrap = document.getElementById('wrap');

        function foldDaumPostcode() {
            // iframe을 넣은 element를 안보이게 한다.
            element_wrap.style.display = 'none';
        }

        function execDaumPostcode() {
            // 현재 scroll 위치를 저장해놓는다.
            var currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
            new daum.Postcode({
                oncomplete: function(data) {
                    // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    var addr = ''; // 주소 변수
                    var extraAddr = ''; // 참고항목 변수

                    //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                        addr = data.roadAddress;
                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        addr = data.jibunAddress;
                    }

                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    // 커서를 상세주소 필드로 이동한다.
                    // $('#board_etc_3').val(data.zonecode);
                    $('#board_etc_1').val(addr).focus();

                    // iframe을 넣은 element를 안보이게 한다.
                    // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                    element_wrap.style.display = 'none';

                    // 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.
                    document.body.scrollTop = currentScroll;
                },
                // 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분. iframe을 넣은 element의 높이값을 조정한다.
                onresize : function(size) {
                    element_wrap.style.height = size.height+'px';
                },
                width : '100%',
                height : '100%'
            }).embed(element_wrap);

            // iframe을 넣은 element를 보이게 한다.
            element_wrap.style.display = 'block';
        }
    </script>