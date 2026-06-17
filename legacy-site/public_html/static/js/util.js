function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// 카드번호 자동 입력
function autoCardNumber(str) {
    str = str.replace(/[^0-9]/g, '');
    var tmp = '';
    if ( str.length < 5) {
        return str;
    } else if ( str.length < 9 ) {
        tmp += str.substr(0, 4);
        tmp += '-';
        tmp += str.substr(4);
        return tmp;
    } else if ( str.length < 13 ) {
        tmp += str.substr(0, 4);
        tmp += '-';
        tmp += str.substr(4, 4);
        tmp += '-';
        tmp += str.substr(8);
        return tmp;
    } else {        
        tmp += str.substr(0, 4);
        tmp += '-';
        tmp += str.substr(4, 4);
        tmp += '-';
        tmp += str.substr(8, 4);
        tmp += '-';
        tmp += str.substr(12);
        return tmp;
    }
    return str;
}

// 카드유효기간 자동 입력
function autoCardValidYM(str) {
    str = str.replace(/[^0-9]/g, '');
    var tmp = '';
    if ( str.length < 3) {
        return str;
    } else {        
        tmp += str.substr(0, 2);
        tmp += '/';
        tmp += str.substr(2);
        return tmp;
    }
    return str;
}

// 휴대폰번호 하이픈(-) 자동 입력
// https://mulder21c.github.io/2014/11/03/automatically-enter-cell-phone-number-hyphen
function autoCellPhone(str) {
    str = str.replace(/[^0-9]/g, '');
    var tmp = '';
    if ( str.length < 4) {
        return str;
    } else if ( str.length < 7 ) {
        tmp += str.substr(0, 3);
        tmp += '-';
        tmp += str.substr(3);
        return tmp;
    } else if ( str.length < 11 ) {
        tmp += str.substr(0, 3);
        tmp += '-';
        tmp += str.substr(3, 3);
        tmp += '-';
        tmp += str.substr(6);
        return tmp;
    } else {        
        tmp += str.substr(0, 3);
        tmp += '-';
        tmp += str.substr(3, 4);
        tmp += '-';
        tmp += str.substr(7);
        return tmp;
    }
    return str;
}

function autoPhone(str) {
    str = str.replace(/[^0-9]/g, '');
    var tmp = '';
    if ( str.length < 4) {
        return str;
    } else {
        if( str.length < 7 ) {
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3);
            return tmp;
        } else if ( str.length == 8 ) {
            tmp += str.substr(0, 4);
            tmp += '-';
            tmp += str.substr(4);
            return tmp;
        } else if ( str.length == 9 ) {
            // 02-123-4567 (9자)
            tmp += str.substr(0, 2);
            tmp += '-';
            tmp += str.substr(2, 3);
            tmp += '-';
            tmp += str.substr(5);
            return tmp;
        } else if ( str.length > 9 ) {
            if ( str.length == 10 ) {
                // 02-1234-5678 (10자)
                if ( str.substr(0, 2) == '02' ) {
                    tmp += str.substr(0, 2);
                    tmp += '-';
                    tmp += str.substr(2, 4);
                    tmp += '-';
                    tmp += str.substr(6);
                    return tmp;
                }
                // 031-123-4567 (10자)
                else {
                    tmp += str.substr(0, 3);
                    tmp += '-';
                    tmp += str.substr(3, 3);
                    tmp += '-';
                    tmp += str.substr(6);
                    return tmp;
                }
            } else if ( str.length > 10 ) { 
                // 031-1234-5678 (11자)       
                tmp += str.substr(0, 3);
                tmp += '-';
                tmp += str.substr(3, 4);
                tmp += '-';
                tmp += str.substr(7);
                return tmp;
            }
        }
    }
    return str;
}

$(function() {
    // 전화번호 자동 입력 이벤트
    $('.handle-phone').on('keyup', function() {
        var _this = $(this).val();
        var _change = autoPhone(_this);
        $(this).val(_change);
    });

    // 휴대폰번호 자동 입력 이벤트
    $('.handle-cell-phone').on('keyup', function() {
        var _this = $(this).val();
        var _change = autoCellPhone(_this);
        $(this).val(_change);
    });

    // 카드번호 자동 입력 이벤트
    $('.handle-card-number').on('keyup', function() {
        var _this = $(this).val();
        var _change = autoCardNumber(_this);
        $(this).val(_change);
    });

    // 카드유효기간 자동 입력 이벤트
    $('.handle-card-valid-ym').on('keyup', function() {
        var _this = $(this).val();
        var _change = autoCardValidYM(_this);
        $(this).val(_change);
    });

});

// 이메일주소 체크 (리턴이 True 여야함.)
function email_check(email) {
    var regex=/([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return (email != '' && email != 'undefined' && regex.test(email));
}

/*
 * 이메일주소 체크 이벤트
 */
$(function() {
    $('.handle-email').on('blur', function() {
        var _this = $(this).val();
        // 값을 입력안한경우는 아예 체크를 하지 않는다.
        if (_this == '' || _this == 'undefined') return;

        $('.handle-error-msg').remove();
 
        // 이메일 유효성 검사
        if (!email_check(_this)) {
            var $msg = $('<span class="handle-error-msg">잘못된 형식의 이메일 주소입니다.</span>');
            $(this).parent().append($msg);
            $(this).focus();
            return false;
        }        
    });
});

/*
 * 공통 알림창
 */
function makeAlert($msg)
{
    alert($msg);
}

// 회원가입 약관동의 - 다음
function go_regist_form(btn) {
    if ( !$('[name=agree1]').is(':checked') ) {
        alert('홈페이지 이용약관에 동의해 주십시오.');
        return false;
    }
    else if ( !$('[name=agree1]').is(':checked') ) {
        alert('개인정보 활용 약관에 동의해 주십시오.');
        return false;
    }
    else {
        $(btn).closest('form').submit();
    }
}

$(function() {
    // 회원가입 전체동의
    $('[name=check_all]').on('click', function() {
        if ( $(this).is(':checked') )
            $(this).closest('form').find(':checkbox').prop('checked', true);
        else
            $(this).closest('form').find(':checkbox').prop('checked', false);
    });

    $('[name=email_address_list]').on('change', function() {
        var wrapper = $(this).closest('.form-email');
        var address = $(this).val();
        wrapper.find('[name=email_address]').val(address);
        if ( address == '' )
            wrapper.find('[name=email_address]').select();
        make_email();
    });

    $('[name=email_id], [name=email_address]').on('change', function() {
        make_email();
    });

    $('[name=_pay_method]').on('click', function() {
        var method = $(this).val();
        $('.pay_method_desc').hide();
        if ( method == 'bank' )
            $('.pay_method_desc.pay_method_desc_bank').show();
    });

    // $('[name=_cancel_reason]').on('change', function() {
    //     var reason = $(this).val();
    //     $('[name=_cancel_reason_text]').val(reason);
    // });
});

function make_email()
{
    var id = $('[name=email_id]').val();
    var address = $('[name=email_address]').val();
    var email = id + '@' + address;
    $('[name=board_email]').val(email);    
}