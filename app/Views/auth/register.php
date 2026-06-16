<section class="sub-visual"><div class="wrap"><p>MEMBER</p><h2>회원가입</h2></div></section>
<div class="wrap member-page">
    <div class="join-cards">
        <article><h2>무료 회원 가입</h2><p>“공사비닷컴 온라인 회원이 되시면”</p><ul><li>면적당 공사비 정보의 샘플 검색</li><li>공사 단가 검색의 샘플 검색</li><li>골조 면적별 수량 검색의 샘플 검색</li></ul><strong>무료</strong></article>
        <article class="paid"><h2>유료 회원 가입</h2><p>“공사비닷컴 연간 회원이 되시면”</p><ul><li>면적당 공사비 검색</li><li>공사 단가 검색</li><li>골조 면적별 수량 검색</li><li>공사기간 및 간접비 계산 서비스 이용</li></ul><strong>연 1,000,000원 <em>VAT 10% 별도</em></strong></article>
    </div>
    <form method="post" action="/front/auth/regist" class="form-panel two-cols join-form">
        <?= csrf_field() ?>
        <label>이름<input type="text" name="name" required autocomplete="name"></label>
        <label>이메일<input type="email" name="email" required autocomplete="email"></label>
        <label>비밀번호<input type="password" name="password" required minlength="8" autocomplete="new-password"></label>
        <label>연락처<input type="tel" name="phone" autocomplete="tel"></label>
        <label class="span-2">회사명<input type="text" name="company"></label>
        <label class="checkbox span-2"><input type="checkbox" name="agree_terms" required><span>이용약관과 개인정보처리방침에 동의합니다.</span></label>
        <button type="submit" class="btn primary span-2">가입하기</button>
    </form>
</div>
