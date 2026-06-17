<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">게시판 관리</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?php echo $board_title; ?> 수정</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

                    <form method="post" action="/admin/book/modify_proc" class="form-horizontal" role="form">

                    <input type="hidden" name="board_seq" value="<?php echo $board_data['list'][0]->board_seq; ?>">
                    <input type="hidden" name="board_type" value="<?php echo $board_data['list'][0]->board_type; ?>">

                    <div class="float-right">
                        <a href="/admin/book" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 수정</a>
                    </div>

                    <h4 class="header-title"><?php echo $board_title; ?> 수정</h4>

                    <p class="sub-header">
                        <?php echo $board_title; ?>을 수정합니다.
                    </p>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="p-2">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_etc_3">주문상태 선택</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select d-block w-100" name="board_etc_3" id="board_etc_3">
                                        <?php foreach ($this->config->item('ORDER_STATUS') as $key => $order_status) { ?>
                                            <option value="<?php echo $key; ?>"<?php if ( $key == $board_data['list'][0]->board_etc_3 ) { ?> selected="true"<?php } ?><?php if ( $key < $board_data['list'][0]->board_etc_3 ) { ?> disabled="true"<?php } ?>><?php echo $order_status['name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_category">책 선택</label>
                                    <div class="col-sm-10">
                                      <select class="custom-select d-block w-100" name="board_category" id="board_category">
                                      <?php foreach ($this->config->item('BOOK_LIST') as $key => $book) { ?>
                                          <option value="<?php echo $key; ?>"<?php if ( $key == $board_data['list'][0]->board_category ) { ?> selected="true"<?php } ?>><?php echo $book['name']; ?></option>
                                      <?php } ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_etc_2">수량</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_etc_2" name="board_etc_2" class="form-control" value="<?php echo $board_data['list'][0]->board_etc_2; ?>" required="true" placeholder="수량">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_name">이름</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_name" name="board_name" class="form-control" value="<?php echo $board_data['list'][0]->board_name; ?>" required="true" placeholder="이름">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_company">회사</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_company" name="board_company" class="form-control" value="<?php echo $board_data['list'][0]->board_company; ?>" required="true" placeholder="회사">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_hp">휴대폰번호</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_hp" name="board_hp" class="form-control" value="<?php echo $board_data['list'][0]->board_hp; ?>" required="true" placeholder="휴대폰번호">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_email">이메일주소</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_email" name="board_email" class="form-control" value="<?php echo $board_data['list'][0]->board_email; ?>" required="true" placeholder="이메일주소">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_etc_1">배송주소</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_etc_1" name="board_etc_1" class="form-control" value="<?php echo $board_data['list'][0]->board_etc_1; ?>" required="true" placeholder="배송주소">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_etc_4">배송주소 상세</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_etc_4" name="board_etc_4" class="form-control" value="<?php echo $board_data['list'][0]->board_etc_4; ?>" required="true" placeholder="배송주소 상세">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">배송메시지</label>
                                    <div class="col-sm-10">
                                        <textarea id="board_content" name="board_content" class="form-control" rows="5" required="true" placeholder="배송메시지"><?php echo $board_data['list'][0]->board_content; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="p-2">
                                <legend>결제 정보</legend>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="pay_method">결제수단</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pay_method" class="form-control-plaintext" value="<?php echo $this->config->item('PAY_METHOD')[$pay_info->pay_method]; ?>" required="true" placeholder="결제수단" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="merchant_uid">주문번호</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="merchant_uid" class="form-control-plaintext" value="<?php echo $pay_info->merchant_uid; ?>" required="true" placeholder="주문번호" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="status">결제상태</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="status" class="form-control-plaintext" value="<?php echo $this->config->item('PAY_STATUS')[$pay_info->status]; ?>" required="true" placeholder="결제상태" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="paid_amount"><?php echo ( $pay_info->status == 'paid' ) ? '결제금액' : '결제요청금액'; ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="paid_amount" class="form-control-plaintext" value="<?php echo $pay_info->paid_amount; ?>" required="true" placeholder="<?php echo ( $pay_info->status == 'paid' ) ? '결제금액' : '결제요청금액'; ?>" readonly="true">
                                    </div>
                                </div>
                                <?php if ( $pay_info->pay_method == 'card' ) { ?>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="apply_num">카드사 승인번호</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="apply_num" class="form-control-plaintext" value="<?php echo $pay_info->apply_num; ?>" required="true" placeholder="카드사 승인번호" readonly="true">
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if ( $pay_info->pay_method == 'vbank' ) { ?>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="vbank_num">가상계좌 입금계좌번호</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="vbank_num" class="form-control-plaintext" value="<?php echo $pay_info->vbank_num; ?>" placeholder="가상계좌 입금계좌번호" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="vbank_name">가상계좌 은행명</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="vbank_name" class="form-control-plaintext" value="<?php echo $pay_info->vbank_name; ?>" placeholder="가상계좌 은행명" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="vbank_holder">가상계좌 예금주</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="vbank_holder" class="form-control-plaintext" value="<?php echo $pay_info->vbank_holder; ?>" placeholder="가상계좌 예금주" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="vbank_date">가상계좌 입금기한</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="vbank_date" class="form-control-plaintext" value="<?php echo $pay_info->vbank_date; ?>" placeholder="가상계좌 입금기한" readonly="true">
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if ( $pay_info->pay_method == 'bank' ) { ?>
                                <legend>무통장입금 정보</legend>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="bank_list">은행</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="bank_list" class="form-control-plaintext" value="<?php echo $pay_info->bank_list; ?>" placeholder="은행" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="bank_account">은행 계좌번호</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="bank_account" class="form-control-plaintext" value="<?php echo $pay_info->bank_account; ?>" placeholder="은행 계좌번호" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="bank_account_name">은행 예금주</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="bank_account_name" class="form-control-plaintext" value="<?php echo $pay_info->bank_account_name; ?>" placeholder="은행 예금주" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="bank_date">입금일자</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="bank_date" class="form-control-plaintext" value="<?php echo $pay_info->bank_date; ?>" placeholder="입금일자" readonly="true">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary mb-3" onclick="go_deposit_process('<?php echo $board_data['list'][0]->board_seq; ?>');">입금처리</button>
                                <legend>환불 정보</legend>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="refund_list">은행</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="refund_list" class="form-control-plaintext" value="<?php echo $pay_info->refund_list; ?>" placeholder="은행" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="refund_account">계좌번호</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="refund_account" class="form-control-plaintext" value="<?php echo $pay_info->refund_account; ?>" placeholder="계좌번호" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="refund_account_name">예금주</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="refund_account_name" class="form-control-plaintext" value="<?php echo $pay_info->refund_account_name; ?>" placeholder="예금주" readonly="true">
                                    </div>
                                </div>
                                <?php } ?>
                                <legend>배송 정보</legend>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="board_etc_6">택배사</label>
                                    <div class="col-sm-8">
                                        <select name="board_etc_6" class="form-control">
                                            <option value="">택배사 선택</option>
                                        <?php foreach ($this->config->item('CARRIERS') as $key => $carrier) { ?>
                                            <option value="<?php echo $key; ?>"<?php echo ( $pay_info->board_etc_6 == $key ) ? ' selected="true"' : ''; ?>><?php echo $carrier['name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="board_etc_7">운송장번호 <small class="text-danger">* 숫자만 입력</small></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="board_etc_7" class="form-control" value="<?php echo $pay_info->board_etc_7; ?>" placeholder="운송장번호">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        
    </div>

</div>