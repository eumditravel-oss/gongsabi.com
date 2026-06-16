<section class="sub-visual"><div class="wrap"><h2>MEMBER</h2><p>로그인</p></div></section>
<section class="auth-box">
    <h2>로그인</h2>
    <form method="post" action="/front/auth/login">
        <?= csrf_field() ?>
        <label>이메일<input type="email" name="email" required autocomplete="email"></label>
        <label>비밀번호<input type="password" name="password" required autocomplete="current-password"></label>
        <button type="submit">로그인</button>
    </form>
    <p><a href="/front/auth/regist">회원가입</a></p>
</section>
