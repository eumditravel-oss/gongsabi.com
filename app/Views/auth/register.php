<section class="sub-visual"><div class="wrap"><h2>MEMBER</h2><p>회원가입</p></div></section>
<section class="auth-box">
    <h2>회원가입</h2>
    <form method="post" action="/front/auth/regist">
        <?= csrf_field() ?>
        <label>이름<input type="text" name="name" required autocomplete="name"></label>
        <label>이메일<input type="email" name="email" required autocomplete="email"></label>
        <label>비밀번호<input type="password" name="password" required minlength="8" autocomplete="new-password"></label>
        <label>연락처<input type="tel" name="phone" autocomplete="tel"></label>
        <label>회사명<input type="text" name="company"></label>
        <label><input type="checkbox" name="agree_terms" required> 이용약관과 개인정보처리방침에 동의합니다.</label>
        <button type="submit">가입하기</button>
    </form>
</section>
