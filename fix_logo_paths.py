import os

front_dir = r"D:\gongsabi-workspace\gongsabi-repo\front"
updated_count = 0

for root_dir, dirs, files in os.walk(front_dir):
    for file in files:
        if file.endswith(".html"):
            filepath = os.path.join(root_dir, file)
            with open(filepath, "r", encoding="utf-8") as f:
                content = f.read()
            
            # 로고 이미지 및 홈 링크의 상대경로를 루트 기반 절대경로로 강제 치환
            new_content = content.replace('src="public/static/img/logo.png"', 'src="/gongsabi.com/public/static/img/logo.png"')
            new_content = new_content.replace('href="index.html" class="b2b-logo"', 'href="/gongsabi.com/index.html" class="b2b-logo"')
            
            if new_content != content:
                with open(filepath, "w", encoding="utf-8") as f:
                    f.write(new_content)
                updated_count += 1

print(f"Successfully fixed broken logo paths in {updated_count} sub-pages!")
