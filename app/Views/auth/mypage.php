<section class="sub-visual"><div class="wrap"><h2>MY PAGE</h2><p>마이페이지</p></div></section>
<div class="wrap sub-content single">
    <h3 class="content-title">마이페이지</h3>
    <table class="basic-table view-table">
        <tr><th>이름</th><td><?= e($user['name']) ?></td></tr>
        <tr><th>이메일</th><td><?= e($user['email']) ?></td></tr>
        <tr><th>회사</th><td><?= e($user['company']) ?></td></tr>
        <tr><th>권한</th><td><?= e($user['role']) ?></td></tr>
    </table>
    <div class="member-guide"><h4>공사비검색</h4><p>스크랩한 면적당 공사비 검색 자료와 보고서 작성 이력을 이 영역으로 확장할 수 있습니다.</p></div>
</div>
