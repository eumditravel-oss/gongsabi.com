import os
import shutil
import re

# 1. 사용자가 올려준 완벽한 누끼 파일을 깃허브 사진첩으로 복사
src_img = r"C:\Users\user102\.gemini\antigravity-ide\brain\f49989b2-ec2f-456f-a6d5-9b5bb7f18329\media__1781844699688.png"
dest_img = r"D:\gongsabi-workspace\gongsabi-repo\public\static\img\ceo_final_user.png"
shutil.copy2(src_img, dest_img)
print("Copied user's perfect cutout image.")

# 2. index.html 수정
html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 이전에 적용했던 ceo_real_nobg.png (책 든 사진) 또는 ceo_nobg.png를 ceo_final_user.png로 전면 교체
content = content.replace('src="public/static/img/ceo_real_nobg.png"', 'src="public/static/img/ceo_final_user.png"')
content = content.replace('src="public/static/img/ceo_nobg.png"', 'src="public/static/img/ceo_final_user.png"')

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Updated index.html to use the user's perfect cutout.")
