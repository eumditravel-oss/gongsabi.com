import os
import re

html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 3번 슬라이드의 정렬을 220px 유지하면서 로고를 위로 올리기 위한 정규식 치환
pattern = r'<div class="b2b-hero-content" style="position: relative; z-index: 3; text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: flex-start; padding-top: 220px; display: flex; flex-direction: column; align-items: flex-start; height: 100%;">\s*<div style="display: flex; align-items: center; margin-bottom: 15px;">\s*<img src="public/static/img/concost_logo.png" alt="CON COST" style="height: 36px; margin-right: 15px;">\s*<h1 style="font-size: 36px; font-weight: 300; margin: 0; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">고객이 원하는 시간에 최상의 결과를 제공하자</h1>\s*</div>'

replacement = """<div class="b2b-hero-content" style="position: relative; z-index: 3; text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: flex-start; padding-top: 169px; display: flex; flex-direction: column; align-items: flex-start; height: 100%;">
                        <img src="public/static/img/concost_logo.png" alt="CON COST" style="height: 36px; margin-bottom: 15px; display: block;">
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 15px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">고객이 원하는 시간에 최상의 결과를 제공하자</h1>"""

content = re.sub(pattern, replacement, content)

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Successfully moved logo to a new line while preserving the 220px baseline for the h1 text.")
