<section class="sub-visual"><div class="wrap"><h2>고객센터</h2><p>문의사항을 남겨주세요.</p></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3>고객센터</h3><a href="/front/customer/notice">공지사항</a><a href="/front/customer/pds">자료실</a><a href="/front/customer/faq">자주 묻는 질문</a><a class="on" href="/front/customer/qna">Q&A</a><a href="/front/customer/contact">업무 제휴</a></aside>
    <section class="sub-content">
        <div class="path">HOME &gt; 고객센터 &gt; Q&A</div>
        <h3 class="content-title">Q&A</h3>
        <p class="content-lead">공사비 닷컴의 회원이시면 로그인 후 편리하게 사용 가능합니다.</p>
        <form class="plain-form old-box" method="post" action="/front/customer/qna">
            <?= csrf_field() ?>
            <label>이름<input type="text" name="name" required></label>
            <label>이메일<input type="email" name="email"></label>
            <label>제목<input type="text" name="title" required></label>
            <label>문의내용<textarea name="content" required></textarea></label>
            <button type="submit">문의하기</button>
        </form>
    </section>
</div>
