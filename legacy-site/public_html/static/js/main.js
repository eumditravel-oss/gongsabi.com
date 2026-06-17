$(function() {    
    $('.btn_all_menu').on('mouseenter', function() {
        $('.all_menu_wrapper').show();
    });

    $('.all_menu_wrapper').on('mouseleave', function() {
        $(this).hide();
    });

    $('.header_container.web header .menu > li')
    .on('mouseenter', function() {
        $(this).addClass('on').find('.sub').show();
    })
    .on('mouseleave', function() {
        $(this).removeClass('on').find('.sub:visible').hide();
    }); 

    $('.product_category_list.web > li')
    .on('mouseenter', function() {
        $(this).addClass('on').find('.sub').show();
        $('.all_menu_wrapper').hide();
    })
    .on('mouseleave', function() {
        $(this).removeClass('on').find('.sub:visible').hide();
    });

    $('.product_category_list.web > li > .sub > li')
    .on('mouseenter', function() {
        $(this).addClass('on').find('.sub2').show();
    })
    .on('mouseleave', function() {
        $(this).removeClass('on').find('.sub2:visible').hide();
    });

    $('.btn_menu').on('click', function() {
        if ( $('.header_container header .menu').is(':visible') )
            $('.header_container header .menu').hide();
        else
            $('.header_container header .menu').show();
    });

    $(window).scroll(function() {
        var navbarHeight = $('.header_container').outerHeight();
        var now = $(this).scrollTop();

        if ( navbarHeight <= now )
        {
            $('.header_container').addClass('fix');
            $('#top_category').addClass('fix');            
        }
        else
        {
            $('.header_container').removeClass('fix');
            $('#top_category').removeClass('fix');
        }
    });

	// Swiper 공통 설정
	const cf_pagination = {
		el: '.swiper-pagination',
		type: 'bullets',
		clickable: true
	};

	// MAIN
    const main_slider = new Swiper('.main_slider_list', {
    	autoplay: {
			delay: 7000,
		},
    	loop: true,
    	pagination: cf_pagination
    });

	// PROMOTION
    const promotion_slider = new Swiper('.promotion_list', {
    	loop: true,
    	pagination: cf_pagination
	});

    // BEST PRODUCT 카테고리
    $('.category_list .category').on('click', function(e) {
    	e.preventDefault();
    	var index = $(this).closest('li').index();
    	$('.category_list li.on').removeClass('on');
    	$(this).closest('li').addClass('on');
    	$('.product_list:visible').hide();
    	$('.product_list').eq(index).show();
    });

    $('.move_target').on('click', function(e) {
        e.preventDefault();
        var now = $('html').scrollTop();
        var scrollPosition = $($(this).attr('data-target')).offset().top - 140;
        $('html').animate({
            'scrollTop': scrollPosition
        }, 700);
    });

});

function board_regist()
{
    event.preventDefault();

    var captcha_key = $('.captcha_key').val();
    var captcha_code = $('.captcha_code').val();
    var check = captcha_check(captcha_key, captcha_code);
    if ( $('.board_name').val() == '' )
    {
        alert('이름을 입력해 주십시오.');
        return false;
    }
    else if ( $('.board_password').length > 0 && $('.board_password').val() == '' )
    {
        alert('비밀번호를 입력해 주십시오.');
        return false;
    }
    else if ( $('.board_title').val() == '' )
    {
        alert('제목을 입력해 주십시오.');
        return false;
    }
    else if ( $('.board_content').val() == '' )
    {
        alert('내용을 입력해 주십시오.');
        return false;
    }
    else if ( !check )
    {
        alert('자동등록방지 입력 문자가 틀렸습니다.');
        return false;
    }
    else
    {
        $('#frm_board_regist').submit();
    }
}

function board_check()
{
    event.preventDefault();

    if ( $('.board_password').val() == '' )
    {
        alert('비밀번호를 입력해 주십시오.');
        return false;
    }
    else
    {
        $('#frm_board_check').submit();
    }    
}

function captcha_refresh()
{
    event.preventDefault();

    $.ajax({
        type: 'POST',
        async: false,
        url: '/front/common/ajax_captcha_refresh',
        data: {
            'key': $('.captcha_key').val()
        },
        dataType: 'json',
        success: function(json) {
            if ( json.key )
            {
                $('.captcha_image').attr('src', json.image);
                $('.captcha_key').val(json.key);
            }
        }
    });
}

function captcha_check(key, code)
{
    var check = false;

    console.log(key, code);

    $.ajax({
        type: 'POST',
        async: false,
        url: '/front/common/ajax_captcha_check',
        data: {
            'key': key,
            'code': code
        },
        dataType: 'json',
        success: function(json) {
            console.log(json);
            check = json.result;
        }
    });

    return check;
}

function product_regist_check()
{
    if ( $('.serial').val() == '' )
    {
        alert('제품번호(S/N)를 입력해 주십시오.');
        return false;
    }
    else
    {
        $('#frm_serial_check').submit();
    }
}

function product_regist()
{
    event.preventDefault();

    var captcha_key = $('.captcha_key').val();
    var captcha_code = $('.captcha_code').val();
    var check = captcha_check(captcha_key, captcha_code);
    if ( $('.username').val() == '' )
    {
        alert('이름을 입력해 주십시오.');
        return false;
    }
    else if ( $('.email').val() == '' )
    {
        alert('이메일을 입력해 주십시오.');
        return false;
    }
    else if ( $('.phone').val() == '' )
    {
        alert('연락처를 입력해 주십시오.');
        return false;
    }
    else if ( $('.model').val() == '' )
    {
        alert('모델명을 입력해 주십시오.');
        return false
    }
    else if ( $('.serial').val() == '' )
    {
        alert('제품번호(S/N)을 입력해 주십시오.');
        return false;
    }
    else if ( $('.buy_date').val() == '' )
    {
        alert('구매날짜를 입력해 주십시오.');
        return false;
    }
    else if ( $('.buy_place').val() == '' )
    {
        alert('구매처를 입력해 주십시오.');
        return false;
    }
    else if ( !check )
    {
        alert('자동등록방지 입력 문자가 틀렸습니다.');
        return false;
    }
    else if ( !$('#agree').is(':checked') )
    {
        alert('개인정보 수집 및 이용에 동의하셔야 합니다.');
        return false;
    }
    else
    {
        $('#frm_product_regist').submit();
    }
}

function as_regist()
{
    event.preventDefault();

    var captcha_key = $('.captcha_key').val();
    var captcha_code = $('.captcha_code').val();
    var check = captcha_check(captcha_key, captcha_code);
    if ( $('.username').val() == '' )
    {
        alert('이름을 입력해 주십시오.');
        return false;
    }
    else if ( $('.email').val() == '' )
    {
        alert('이메일을 입력해 주십시오.');
        return false;
    }
    else if ( $('.phone').val() == '' )
    {
        alert('연락처를 입력해 주십시오.');
        return false;
    }
    else if ( $('.model').val() == '' )
    {
        alert('모델명을 입력해 주십시오.');
        return false
    }
    else if ( $('.serial').val() == '' )
    {
        alert('제품번호(S/N)을 입력해 주십시오.');
        return false;
    }
    else if ( $('.as_title').val() == '' )
    {
        alert('제목을 입력해 주십시오.');
        return false;
    }
    else if ( $('.as_content').val() == '' )
    {
        alert('내용을 입력해 주십시오.');
        return false;
    }
    else if ( !check )
    {
        alert('자동등록방지 입력 문자가 틀렸습니다.');
        return false;
    }
    else if ( !$('#agree').is(':checked') )
    {
        alert('개인정보 수집 및 이용에 동의하셔야 합니다.');
        return false;
    }
    else
    {
        $('#frm_as_regist').submit();
    }
}