const fs = require('fs');
const path = require('path');

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

const files = walk('front');
let modifiedCount = 0;

files.forEach(file => {
    let content = fs.readFileSync(file, 'utf8');
    let originalLength = content.length;
    
    // 1. 악성 스타일 태그 제거
    content = content.replace(/<style>\s*\.sub_title_wrapper[\s\S]*?display: none !important;\s*}\s*<\/style>/gi, '');
    
    // 2. 잘못 삽입된 서비스 헤더 제거
    content = content.replace(/<div class="b2b-page-header">[\s\S]*?<h1 class="b2b-page-title">서비스<\/h1>\s*<\/div>/gi, '');
    
    // 3. 껍데기 래퍼 제거
    content = content.replace(/<div class="b2b-card" style="max-width:1400px; margin:0 auto; border:none; box-shadow:none;">/gi, '');
    
    if(content.length !== originalLength) {
        // b2b-card 닫는 div 제거
        content = content.replace(/<\/div>\s*(?=<!-- Inject B2B Footer -->)/i, '');
        fs.writeFileSync(file, content, 'utf8');
        modifiedCount++;
    }
});
console.log(`Successfully fixed ${modifiedCount} files.`);
