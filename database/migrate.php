<?php

declare(strict_types=1);

use App\Core\Config;
use App\Core\Database;

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/helpers.php';

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
        return;
    }

    $relative = substr($class, strlen($prefix));
    $path = BASE_PATH . '/app/' . str_replace('\\', '/', $relative) . '.php';
    if (is_file($path)) {
        require $path;
    }
});

Config::load(BASE_PATH . '/.env');

$driver = Config::get('DB_DRIVER', 'sqlite');
$schemaPath = BASE_PATH . '/database/schema.' . ($driver === 'mysql' ? 'mysql' : 'sqlite') . '.sql';
$sql = file_get_contents($schemaPath);
if ($sql === false) {
    fwrite(STDERR, "Schema file not found.\n");
    exit(1);
}

$db = Database::connection();
$db->exec($sql);

$adminEmail = Config::get('ADMIN_EMAIL', 'admin@gongsabi.com');
$adminPassword = Config::get('ADMIN_PASSWORD', 'change-me-now');
$stmt = $db->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');
$stmt->execute(['email' => $adminEmail]);

if (!$stmt->fetchColumn()) {
    $insert = $db->prepare(
        'INSERT INTO users (email, password_hash, name, phone, company, role, created_at, updated_at)
         VALUES (:email, :password_hash, :name, :phone, :company, :role, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
    );
    $insert->execute([
        'email' => $adminEmail,
        'password_hash' => password_hash((string) $adminPassword, PASSWORD_DEFAULT),
        'name' => '관리자',
        'phone' => '',
        'company' => '공사비닷컴',
        'role' => 'admin',
    ]);
}

$seedCount = (int) $db->query('SELECT COUNT(*) FROM board_posts')->fetchColumn();
if ($seedCount === 0) {
    $seed = $db->prepare(
        'INSERT INTO board_posts (board_type, title, content, is_notice, is_published, views, created_at, updated_at)
         VALUES (:board_type, :title, :content, :is_notice, 1, 0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
    );
    foreach ([
        ['notice', '공사비닷컴 리뉴얼 준비 안내', '새로운 공사비닷컴은 직접 관리 가능한 구조로 재구현됩니다.', 1],
        ['notice', '교육 및 자료 서비스 이전 안내', '교육, 자료, 결제 내역은 새 DB를 기준으로 운영됩니다.', 0],
        ['pds', '공사비 산정 기초 자료', '운영자가 실제 파일을 등록하면 다운로드 자료실로 활용됩니다.', 0],
        ['faq', '결제 후 이용 내역은 어디서 확인하나요?', '마이페이지에서 주문과 결제 상태를 확인할 수 있도록 확장됩니다.', 0],
    ] as [$type, $title, $content, $isNotice]) {
        $seed->execute([
            'board_type' => $type,
            'title' => $title,
            'content' => $content,
            'is_notice' => $isNotice,
        ]);
    }
}

$settings = [
    'site_logo_url' => '',
    'site_favicon_url' => '',
    'hero_image_url' => '',
    'main_section_data_image_url' => '',
    'main_section_education_image_url' => '',
    'lecture_image_url' => '',
    'book_image_url' => '',
    'ad_top_image_url' => '',
    'ad_top_link_url' => '',
    'ad_side_image_url' => '',
    'ad_side_link_url' => '',
    'ad_bottom_image_url' => '',
    'ad_bottom_link_url' => '',
];
$settingStmt = $db->prepare('SELECT setting_key FROM site_settings WHERE setting_key = :setting_key');
$insertSetting = $db->prepare(
    'INSERT INTO site_settings (setting_key, setting_value, updated_at)
     VALUES (:setting_key, :setting_value, CURRENT_TIMESTAMP)'
);
foreach ($settings as $key => $value) {
    $settingStmt->execute(['setting_key' => $key]);
    if (!$settingStmt->fetchColumn()) {
        $insertSetting->execute(['setting_key' => $key, 'setting_value' => $value]);
    }
}

echo "Migration completed.\n";
