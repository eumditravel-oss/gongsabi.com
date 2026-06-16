# gongsabi.com 재구현 패키지

현재 운영 사이트의 소유권은 있으나 기존 제작자가 관리하지 않는 상황을 전제로, 기존 공개 URL 구조(`/front/...`)와 검색 결과에 노출된 메뉴/문구/서비스 흐름을 기준으로 재구현한 PHP 사이트입니다.

## 반영 범위

- 기존 URL 구조 유지
  - `/front/company/company1~4`
  - `/front/report/geonchuk`, `/front/report/goljo`, `/front/report/gigan`, `/front/report/ganjeob`
  - `/front/data/gongsabi`, `/front/data/danga`, `/front/data/goljo`
  - `/front/education/lecture`, `/front/education/book`, `/front/education/youtube`
  - `/front/community`, `/front/community/market`, `/front/community/partners`, `/front/community/recruit`
  - `/front/customer/notice`, `/front/customer/pds`, `/front/customer/faq`, `/front/customer/qna`, `/front/customer/contact`
- 구형 기업형 사이트에 가까운 1200px 고정형 레이아웃
- 상단 유틸 메뉴, 로고, GNB 드롭다운, 좌측 LNB, 게시판형 표 구성
- 면적당 공사비 검색 / 공사 단가 검색 / 골조 면적별 수량 화면 구현
- 비회원·무료회원 샘플 검색, 유료회원 잠금 행 처리
- 보고서 페이지의 “서비스 오픈 준비중 입니다.” 안내와 산정 로직 API 동시 구성
- 공사비 교육, 동영상 강의, 커뮤니티, 고객센터, Q&A, 업무제휴 폼
- 회원가입, 로그인, 관리자, 사이트 설정, PortOne 결제 골격 유지

## 실행 방법

```powershell
Copy-Item .env.example .env
php database/migrate.php
php -S localhost:8080 -t public
```

브라우저에서 `http://localhost:8080` 접속.

## 운영 배포

호스팅 업체에 전달할 때는 `public/` 폴더를 웹 문서 루트로 지정해야 합니다. Apache 환경이면 `public/.htaccess`가 `/front/...` 경로를 PHP 라우터로 연결합니다.

`.env` 주요 값:

```dotenv
APP_ENV=production
APP_URL=https://www.gongsabi.com
DB_DRIVER=mysql
DB_HOST=127.0.0.1
DB_DATABASE=gongsabi
DB_USERNAME=gongsabi
DB_PASSWORD=change-me

ADMIN_EMAIL=admin@gongsabi.com
ADMIN_PASSWORD=change-me-now

PORTONE_MERCHANT_CODE=imp97740463
PORTONE_API_KEY=...
PORTONE_API_SECRET=...
PAYMENT_VERIFY=true
```

## 100% 일치에 필요한 추가 자료

현재 `www.gongsabi.com`은 외부 접근 시 타임아웃 또는 502가 발생해 실제 HTML/CSS/이미지를 직접 내려받을 수 없습니다. 따라서 이 패키지는 검색 결과에 노출된 공개 정보와 업로드된 초안 기준의 재구현판입니다. 픽셀 단위 100% 일치를 하려면 다음 중 하나가 필요합니다.

1. 호스팅 업체가 보관 중인 기존 웹 루트 전체 백업
2. 기존 DB 백업
3. 주요 페이지 스크린샷: 메인, 공사비 자료, 보고서, 교육, 커뮤니티, 고객센터, 로그인/회원가입
4. 기존 로고/배너/아이콘 이미지 원본

위 자료가 있으면 HTML 구조, CSS 폭/간격/색상, 이미지, 문구, 게시판 데이터까지 더 정확하게 맞출 수 있습니다.
