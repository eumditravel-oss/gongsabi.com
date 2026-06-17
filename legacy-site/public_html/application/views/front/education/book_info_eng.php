
    <section class="shortcodes_content_area p-top-50">
        <div class="container">
            <div class="row">
                <div class="col-4 text-center">
                    <img src="/static/img/book<?php echo $selected_book; ?>.jpg" alt="" style="height:350px;" class="book-image my-3">
                </div>
                <div class="col-6 pl-5 p-top-50 book_info">
                    <h3>『Construction Cost Estimating For Field Engineer』</h3>
                    <?php if ( $selected_book == '9' ) { // 1-6부 ?>
                    <span class="book_label">Books 1 - 6</span>
                    <?php } else { ?>
                    <span class="book_label">Book <?php echo $selected_book; ?></span>
                    <?php } ?>
                    <p class="mt-4">Written by David Hyun | Publish by CNEWS | Published on July 10th, 2020</p>
                    <ul class="book_price">
                        <li>
                            <p>Fixed price</p>
                            <p class="price fcg">\ <?php echo number_format($this->config->item('BOOK_LIST')[$selected_book]['org_price']); ?></p>
                        </li>
                        <li>
                            <p>Membership discount</p>
                            <p class="price mfc">\ <?php echo number_format($this->config->item('BOOK_LIST')[$selected_book]['price']); ?> <small>( 10% Off )</small></p>
                        </li>
                    </ul>
                    <p class="fcg mt-3">Post Office Delivery for single purchase (Delivery charges) | Free delivery fee for a set purchase</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <ul class="book_thumbnail_list">
                        <li><a href="/front/education/book_info?num=9"><img src="/static/img/book9.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['9']['eng_name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=1"><img src="/static/img/book1.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['1']['eng_name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=2"><img src="/static/img/book2.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['2']['eng_name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=3"><img src="/static/img/book3.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['3']['eng_name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=4"><img src="/static/img/book4.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['4']['eng_name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=5"><img src="/static/img/book5.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['5']['eng_name']; ?>"></a></li>
                        <li><a href="/front/education/book_info?num=6"><img src="/static/img/book6.jpg" style="height:120px;" alt="<?php echo $this->config->item('BOOK_LIST')['6']['eng_name']; ?>"></a></li>
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
                                <a class="nav-link<?php echo ( $tab == 'buy' || $tab == '') ? ' active' : ''; ?>" id="tab1-3-tab" data-toggle="tab" href="#tab1-3" role="tab" aria-controls="tab1-3" aria-selected="true">Buy now</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $tab == 'info') ? ' active' : ''; ?>" id="tab1-1-tab" data-toggle="tab" href="#tab1-1" role="tab" aria-controls="tab1-1" aria-selected="false">Product details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $tab == 'agenda') ? ' active' : ''; ?>" id="tab1-2-tab" data-toggle="tab" href="#tab1-2" role="tab" aria-controls="tab1-2" aria-selected="false">Table of contents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $tab == 'review') ? ' active' : ''; ?>" id="tab1-4-tab" data-toggle="tab" href="#tab1-4" role="tab" aria-controls="tab1-4" aria-selected="false">Customer reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo ( $tab == 'cs') ? ' active' : ''; ?>" id="tab1-5-tab" data-toggle="tab" href="#tab1-5" role="tab" aria-controls="tab1-5" aria-selected="false">Replacement/Refund/Delivery</a>
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
                                                <label for="board_category">Books <small class="text-danger">* Required</small></label>
                                                <select class="custom-select d-block w-100" name="board_category" id="board_category">
                                                <?php foreach ($this->config->item('BOOK_LIST') as $key => $book) { ?>
                                                    <option value="<?php echo $key; ?>|<?php echo $book['price']; ?>"<?php if ( $key == $selected_book ) { ?> selected="true"<?php } ?>><?php echo $book['eng_name']; ?></option>
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
                                                <label for="board_etc_2">Quantity <small class="text-danger">* Required</small></label>
                                                <input type="number" class="form-control" name="board_etc_2" id="board_etc_2" placeholder="Quantity" value="1" min="1" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="board_name">Name <small class="text-danger">* Required</small></label>
                                                <input type="text" class="form-control" name="board_name" id="board_name" placeholder="Name" value="<?php echo $this->session->userdata('MEMBER')['member_name']; ?>" required>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="board_company">Company</label>
                                                <input type="text" class="form-control" name="board_company" id="board_company" placeholder="Company" value="<?php echo $this->session->userdata('MEMBER')['member_company']; ?>">
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="board_hp">Tel <small class="text-danger">* Required</small></label>
                                                <input type="text" class="form-control handle-cell-phone" name="board_hp" id="board_hp" placeholder="Tel" value="<?php echo $this->session->userdata('MEMBER')['member_hp']; ?>" maxlength="13" required>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="board_email">E-mail</label>
                                                <div class="form-email">
                                                    <input type="hidden" name="board_email" value="<?php echo $this->session->userdata('MEMBER')['member_id']; ?>">
                                                    <span class="email-part"><input type="text" class="form-control" name="email_id"></span>
                                                    <span class="email-at">@</span>
                                                    <span class="email-part pr-1"><input type="text" class="form-control" name="email_address"></span>
                                                    <span class="email-part">
                                                        <select name="email_address_list" class="form-control">
                                                            <option value="">Direct input</option>
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
                                                <label for="board_etc_1">Shipping address <small class="text-danger">* Required</small></label><br>
                                                <button class="btn btn-success mb-2" type="button" onclick="execDaumPostcode()">Select your location</button><br>
                                                <div id="wrap" class="mb-2" style="display:none;border:1px solid;width:500px;height:300px;position:relative;">
                                                    <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
                                                </div>
                                                <input type="text" class="form-control mb-2" name="board_etc_1" id="board_etc_1" placeholder="Shipping address" value="" required="true" readonly="true">
                                                <input type="text" class="form-control mb-3" name="board_etc_4" id="board_etc_4" placeholder="Shipping details" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="_board_content">Additional Details</label>
                                                <select class="custom-select d-block w-100" name="_board_content" id="_board_content">
                                                    <option value="">Select your preference</option>
                                                    <option value="Please contact me before delivery.">Please contact me before delivery.</option>
                                                    <option value="Please leave the package at the security office.">Please leave the package at the security office.</option>
                                                    <option value="Please put the package at the door.">Please put the package at the door.</option>
                                                    <option value="Please put the package in the delivery box.">Please put the package in the delivery box.</option>
                                                    <option value="Please contact me via phone in case of absence.">Please contact me via phone in case of absence.</option>
                                                    <option value="Please leave the package at the security office in case of absence.">Please leave the package at the security office in case of absence.</option>
                                                    <option value="Please put the package at the door in case of absence.">Please put the package at the door in case of absence.</option>
                                                    <option value="Direct input">Direct input</option>
                                                </select>
                                                <input type="text" class="form-control mt-3 hide" name="board_content" id="board_content" value="">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Payment <small class="text-danger">* Required</small></label>
                                                <div class="pay_method_wrapper">
                                                    <div class="pay_method_item">
                                                        <label for="pay_method_card"><input type="radio" name="_pay_method" value="card" id="pay_method_card" checked="true"><span>Card</span></label>
                                                    </div>
                                                    <div class="pay_method_item">
                                                        <label for="pay_method_bank"><input type="radio" name="_pay_method" value="bank" id="pay_method_bank"><span>CMS</span></label>
                                                    </div>
                                                    <div class="pay_method_item">
                                                        <label for="pay_method_trans"><input type="radio" name="_pay_method" value="trans" id="pay_method_trans"><span>Real Time Payment</span></label>
                                                    </div>
                                                    <div class="pay_method_item">
                                                        <label for="pay_method_vbank"><input type="radio" name="_pay_method" value="vbank" id="pay_method_vbank"><span>Virtual Account</span></label>
                                                    </div>
                                                    <div class="pay_method_item">
                                                        <label for="pay_method_phone"><input type="radio" name="_pay_method" value="phone" id="pay_method_phone"><span>Mobile Payment</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="book_buy_warning">
                                                    ※ Become a member to get exclusive discounts. CMS payments without logging in will not be counted.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-top-15">
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-success" onclick="go_book_pay();">Buy now</button>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>
                                
                                <div class="gongsabi-comment-area pay_method_desc pay_method_desc_bank">
                                    <div class="comment">
                                        Checking account number : <span class="mfc fb">301-0247-5970-21</span> (Nonghyup Bank)<br>
                                        Account holder : GongSaBi.com<br>
                                        <!-- ※ Remittance charges will apply.<br> -->
                                        ※ If the name of member is different from depositor, please contact us at (+82) 2-2202-2258.
                                    </div>
                                    <div class="comment">
                                        <p class="title">CMS</p>
                                        <table class="pay_method_desc_table" style="width:100%;">
                                            <colgroup>
                                                <col width="19%">
                                                <col width="24%">
                                                <col width="19%">
                                                <col width="24%">
                                                <col width="14%">
                                            </colgroup>
                                            <tbody>
                                            <tr>
                                                <th>Bank account number :</th>
                                                <td>
                                                    <select name="bank_list" class="form-control form-control-sm">
                                                        <option value="">Bank</option>
                                                    <?php foreach ($this->config->item('BANK_LIST') as $bank) { ?>
                                                        <option value="<?php echo $bank; ?>"><?php echo $bank; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </td>
                                                <td colspan="2"><input type="text" class="form-control form-control-sm" name="bank_account" placeholder="Bank account"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>Account holder :</th>
                                                <td><input type="text" class="form-control form-control-sm" name="bank_account_name" placeholder="Account holder"></td>
                                                <th>Payment Date :</th>
                                                <td><input type="text" class="form-control form-control-sm" name="bank_date" placeholder="Payment Date" maxlength="10"></td>
                                                <td><small>(I.E. : YYYY-MM-DD)</small></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="comment">
                                        <p class="title">Bank account for refund</p>
                                        <p class="sub_title">Information provided cannot be used for intended purposed other than refund. Content that is not related to refund expires after 30 days.</p>
                                        <table class="pay_method_desc_table" style="width:100%;">
                                            <colgroup>
                                                <col width="19%">
                                                <col width="24%">
                                                <col width="19%">
                                                <col width="24%">
                                                <col width="14%">
                                            </colgroup>
                                            <tbody>
                                            <tr>
                                                <th>Bank account number :</th>
                                                <td>
                                                    <select name="refund_list" class="form-control form-control-sm">
                                                        <option value="">Bank</option>
                                                    <?php foreach ($this->config->item('BANK_LIST') as $bank) { ?>
                                                        <option value="<?php echo $bank; ?>"><?php echo $bank; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </td>
                                                <td colspan="2"><input type="text" class="form-control form-control-sm" name="refund_account" placeholder="Bank account"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>Account holder :</th>
                                                <td><input type="text" class="form-control form-control-sm" name="refund_account_name" placeholder="Account holder"></td>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- <div class="gongsabi-comment-area">
                                    <h3>※ Information</h3>
                                    <div class="comment">
                                        Tax Deduction for books
                                        <button type="button" class="btn btn-sm btn-outline btn-mat-gray float-right" id="btn_book_gongje">Tax Deduction Guide</button>
                                        <ul class="mt-2 default_ul">
                                            <li>You may be able to claim a deduction for books expenses you incur as part of earning your employment income in Korea.</li>
                                            <li>Available Payment Method: Credit card (for Individuals), CMS, Real time, Virtual Account, Kakao pay, KPAY, SAMSUMG PAY</li>
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
                                        <th class="text-center">Pages</th>
                                        <td>2230 Pages</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Dimensions & Weight</th>
                                        <td>260 * 197 * 138 mm /5470g</td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '1' ) { // 1부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761470(1188761471)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Pages</th>
                                        <td>370 Pages</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Dimensions & Weight</th>
                                        <td>179 * 249 * 22 mm /936g </td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '2' ) { // 2부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761487(118876148X)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Pages</th>
                                        <td>420 Pages</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Dimensions & Weight</th>
                                        <td>178 * 248 * 25 mm /997g</td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '3' ) { // 3부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761494(1188761498)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Pages</th>
                                        <td>460 Pages</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Dimensions & Weight</th>
                                        <td>177 * 248 * 28 mm /1094g</td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '4' ) { // 4부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761500(1188761501)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Pages</th>
                                        <td>302 Pages</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Dimensions & Weight</th>
                                        <td>178 * 248 * 19 mm /745g</td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '5' ) { // 5부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761517(118876151X)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Pages</th>
                                        <td>262 Pages</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Dimensions & Weight</th>
                                        <td>178 * 248 * 17 mm /663g</td>
                                    </tr>
                                <?php } ?>
                                <?php if ( $selected_book == '6' ) { // 6부 ?>
                                    <tr>
                                        <th class="text-center">ISBN</th>
                                        <td>9791188761524(1188761528)</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Pages</th>
                                        <td>339 Pages</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Dimensions & Weight</th>
                                        <td>178 * 248 * 20 mm /828g</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                </table>
                                <h3 class="mb-4">Description</h3>
                                <div class="mb-5">
                                <?php if ( $selected_book == '9' ) { // 1-6부 ?>
                                    It is your guide to help you understand in death regarding QS(Quantity take-off), Bill of Quantity and Drawing changes. This book was written for clients, architects, developers, field engineer and students preparing for KQS Test.
                                <?php } ?>
                                <?php if ( $selected_book == '1' ) { // 1부 ?>
                                    This book was written for clients, architects, developers, field engineer and students who are closely related to the construction industry.<br>
                                    It helps you understand the overall construction industry and the construction costs underlying the construction site.<br>
                                    A variety of resources are included in the supplement to check the drawings and calculations.
                                <?php } ?>
                                <?php if ( $selected_book == '2' ) { // 2부 ?>
                                    It contains the content related to the quantity take off for the structural frame.<br>
                                    You can learn the overall contents of quantity take off for the steel frames, including the practice before calculating the quantity of structures and post analysis process. 
                                <?php } ?>
                                <?php if ( $selected_book == '3' ) { // 3부 ?>
                                    It contains the content related to the quantity take off for the finishes.<br>
                                    You can learn the overall contents of quantity take off for the finishes, including the practice before and after calculating each items analysis process.
                                <?php } ?>
                                <?php if ( $selected_book == '4' ) { // 4부 ?>
                                    You can learn and practise preparing BOQ, the essentials of quantity take-off.<br>
                                    And supplement contains various examples.
                                <?php } ?>
                                <?php if ( $selected_book == '5' ) { // 5부 ?>
                                    It contains the content related to BoQ items for finish and structural works.<br>
                                    You can learn about items for each work in detail.
                                <?php } ?>
                                <?php if ( $selected_book == '6' ) { // 6부 ?>
                                    It deals with specialized content related to drawing changes, construction cost improvement, construction claim.<br>
                                    Also practice tests to prepare for the certificate of KQS is provided.
                                <?php } ?>
                                </div>
                                <div class="mb-5 mfc book_info_preview">
                                    ※ A preview of the print book is available.
                                    <button type="button" id="btn_book_preview" class="btn btn-success float-right" data-book-num="<?php echo $selected_book; ?>">Look inside</button>
                                </div>
                                <h3 class="mb-4">About the Author</h3>
                                <div class="mb-5">
                                    David Hyun is a Professional Quantity Surveyor with more than 30 years of working experience in the construction cost management. A former professor in Hanyang University and CEO of CONCOST Company, The author had worked in major domestic construction site and abroad. He is also the author of 『Construction Cost Estimating For Field Engineer』 which contains detailed and comprehensive knowledge of construction, 『Structural And Beautiful Construction Story』, 『My Family Story』.
                                </div>
                            </div>
                            <div class="tab-pane fade<?php echo ( $tab == 'agenda') ? ' show active' : ''; ?> p-30" id="tab1-2" role="tabpanel" aria-labelledby="tab1-2-tab">
                                <h3 class="mb-4">Table of contents</h3>
                                <div class="book_agenda hidden mb-3">
                                <?php if ( $selected_book == '9' ) { // 1-6부 ?>
                                    BOOK 1 : Understanding of drawings and construction costs<br>
                                    CHAPTER 1. Construction Industry and Construction Cost<br>
                                    CHAPTER 2. Understanding Architectural Drawings<br>
                                    CHAPTER 3. Quantity take-off and estimating the construction costs<br><br>
                                     
                                    Supplement : Construction drawing for quantity take-off<br>
                                    Structural drawing for quantity take-off<br>
                                    Quantity take off sheet<br><br>

                                    BOOK 2. Quantity take-off for structural frame and understanding of results from others<br>
                                    CHAPTER 4. Common sense to be familiar with before calculating the quantity of structures<br>
                                    CHAPTER 5. Practicing Quantity take-off for Footing<br>
                                    CHAPTER 6. Practicing Quantity take-off for Slab and retaining wall<br>
                                    CHAPTER 7. Practicing Quantity take-off for beam and column<br>
                                    CHAPTER 8. Practicing Quantity take-off and aggregate data for stairs<br>
                                    CHAPTER 9. Quantity take-off for structure using program (RC-6.0)<br>
                                    CHAPTER 10. Aggregate data and analysis method after Quantity take-off for structure<br>
                                    CHAPTER 11. Practicing Quantity take-off for steel frame<br><br>

                                    BOOK 3. Quantity take-off for finishes and understanding of results from others<br>
                                    CHAPTER 12. Common sense to be familiar with before calculating the quantity of finishes<br>
                                    CHAPTER 13. Practicing Quantity take-off for doors and windows<br>
                                    CHAPTER 14. Practicing Quantity take-off for masonry<br>
                                    CHAPTER 15. Practicing Quantity take-off for interior membrane<br>
                                    CHAPTER 16. Practicing Quantity take-off for exterior membrane<br>
                                    CHAPTER 17. Practicing Quantity take-off for temporary works<br>
                                    CHAPTER 18. Practicing Quantity take-off for finishes using program (FIN-6.2)<br>
                                    CHAPTER 19. Practicing Quantity take-off for finishes and analyzing<br><br>

                                    BOOK 4. Understaning of Bill of Quantity and finding out the errors<br>
                                    CHAPTER 20. How to prepare a BoQ and make indirect construction cost<br>
                                    CHAPTER 21. Review of construction cost and quantity in BoQ<br>
                                    CHAPTER 22. Type of BoQ (domestic/foreign construction)<br>
                                    Supplement : Preparing Bill of Quantity<br><br>

                                    BOOK 5. Understanding the item described in BoQ with pictures<br>
                                    CHAPTER 23. Description of items of temporary works, reinforced concrete works, and steel frame works<br>
                                    CHAPTER 24. Description of items of masonry works, waterproofing works, and plastering Works<br>
                                    CHAPTER 25. Description of items by type of tiling, mason works, and carpentry and joinery works<br>
                                    CHAPTER 26. Description of items by type of construction metal, doors, windows and glazing works<br>
                                    CHAPTER 27. Description of items by type of painting, interior finishing and miscellaneous works<br><br>

                                    BOOK 6. Preparing drawing changes and claims with KQS<br>
                                    CHAPTER 28. Understanding of drawing changes and approach<br>
                                    CHAPTER 29. How to improve cost management and construction claims<br>
                                    CHAPTER 30. KQS; Korea Quantities Surveyor<br><br>

                                    Supplement : Quantity take off sheet for finishes<br>
                                    KQS Practice Tests<br>
                                    KQS Practice Tests Answers
                                <?php } ?>
                                <?php if ( $selected_book == '1' ) { // 1부 ?>
                                    CHAPTER 1. Construction Industry and Construction Cost<br>
                                    1. Why? Construction Cost?<br>
                                    2. Method and objectives of Education<br>
                                    3. Understanding of Construction Industry<br>
                                    4. The 4th industrial revolution<br><br>

                                    CHAPTER 2. Understanding Architectural Drawings<br>
                                    1. Types of drawings<br>
                                    2. Finishing drawing required for quantity take-off<br>
                                    3. Structural drawing required for quantity take-off<br>
                                    4. Specification of building construction<br>
                                    5. Seven Books to be pepared before construction starts<br><br>

                                    CHAPTER 3. Quantity take-off and estimating the construction costs<br>
                                    1. Understanding of quantity take-off and estimating<br>
                                    2. Precaution for quantity take-off <br>
                                    3. Understanding of unit price calculation<br>
                                    4. Standardized specification and cost breakdown<br>
                                    5. Understanding of construction cost rate<br><br>

                                    Supplement : Construction drawing for quantity take-off<br>
                                    Structural drawing for quantity take-off<br>
                                    Quantity take off sheet
                                <?php } ?>
                                <?php if ( $selected_book == '2' ) { // 2부 ?>
                                    CHAPTER 4. Common sense to be familiar with before calculating the quantity of structures<br>
                                    1. Structural design method<br>
                                    2. Types of structure<br>
                                    3. 6 items of structural quantity take off<br>
                                    4. Calculating item overlay<br>
                                    5. Understanding of summary sheet for each stories<br>
                                    6. Quantity take off for the structural frame<br>
                                    7. Formula of calculation for each items<br><br>

                                    CHAPTER 5. Practicing Quantity take-off for Footing<br>
                                    1. Understanding of quantity take-off for footing<br>
                                    2. Quantity take-off for single footing<br>
                                    3. Quantity take-off for wall footing<br>
                                    4. Quantity take-off for mat footing<br><br>

                                    CHAPTER 6. Practicing Quantity take-off for Slab and retaining wall<br>
                                    1. Understanding of quantity take-off for slab<br>
                                    2. Practicing quantity take-off for slab<br>
                                    3. Practicing quantity take-off for deck and PC slab<br>
                                    4. Understanding of quantity take-off for retaining wall<br>
                                    5. Practicing quantity take-off for retaining wall<br><br>

                                    CHAPTER 7. Practicing Quantity take-off for beam and column<br>
                                    1. Understanding of quantity take-off for girder and beam (G1/B1)<br>
                                    2. Practicing quantity take-off for girder and beam<br>
                                    3. Understanding of quantity take-off for column<br>
                                    4. Practicing quantity take-off for column<br><br>

                                    CHAPTER 8. Practicing Quantity take-off and aggregate data for stairs<br>
                                    1. Understanding of quantity take-off for stairs (SS1)<br>
                                    2. Practicing quantity take-off for stairs<br>
                                    3. Transcribing data results<br>
                                    4. Understanding of material loss<br>
                                    5. Self supply material<br><br>

                                    CHAPTER 9. Quantity take-off for structure using program (RC-6.0)<br>
                                    1. Method of creating project<br>
                                    2. Input and estimating footing<br>
                                    3. Input and estimating column<br>
                                    4. Input and estimating girder and beam<br>
                                    5. Input and estimating slab<br>
                                    6. Input and estimating retaining wall<br>
                                    7. Input and estimating stairs<br>
                                    8. Major component of material<br><br>

                                    CHAPTER 10. Aggregate data and analysis method after Quantity take-off for structure<br>
                                    1.  Aggregate data after quantity take-off<br>
                                    2. Types of summary sheet<br>
                                    3. Quantity check<br><br>

                                    CHAPTER 11. Practicing Quantity take-off for steel frame<br>
                                    1. Understanding quantity take-off for steel frames<br>
                                    2. Types of steel frames<br>
                                    3. Practicing Quantity take-off for girder and beam<br>
                                    4. Practicing Quantity take-off for stairs<br>
                                    5. Construction estimating
                                <?php } ?>
                                <?php if ( $selected_book == '3' ) { // 3부 ?>
                                    CHAPTER 12. Common sense to be familiar with before calculating the quantity of finishes<br>
                                    1. Understanding quantity take off for finishes<br>
                                    2. Quantity take off for 5 items of finishes<br>
                                    3. Difference between General building and apartment<br>
                                    4. Quantity take off for subsidiary materials<br>
                                    5. Converted excel files<br><br>

                                    CHAPTER 13. Practicing Quantity take-off for doors and windows<br>
                                    1. Understanding quantity take-off for windows and doors<br>
                                    2. Types and symbol of windows and doors<br>
                                    3. Counting windows and doors<br>
                                    4. Estimating door frame filling and caulking<br>
                                    5. Quantity take-off for hardware<br>
                                    6. Multiples for windows and doors painting<br>
                                    7. glass and glass caulking<br>
                                    8. Quantity take-off for structure, weather caulking and norton thermalbond<br>
                                    9. Quantity take-off using program (FIN-6.2)<br><br>

                                    CHAPTER 14. Practicing Quantity take-off for masonry<br>
                                    1. Understanding quantity take-off for masonry<br>
                                    2. Types and symbol of wall<br>
                                    3. Cement brick stacking<br>
                                    4. Cement block stacking<br>
                                    5. Partition installation<br>
                                    6. Lintel and subsidiary materials<br>
                                    7. Quantity take-off using program (FIN-6.2)<br><br>

                                    CHAPTER 15. Practicing Quantity take-off for interior membrane<br>
                                    1. Understanding Quantity take-off for interior membrane<br>
                                    2. Understanding finish schedule<br>
                                    3. Quantity take-off for floor/ ceiling<br>
                                    4. Quantity take-off for wall<br>
                                    5. Quantity take-off for base and molding<br>
                                    6. Quantity take-off for miscellaneous items<br>
                                    7. Check quantity take-off using program (FIN-6.2)<br><br>

                                    CHAPTER 16. Practicing Quantity take-off for exterior membrane<br>
                                    1. Understanding quantity take-off for exterior membrane<br>
                                    2. Drawing references for exterior membrane<br>
                                    3. Quantity take-off for ground and finishes<br>
                                    4. Importance of estimating unit<br>
                                    5. Practicing quantity take-off for exterior wall<br>
                                    6. Quantity take-off using program (FIN-6.2)<br><br>

                                    CHAPTER 17. Practicing Quantity take-off for temporary works<br>
                                    1. Understanding quantity take-off for temporary works<br>
                                    2. Difference between common temporary works and construction temporary works<br>
                                    3. Understanding common temporary works<br>
                                    4. Understanding construction temporary works<br>
                                    5. Check quantity for temporary works<br>
                                    6. Quantity take-off using program (FIN-6.2)<br><br>

                                    CHAPTER 18. Practicing Quantity take-off for finishes using program (FIN-6.2)<br>
                                    1. Method of creating project<br>
                                    2. Input and estimating windows and doors<br>
                                    3. Input and estimating masonry<br>
                                    4. Input and estimating interior membrane<br>
                                    5. Input and estimating exterior membrane<br>
                                    6. Input and estimating temporary works<br>
                                    7. Major component of material<br>
                                    8. Summary sheet<br><br>

                                    CHAPTER 19. Practicing Quantity take-off for finishes and analyzing<br>
                                    1. Summary sheet check<br>
                                    2. Comparison of summary of drawing and floor/ceiling area<br>
                                    3. Comparison of summary of drawing  and sum of exterior membrane<br>
                                    4. Check using program<br>
                                    5. Check after quantity take-off
                                <?php } ?>
                                <?php if ( $selected_book == '4' ) { // 4부 ?>
                                    CHAPTER 20. How to prepare a BoQ and make indirect construction cost<br>
                                    1. BoQ preparing after quantity take-off<br>
                                    2. Transcribing data results ( Quantity take-off → Program)<br>
                                    3. Results (Excel)<br>
                                    4. Making indirect costs<br>
                                    5. Total construction costs<br><br>

                                    CHAPTER 21. Review of construction cost and quantity in BoQ<br>
                                    1. Review on temporary works<br>
                                    2. Review on loss<br>
                                    3. Review on background and finighing materials<br>
                                    4. Review on construction costs per area for each building<br>
                                    5. Review on construction costs per area for each work<br><br>

                                    CHAPTER 22. Type of BoQ (domestic/foreign construction)<br>
                                    1. Understanding of BoQ<br>
                                    2. Types of BoQ<br><br>

                                    Supplement : Preparing Bill of Quantity
                                <?php } ?>
                                <?php if ( $selected_book == '5' ) { // 5부 ?>
                                    CHAPTER 23. Description of items of temporary works, reinforced concrete works, and steel frame works<br>
                                    1. Items for common temporary works<br>
                                    2. Items for construction temporary works<br>
                                    3. Items for reinforced concrete works<br>
                                    4. Items for steel frame works<br><br>

                                    CHAPTER 24. Description of items of masonry works, waterproofing works, and plastering works<br>
                                    1. Items for masonry works<br>
                                    2. Items for waterproofing works<br>
                                    3. Items for plastering works<br><br>

                                    CHAPTER 25. Description of items by type of tiling, stone works, and carpentry and joinery works<br>
                                    1. Items for tiling<br>
                                    2. Items for stone works<br>
                                    3. Items for carpentry and joinery works<br><br>

                                    CHAPTER  26. Description of items by type of construction metal, doors, windows and glazing works<br>
                                    1. Items for construction metal works<br>
                                    2. Items for door & window works<br>
                                    3. Items for glazing works<br><br>

                                    CHAPTER  27. Description of items by type of painting, interior finishing and miscellaneous works<br>
                                    1. Items for painting<br>
                                    2. Items for interior finishing (Floor)<br>
                                    3. Items for interior finishing (Ceiling)<br>
                                    4. Items for interior finishing (Wall)<br>
                                    5. Items for interior finishing (Moulding/Base board)<br>
                                    6. Items for miscellaneous works
                                <?php } ?>
                                <?php if ( $selected_book == '6' ) { // 6부 ?>
                                    CHAPTER 28. Understanding of drawing changes and approach<br>
                                    1. Definition of drawing changes<br>
                                    2. Loss and gain of quantities<br>
                                    3. Unit price changes<br>
                                    4. Construction conditions changes<br>
                                    5. Escalation<br>
                                    6. Approaches to drawing changes<br><br>

                                    CHAPTER 29. How to improve cost management and construction claims<br>
                                    1. Understanding of construction cost rate<br>
                                    2. Improvement methods for construction cost management<br>
                                    3. Understanding of construction claims<br>
                                    4. Reviewing documents for construction claims<br>
                                    5. Create logic in writing<br><br>

                                    CHAPTER 30. KQS; Korea Quantities Surveyor<br>
                                    1. Construction cost management<br>
                                    2. Overseas construction cost management<br>
                                    3. About KQS<br>
                                    4. Bidding Method<br>
                                    5. Korea Quantities Surveyor<br>
                                    6. Role of quantities surveyor<br>
                                    7. Job without retirement<br><br>

                                    Supplement : Quantity take off sheet for finishes<br>
                                    KQS Practice Tests<br>
                                    KQS Practice Tests Answers
                                <?php } ?>
                                </div>
                                <div class="text-center">
                                    <button type="button" id="btn_show_agenda" class="btn btn-success">More view +</button>
                                </div>
                            </div>
                            <div class="tab-pane fade<?php echo ( $tab == 'review') ? ' show active' : ''; ?> p-30" id="tab1-4" role="tabpanel" aria-labelledby="tab1-4-tab">
                                <div class="book_review_wrapper mt-5">
                                    <h3>Average Rating by member of GongSaBi.com</h3>
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
                                    <h3 class="mt-5">How would you rate this book</h3>
                                    <div class="book_review_write mt-4">
                                        <p>Review this product <small>Share your thoughts with other customers after logging-in</small></p>
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
                                                <th>Rating</th>
                                                <td colspan="2">
                                                    <label for="review_score5"><input type="radio" name="review_score" id="review_score5" value="5" checked="true"> <img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"></label>
                                                    <label for="review_score4"><input type="radio" name="review_score" id="review_score4" value="4"> <img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"></label>
                                                    <label for="review_score3"><input type="radio" name="review_score" id="review_score3" value="3"> <img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"></label>
                                                    <label for="review_score2"><input type="radio" name="review_score" id="review_score2" value="2"> <img src="/static/img/star_mid_on.png"><img src="/static/img/star_mid_on.png"></label>
                                                    <label for="review_score1"><input type="radio" name="review_score" id="review_score1" value="1"> <img src="/static/img/star_mid_on.png"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Contents</th>
                                                <td><textarea name="review_comment" rows="3" style="resize:none;"></textarea></td>
                                                <td>
                                                    <button type="button" class="review_ins" onclick="<?php echo ( $this->session->userdata('MEMBER_SESSION') ) ? 'review_regist(this);' : 'is_not_login();'; ?>">Post</button>
                                                    <?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>
                                                    <button type="button" class="review_mod" onclick="review_modify_proc(this);">Modify</button>
                                                    <button type="button" class="review_cancel" onclick="review_modify_cancel(this);">Cancel</button>
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
                                                <li><button type="button" onclick="set_order('score');">Top reviewed</button></li>
                                                <li><button type="button" onclick="set_order('new');">Latest</button></li>
                                            </ul>
                                            </form>
                                        </div>
                                        <table class="book_review_list_table">
                                            <?php if ( $review_count == 0 ) { ?>
                                            <tr>
                                                <td>No customer reviews.</td>
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
                                                                <button type="button" onclick="review_modify('<?php echo $review->review_seq; ?>');">Modify</button>
                                                                <button type="button" onclick="review_delete('<?php echo $review->review_seq; ?>', 'eng');">Delete</button>
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
                                <p>※ Information regarding replacement or refund in product description takes priority. (This might differ from business circumstances.)</p>
                                <table class="table table-bordered classy-table gongsabi-table lecture-list-table m-top-30 m-bottom-30">
                                <colgroup>
                                    <col width="20%">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="text-center bg-gray bg-gray">
                                            Shipping
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>
                                                    There will be additional shipping cost for single purchase and delivery charges depend on postage rate. A set purchase will receive free delivery. Books shipped to abroad are not eligible for FREE shipping.<br>
                                                    Packages are generally sent within 2 days after payment.
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            Replacement/Refund procedure
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>
                                                    GongSaBi.com Log in > MY PAGE > EDUCATION > Purchase Book > <a href="/front/mypage/education/bookcs" class="mfc">Cancel/Replacement/Refund</a>,<br>
                                                    Call Customer Service Centre (+82-2-2202-2258) or Use <a href="/front/customer/qna" class="mfc">Q&A</a> page.<br>
                                                    All returns are evaluated before being processed once you return the items with the original packaging.<br>
                                                    For partial cancellation/replacement/refund, you need to cancel full amount and make a partial amount of the payment.
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            Replacement/Refund period
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>
                                                    If you change your mind about an unused item you've bought in th lat 7 days after receipt, simply return it in its original packaging.<br>
                                                    In the case of defective products, you have 30 calendar days to return an item from the date you received it.
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            Replacement/Refund fee
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>
                                                    If you bought by mistake or change my mind, You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are nonrefundable. If you receive a refund, the cost of return shipping will be deducted from your refund.<br>
                                                    Customs fees and import taxes may be charged to the customer.
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            Items not eligible for a replacement/refund
                                        </th>
                                        <td>
                                            We reserve the right to refuse an exchange or refund under the condition mentioned below.<br>
                                            <ul class="mt-2 default_ul">
                                                <li>Where the goods, etc., have been destroyed or damaged due to a cause attributable to the consumer: Provided, That this shall not apply where the package, etc., has been damaged to check the contents of the goods, etc.</li>
                                                <li>Where the value of the goods, etc., has substantially decreased due to consumer’s use or partial consumption.</li>
                                                <li>Where the package of copiable goods, etc., has been destroyed.</li>
                                                <li>Where the value of the goods, etc., has substantially decreased due to the elapse of time, making resale difficult or impossible.</li>
                                                <li>Where Replacement/refund deadline is expired.</li>
                                                <li>Other cases prescribed by ACT ON THE CONSUMER PROTECTION IN ELECTRONIC COMMERCE, ETC.</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            Sold-out item
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>Product may be sold out/delayed due to supplier (publisher) owned inventory conditions, and we will notify you via e-mail and SNS when it is out of stock.</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center bg-gray">
                                            Compensation Criteria for Consumers' Damages due to delay in refund
                                        </th>
                                        <td>
                                            <ul class="mt-2 default_ul">
                                                <li>Matters concerning exchange due to defective products, A/S, refund, quality assurance, and damage compensation shall be governed by the criteria for settlement of consumer disputes (Fair Trade Commission Public Notice).</li>
                                                <li>Procedure and conditions for refund of the payment and payment of compensation according to due to delay of refund shall be governed by the Act on the Consumer Protection in Electronic Commerce, etc.</li>
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