<section class="sub-visual"><div class="wrap"><h2>고객센터</h2><p>공사비닷컴과의 업무제휴를 환영합니다.</p></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3>고객센터</h3><a href="/front/customer/notice">공지사항</a><a href="/front/customer/pds">자료실</a><a href="/front/customer/faq">자주 묻는 질문</a><a href="/front/customer/qna">Q&A</a><a class="on" href="/front/customer/contact">업무 제휴</a></aside>
    <section class="sub-content">
        <div class="path">HOME &gt; 고객센터 &gt; 업무 제휴</div>
        <h3 class="content-title">업무 제휴</h3>
        <p class="content-lead">공사비닷컴과의 업무제휴를 환영합니다. 아래 사항을 입력하여 보내주시면 담당자가 확인합니다.</p>
        <form class="plain-form old-box" method="post" action="/front/customer/qna">
            <?= csrf_field() ?>
            <label>회사명<input type="text" name="company"></label>
            <label>담당자명<input type="text" name="name" required></label>
            <label>이메일<input type="email" name="email"></label>
            <label>제목<input type="text" name="title" required value="업무 제휴 문의"></label>
            <label>문의내용<textarea name="content" required></textarea></label>
            <button type="submit">문의하기</button>
        </form>
    </section>
</div>
