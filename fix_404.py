import os, re

base_dir = r'D:\gongsabi-workspace\gongsabi-repo'
broken_count = 0
fixed_files = 0

for root, dirs, files in os.walk(base_dir):
    for file in files:
        if file.endswith('.html'):
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
                content = f.read()
            
            original_content = content
            links = re.findall(r'href="(.*?)"', content)
            
            for link in set(links):
                if link.startswith(('http', 'javascript:', '#', 'mailto:', 'tel:')) or link.strip() == '':
                    continue
                
                target_path = ""
                if link.startswith('/gongsabi.com/'):
                    rel_path = link.replace('/gongsabi.com/', '').split('?')[0].split('#')[0]
                    target_path = os.path.join(base_dir, rel_path.replace('/', '\\'))
                elif link.startswith('/'):
                    rel_path = link[1:].split('?')[0].split('#')[0]
                    target_path = os.path.join(base_dir, rel_path.replace('/', '\\'))
                else:
                    rel_path = link.split('?')[0].split('#')[0]
                    target_path = os.path.normpath(os.path.join(root, rel_path.replace('/', '\\')))
                
                if os.path.isdir(target_path):
                    target_path = os.path.join(target_path, 'index.html')
                
                if not os.path.exists(target_path):
                    broken_count += 1
                    content = content.replace(f'href="{link}"', f'href="javascript:alert(\'준비중입니다.\');"')
            
            if original_content != content:
                fixed_files += 1
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(content)

print(f"스캔 완료: 총 {broken_count}개의 404 깨진 링크가 발견되었습니다.")
print(f"수리 완료: 총 {fixed_files}개의 HTML 파일에서 에러 링크를 안전하게 차단(얼럿) 처리했습니다.")
