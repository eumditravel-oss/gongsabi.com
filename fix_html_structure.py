import os, re

base_dir = r'D:\gongsabi-workspace\gongsabi-repo'
count = 0

for root, dirs, files in os.walk(base_dir):
    for file in files:
        if file.endswith('.html') and 'admin' not in root:
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
                content = f.read()
            
            # 잘못 닫혀버린 부모 괄호(잉여 </div>)를 찾아서 제거
            # </div>\s*</div>\s*<div class="b2b-header-utils"> 패턴을
            # </div>\n\n            <div class="b2b-header-utils"> 로 교체 (하나 줄임)
            pattern = re.compile(r'</div>\s*</div>\s*<div class="b2b-header-utils">', re.DOTALL)
            
            if pattern.search(content):
                content = pattern.sub('</div>\n\n            <div class="b2b-header-utils">', content)
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(content)
                count += 1

print(f"총 {count}개의 파일에서 레이아웃 붕괴의 원인인 잉여 태그를 제거했습니다.")
