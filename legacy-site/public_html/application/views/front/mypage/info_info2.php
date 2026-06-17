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
                            <h4>회원 정보 관리</h4>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="/front/mypage/info/info1" role="tab">회원 정보 수정</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/front/mypage/info/info2" role="tab">회원 등급 관리</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/front/mypage/info/info3" role="tab">뉴스레터 수신 설정</a>
                            </li>
                        </ul>
                        <div class="tab-content gongsabi-tab">
                            <div class="tab-pane fade show active p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <form id="frm_info2" action="/front/mypage/membership_join_proc" method="post" class="classy-form">
                                    
                                <table class="table classy-table table-bordered table-responsive gongsabi-table">
                                    <colgroup>
                                        <col width="20%">
                                        <col width="*">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th class="text-left bg-gray">회원등급</th>
                                            <td class=""><?php echo $this->config->item('MEMBER_TYPE')[$this->session->userdata('MEMBER')['member_type']]['name']; ?></td>
                                        </tr>
                                        <?php
                                        // 무료회원
                                        if ( $this->session->userdata('MEMBER')['member_type'] == '1' ) {
                                        ?>
                                        <tr>
                                            <th class="text-left bg-gray">연회비 결제하기</th>
                                            <td>
                                                <input type="hidden" name="member_email" value="<?php echo $this->session->userdata('MEMBER')['member_email']; ?>">
                                                <input type="hidden" name="member_name" value="<?php echo $this->session->userdata('MEMBER')['member_name']; ?>">
                                                <input type="hidden" name="member_hp" value="<?php echo $this->session->userdata('MEMBER')['member_hp']; ?>">

                                                <!-- 아임포트 거래 고유 번호 -->
                                                <input type="hidden" name="imp_uid" id="imp_uid" value="">
                                                <!-- 가맹점에서 생성/관리하는 고유 주문번호 -->
                                                <input type="hidden" name="merchant_uid" id="merchant_uid" value="">
                                                <!-- 결제수단 -->
                                                <input type="hidden" name="pay_method" id="pay_method" value="">
                                                <!-- 결제금액 -->
                                                <input type="hidden" name="paid_amount" id="paid_amount" value="1100000">
                                                <!-- 결제상태 -->
                                                <input type="hidden" name="status" id="status" value="">
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
                                                <div class="pay_method_wrapper inner">
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
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        // 유료회원
                                        if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) {
                                        ?>
                                        <tr>
                                            <th class="text-left bg-gray">유료회원 가입일</th>
                                            <td class=""><?php echo MAKE_DATE($member->member_start, '년월일'); ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-left bg-gray">유료회원 만료일</th>
                                            <td class=""><?php echo MAKE_DATE($member->member_limit, '년월일'); ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-left bg-gray">유료회원 탈퇴</th>
                                            <td class=""><a href="#" onclick="leave_membership();">탈퇴하기</a></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                // 무료회원
                                if ( $this->session->userdata('MEMBER')['member_type'] == '1' ) {
                                ?>
                                <div class="row m-top-15">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-success" onclick="join_membership();">유료회원 전환하기</button>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                                <?php
                                // 유료회원
                                if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) {
                                ?>
                                <!-- <div class="row m-top-15">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-success" onclick="leave_membership();">유료회원 탈퇴하기</button>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                    </div>
                                </div> -->
                                <?php
                                }
                                ?>

                                <?php
                                // 무료회원
                                if ( $this->session->userdata('MEMBER')['member_type'] == '1' ) {
                                ?>
                                <div class="gongsabi-comment-area pay_method_desc pay_method_desc_bank">
                                    <div class="comment">
                                        유료회원가입 연회비 : <span class="mfc fb">연 1,000,000원</span> (VAT 10% 별도)<br>
                                        입금 계좌번호 : <span class="mfc fb">301-0247-5970-21</span> (농협은행)<br>
                                        예금주 : 공사비닷컴<br>
                                        ※ 송금 수수료는 회원 부담입니다.<br>
                                        ※ 입금자와 회원명이 다른 경우에는 반드시 연락하여 주시기 바랍니다.
                                    </div>
                                    <div class="comment">
                                        <p class="title">무통장입금</p>
                                        <p class="sub_title">연회비 결제 진행 후 다음 입력사항을 기입하시면 가입승인이 요청됩니다.<br>입금이 확인되면 유료회원으로 자격부여가 됩니다.</p>
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
                                <?php
                                }
                                ?>
                                <?php
                                // 유료회원
                                if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) {
                                ?>
                                <div class="gongsabi-comment-area">
                                    <div class="comment">
※ 유료 회원 탈퇴의 경우 등급승인 후 1일 이내 연회비의 70% 환불가능 ,7일 이내 연회비의 30% 환불 가능, 30일 초과 시 환불 불가
                                    </div>
                                </div>
                                <?php
                                }
                                ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>