const fs = require('fs');
const path = require('path');

// 1. 전역 CSS에 테이블 너비 100% 강제 속성 추가
const cssPath = path.join(__dirname, 'public', 'static', 'front', 'css', 'b2b-platform.css');
if (fs.existsSync(cssPath)) {
    let cssContent = fs.readFileSync(cssPath, 'utf8');
    if (!cssContent.includes('.b2b-table-full-width')) {
        cssContent += `\n\n/* Fix Table Width in Subpages */\ntable.table, .gongsabi-table, .company_ceo_table {\n    width: 100% !important;\n    display: table !important;\n    table-layout: auto;\n}\n.table-responsive {\n    display: table !important;\n}\n`;
        fs.writeFileSync(cssPath, cssContent, 'utf8');
        console.log('Updated b2b-platform.css');
    }
}

// 2. HTML 파일들 순회하며 링크 수정 및 푸터 선 제거
function walk(dir) {
    let results = [];
    const list = fs.readdirSync(dir);
    list.forEach(function(file) {
        file = path.join(dir, file);
        const stat = fs.statSync(file);
        if (stat && stat.isDirectory()) { 
            results = results.concat(walk(file));
        } else { 
            if(file.endsWith('.html')) results.push(file);
        }
    });
    return results;
}

let files = walk('front');
files.push('index.html'); // 메인화면도 포함

let modifiedCount = 0;

files.forEach(file => {
    let content = fs.readFileSync(file, 'utf8');
    let originalContent = content;
    
    // a. 링크 경로 끝에 index.html 추가 (front 폴더 향하는 폴더 경로만)
    // href="front/auth/regist/" -> href="front/auth/regist/index.html"
    // href="../../../front/auth/regist/" -> href="../../../front/auth/regist/index.html"
    content = content.replace(/href="((?:\.\.\/)*front\/[^"]*?)\/"/gi, 'href="$1/index.html"');
    
    // b. 푸터 초록색 선 제거
    content = content.replace(/border-top:4px solid var\(--b2b-accent-green\);?/g, '');
    
    if (content !== originalContent) {
        fs.writeFileSync(file, content, 'utf8');
        modifiedCount++;
    }
});

console.log(`Successfully fixed ${modifiedCount} HTML files.`);
