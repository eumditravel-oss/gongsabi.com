<div class="join_step_wrapper">
    <div class="join_step_title">
        <span class="title"><?php echo ( $this->session->userdata('MEMBER_JOIN_SESSION')['member_type'] == '1' ) ? '무료' : '유료'; ?>회원 회원가입</span>
        <?php if ( $this->session->userdata('MEMBER_JOIN_SESSION')['member_type'] == '2' ) { ?>
        <span class="step">01. 회원 약관 동의 > 02. 회원 정보 입력 > <span class="mfc">03. 결제</span> > 04. 가입 완료</span>
        <?php } ?>
    </div>   
    <div class="join_form_wrapper">
    <form action="/front/auth/regist_pay_proc" id="frm_membership_pay" method="post">
        <?php foreach ($this->session->userdata('MEMBER_JOIN_SESSION') as $key => $info) { ?>
        <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $info; ?>">
        <?php } ?>
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
        <h3>유료회원 결제</h3>
        <p>연회비는 1,000,000원이며, 부가세는 별도입니다.</p>
        <div class="pay_method_wrapper bg">
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
        <div class="gongsabi-comment-area pay_method_desc pay_method_desc_bank mt-3">
            <div class="comment">
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
        <div class="text-center mt-5">
            <button type="button" class="btn btn-success" onclick="go_membership_pay();">다음</button><br>
        </div>
    </form>
    </div>
</div>