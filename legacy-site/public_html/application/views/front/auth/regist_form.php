<div class="join_step_wrapper">
    <div class="join_step_title">
        <span class="title"><?php echo ( $member_type == '1' ) ? '무료' : '유료'; ?>회원 회원가입</span>
        <?php if ( $member_type == '1' ) { ?>
        <span class="step">01. 회원 약관 동의 > <span class="mfc">02. 회원 정보 입력</span> > 03. 가입완료</span>
        <?php } ?>
        <?php if ( $member_type == '2' ) { ?>
        <span class="step">01. 회원 약관 동의 > <span class="mfc">02. 회원 정보 입력</span> > 03. 결제 > 04. 가입 완료</span>
        <?php } ?>
    </div>   
    <div class="join_form_wrapper">
    <form action="/front/auth/regist_proc" method="post">
        <input type="hidden" name="member_type" value="<?php echo $member_type; ?>">
        <input type="hidden" name="agree1" value="<?php echo $agree1; ?>">
        <input type="hidden" name="agree2" value="<?php echo $agree2; ?>">
        <input type="hidden" name="agree3" value="<?php echo $agree3; ?>">
        <input type="hidden" name="agree4" value="<?php echo $agree4; ?>">
        <input type="hidden" name="agree5" value="<?php echo $agree5; ?>">
        <legend>회원 정보 입력</legend>
        <hr>
        <div class="form-group">
            <label for="member_id">아이디(이메일) <small class="text-danger">* 필수</small></label>
            <input type="email" class="form-control" name="member_id" id="member_id" placeholder="아이디(이메일)" required>
        </div>
        <div class="form-group">
            <label for="member_password">비밀번호 <small class="text-danger">* 필수</small></label>
            <input type="password" class="form-control" name="member_password" id="member_password" placeholder="비밀번호" required>
        </div>
        <div class="form-group">
            <label for="member_password_re">비밀번호 확인 <small class="text-danger">* 필수</small></label>
            <input type="password" class="form-control" name="member_password_re" id="member_password_re" placeholder="비밀번호 확인" required>
        </div>
        <div class="form-group">
            <label for="member_name">이름 <small class="text-danger">* 필수</small></label>
            <input type="text" class="form-control" name="member_name" id="member_name" placeholder="이름" required>
        </div>
        <div class="form-group">
            <label for="member_hp">휴대폰번호 <small class="text-danger">* 필수</small></label>
            <input type="text" class="form-control handle-cell-phone" name="member_hp" id="member_hp" placeholder="휴대폰번호" maxlength="13" required>
        </div>
        <legend class="mt-5">선택 입력사항</legend>
        <hr>
        <div class="form-group">
            <label for="member_company">회사</label>
            <input type="text" class="form-control" name="member_company" id="member_company" placeholder="회사">
        </div>
        <div class="form-group">
            <label for="member_phone">전화번호</label>
            <input type="text" class="form-control handle-phone" name="member_phone" id="member_phone" placeholder="전화번호" maxlength="13">
        </div>
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-success mb-3">회원가입</button><br>
            <a href="/front/auth/login"><i class="fa fa-user-plus" aria-hidden="true"></i> 이미 회원 이신가요 ? 로그인</a>
        </div>
    </form>
    </div>
</div>