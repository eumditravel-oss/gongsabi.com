import os, re

base_dir = r'D:\gongsabi-workspace\gongsabi-repo'
count = 0

for root, dirs, files in os.walk(base_dir):
    for file in files:
        if file.endswith('.html') and 'admin' not in root:
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
                content = f.read()
            
            # 보다 범용적인 정규식: 두 번 닫히고 utils가 나오는 모든 경우를 한 번 닫히게 강제 교정
            pattern = re.compile(r'</div>\s*</div>\s*<div class="b2b-header-utils">', re.DOTALL)
            
            if pattern.search(content):
                content = pattern.sub('</div>\n            <div class="b2b-header-utils">', content)
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(content)
                count += 1

print(f"재점검: 총 {count}개의 파일에서 잔여 잉여 태그를 색출하여 제거했습니다.")
