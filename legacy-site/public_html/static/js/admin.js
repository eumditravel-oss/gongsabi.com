$(function() {
	$('.btn-delete').on('click', function(e) {
		e.preventDefault();

		var url = $(this).attr('href');

		if ( confirm('삭제하면 복구가 불가능 합니다.\n정말 삭제하시겠습니까 ?') )
			location.href = url;
		else
			return false;
	});
});

// 리스트 엑셀 다운로드
function download()
{
	$('#frm_download').submit();
}

// 입금처리
function go_deposit_process(board_seq)
{
	if ( confirm('해당 주문을 입금처리 하시겠습니까 ?') ) {
	    $.ajax({
            method: 'POST',
	        url: '/admin/common/deposit_process',
	        data: {
	            'board_seq': board_seq
	        },
	        dataType: 'json',
	        success: function(json) {
	            if ( json.result )
	                location.reload();
	        }    
	    });
	} else {
		return false;
	}
}

// 공사비 등록 처리
function regist_gongsabi(el)
{
	$('.loading').show();
	$(el).prop('disabled', true);
	$(el).closest('form').submit();
}

// 공사비 체크 삭제
function delete_all_gongsabi(el)
{
	var checked_count = $('.chk:checked').length;
	if ( checked_count == 0 ) {
		alert('삭제할 데이터를 선택해 주십시오.');
		return false;
	} else {
		if ( confirm('삭제시 복구 불가능 합니다.\n정말 삭제 하시겠습니까 ?') )
			$(el).closest('form').submit();
		else
			return false;
	}
}

// 전체선택
function check_all(el)
{
	if ( $(el).is(':checked') )
		$('.chk').prop('checked', true);
	else
		$('.chk').prop('checked', false);
}

// 교재 리뷰 삭제
function delete_review(review_seq)
{
	if ( confirm('삭제시 복구 불가능 합니다.\n정말 삭제 하시겠습니까 ?') )
		location.href = '/admin/book/review_delete/' + review_seq;
	else
		return false;
}

// 회원 삭제
function delete_member(member_seq)
{
	if ( confirm('삭제시 복구 불가능 합니다.\n정말 삭제 하시겠습니까 ?') )
		location.href = '/admin/member/delete/' + member_seq;
	else
		return false;
}