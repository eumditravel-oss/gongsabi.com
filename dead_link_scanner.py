import os
import re
import sys

# 강제로 UTF-8 출력 설정
sys.stdout.reconfigure(encoding='utf-8')

repo_dir = r"D:\gongsabi-workspace\gongsabi-repo"
html_files = []
dead_links = []

for root_dir, dirs, files in os.walk(repo_dir):
    if ".git" in root_dir:
        continue
    for file in files:
        if file.endswith(".html"):
            html_files.append(os.path.join(root_dir, file))

href_regex = re.compile(r'<a[^>]+href=["\'](.*?)["\']', re.IGNORECASE)

for file_path in html_files:
    try:
        with open(file_path, "r", encoding="utf-8") as f:
            content = f.read()
    except Exception:
        continue
        
    links = href_regex.findall(content)
    for link in links:
        link = link.strip()
        
        if not link or link.startswith("#") or link.startswith("javascript:") or link.startswith("mailto:"):
            continue
        if link.startswith("http://") or link.startswith("https://"):
            continue
            
        target_path = ""
        if link.startswith("/gongsabi.com/"):
            local_rel_path = link.replace("/gongsabi.com/", "").replace("/", os.sep)
            target_path = os.path.join(repo_dir, local_rel_path)
        else:
            base_dir = os.path.dirname(file_path)
            clean_link = link.split("?")[0].replace("/", os.sep)
            target_path = os.path.normpath(os.path.join(base_dir, clean_link))
            
        target_path = target_path.split("?")[0]
            
        if not os.path.exists(target_path):
            dead_links.append({"source": file_path, "broken_link": link})

if len(dead_links) == 0:
    print("\nPERFECT! Zero dead links found.")
else:
    print(f"\nFOUND {len(dead_links)} DEAD LINKS!")
    # 중복 제거해서 보여주기 위해 set 사용
    unique_broken = set()
    for dl in dead_links:
        unique_broken.add((dl['broken_link'], os.path.basename(dl['source'])))
        
    for i, (b_link, s_file) in enumerate(list(unique_broken)[:30]):
        print(f"Broken Link: {b_link} (found in {s_file})")

