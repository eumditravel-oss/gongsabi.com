import os
import shutil
import re

# 원본 및 타겟 경로 설정
src_ceo = r"D:\gongsabi-workspace\gongsabi-backend\home1\gongsabi\public_html\static\img\ceo.jpg"
dest_ceo_jpg = r"D:\gongsabi-workspace\gongsabi-repo\public\static\img\ceo_real.jpg"
dest_ceo_nobg = r"D:\gongsabi-workspace\gongsabi-repo\public\static\img\ceo_real_nobg.png"

# 1. 서버 폴더에서 진짜 ceo.jpg 복사
shutil.copy2(src_ceo, dest_ceo_jpg)
print("Copied the real ceo.jpg from backend server.")

# 2. AI 누끼 따기 (rembg)
print("Removing background using AI...")
os.system(f'rembg i "{dest_ceo_jpg}" "{dest_ceo_nobg}"')

# 3. index.html 코드 업데이트
html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 기존에 엉뚱하게 땄던 ceo_nobg.png를 ceo_real_nobg.png로 치환
content = content.replace('src="public/static/img/ceo_nobg.png"', 'src="public/static/img/ceo_real_nobg.png"')

# 추가 보정: 누끼가 잘 어울리도록 크기 조절 및 위치 미세 조정
content = content.replace(
    'style="position: absolute; right: 10%; bottom: 0; max-height: 95%; z-index: 2;"',
    'style="position: absolute; right: 8%; bottom: 0; max-height: 90%; z-index: 2; filter: drop-shadow(0px 10px 10px rgba(0,0,0,0.5));"'
)

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Updated index.html to use the correct CEO cutout.")
