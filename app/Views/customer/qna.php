<section class="page-title">
    <p>CUSTOMER</p>
    <h1>Q&A</h1>
</section>

<section class="form-wrap">
    <form method="post" action="/front/customer/qna" class="form-panel two-cols">
        <?= csrf_field() ?>
        <label>
            이름
            <input type="text" name="name" required>
        </label>
        <label>
            이메일
            <input type="email" name="email">
        </label>
        <label class="span-2">
            제목
            <input type="text" name="title" required>
        </label>
        <label class="span-2">
            문의 내용
            <textarea name="content" rows="8" required></textarea>
        </label>
        <button type="submit" class="btn primary span-2">문의 등록</button>
    </form>
</section>
