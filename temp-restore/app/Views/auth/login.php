<section class="sub-visual"><div class="wrap"><p>MEMBER</p><h2>로그인</h2></div></section>
<section class="form-wrap legacy-login"><form method="post" action="/front/auth/login" class="form-panel">
    <?= csrf_field() ?>
    <h1>로그인</h1>
    <label>이메일<input type="email" name="email" required autocomplete="email"></label>
    <label>비밀번호<input type="password" name="password" required autocomplete="current-password"></label>
    <button type="submit" class="btn primary">로그인</button>
    <p><a href="/front/auth/regist">회원가입</a></p>
</form></section>
