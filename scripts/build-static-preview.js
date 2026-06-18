const fs = require('fs');
const path = require('path');

const root = path.resolve(__dirname, '..');
const publicSnapshotDir = path.join(root, 'resources', 'snapshots');
const adminSnapshotDir = path.join(root, 'resources', 'admin-snapshots');

const explicitRoutes = new Map([
  ['front__community.html', 'front/community'],
  ['front__community__gongsabi.html', 'front/community/gongsabi'],
  ['front__community__market.html', 'front/community/market'],
  ['front__community__partners.html', 'front/community/partners'],
  ['front__community__recruit.html', 'front/community/recruit'],
  ['front__company.html', 'front/company'],
  ['front__company__company1.html', 'front/company/company1'],
  ['front__company__company2.html', 'front/company/company2'],
  ['front__company__company3.html', 'front/company/company3'],
  ['front__company__company4.html', 'front/company/company4'],
  ['front__company__privacy.html', 'front/company/privacy'],
  ['front__company__term.html', 'front/company/term'],
  ['front__customer.html', 'front/customer'],
  ['front__customer__faq.html', 'front/customer/faq'],
  ['front__customer__notice.html', 'front/customer/notice'],
  ['front__customer__notice_view__21.html', 'front/customer/notice_view/21'],
  ['front__customer__notice_view__22.html', 'front/customer/notice_view/22'],
  ['front__customer__notice_view__23.html', 'front/customer/notice_view/23'],
  ['front__customer__notice_view__27.html', 'front/customer/notice_view/27'],
  ['front__customer__pds.html', 'front/customer/pds'],
  ['front__customer__qna.html', 'front/customer/qna'],
  ['front__data.html', 'front/data'],
  ['front__data__danga.html', 'front/data/danga'],
  ['front__data__goljo.html', 'front/data/goljo'],
  ['front__data__gongsabi.html', 'front/data/gongsabi'],
  ['front__education.html', 'front/education'],
  ['front__education__book.html', 'front/education/book'],
  ['front__education__lecture.html', 'front/education/lecture'],
  ['front__education__lecture_regist.html', 'front/education/lecture_regist'],
  ['front__education__youtube.html', 'front/education/youtube'],
  ['front__report.html', 'front/report'],
  ['front__report__ganjeob.html', 'front/report/ganjeob'],
  ['front__report__geonchuk.html', 'front/report/geonchuk'],
  ['front__report__gigan.html', 'front/report/gigan'],
  ['front__report__goljo.html', 'front/report/goljo'],
  ['front__auth__login.html', 'front/auth/login'],
  ['front__auth__regist.html', 'front/auth/regist'],
]);

function ensureDir(dir) { fs.mkdirSync(dir, { recursive: true }); }
function tidyText(text) { return text.replace(/\t/g, '    ').replace(/[ \t]+$/gm, ''); }
function removeDir(dir) { if (fs.existsSync(dir)) fs.rmSync(dir, { recursive: true, force: true }); }

function routeFromSnapshotName(fileName) {
  if (explicitRoutes.has(fileName)) return explicitRoutes.get(fileName);
  return fileName.replace(/\.html$/i, '').split('__').join('/');
}

function outputPathForRoute(route) { return path.join(root, ...route.split('/'), 'index.html'); }
function prefixForRoute(route) {
  const depth = route.split('/').filter(Boolean).length;
  return depth === 0 ? '' : '../'.repeat(depth);
}

function normalizeInternalRoute(value) {
  const clean = value.split('#')[0].split('?')[0].replace(/^\/+/, '');
  if (clean === '') return 'index.html';
  if (clean === 'admin') return 'admin/dashboard/';
  if (clean === 'front') return 'front/company/';
  return clean.endsWith('/') ? clean : `${clean}/`;
}

function rewriteInternalAttributes(html, attr, prefix) {
  return html.replace(new RegExp(`${attr}=([\"'])(/[^\"']*)\\1`, 'gi'), (match, quote, url) => {
    if (url.startsWith('/static/')) return `${attr}=${quote}${prefix}public/static/${url.slice('/static/'.length)}${quote}`;
    if (url.startsWith('/admin/assets/')) return `${attr}=${quote}${prefix}public/static/admin/assets/${url.slice('/admin/assets/'.length)}${quote}`;
    if (url === '/' || url === '') return `${attr}=${quote}${prefix}index.html${quote}`;
    if (url === '/admin' || url === '/admin/') return `${attr}=${quote}${prefix}admin/dashboard/${quote}`;
    if (url.startsWith('/front/') || url.startsWith('/admin/')) {
      if (/delete|download|modify|proc|logout|login_proc|order/i.test(url)) return `${attr}=${quote}#${quote}`;
      return `${attr}=${quote}${prefix}${normalizeInternalRoute(url)}${quote}`;
    }
    return match;
  });
}

function getB2BHeader(prefix) {
  return `
    <!-- Inject B2B Mega Menu Header -->
    <header class="b2b-header">
        <div class="b2b-header-container">
            <a href="${prefix}index.html" class="b2b-logo">
                <img src="${prefix}public/static/img/logo.png" alt="공사비닷컴 로고">
            </a>
            <i class="fas fa-bars b2b-mobile-menu-btn"></i>
            <ul class="b2b-nav">
                <li class="b2b-nav-item">공사비 검색
                    <div class="b2b-megamenu">
                        <div class="b2b-megamenu-inner">
                            <div class="b2b-mega-col">
                                <h4><i class="fas fa-search-dollar"></i> 공사비 검색</h4>
                                <ul>
                                    <li><a href="${prefix}front/data/gongsabi/">면적당 공사비 검색 <span class="b2b-mega-desc">건물, 지역, 연도별 검색</span></a></li>
                                    <li><a href="${prefix}front/data/danga/">공사 단가 검색 <span class="b2b-mega-desc">세부 공종별 단가</span></a></li>
                                    <li><a href="${prefix}front/data/goljo/">골조 면적별 수량 <span class="b2b-mega-desc">골조 특화 검색</span></a></li>
                                </ul>
                            </div>
                            <div class="b2b-mega-col">
                                <h4><i class="fas fa-file-invoice"></i> 내역서 작성</h4>
                                <ul>
                                    <li><a href="${prefix}front/report/geonchuk/">건축 내역서 작성 <span class="b2b-mega-desc">전체 건축 공사비 산정</span></a></li>
                                    <li><a href="${prefix}front/report/goljo/">골조 내역서 작성 <span class="b2b-mega-desc">골조 특화 내역</span></a></li>
                                    <li><a href="${prefix}front/report/gigan/">공사기간 산정 <span class="b2b-mega-desc">최적 공기 산출</span></a></li>
                                    <li><a href="${prefix}front/report/ganjeob/">간접 공사비 계산 <span class="b2b-mega-desc">간접비 산출</span></a></li>
                                </ul>
                            </div>
                            <div class="b2b-mega-col">
                                <h4><i class="fas fa-laptop-code"></i> 공사비 교육</h4>
                                <ul>
                                    <li><a href="${prefix}front/education/youtube/">동영상 강의 <span class="b2b-mega-desc">실무 온라인 강의</span></a></li>
                                    <li><a href="${prefix}front/education/book/">교재 구매 <span class="b2b-mega-desc">건축견적이야기 등</span></a></li>
                                    <li><a href="${prefix}front/education/lecture/">강의 신청 <span class="b2b-mega-desc">오프라인 세미나</span></a></li>
                                </ul>
                            </div>
                            <div class="b2b-mega-col">
                                <h4><i class="fas fa-users"></i> 커뮤니티</h4>
                                <ul>
                                    <li><a href="${prefix}front/community/market/">현장 자재 거래 <span class="b2b-mega-desc">자재 장터</span></a></li>
                                    <li><a href="${prefix}front/community/recruit/">구인 / 구직 <span class="b2b-mega-desc">전문가 매칭</span></a></li>
                                    <li><a href="${prefix}front/community/gongsabi/">공사비 의뢰 <span class="b2b-mega-desc">견적 외주 의뢰</span></a></li>
                                </ul>
                            </div>
                            <div class="b2b-mega-col">
                                <h4><i class="fas fa-headset"></i> 고객센터</h4>
                                <ul>
                                    <li><a href="${prefix}front/customer/notice/">공지사항 <span class="b2b-mega-desc">최신 소식</span></a></li>
                                    <li><a href="${prefix}front/customer/qna/">Q&A <span class="b2b-mega-desc">질문과 답변</span></a></li>
                                    <li><a href="${prefix}front/company/">회사소개 <span class="b2b-mega-desc">공사비닷컴 스토리</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="b2b-nav-item">내역서 작성</li>
                <li class="b2b-nav-item">공사비 교육</li>
                <li class="b2b-nav-item">커뮤니티</li>
                <li class="b2b-nav-item">고객센터</li>
            </ul>
            <div class="b2b-header-utils">
                <a href="${prefix}front/auth/login/" class="b2b-btn-outline" style="padding: 8px 16px; font-size: 14px;">로그인</a>
                <a href="${prefix}front/auth/regist/" class="b2b-btn-primary" style="padding: 8px 16px; font-size: 14px;">무료 회원가입</a>
            </div>
        </div>
    </header>
  `;
}

function getB2BFooter(prefix) {
  return `
    <!-- Inject B2B Footer -->
    <footer class="b2b-footer" style="background:var(--b2b-text-dark); color:rgba(255,255,255,0.7); padding:80px 0 40px; border-top:4px solid var(--b2b-accent-green); margin-top:50px;">
        <div style="max-width:1400px; margin:0 auto; display:grid; grid-template-columns:2fr 1fr 1fr; gap:60px; padding:0 40px; margin-bottom:60px;">
            <div>
                <a href="${prefix}index.html"><img src="${prefix}public/static/img/logo.png" style="height:40px; filter:brightness(0) invert(1); margin-bottom:20px; opacity:0.9;" alt="공사비닷컴"></a>
                <div style="font-size:14px; line-height:1.8;">
                    <p style="margin:0;"><b>법인명:</b> (주)공사비닷컴 | <b>대표이사:</b> 현동명</p>
                    <p style="margin:0;"><b>사업자등록번호:</b> 152-87-00466</p>
                    <p style="margin:0;"><b>주소:</b> (05585) 서울특별시 송파구 백제고분로 37길 6 송원빌딩 6층</p>
                </div>
            </div>
            <div>
                <h4 style="color:#fff; font-size:16px; margin-bottom:20px;">고객 지원 및 정책</h4>
                <ul style="list-style:none; padding:0; margin:0; line-height:2.2; font-size:14px;">
                    <li><a href="${prefix}front/customer/notice/" style="color:inherit;">공지사항</a></li>
                    <li><a href="${prefix}front/customer/faq/" style="color:inherit;">자주 묻는 질문 (FAQ)</a></li>
                    <li><a href="${prefix}front/company/term/" style="color:inherit;">이용약관</a></li>
                    <li><a href="${prefix}front/company/privacy/" style="color:inherit;">개인정보처리방침</a></li>
                </ul>
            </div>
            <div>
                <h4 style="color:#fff; font-size:16px; margin-bottom:20px;">비즈니스 문의</h4>
                <ul style="list-style:none; padding:0; margin:0; line-height:2.2; font-size:14px;">
                    <li><b>대표전화:</b> <a href="tel:02-2202-2258" style="color:var(--b2b-accent-green); font-weight:700;">02.2202.2258</a></li>
                    <li><b>채용문의:</b> sjlee@gongsabi.com</li>
                    <li><b>파트너제휴:</b> partner@gongsabi.com</li>
                </ul>
            </div>
        </div>
        <div style="max-width:1400px; margin:0 auto; padding:30px 40px 0; border-top:1px solid rgba(255,255,255,0.1); font-size:13px; text-align:center;">
            COPYRIGHT © gongsabi.com. All rights reserved.
        </div>
    </footer>
  `;
}

function rewriteStaticHtml(raw, route, options = {}) {
  const prefix = prefixForRoute(route);
  let html = raw;

  // Cleanup old junk
  html = html.replace(/<iframe\b[^>]*id=["']itemscout-extension-gtag["'][\s\S]*?<\/iframe>/gi, '');
  html = html.replace(/<div\b[^>]*id=["']its-image-search-container["'][^>]*><\/div>/gi, '');
  html = html.replace(/<div\b[^>]*id=["']its-image-crop-container["'][^>]*><\/div>/gi, '');
  html = html.replace(/<div\b[^>]*id=["']codex-agent-overlay-root["'][^>]*><\/div>/gi, '');
  html = html.replace(/<script\b[^>]*src=["']chrome-extension:[^>]*><\/script>/gi, '');
  html = html.replace(/<base\b[^>]*>\s*/gi, '');

  const cdnLinks = options.admin 
    ? `    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">`
    : `    <!-- Inject Front CDNs and B2B Platform CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="${prefix}public/static/front/css/b2b-platform.css">`;
  
  html = html.replace(/(<\/head>)/i, cdnLinks + '\n$1');

  // URL overrides
  html = html.replace(/["'](?:\/static\/front\/css\/style\.css|public\/static\/front\/css\/style\.css)\?[^"']*/gi, `"${prefix}public/static/front/css/style-pages.css`);
  html = html.replace(/["'](?:\/static\/css\/admin\/style\.css|public\/static\/css\/admin\/style\.css)\?[^"']*/gi, `"${prefix}public/static/css/admin/style-pages.css`);
  html = html.replace(/url\((['"]?)\/static\//gi, `url($1${prefix}public/static/`);
  html = html.replace(/url\((['"]?)\/admin\/assets\//gi, `url($1${prefix}public/static/admin/assets/`);
  html = rewriteInternalAttributes(html, 'href', prefix);
  html = rewriteInternalAttributes(html, 'src', prefix);
  html = rewriteInternalAttributes(html, 'action', prefix);

  html = html.replace(/action=(["'])[^"']*\\1/gi, 'action="#"');
  html = html.replace(/<form\\b(?![^>]*\\bonsubmit=)/gi, '<form onsubmit="return false;"');
  html = html.replace(/<a\\b([^>]*?)href=(["'])#\\2/gi, '<a$1href="#"');

  if (!options.admin && route !== '') {
    // --- B2B REDESIGN TEMPLATE INJECTION FOR SUBPAGES ---
    // We no longer remove legacy headers/footers via Regex to prevent broken HTML DOMs.
    // Instead, they are completely hidden via CSS (b2b-platform.css)

    // Inject B2B Header
    html = html.replace(/(<body\b[^>]*>)/i, '$1\n' + getB2BHeader(prefix));

    // Wrap Subpage Content & Inject Page Header (Breadcrumbs)
    let pageTitle = '서비스';
    if(route.includes('data/')) pageTitle = '공사비 검색 / 내역서 작성';
    if(route.includes('education/')) pageTitle = '공사비 교육 / 동영상';
    if(route.includes('community/')) pageTitle = '공사비 커뮤니티';
    if(route.includes('auth/') || route.includes('customer/')) pageTitle = '고객센터 / 회원서비스';

    // Remove old sub_title_wrapper if exists and replace with B2B Page Header
    html = html.replace(/<div\b[^>]*class=["']sub_title_wrapper["'][\s\S]*?<\/div>/i, '');
    
    const pageHeader = `
      <div class="b2b-page-header">
          <div class="b2b-breadcrumb">홈 <span>></span> ${pageTitle}</div>
          <h1 class="b2b-page-title">${pageTitle}</h1>
      </div>
    `;

    html = html.replace(/(<div\b[^>]*class=["'][^"']*sub_wrapper[^"']*["'][^>]*>)/i, pageHeader + '\n<div class="b2b-card" style="max-width:1400px; margin:0 auto; border:none; box-shadow:none;">\n$1');

    // Inject B2B Footer
    html = html.replace(/(<\/body>)/i, getB2BFooter(prefix) + '\n$1');
    
    const cdnScripts = `
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>`;
    html = html.replace(/<script\b[^>]*src=["'][^"']*static-preview\.js["'][^>]*><\/script>\s*/gi, '');
    html = html.replace(/(<\/body>)/i, cdnScripts + '\n    <script src="' + prefix + 'public/static/front/js/static-preview.js"></script>\n$1');
  }

  return html;
}

function writeRoute(route, html) {
  const outFile = outputPathForRoute(route);
  ensureDir(path.dirname(outFile));
  fs.writeFileSync(outFile, tidyText(html), 'utf8');
}

function buildCssCopies() {
  const frontStyle = path.join(root, 'public', 'static', 'front', 'css', 'style.css');
  const frontPagesStyle = path.join(root, 'public', 'static', 'front', 'css', 'style-pages.css');
  if (fs.existsSync(frontStyle)) {
    const previewFixes = [
      '',
      '/* Subpage Specific Fixes (Hiding old sub headers) */',
      '.sub_nav_wrapper { display:none !important; }',
      '.modal_content .modal_footer > div.modal_close{text-align:right!important;}',
      '.modal_content .modal_footer > div.modal_close a{display:inline-flex!important;align-items:center;justify-content:center;min-width:58px;height:28px;margin-top:6px;border:1px solid rgba(255,255,255,.85);border-radius:2px;background:rgba(255,255,255,.1);color:#fff!important;font-size:14px!important;line-height:26px!important;text-indent:0!important;text-decoration:none!important;}',
      '.modal_content .modal_footer > div.modal_close a:hover{background:rgba(255,255,255,.2);}',
    ].join('\n');
    const css = fs.readFileSync(frontStyle, 'utf8').replace(/\/static\//g, '../../') + previewFixes;
    fs.writeFileSync(frontPagesStyle, tidyText(css), 'utf8');
  }

  const adminStyle = path.join(root, 'public', 'static', 'css', 'admin', 'style.css');
  const adminPagesStyle = path.join(root, 'public', 'static', 'css', 'admin', 'style-pages.css');
  if (fs.existsSync(adminStyle)) {
    const css = fs.readFileSync(adminStyle, 'utf8').replace(/\/static\//g, '../../').replace(/\/admin\/assets\//g, '../../admin/assets/');
    ensureDir(path.dirname(adminPagesStyle));
    fs.writeFileSync(adminPagesStyle, tidyText(css), 'utf8');
  }

  const staticPreviewCss = path.join(root, 'public', 'static', 'css', 'admin', 'static-preview.css');
  ensureDir(path.dirname(staticPreviewCss));
  fs.writeFileSync(staticPreviewCss, tidyText([
    '.static-admin-note{position:fixed;right:16px;bottom:16px;z-index:9999;background:#323a46;color:#fff;border-radius:4px;padding:8px 12px;font-size:12px;box-shadow:0 3px 12px rgba(0,0,0,.18)}',
    'a[href="#"]{cursor:default}',
    '.btn[href="#"]{pointer-events:none}',
  ].join('\n')), 'utf8');

  const frontPreviewJs = path.join(root, 'public', 'static', 'front', 'js', 'static-preview.js');
  ensureDir(path.dirname(frontPreviewJs));
  fs.writeFileSync(frontPreviewJs, tidyText(`(function () {
  function hideModal(closeLink) {
    var modal = closeLink && closeLink.closest ? closeLink.closest('.modal_content') : null;
    if (modal) modal.style.display = 'none';
    var wrapper = document.querySelector('.modal_content_wrapper');
    if (wrapper) wrapper.style.display = 'none';
  }

  window.close_modal = function (el) {
    hideModal(el);
    return false;
  };

  document.addEventListener('click', function (event) {
    var closeLink = event.target.closest ? event.target.closest('.modal_close a') : null;
    if (closeLink) {
      event.preventDefault();
      hideModal(closeLink);
      return;
    }

    // Toggle Megamenu for mobile
    var mobileBtn = event.target.closest ? event.target.closest('.b2b-mobile-menu-btn') : null;
    if (mobileBtn) {
       var nav = document.querySelector('.b2b-nav');
       if(nav) {
          nav.style.display = (nav.style.display === 'flex' ? 'none' : 'flex');
          nav.style.flexDirection = 'column';
          nav.style.position = 'absolute';
          nav.style.top = '80px';
          nav.style.left = '0';
          nav.style.width = '100%';
          nav.style.background = '#fff';
          nav.style.padding = '20px';
          nav.style.borderBottom = '1px solid #E2E8F0';
       }
    }
  });
}());
`), 'utf8');
}

function buildPublicPages() {
  const indexPath = path.join(root, 'index.html');
  if (fs.existsSync(indexPath)) {
    const rawIndex = fs.readFileSync(indexPath, 'utf8');
    fs.writeFileSync(indexPath, tidyText(rewriteStaticHtml(rawIndex, '')), 'utf8');
  }

  for (const file of fs.readdirSync(publicSnapshotDir).filter((name) => name.endsWith('.html'))) {
    const route = routeFromSnapshotName(file);
    const raw = fs.readFileSync(path.join(publicSnapshotDir, file), 'utf8');
    writeRoute(route, rewriteStaticHtml(raw, route));
  }
}

function buildAdminPages() {
  if (!fs.existsSync(adminSnapshotDir)) return;
  for (const file of fs.readdirSync(adminSnapshotDir).filter((name) => name.endsWith('.html'))) {
    const route = routeFromSnapshotName(file);
    const raw = fs.readFileSync(path.join(adminSnapshotDir, file), 'utf8');
    writeRoute(route, rewriteStaticHtml(raw, route, { admin: true }));
  }

  const dashboardSnapshot = path.join(adminSnapshotDir, 'admin__dashboard.html');
  if (fs.existsSync(dashboardSnapshot)) {
    const raw = fs.readFileSync(dashboardSnapshot, 'utf8');
    writeRoute('admin', rewriteStaticHtml(raw, 'admin', { admin: true }));
  }
}

removeDir(path.join(root, 'front'));
removeDir(path.join(root, 'admin'));
buildCssCopies();
buildPublicPages();
buildAdminPages();

console.log('B2B Platform static preview pages generated.');
