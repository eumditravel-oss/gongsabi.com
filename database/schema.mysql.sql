CREATE TABLE IF NOT EXISTS users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(190) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(50) DEFAULT '',
    company VARCHAR(190) DEFAULT '',
    role VARCHAR(30) NOT NULL DEFAULT 'member',
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS board_posts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    board_type VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    content MEDIUMTEXT NOT NULL,
    attachment_path VARCHAR(255) DEFAULT NULL,
    is_notice TINYINT(1) NOT NULL DEFAULT 0,
    is_published TINYINT(1) NOT NULL DEFAULT 1,
    views INT UNSIGNED NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    INDEX idx_board_posts_type (board_type, is_published)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS inquiries (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED DEFAULT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(190) DEFAULT '',
    title VARCHAR(255) NOT NULL,
    content MEDIUMTEXT NOT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'open',
    answer MEDIUMTEXT DEFAULT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS reports (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED DEFAULT NULL,
    report_type VARCHAR(50) NOT NULL,
    input_json JSON NOT NULL,
    result_json JSON NOT NULL,
    created_at DATETIME NOT NULL,
    INDEX idx_reports_user (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS orders (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    merchant_uid VARCHAR(100) NOT NULL UNIQUE,
    user_id BIGINT UNSIGNED DEFAULT NULL,
    product_code VARCHAR(80) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    amount INT UNSIGNED NOT NULL,
    buyer_name VARCHAR(100) DEFAULT '',
    buyer_email VARCHAR(190) DEFAULT '',
    buyer_tel VARCHAR(50) DEFAULT '',
    status VARCHAR(30) NOT NULL DEFAULT 'pending',
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    INDEX idx_orders_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS payments (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id BIGINT UNSIGNED NOT NULL,
    merchant_uid VARCHAR(100) NOT NULL,
    imp_uid VARCHAR(100) NOT NULL,
    provider VARCHAR(50) NOT NULL DEFAULT 'portone',
    amount INT UNSIGNED NOT NULL,
    status VARCHAR(30) NOT NULL,
    paid_at DATETIME DEFAULT NULL,
    raw_payload JSON NOT NULL,
    created_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS site_settings (
    setting_key VARCHAR(100) PRIMARY KEY,
    setting_value MEDIUMTEXT DEFAULT NULL,
    updated_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
