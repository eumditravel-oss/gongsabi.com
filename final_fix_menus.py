import os

html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 1. 기업소개 링크 치환
content = content.replace(
    '<a href="/gongsabi.com/front/company/index.html">기업소개',
    '<a href="/gongsabi.com/front/company/company2/index.html">기업소개'
)

# 2. 채용안내 링크 치환
content = content.replace(
    '<a href="/gongsabi.com/front/company/index.html">채용안내',
    '<a href="/gongsabi.com/front/company/company3/index.html">채용안내'
)

# 3. 오시는길 링크 치환
content = content.replace(
    '<a href="/gongsabi.com/front/company/index.html">오시는길',
    '<a href="/gongsabi.com/front/company/company4/index.html">오시는길'
)

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Successfully replaced all company sub-menu links based on exact visual matching!")
