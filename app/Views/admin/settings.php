<section class="page-title">
    <p>ADMIN</p>
    <h1>사이트 설정</h1>
    <span>로고, 메인 이미지, 광고 이미지를 URL 또는 서버 경로로 연결합니다.</span>
</section>

<section class="content-band">
    <form method="post" action="/admin/settings" class="settings-form">
        <?= csrf_field() ?>
        <?php
        $currentGroup = '';
        foreach ($fields as $key => $field):
            if ($currentGroup !== $field['group']):
                if ($currentGroup !== '') {
                    echo '</div>';
                }
                $currentGroup = $field['group'];
        ?>
                <h2><?= e($currentGroup) ?></h2>
                <div class="settings-grid">
            <?php endif; ?>
            <label>
                <?= e($field['label']) ?>
                <input type="text" name="<?= e($key) ?>" value="<?= e($settings[$key] ?? '') ?>" placeholder="/static/uploads/example.jpg 또는 https://...">
            </label>
        <?php endforeach; ?>
        <?php if ($currentGroup !== ''): ?>
            </div>
        <?php endif; ?>
        <button class="btn primary" type="submit">저장</button>
    </form>
</section>
