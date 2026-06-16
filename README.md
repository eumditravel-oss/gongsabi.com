# gongsabi.com 정적 복제본

공사비닷컴 원본 사이트를 개발자 인수인계용으로 재구성한 저장소입니다. 우선 GitHub Pages에서 바로 눌러볼 수 있는 정적 미리보기를 기준으로 구성했고, PHP 버전의 라우팅/DB 구조도 함께 유지합니다.

## 정적 미리보기

GitHub Pages에서는 다음 경로가 직접 열립니다.

- `/` 공개 메인
- `/front/...` 공개 하위 페이지
- `/admin/auth/` 관리자 로그인 화면
- `/admin/dashboard/`, `/admin/banner/` 등 관리자 하위 페이지

로컬에서 확인할 때는 저장소 루트에서 정적 서버를 띄우면 됩니다.

```bash
python -m http.server 8090
```

접속 주소: `http://127.0.0.1:8090/`

## 생성 스크립트

원본 스냅샷을 정적 디렉터리로 다시 풀 때 사용합니다.

```bash
node scripts/build-static-preview.js
```

관리자 템플릿 CSS/JS/폰트 등 공개 리소스를 다시 받을 때 사용합니다.

```bash
node scripts/download-admin-assets.js
```

## 관리자 미리보기 주의

관리자 화면은 원본 운영 페이지를 직접 확인해 구조를 맞췄지만, 회원/문의/주문/알림 연락처 같은 운영 데이터는 정적 미리보기에 넣지 않았습니다. 테이블 본문과 입력값은 샘플 데이터로 치환되어 있습니다.

## PHP 개발 실행

```bash
cp .env.example .env
php database/migrate.php
php -S 127.0.0.1:8000 -t public
```

PHP 실행 시에는 `.env`에 DB와 결제 설정을 채워 넣어야 합니다.
