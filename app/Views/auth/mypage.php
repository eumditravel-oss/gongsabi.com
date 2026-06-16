<section class="page-title">
    <p>MY PAGE</p>
    <h1>마이페이지</h1>
</section>

<section class="content-band">
    <dl class="profile-list">
        <div><dt>이름</dt><dd><?= e($user['name']) ?></dd></div>
        <div><dt>이메일</dt><dd><?= e($user['email']) ?></dd></div>
        <div><dt>회사</dt><dd><?= e($user['company']) ?></dd></div>
        <div><dt>권한</dt><dd><?= e($user['role']) ?></dd></div>
    </dl>
</section>
