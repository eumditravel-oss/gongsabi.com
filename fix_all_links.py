import os, re

for root, dirs, files in os.walk(r'D:\gongsabi-workspace\gongsabi-repo\admin'):
    for file in files:
        if file == 'index.html':
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
            
            # 모든 꼬여있는 상대 경로를 깃허브 전용 절대경로로 치환
            # href="../../admin/..." 또는 href="../../../admin/..." 을 모두 href="/gongsabi.com/admin/..." 로 변경
            content = re.sub(r'href="\.\./\.\./\.\./admin/', r'href="/gongsabi.com/admin/', content)
            content = re.sub(r'href="\.\./\.\./admin/', r'href="/gongsabi.com/admin/', content)
            
            with open(filepath, 'w', encoding='utf-8', newline='') as f:
                f.write(content)

print("모든 HTML 파일의 메뉴 링크 절대 경로 교정 완료!")
