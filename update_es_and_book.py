import os
import shutil
import re

brain_dir = r"C:\Users\user102\.gemini\antigravity-ide\brain\f49989b2-ec2f-456f-a6d5-9b5bb7f18329"
repo_img_dir = r"D:\gongsabi-workspace\gongsabi-repo\public\static\img"

# 1. 파일 복사
es_bg_src = os.path.join(brain_dir, "media__1781846535899.png")
es_bg_dest = os.path.join(repo_img_dir, "es_new_bg.png")
shutil.copy2(es_bg_src, es_bg_dest)

book_src = os.path.join(brain_dir, "media__1781846591633.png")
book_dest = os.path.join(repo_img_dir, "book_6set_nobg_new.png")
shutil.copy2(book_src, book_dest)

html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 2. ES 배너 배경 파일명 교체
content = content.replace("url('public/static/img/es_bg.png')", "url('public/static/img/es_new_bg.png')")

# 3. 2번 슬라이드 책 누끼 파일 및 좌표 교체
# 기존 태그: <img src="public/static/img/book_nobg.png" alt="건축견적이야기 6권 세트" style="position: absolute; right: 10%; bottom: 10%; max-height: 80%; z-index: 2;">
old_img_tag = r'<img src="public/static/img/book_nobg.png" alt="건축견적이야기 6권 세트"[^>]*>'
# 새 태그: 빨간 박스 위치를 고려하여 CSS 작성 (롯데타워 좌측 공간 = right 약 20%, 화면 중간 위쪽 = top 25%, 6권이라 가로로 긺 = width 40%)
new_img_tag = '<img src="public/static/img/book_6set_nobg_new.png" alt="건축견적이야기 6권 세트" style="position: absolute; right: 18%; top: 22%; width: 42%; max-height: 55%; object-fit: contain; z-index: 2;">'
content = re.sub(old_img_tag, new_img_tag, content)

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Updated ES background and book cutout placement.")
