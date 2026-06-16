$(function() {
    $('.dropdown-title').on('click', function() {
        $(this).next('.custom-dropdown-menu').toggle();
    });
    $('.custom-dropdown-menu .dropdown-menu-option').on('click', function() {
        $(this).closest('.custom-dropdown-menu').hide();
        $(this).parents('.dropdown').find('.dropdown-title').html($(this).html());
        $(this).parents('.dropdown').find('.dropdown-select').val($(this).attr('data-value'));
    });

    $('.join_form_wrapper [name=member_id]').on('blur', function() {
        var member_id = $(this).val();

        if ( member_id != '' ) {
            $.ajax({
                method: 'POST',
                url: '/front/auth/ajax_check_member_id',
                data: {
                    'member_id': member_id
                },
                dataType: 'json',
                success: function(json) {
                    if ( !json.result ) {
                        alert(json.resultMessage);
                        $('.join_form_wrapper [name=member_id]').select();
                    }
                }    
            });
        }
    });
});

function change_language(language)
{
    event.preventDefault();

    $.ajax({
        url: '/front/common/change_language',
        data: {
            'language': language
        },
        dataType: 'json',
        success: function(json) {
            if ( json.result )
                location.reload();
        }    
    });
}

function get_job_application()
{
    location.target = '_blank';
    location.href = '/static/file/gongsabi_job_application.doc';
}

function delete_scrap(seq)
{
    event.preventDefault();

    if ( seq )
    {
        if ( confirm('삭제하면 복구 불가능 합니다.\n삭제 하시겠습니까 ?') )
        {
            $.ajax({
                url: '/front/data/ajax_delete_scrap',
                method: 'POST',
                data: {
                    'seq': seq
                },
                dataType: 'json',
                success: function(json) {
                    if ( json.result )
                    {
                        alert(json.resultMessage);
                        location.reload();
                    }
                    else
                        alert(json.resultMessage);
                }    
            });
        }
        else
            return false;
    }
    else
    {
        alert('선택된 공사 정보가 없습니다.');
        return false;
    }
}

function scrap_gongsabi()
{
    event.preventDefault();
    var seq = $('#modal_gongsabi_seq').val();

    if ( seq )
    {
        $.ajax({
            url: '/front/data/ajax_scrap_gongsabi',
            method: 'POST',
            data: {
                'seq': seq
            },
            dataType: 'json',
            success: function(json) {
                alert(json.resultMessage);
            }    
        });
    }
    else
    {
        alert('선택된 공사 정보가 없습니다.');
        return false;
    }
}

function view_detail(seq)
{
    event.preventDefault();

    $.ajax({
        url: '/front/data/ajax_get_gongsabi_info',
        method: 'POST',
        data: {
            'seq': seq
        },
        dataType: 'json',
        success: function(json) {
            if ( !json.result )
                alert(json.resultMessage);
            else
            {
                $('#gongsabi_info .modal-body').html(json.data);
                $('#gongsabi_info').modal('show');
            }
        }    
    });
}

function view_gongjeong(line, seq, idx, gongjeong)
{
    $('.gongsabi-table.gongsabi-hover tbody tr.clicked').removeClass('clicked');
    if ( !$(line).closest('tr').hasClass('clicked') )
        $(line).closest('tr').addClass('clicked');

    event.preventDefault();

    $.ajax({
        url: '/front/data/ajax_get_gongjeong_info',
        method: 'POST',
        data: {
            'seq': seq,
            'gongjeong': gongjeong,
            'idx': idx
        },
        dataType: 'json',
        success: function(json) {
            if ( !json.result )
                alert(json.resultMessage);
            else
                $('#gongsabi_info .modal-body .gongjeong-info').html(json.data);
        }    
    });
}

function view_agree(term)
{
    event.preventDefault();

    $.ajax({
        url: '/front/common/terms/' + term,
        method: 'POST',
        dataType: 'html',
        success: function(html) {
            if ( term == 'term1' )
                $('#agree_info .modal-title').html('홈페이지 이용약관');
            else if ( term == 'term2' )
                $('#agree_info .modal-title').html('개인정보 활용약관');
            else if ( term == 'term3' )
                $('#agree_info .modal-title').html('14세 미만 개인정보 수집·이용에 대한 보호자(법정대리인) 동의 (선택)');
            else if ( term == 'term4' )
                $('#agree_info .modal-title').html('마케팅 활용 수신 동의 (선택)');
            else if ( term == 'term5' )
                $('#agree_info .modal-title').html('광고성 정보 수신 동의 (선택)');
            $('#agree_info .modal-body pre').html(html);
            $('#agree_info').modal('show');
        }    
    });

    // if ( type != '' )
    //     $('#agree_' + type + '_info').modal('show');
    // else
    //     $('#agree_info').modal('show');
}

// 유료회원 전환하기
function join_membership()
{
    if ( confirm('유료회원으로 등급 전환 후 7일 이내 부분적 환불, 30일 초과 시 환불불가합니다.\n그대로 진행하시겠습니까 ?') ) {
        var method = $('[name=_pay_method]:checked').val();

        if ( method == 'bank' )
        {
            var bank_list = $('[name=bank_list]').val();
            var bank_account = $('[name=bank_account]').val();
            var bank_account_name = $('[name=bank_account_name]').val();
            var bank_date = $('[name=bank_date]').val();
            var refund_list = $('[name=refund_list]').val();
            var refund_account = $('[name=refund_account]').val();
            var refund_account_name = $('[name=refund_account_name]').val();

            if ( bank_list == '' || bank_account == '' || bank_account_name == '' || bank_date == '' ) {
                alert('무통장입금 정보를 입력해 주십시오.');
                return false;
            } else if ( refund_list == '' || refund_account == '' || refund_account_name == '' ) {
                alert('환불계좌 정보를 입력해 주십시오.');
                return false;
            } else {
                $('#imp_uid').val();
                $('#merchant_uid').val(new Date().getTime());
                $('#pay_method').val(method);
                $('#status').val('ready');
                $('#frm_info2').submit();   
            }          
        }
        else if ( method == 'phone' ) {
            not_pay_hp();
        }
        else
        {
            IMP.request_pay({
                pg : 'inicis', // version 1.1.0부터 지원.
                pay_method : method,
                merchant_uid : new Date().getTime(),
                name : '공사비닷컴-유료회원가입',
                amount : $('#paid_amount').val(),
                buyer_email : $('[name=member_email]').val(),
                buyer_name : $('[name=member_name]').val(),
                buyer_tel : $('[name=member_hp]').val(),
                // buyer_addr : addr,
                // buyer_postcode : '123-456',
                // m_redirect_url : 'https://www.yourdomain.com/payments/complete'
            }, function(rsp) {
                if ( rsp.success ) {
                    var msg = '결제가 완료되었습니다.';
                    // msg += '\n고유ID : ' + rsp.imp_uid;
                    // msg += '\n상점 거래ID : ' + rsp.merchant_uid;
                    // msg += '\n결제 금액 : ' + rsp.paid_amount;
                    // msg += '\n카드 승인번호 : ' + rsp.apply_num;
                    // alert(msg);
                    $('#imp_uid').val(rsp.imp_uid);
                    $('#merchant_uid').val(rsp.merchant_uid);
                    $('#pay_method').val(rsp.pay_method);
                    $('#paid_amount').val(rsp.paid_amount);
                    $('#status').val(rsp.status);
                    $('#apply_num').val(rsp.apply_num);
                    $('#vbank_num').val(rsp.vbank_num);
                    $('#vbank_name').val(rsp.vbank_name);
                    $('#vbank_holder').val(rsp.vbank_holder);
                    $('#vbank_date').val(rsp.vbank_date);
                    $('#frm_info2').submit();
                } else {
                    var msg = '결제에 실패하였습니다.';
                    msg += '\n에러내용 : ' + rsp.error_msg;
                    alert(msg);
                }
            });         
        }
    }
    else
        return false;    
}

// 유료회원 탈퇴하기
function leave_membership()
{
    if ( confirm('정말 유료회원 탈퇴하시겠습니까 ?') )
        // location.href = '/front/mypage/membership_leave_proc';
        return true;
    else
        return false;    
}

// 회원혜택 팝업
function view_membership_info()
{
    $('#membership_info').modal('show');
}

function is_not_login()
{
    if ( confirm('로그인 후 사용하실 수 있습니다.\n로그인을 하시겠습니까?') )
        location.href = '/front/auth/login';
    else
        return false;
}

function login_required()
{
    if ( confirm('회원가입 후 이용하실 수 있습니다.\n회원가입 페이지로 이동하시겠습니까?') )
        location.href = '/front/auth/regist';
    else
        return false;
}

function not_grade()
{
    if ( confirm('유료회원에게 제공되는 서비스입니다.\n유료회원 가입을 하러 가시겠습니까?') )
        location.href = '/front/mypage/info/info2';
    else
        return false;
}

function not_access()
{
    alert('본인이 등록한 글만 열람이 가능합니다.');
}

function board_delete(board_type, board_seq, is_mypage)
{
    if ( confirm('삭제시 복구 불가능 합니다.\n삭제 하시겠습니까 ?') )
        location.href = '/front/common/board_delete/' + board_type + '/' + board_seq + '/' + is_mypage;
    else
        return false;
}

function contact_regist(button)
{
    var form = $(button).closest('form');

    if ( form.find('#board_name').val() == '' ) {
        alert('이름을 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_company').val() == '' ) {
        alert('회사명을 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_hp').val() == '' ) {
        alert('휴대폰번호를 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_content').val() == '' ) {
        alert('요청사항을 입력해 주십시오.'); return false;
    }

    if ( confirm('등록 하시겠습니까?') ) 
        $(button).closest('form').submit();
    else
        return false;
}

function qna_regist(button)
{
    var form = $(button).closest('form');

    if ( form.find('#board_name').val() == '' ) {
        alert('이름을 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_phone').val() == '' ) {
        alert('연락처를 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_title').val() == '' ) {
        alert('제목을 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_content').val() == '' ) {
        alert('내용을 입력해 주십시오.'); return false;
    }

    if ( confirm('등록 하시겠습니까?') ) 
        $(button).closest('form').submit();
    else
        return false;
}

function market_regist(button)
{
    var form = $(button).closest('form');

    if ( form.find('#board_name').val() == '' ) {
        alert('이름을 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_company').val() == '' ) {
        alert('회사를 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_hp').val() == '' ) {
        alert('휴대폰번호를 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_title').val() == '' ) {
        alert('제목을 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_content').val() == '' ) {
        alert('내용을 입력해 주십시오.'); return false;
    }

    if ( confirm('등록 하시겠습니까?') ) 
        $(button).closest('form').submit();
    else
        return false;
}

function gongsabi_regist(button)
{
    var form = $(button).closest('form');

    if ( form.find('#agree').length > 0 && !form.find('#agree').is(':checked') ) {
        alert('개인정보처리방침에 동의해야 합니다.');
        return false;
    }
    else if ( form.find('#board_name').val() == '' ) {
        alert('이름을 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_company').val() == '' ) {
        alert('회사를 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_hp').val() == '' ) {
        alert('휴대폰번호를 입력해 주십시오.'); return false;
    }
    else if ( form.find('[name=email_id]').val() == '' || form.find('[name=email_address]').val() == '' ) {
        alert('이메일주소를 입력해 주십시오.'); return false;
    }
    else if ( form.find('#board_content').val() == '' ) {
        alert('요청사항을 입력해 주십시오.'); return false;
    }

    if ( confirm('등록 하시겠습니까?') ) 
        $(button).closest('form').submit();
    else
        return false;
}

function view_answer(link)
{
    event.preventDefault();
    $('.answer').hide();
    $('.question.on').removeClass('on');
    $(link).closest('tr').addClass('on').next('tr.answer').show();
}

// 마이페이지 - 좌측 메뉴
$(function() {
    $('.mypage_left_menu > li > a').on('click', function(e) {
        e.preventDefault();
        
        if ( $(this).closest('li').find('.mypage_left_child').length > 0 ) {
        if ( $(this).closest('li').find('.mypage_left_child').is(':visible') ) {
            $(this).closest('li').removeClass('on');
            $(this).closest('li').find('.mypage_left_child').hide();
        }
        else {
            $('.mypage_left_child').hide();
            $('.mypage_left_menu > li.on').removeClass('on');
            $(this).closest('li').addClass('on');
            $(this).closest('li').find('.mypage_left_child').show();
        }

        }
    });
});

// 상단 전체메뉴
$(function() {
    $('.menu_area .all_menu').on('click', function() {
        if ( $('.menu_area .all_menu_wrapper').is(':visible') ) {
            $('.menu_area .all_menu_wrapper').hide();
        } else {
            $('.menu_area .all_menu_wrapper').show();
        }
    });
});

function go_book_pay()
{
    var method = $('[name=_pay_method]:checked').val();

    var is_mobile = $('[name=is_mobile]').val();

    var price = $('.book-price').val();
    var order_price = $('.order-price').val();
    // 수량
    var qty = $('#board_etc_2').val();
    // 이름
    var name = $('#board_name').val();
    // 회사
    var company = $('#board_company').val();
    // 휴대폰번호
    var tel = $('#board_hp').val();
    // 이메일주소
    var email = $('#board_email').val();
    // 배송주소
    var addr = $('#board_etc_1').val();
    // 상세주소
    var addr_detail = $('#board_etc_4').val();

    if ( qty == '' ) {
        alert('수량을 입력해 주십시오.');
        $('#board_etc_2').focus();
        return false;
    } else if ( name == '' ) {
        alert('이름을 입력해 주십시오.');
        $('#board_name').focus();
        return false;
    } else if ( tel == '' ) {
        alert('휴대폰번호를 입력해 주십시오.');
        $('#board_hp').focus();
        return false;
    } else if ( addr == '' ) {
        alert('배송주소를 입력해 주십시오.');
        return false;
    } else {

        if ( method == 'bank' )
        {
            var bank_list = $('[name=bank_list]').val();
            var bank_account = $('[name=bank_account]').val();
            var bank_account_name = $('[name=bank_account_name]').val();
            var bank_date = $('[name=bank_date]').val();
            var refund_list = $('[name=refund_list]').val();
            var refund_account = $('[name=refund_account]').val();
            var refund_account_name = $('[name=refund_account_name]').val();

            if ( bank_list == '' || bank_account == '' || bank_account_name == '' || bank_date == '' ) {
                alert('무통장입금 정보를 입력해 주십시오.');
                return false;
            } else if ( refund_list == '' || refund_account == '' || refund_account_name == '' ) {
                alert('환불계좌 정보를 입력해 주십시오.');
                return false;
            } else {
                $('#imp_uid').val();
                $('#merchant_uid').val(new Date().getTime());
                $('#pay_method').val(method);
                $('#paid_amount').val(order_price);
                $('#status').val('ready');
                $('#frm_book').submit();   
            }             
        }
        else if ( method == 'phone' ) {
            not_pay_hp();
        }
        else
        {
            if ( is_mobile == 'Y' ) {
                var params = $('#frm_book').serialize();
                $.ajax({
                    url: '/front/education/temp_book_order_proc',
                    method: 'POST',
                    data: params,
                    dataType: 'json',
                    success: function(json) {
                        if ( !json.result )
                            alert(json.resultMessage);
                        else {
                            IMP.request_pay({
                                pg : 'inicis',
                                pay_method : method,
                                merchant_uid : json.merchant_uid,
                                name : '공사비닷컴-책구매',
                                amount : order_price,
                                buyer_email : email,
                                buyer_name : name,
                                buyer_tel : tel,
                                buyer_addr : addr,
                                m_redirect_url : 'http://gongsabi.com/front/education/book_order_complete'
                            }, function(rsp) {
                            });    
                        }
                    }    
                });
            } else {
                IMP.request_pay({
                    pg : 'inicis',
                    pay_method : method,
                    merchant_uid : new Date().getTime(),
                    name : '공사비닷컴-책구매',
                    amount : order_price,
                    buyer_email : email,
                    buyer_name : name,
                    buyer_tel : tel,
                    buyer_addr : addr,
                }, function(rsp) {
                    if ( rsp.success ) {
                        var msg = '결제가 완료되었습니다.';
                        $('#imp_uid').val(rsp.imp_uid);
                        $('#merchant_uid').val(rsp.merchant_uid);
                        $('#pay_method').val(rsp.pay_method);
                        $('#paid_amount').val(rsp.paid_amount);
                        $('#status').val(rsp.status);
                        $('#apply_num').val(rsp.apply_num);
                        $('#vbank_num').val(rsp.vbank_num);
                        $('#vbank_name').val(rsp.vbank_name);
                        $('#vbank_holder').val(rsp.vbank_holder);
                        $('#vbank_date').val(rsp.vbank_date);
                        $('#frm_book').submit();
                    } else {
                        var msg = '결제에 실패하였습니다.';
                        msg += '\n에러내용 : ' + rsp.error_msg;
                        alert(msg);
                    }
                });       
            }      
        }

    }
}

function go_membership_pay()
{
    var method = $('[name=_pay_method]:checked').val();

    if ( method == 'bank' )
    {
        var bank_list = $('[name=bank_list]').val();
        var bank_account = $('[name=bank_account]').val();
        var bank_account_name = $('[name=bank_account_name]').val();
        var bank_date = $('[name=bank_date]').val();
        var refund_list = $('[name=refund_list]').val();
        var refund_account = $('[name=refund_account]').val();
        var refund_account_name = $('[name=refund_account_name]').val();

        if ( bank_list == '' || bank_account == '' || bank_account_name == '' || bank_date == '' ) {
            alert('무통장입금 정보를 입력해 주십시오.');
            return false;
        } else if ( refund_list == '' || refund_account == '' || refund_account_name == '' ) {
            alert('환불계좌 정보를 입력해 주십시오.');
            return false;
        } else {
            $('#imp_uid').val();
            $('#merchant_uid').val(new Date().getTime());
            $('#pay_method').val(method);
            $('#status').val('ready');
            $('#frm_membership_pay').submit();   
        }          
    }
    else if ( method == 'phone' ) {
        not_pay_hp();
    }
    else
    {
        IMP.request_pay({
            pg : 'inicis', // version 1.1.0부터 지원.
            pay_method : method,
            merchant_uid : new Date().getTime(),
            name : '공사비닷컴-유료회원가입',
            amount : $('#paid_amount').val(),
            buyer_email : $('[name=member_email]').val(),
            buyer_name : $('[name=member_name]').val(),
            buyer_tel : $('[name=member_hp]').val(),
            // buyer_addr : addr,
            // buyer_postcode : '123-456',
            // m_redirect_url : 'https://www.yourdomain.com/payments/complete'
        }, function(rsp) {
            if ( rsp.success ) {
                var msg = '결제가 완료되었습니다.';
                // msg += '\n고유ID : ' + rsp.imp_uid;
                // msg += '\n상점 거래ID : ' + rsp.merchant_uid;
                // msg += '\n결제 금액 : ' + rsp.paid_amount;
                // msg += '\n카드 승인번호 : ' + rsp.apply_num;
                // alert(msg);
                $('#imp_uid').val(rsp.imp_uid);
                $('#merchant_uid').val(rsp.merchant_uid);
                $('#pay_method').val(rsp.pay_method);
                $('#paid_amount').val(rsp.paid_amount);
                $('#status').val(rsp.status);
                $('#apply_num').val(rsp.apply_num);
                $('#vbank_num').val(rsp.vbank_num);
                $('#vbank_name').val(rsp.vbank_name);
                $('#vbank_holder').val(rsp.vbank_holder);
                $('#vbank_date').val(rsp.vbank_date);
                $('#frm_membership_pay').submit();
            } else {
                var msg = '결제에 실패하였습니다.';
                msg += '\n에러내용 : ' + rsp.error_msg;
                alert(msg);
            }
        });         
    }
}

function go_cancel(btn)
{
    var checked = $('.bookcs_chk:checked').length;
    var reason_text = $('[name=_cancel_reason_text]').val();

    if ( checked == 0 ) {        
        alert('주문취소 신청할 상품을 선택해 주십시오.');
        return false;
    } else if ( reason_text == '' ) {
        alert('주문 취소 사유를 입력해 주십시오.');
        return false;
    } else {
        if ( confirm('해당 상품의 주문을 취소 하시겠습니까 ?') )
            $(btn).closest('form').submit();
    }
}

function go_exchange_membershiop(link)
{
    if ( $('[name=member_id]').val() == '' || $('[name=member_password]').val() == '' ) {
        alert('로그인 정보를 입력 후 전환하기를 눌러주시기 바랍니다.');
        return false;
    } else {
        $('#frm_login').attr('action', '/front/auth/login_proc/exchange').submit();
    }
}

// 리뷰 등록
function review_regist(button)
{
    var form = $(button).closest('form');

    if ( form.find('#review_comment').val() == '' ) {
        alert('내용을 입력해 주십시오.'); return false;
    }

    if ( confirm('등록 하시겠습니까?') ) 
        $(button).closest('form').attr('action', '/front/education/book_review_regist_proc').submit();
    else
        return false;
}

// 리뷰 수정
function review_modify(review_seq)
{
    $.ajax({
        url: '/front/education/book_review_info',
        method: 'POST',
        data: {
            'review_seq': review_seq
        },
        dataType: 'json',
        success: function(json) {
            if ( !json.result )
                alert(json.resultMessage);
            else {
                $('[name=mode]').val('mod');
                $('[name=review_seq]').val(json.data.review_seq);
                $('[name=review_comment]').val(json.data.review_comment);
                $('#review_score' + json.data.review_score).prop('checked', true);
                $('.review_ins').hide();
                $('.review_mod').show();
                $('.review_cancel').show();
            }
        }    
    });
}

// 리뷰 수정 처리
function review_modify_proc(btn)
{
    var form = $(btn).closest('form');

    if ( form.find('#review_comment').val() == '' ) {
        alert('내용을 입력해 주십시오.'); return false;
    }

    if ( confirm('수정 하시겠습니까?') ) 
        $(btn).closest('form').attr('action', '/front/education/book_review_modify_proc').submit();
    else
        return false;
}

// 리뷰 수정 취소
function review_modify_cancel(btn)
{
    $('[name=mode]').val('ins');
    $('[name=review_seq]').val('');
    $('[name=review_comment]').val('');
    $('#review_score5').prop('checked', true);
    $('.review_ins').show();
    $('.review_mod').hide();
    $('.review_cancel').hide();
}

// 리뷰 삭제
function review_delete(review_seq, lang)
{
    var message = '삭제 후 복구 불가능 합니다.\n삭제 하시겠습니까 ?';
    if ( lang == 'eng' )
        message = 'Are you sure?\nYou will not be able to recover this record';

    if ( confirm(message) ) {
        $.ajax({
            url: '/front/education/book_review_delete_proc',
            method: 'POST',
            data: {
                'review_seq': review_seq
            },
            dataType: 'json',
            success: function(json) {
                if ( !json.result )
                    alert(json.resultMessage);
                else
                    location.reload();
            }    
        });

    } else {
        return false;
    }
}

// 마이페이지 - 공사비교육 - 취소/교환/환불 신청 - 주문 취소 사유 선택
function select_book_cancel_reason(el)
{
    var reason = $(el).val();
    $('[name=cancel_reason_text]').val(reason);
}

// 휴대폰결제 임시 막기
function not_pay_hp()
{
    var top = $(document).scrollTop() + 300;
    $('.modal_content.not_pay_hp').css({
        'top': top
    });
    $('.modal_content_wrapper').show();    
    $('.modal_content.not_pay_hp').show();    
    return false;
}

// 모달 닫기
function close_modal(el)
{
    if ( $(el).closest('.modal_content').find('.popup_hide').is(':checked') ) {
        var seq = $(el).closest('.modal_content').find('.popup_hide').val();
        setCookie('popup_' + seq, 'done', 1);
    }
    $(el).closest('.modal_content').hide();
    $('.modal_content_wrapper').hide();  
}

function setCookie(name, value, expiredays) {
    console.log(name, value, expiredays);
    var todayDate = new Date();
    todayDate.setDate( todayDate.getDate() + expiredays );
    document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}

function getCookie() {
    var cookiedata = document.cookie;
    if ( cookiedata.indexOf('popup_1=done') < 0 )
        $('.modal_content.popup_1').show();
    else
        $('.modal_content.popup_1').hide();
    if ( cookiedata.indexOf('popup_2=done') < 0 )
        $('.modal_content.popup_2').show();
    else
        $('.modal_content.popup_2').hide();
}

$(function() {
    var width = $(document).width();
    $('.modal_content.popup_1').css({
        // 'left': ( width / 2 ) - ( 876 / 2 ) - 300
        'left': ( width / 2 ) - ( 876 / 2 )
    });
    $('.modal_content.popup_2').css({
        'left': ( width / 2 ) - ( 300 / 2 ) + 300
    });

    getCookie();
});