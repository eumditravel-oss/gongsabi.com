<section class="sub-visual"><div class="wrap"><p>CUSTOMER</p><h2>고객센터</h2></div></section>
<div class="wrap sub-layout">
    <aside class="lnb"><h3>고객센터</h3><a href="/front/customer/notice">공지사항</a><a href="/front/customer/pds">자료실</a><a href="/front/customer/faq">자주 묻는 질문</a><a class="on" href="/front/customer/qna">Q&amp;A</a></aside>
    <section class="sub-content"><div class="content-title"><h1>Q&amp;A</h1><p>서비스 이용과 제휴 문의를 남겨주세요.</p></div><form method="post" action="/front/customer/qna" class="form-panel two-cols qna-form"><?= csrf_field() ?><label>이름<input type="text" name="name" required></label><label>이메일<input type="email" name="email"></label><label class="span-2">제목<input type="text" name="title" required></label><label class="span-2">내용<textarea name="content" required></textarea></label><button class="btn primary span-2" type="submit">문의 등록</button></form></section>
</div>
