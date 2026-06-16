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
    $insert = $db->prepare('INSERT INTO users (email, password_hash, name, phone, company, role, created_at, updated_at) VALUES (:email, :password_hash, :name, :phone, :company, :role, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)');
    $insert->execute(['email' => $adminEmail, 'password_hash' => password_hash((string) $adminPassword, PASSWORD_DEFAULT), 'name' => '관리자', 'phone' => '', 'company' => '공사비닷컴', 'role' => 'admin']);
}

$seedCount = (int) $db->query('SELECT COUNT(*) FROM board_posts')->fetchColumn();
if ($seedCount === 0) {
    $seed = $db->prepare('INSERT INTO board_posts (board_type, title, content, is_notice, is_published, views, created_at, updated_at) VALUES (:board_type, :title, :content, :is_notice, 1, 0, :created_at, CURRENT_TIMESTAMP)');
    foreach ([
        ['notice', '대한민국 공사비 정보 플랫폼, 공사비닷컴이 오픈하였습니다.', '면적당 공사비 정보의 샘플 검색, 공사 단가 검색, 골조 수량 검색 등 온라인 회원 서비스를 제공합니다.', 1, '2020-11-27 00:00:00'],
        ['notice', '공사비닷컴 온라인 회원이 되시면', '면적당 공사비 정보의 샘플 검색과 공사비 교육, 자료실을 이용하실 수 있습니다.', 1, '2020-11-27 00:00:00'],
        ['notice', '공사비닷컴 리뉴얼 준비 안내', '기존 경로와 메뉴 구성을 유지하면서 새 호스팅에 맞게 재구현합니다.', 0, date('Y-m-d H:i:s')],
        ['pds', '공사비 산정 기초 자료', '공사비와 관련한 다양하고 유용한 정보를 제공합니다.', 0, date('Y-m-d H:i:s')],
        ['pds', '내역서 검토 체크리스트', '건축 및 골조 내역서 검토 시 확인할 항목입니다.', 0, date('Y-m-d H:i:s')],
        ['faq', '전화 상담이 어려운 경우 어떻게 하나요?', "공사비닷컴의 이메일 'cs@gongsabi.com'로 문의 남겨주시면 순차적으로 도와드립니다.", 0, date('Y-m-d H:i:s')],
        ['faq', '비회원도 공사비 검색이 가능한가요?', '비회원과 무료회원은 샘플만 검색이 가능하고 유료회원 가입 시 전체 정보를 검색할 수 있습니다.', 0, date('Y-m-d H:i:s')],
    ] as [$type, $title, $content, $isNotice, $createdAt]) {
        $seed->execute(['board_type' => $type, 'title' => $title, 'content' => $content, 'is_notice' => $isNotice, 'created_at' => $createdAt]);
    }
}

$settings = [
    'site_logo_url' => '', 'site_favicon_url' => '', 'hero_image_url' => '', 'main_section_data_image_url' => '', 'main_section_education_image_url' => '', 'lecture_image_url' => '', 'book_image_url' => '', 'ad_top_image_url' => '', 'ad_top_link_url' => '', 'ad_side_image_url' => '', 'ad_side_link_url' => '', 'ad_bottom_image_url' => '', 'ad_bottom_link_url' => '',
];
$settingStmt = $db->prepare('SELECT setting_key FROM site_settings WHERE setting_key = :setting_key');
$insertSetting = $db->prepare('INSERT INTO site_settings (setting_key, setting_value, updated_at) VALUES (:setting_key, :setting_value, CURRENT_TIMESTAMP)');
foreach ($settings as $key => $value) {
    $settingStmt->execute(['setting_key' => $key]);
    if (!$settingStmt->fetchColumn()) {
        $insertSetting->execute(['setting_key' => $key, 'setting_value' => $value]);
    }
}

echo "Migration completed.\n";
