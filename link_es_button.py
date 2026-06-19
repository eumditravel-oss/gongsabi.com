import os
import re

html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# ES 시스템 접속하기 버튼의 href 링크를 교체하고 target="_blank" 속성 추가
content = re.sub(
    r'<a\s+href="[^"]*"\s+class="b2b-btn-primary"(.*?>ES 시스템 접속하기</a>)',
    r'<a href="https://es.con-cost.co.kr/" target="_blank" class="b2b-btn-primary"\1',
    content
)

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Successfully linked ES system button to the provided URL.")
