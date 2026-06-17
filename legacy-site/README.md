# Legacy gongsabi.com Backup

This directory contains the restored `public_html` source from the FileZilla backup captured on 2026-06-17.

Included:
- CodeIgniter PHP application source
- public `assets`, `static`, and `system` files
- uploaded/static data files that are needed to inspect the original site behavior

Excluded from Git:
- `application/logs/*` runtime logs
- raw `.sql` / `.sql.gz` database dumps
- original `.tar.gz` backup archives

The original local backup files remain at:
- `F:\백업\gongsabi_202606170837.tar.gz`
- `F:\백업\gongsabi_202606170837.sql.gz`

Live secrets were replaced with environment variables in:
- `public_html/application/config/database.php`
- `public_html/application/config/setting.php`
- `public_html/application/config/config.php`

Required environment variables for a real deployment:
- `GONGSABI_DB_HOST`
- `GONGSABI_DB_USER`
- `GONGSABI_DB_PASSWORD`
- `GONGSABI_DB_NAME`
- `GONGSABI_ENCRYPTION_KEY`
- `GONGSABI_PAY_MODE`
- `PORTONE_IMP_CODE`
- `PORTONE_API_KEY`
- `PORTONE_API_SECRET`
- `GONGSABI_SMS_MODE`
- `ALIGO_SENDER`
- `ALIGO_USER_ID`
- `ALIGO_API_KEY`
- `GONGSABI_RESERVED_ADMIN_ID`
- `GONGSABI_RESERVED_ADMIN_EMAIL`
- `GONGSABI_RESERVED_WEBMASTER_EMAIL`
