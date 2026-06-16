<section class="page-title">
    <p>MEMBER</p>
    <h1>회원가입</h1>
</section>

<section class="form-wrap">
    <form method="post" action="/front/auth/regist" class="form-panel two-cols">
        <?= csrf_field() ?>
        <label>
            이름
            <input type="text" name="name" required autocomplete="name">
        </label>
        <label>
            이메일
            <input type="email" name="email" required autocomplete="email">
        </label>
        <label>
            비밀번호
            <input type="password" name="password" required minlength="8" autocomplete="new-password">
        </label>
        <label>
            연락처
            <input type="tel" name="phone" autocomplete="tel">
        </label>
        <label class="span-2">
            회사명
            <input type="text" name="company">
        </label>
        <label class="checkbox span-2">
            <input type="checkbox" name="agree_terms" required>
            <span>이용약관과 개인정보처리방침에 동의합니다.</span>
        </label>
        <button type="submit" class="btn primary span-2">가입하기</button>
    </form>
</section>
