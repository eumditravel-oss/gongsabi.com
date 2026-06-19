import os

repo_dir = r"D:\gongsabi-workspace\gongsabi-repo"
updated_count = 0

for root_dir, dirs, files in os.walk(repo_dir):
    if ".git" in root_dir:
        continue
        
    for file in files:
        if file.endswith(".html"):
            filepath = os.path.join(root_dir, file)
            try:
                with open(filepath, "r", encoding="utf-8") as f:
                    content = f.read()
            except Exception:
                continue
            
            original_content = content
            
            # CSS 겹침 버그 수정을 위해 search_wrapper 상단에 50px 여백 강제 주입
            content = content.replace(
                '<div class="search_wrapper">',
                '<div class="search_wrapper" style="margin-top: 50px !important;">'
            )
            
            if original_content != content:
                with open(filepath, "w", encoding="utf-8") as f:
                    f.write(content)
                updated_count += 1

print(f"Successfully fixed button overlapping UI bug in {updated_count} HTML files!")
