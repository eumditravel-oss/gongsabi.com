CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    name TEXT NOT NULL,
    phone TEXT DEFAULT '',
    company TEXT DEFAULT '',
    role TEXT NOT NULL DEFAULT 'member',
    created_at TEXT NOT NULL,
    updated_at TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS board_posts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    board_type TEXT NOT NULL,
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    attachment_path TEXT DEFAULT NULL,
    is_notice INTEGER NOT NULL DEFAULT 0,
    is_published INTEGER NOT NULL DEFAULT 1,
    views INTEGER NOT NULL DEFAULT 0,
    created_at TEXT NOT NULL,
    updated_at TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS inquiries (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER DEFAULT NULL,
    name TEXT NOT NULL,
    email TEXT DEFAULT '',
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    status TEXT NOT NULL DEFAULT 'open',
    answer TEXT DEFAULT NULL,
    created_at TEXT NOT NULL,
    updated_at TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS reports (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER DEFAULT NULL,
    report_type TEXT NOT NULL,
    input_json TEXT NOT NULL,
    result_json TEXT NOT NULL,
    created_at TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS orders (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    merchant_uid TEXT NOT NULL UNIQUE,
    user_id INTEGER DEFAULT NULL,
    product_code TEXT NOT NULL,
    product_name TEXT NOT NULL,
    amount INTEGER NOT NULL,
    buyer_name TEXT DEFAULT '',
    buyer_email TEXT DEFAULT '',
    buyer_tel TEXT DEFAULT '',
    status TEXT NOT NULL DEFAULT 'pending',
    created_at TEXT NOT NULL,
    updated_at TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS payments (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    order_id INTEGER NOT NULL,
    merchant_uid TEXT NOT NULL,
    imp_uid TEXT NOT NULL,
    provider TEXT NOT NULL DEFAULT 'portone',
    amount INTEGER NOT NULL,
    status TEXT NOT NULL,
    paid_at TEXT DEFAULT NULL,
    raw_payload TEXT NOT NULL,
    created_at TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS site_settings (
    setting_key TEXT PRIMARY KEY,
    setting_value TEXT DEFAULT '',
    updated_at TEXT NOT NULL
);

CREATE INDEX IF NOT EXISTS idx_board_posts_type ON board_posts (board_type, is_published);
CREATE INDEX IF NOT EXISTS idx_orders_status ON orders (status);
CREATE INDEX IF NOT EXISTS idx_reports_user ON reports (user_id);
