<div class="join_step_wrapper">
	<div class="join_step_title">
		<span class="title"><?php echo ( $member_type == '1' ) ? '무료' : '유료'; ?>회원 회원가입</span>
		<?php if ( $member_type == '1' ) { ?>
		<span class="step"><span class="mfc">01. 회원 약관 동의</span> > 02. 회원 정보 입력 > 03. 가입완료</span>
		<?php } ?>
		<?php if ( $member_type == '2' ) { ?>
		<span class="step"><span class="mfc">01. 회원 약관 동의</span> > 02. 회원 정보 입력 > 03. 결제 > 04. 가입 완료</span>
		<?php } ?>
	</div>
	<div class="join_step">
		<div class="join_step_item_wrapper">
			<div class="join_step_item">
				<img src="/static/img/join_step001.png"><br>
				회원 약관 동의
			</div>
			<div class="join_step_item">
				<img src="/static/img/join_step002.png"><br>
				회원 정보 입력
			</div>
			<div class="join_step_item">
				<img src="/static/img/join_step003.png"><br>
				가입 완료
			</div>
		</div>
		<div class="join_step_desc">
			(주)공사비닷컴의 서비스를 이용하기 위해서는 반드시 이용 약관을 읽어보시고 동의하셔야 합니다.<br>
			타인의 개인정보를 도용하여 가입할 경우, 향후 적발 시 서비스 이용제한 및 법적 제제를 받으실 수 있습니다.
		</div>
	</div>
	<div class="join_agree_title">
		서비스 이용약관
	</div>
	
	<form method="post" action="/front/auth/regist_form">
	<div class="join_agree_wrapper">
		<input type="hidden" name="member_type" value="<?php echo $member_type; ?>">
		<div class="join_agree_item">
			<span class="agree_label fb"><label for="check_all"> <input type="checkbox" name="check_all" id="check_all" value="Y">전체동의 <small>(※ 선택 동의 사항이 포함되어 있습니다.)</small></label></span>
		</div>
		<div class="join_agree_item">
			<span class="agree_label"><label for="agree1"> <input type="checkbox" name="agree1" id="agree1" value="Y">본인은 만 14세 이상이며, 홈페이지 이용약관에 동의 합니다. <small class="text-danger">(필수)</small></label></span>
			<span class="agree_button"><a href="#" onclick="view_agree('term1');">약관보기 ></a></span>
		</div>
		<div class="join_agree_item">
			<span class="agree_label"><label for="agree2"> <input type="checkbox" name="agree2" id="agree2" value="Y">본인은 만 14세 이상이며, 개인정보 활용 약관에 동의 합니다. <small class="text-danger">(필수)</small></label></span>
			<span class="agree_button"><a href="#" onclick="view_agree('term2');">약관보기 ></a></span>
		</div>
		<div class="join_agree_item">
			<span class="agree_label"><label for="agree3"> <input type="checkbox" name="agree3" id="agree3" value="Y">만 14세 미만 아동일 시, 개인정보 수집·이용에 대한 보호자(법정대리인) 동의 <small>(선택)</small></label></span>
			<span class="agree_button"><a href="#" onclick="view_agree('term3');">약관보기 ></a></span>
		</div>
		<div class="join_agree_item">
			<span class="agree_label"><label for="agree4"> <input type="checkbox" name="agree4" id="agree4" value="Y">마케팅 활용 수신 동의 <small>(선택)</small></label></span>
			<span class="agree_button"><a href="#" onclick="view_agree('term4');">약관보기 ></a></span>
		</div>
		<div class="join_agree_item">
			<span class="agree_label"><label for="agree5"> <input type="checkbox" name="agree5" id="agree5" value="Y">광고성 정보 수신 동의 <small>(선택)</small></label></span>
			<span class="agree_button"><a href="#" onclick="view_agree('term5');">약관보기 ></a></span>
		</div>
	</div>
	<div class="mt-5 text-center">
		<button type="button" class="btn btn-success" onclick="go_regist_form(this);">다음</button>
	</div>
	</form>
</div>