<section class="sub-visual"><div class="wrap"><h2>ADMIN</h2><p>사이트 설정</p></div></section>
<div class="wrap sub-content single">
    <h3 class="content-title">사이트 설정</h3>
    <p class="content-lead">로고, 메인 이미지, 광고 이미지를 URL 또는 서버 경로로 연결합니다.</p>
    <form method="post" action="/admin/settings" class="plain-form old-box">
        <?= csrf_field() ?>
        <?php foreach ($fields as $key => $field): ?>
            <label><?= e($field['group']) ?> - <?= e($field['label']) ?><input type="text" name="<?= e($key) ?>" value="<?= e($settings[$key] ?? '') ?>" placeholder="/static/uploads/example.jpg 또는 https://..."></label>
        <?php endforeach; ?>
        <button type="submit">저장</button>
    </form>
</div>
