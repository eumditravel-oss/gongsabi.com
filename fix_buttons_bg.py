import os
import re

html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 1. 3번째 배너 배경 교체 (slider11.jpg -> slider14.jpg)
content = content.replace("slider11.jpg", "slider14.jpg")

# 2. 버튼 스타일 강력 교체 (하얀색 배경+까만글씨 -> 파란색 배경+하얀글씨+important)
old_btn_style = 'style="background: white; color: #333; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3);"'
new_btn_style = 'style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3); text-decoration: none;"'

content = content.replace(old_btn_style, new_btn_style)

# 슬라이드 4의 버튼 스타일도 교체
old_btn_style2 = 'style="background: white; color: #333; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none;"'
new_btn_style2 = 'style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; text-decoration: none;"'
content = content.replace(old_btn_style2, new_btn_style2)

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Updated HTML with new button styles and background image.")
