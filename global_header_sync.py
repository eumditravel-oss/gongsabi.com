import os
import re

repo_dir = r"D:\gongsabi-workspace\gongsabi-repo"
main_index = os.path.join(repo_dir, "index.html")
front_dir = os.path.join(repo_dir, "front")

# 1. 메인 index.html에서 마스터 헤더 추출
with open(main_index, "r", encoding="utf-8") as f:
    main_content = f.read()

header_match = re.search(r'(<header class="b2b-header">.*?</header>)', main_content, re.DOTALL)
if not header_match:
    print("Error: Could not find master header in main index.html")
    exit(1)

master_header = header_match.group(1)

# 2. 마스터 헤더 내 대분류 메뉴에 클릭 링크 달기
links_mapping = {
    "회사소개": "/gongsabi.com/front/company/company1/index.html", # 인사말이 1번 방이므로
    "공사비 검색": "/gongsabi.com/front/data/gongsabi/index.html",
    "내역서 작성": "/gongsabi.com/front/report/geonchuk/index.html",
    "공사비 교육": "/gongsabi.com/front/education/youtube/index.html",
    "건설 장터": "/gongsabi.com/front/community/market/index.html",
    "고객센터": "/gongsabi.com/front/customer/pds/index.html"
}

for name, link in links_mapping.items():
    # <li class="b2b-nav-item">회사소개</li> 를 <li class="b2b-nav-item"><a href="...">회사소개</a></li> 로 치환
    pattern = rf'<li class="b2b-nav-item">{name}</li>'
    replacement = f'<li class="b2b-nav-item"><a href="{link}" style="color:inherit; text-decoration:none;">{name}</a></li>'
    master_header = re.sub(pattern, replacement, master_header)

# 3. 메인 index.html에도 적용
new_main_content = main_content[:header_match.start()] + master_header + main_content[header_match.end():]
with open(main_index, "w", encoding="utf-8") as f:
    f.write(new_main_content)
print("Updated main index.html with top-level links.")

# 4. front/ 하위의 모든 html 순회 및 헤더 일괄 덮어쓰기
updated_count = 0
for root_dir, dirs, files in os.walk(front_dir):
    for file in files:
        if file.endswith(".html"):
            filepath = os.path.join(root_dir, file)
            with open(filepath, "r", encoding="utf-8") as f:
                content = f.read()
            
            # 헤더 블록 찾기
            h_match = re.search(r'(<header class="b2b-header">.*?</header>)', content, re.DOTALL)
            if h_match:
                new_content = content[:h_match.start()] + master_header + content[h_match.end():]
                with open(filepath, "w", encoding="utf-8") as f:
                    f.write(new_content)
                updated_count += 1

print(f"Global sync complete! Successfully replaced headers in {updated_count} sub-pages.")
