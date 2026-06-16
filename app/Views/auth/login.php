<section class="page-title">
    <p>MEMBER</p>
    <h1>로그인</h1>
</section>

<section class="form-wrap">
    <form method="post" action="/front/auth/login" class="form-panel">
        <?= csrf_field() ?>
        <label>
            이메일
            <input type="email" name="email" required autocomplete="email">
        </label>
        <label>
            비밀번호
            <input type="password" name="password" required autocomplete="current-password">
        </label>
        <button type="submit" class="btn primary">로그인</button>
        <a class="text-link" href="/front/auth/regist">회원가입</a>
    </form>
</section>
