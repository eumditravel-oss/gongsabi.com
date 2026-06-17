<?php if ( $this->session->userdata('MEMBER_JOIN_SESSION')['member_type'] == '1' ) { ?>
<div class="join_step_wrapper">
    <div class="join_step_title">
        <span class="title">무료회원 회원가입</span>
        <span class="step">01. 회원 약관 동의 > 02. 회원 정보 입력 > <span class="mfc">03. 가입완료</span></span>
    </div>   
    <div class="join_complete_wrapper">
        <h2>무료회원 가입이 완료되었습니다.</h2>
        <p class="mfc mt-3">※ 유료회원으로 전환시 보다 더 다양한 혜택을 누리실 수 있습니다.</p>
        <div class="mt-5">
            <a href="/front/auth/login" class="btn btn-success mr-3">로그인 하기</a>
            <a href="/front/mypage/info/info2" class="btn btn-outline-success">유료회원 전환</a>
        </div>
    </div>
</div>
<?php } ?>
<?php if ( $this->session->userdata('MEMBER_JOIN_SESSION')['member_type'] == '2' ) { ?>
<div class="join_step_wrapper">
    <div class="join_step_title">
        <span class="title">유료회원 회원가입</span>
        <span class="step">01. 회원 약관 동의 > 02. 회원 정보 입력 > 03. 결제 > <span class="mfc">04. 가입 완료</span></span>
    </div>   
    <div class="join_complete_wrapper">
        <?php if ( $this->session->userdata('MEMBER_PAY_SESSION') ) { ?>
        <h2>유료회원 가입이 완료되었습니다.</h2>
        <?php } else { ?>
        <h2>입금이 확인되면 유료회원으로 자격부여가 됩니다.</h2>
        <?php } ?>
        <div class="mt-5">
            <a href="/front/auth/login" class="btn btn-success mr-3">로그인 하기</a>
            <a href="/" class="btn btn-outline-success">홈으로</a>
        </div>
    </div>
</div>
<?php } ?>