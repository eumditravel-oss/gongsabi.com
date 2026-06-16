# gongsabi.com

공사비닷컴 재구현 프로젝트입니다. 기존 공개 사이트의 URL 구조(`/front/...`)를 유지하면서, 새 DB에 데이터가 쌓이는 방식으로 회원, 고객센터, 공사비 자료, 교육, 결제 검증, 관리자 기능을 다시 구현합니다.

## 기술 방향

- PHP 8 이상, Composer 없이 동작하는 경량 MVC 구조
- MySQL 운영 DB, SQLite 로컬 개발 DB 지원
- 기존 경로 호환: `/front/company`, `/front/report/geonchuk`, `/front/customer/notice` 등
- PortOne/Iamport 결제 호출 및 서버 검증 골격 포함
- Apache `.htaccess` 기반 라우팅, PHP 내장 서버 개발 가능

## 빠른 시작

```powershell
Copy-Item .env.example .env
php database/migrate.php
php -S localhost:8080 -t public
```

현재 작업 환경에는 PHP 실행 파일이 없을 수 있습니다. 서버나 로컬 PC에 PHP를 설치한 뒤 위 명령을 실행하면 됩니다.

## 운영 설정

`.env`에 실제 값 입력:

```dotenv
APP_ENV=production
APP_URL=https://www.gongsabi.com
DB_DRIVER=mysql
DB_HOST=127.0.0.1
DB_DATABASE=gongsabi
DB_USERNAME=gongsabi
DB_PASSWORD=change-me

PORTONE_MERCHANT_CODE=imp97740463
PORTONE_API_KEY=...
PORTONE_API_SECRET=...
PAYMENT_VERIFY=true
```

## 구현 상태

- 공개 페이지와 기존 메뉴 구조
- 회원가입, 로그인, 로그아웃
- 공지사항, 자료실, FAQ, Q&A 저장 구조
- 공사비 산정 서비스 계층과 결과 저장
- 교육 상품 주문 생성
- PortOne 결제 완료 서버 검증
- 관리자 대시보드

기존 서버 DB 없이 새로 시작하는 전제이므로, 공개 콘텐츠와 실제 산식은 운영하면서 계속 채워 넣는 구조입니다.


## 2026-06 UI 보강판

- `index.html`: GitHub Pages용 정적 미리보기 홈 화면을 전문 B2B 공사비 플랫폼 형태로 재구성했습니다.
- `public/static/css/site.css`: 상단 유틸 메뉴, 드롭다운 GNB, 메인 히어로, 빠른 검색, 서비스 카드, 데이터 패널, 교육/공지 영역 스타일을 전면 정리했습니다.
- `app/Views/layouts/front.php`: PHP 운영 화면의 헤더/푸터와 드롭다운 메뉴 구조를 정리했습니다.
- `app/Views/home/index.php`: 운영 홈 화면을 정적 미리보기와 같은 정보 구조로 맞췄습니다.
- `app/Views/data/index.php`: 자료 검색 화면에 탭과 필터 영역을 추가했습니다.
- `app/Views/report/form.php`: 산정 결과 표시 항목을 보강했습니다.

타 사이트의 로고, 이미지, 고유 문구, DB, HTML/CSS를 복사하지 않고 동일한 서비스 흐름을 가진 독자 UI로 구성했습니다.
