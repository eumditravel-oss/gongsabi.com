import re

html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 기업소개 링크 복구
content = re.sub(
    r'<a\s+href="[^"]*"\s*([^>]*>\s*<span[^>]*>기업소개</span>)',
    r'<a href="/gongsabi.com/front/company/company2/index.html" \1',
    content
)

# 채용안내 링크 복구
content = re.sub(
    r'<a\s+href="[^"]*"\s*([^>]*>\s*<span[^>]*>채용안내</span>)',
    r'<a href="/gongsabi.com/front/company/company3/index.html" \1',
    content
)

# 오시는길 링크 복구
content = re.sub(
    r'<a\s+href="[^"]*"\s*([^>]*>\s*<span[^>]*>오시는길</span>)',
    r'<a href="/gongsabi.com/front/company/company4/index.html" \1',
    content
)

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Successfully restored the original sub-menu links.")
