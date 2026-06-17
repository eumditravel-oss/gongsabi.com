<div class="login_wrapper">
    <span class="login_title">로그인</span>
    <form method="post" id="frm_login" action="/front/auth/login_proc">
    <div class="login_form_wrapper">
        <div class="login_form_item">
            <span class="login_form_label id"><i class="fa fa-fw fa-user"></i></span>
            <span class="login_form_input"><input type="text" name="member_id" placeholder="아이디" required="true"></span>
        </div>
        <div class="login_form_item">
            <span class="login_form_label password"><i class="fa fa-fw fa-lock"></i></span>
            <span class="login_form_input"><input type="password" name="member_password" placeholder="비밀번호" required="true"></span>
        </div>
    </div>
    <div class="login_check_wrapper">
        <span class="save"><label for="member_id_save"><input type="checkbox" name="member_id_save" id="member_id_save" value="Y"> 아이디 저장</label></span>
        <span class="link"><a href="#" onclick="go_exchange_membershiop(this);">유료회원으로 전환하기</a></span>
    </div>
    <div class="login_button_wrapper">
        <button type="submit" class="login_button">로그인</button>
        <div class="login_link_wrapper">
            <a href="/front/auth/regist">회원가입</a> / <a href="/front/auth/find">아이디 찾기</a> / <a href="/front/auth/find">비밀번호 찾기</a>
        </div>
    </div>
    </form>
</div>