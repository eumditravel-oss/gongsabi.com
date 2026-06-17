<div class="book_complete_wrapper">
	<h3>결제 완료</h3>
	<div class="book_complete_area">
		<p>공사비닷컴 교재구매를 이용해 주셔서 감사합니다.</p>
		<div class="book_complete_message">
			회원님, <span class="mfc">주문이 완료</span>되었습니다.
		</div>
		<?php if ( $pay_data[0]->pay_method == 'bank' ) { ?>
		<p>담당자가 입금을 확인하는 즉시<br>안전하고 신속하게 배송 도와드리겠습니다.</p>
		<?php } else { ?>
		<p>회원님이 주문하신 주문번호는<br><span class="mfc"><?php echo $pay_data[0]->merchant_uid; ?></span> 입니다.</p>
		<?php } ?>
		<p class="mt-4">주문내역 확인은 마이페이지에서<br>교재구매 내역에서 하실 수 있습니다.</p>
		<div class="book_complete_button mt-4">
			<a href="/front/mypage/education/book" class="btn btn-success mr-3">구매내역 바로가기</a>
			<a href="/" class="btn btn-outline btn-mat-indigo">홈으로</a>
		</div>
	</div>
</div>