import os
import shutil

repo_dir = r"D:\gongsabi-workspace\gongsabi-repo"
front_data_dir = os.path.join(repo_dir, "front", "data")
gongsabi1_dir = os.path.join(front_data_dir, "gongsabi")
gongsabi1_file = os.path.join(gongsabi1_dir, "index.html")

# 1. 누락된 3개의 방 재건축 (gongsabi2, 3, 4)
new_pages = {
    "gongsabi2": "건물종류별 검색",
    "gongsabi3": "지역별 검색",
    "gongsabi4": "연도별 검색"
}

with open(gongsabi1_file, "r", encoding="utf-8") as f:
    template_content = f.read()

for folder_name, title in new_pages.items():
    new_folder = os.path.join(front_data_dir, folder_name)
    os.makedirs(new_folder, exist_ok=True)
    new_file = os.path.join(new_folder, "index.html")
    
    # 타이틀 치환
    new_content = template_content.replace("면적당 공사비 검색", title)
    # 네비게이션 on 클래스 위치 보정 (기본 틀 유지하되, 헤더 및 텍스트만 치환)
    # (이미 전역 헤더를 쓰고 있으므로 세부적인 내부 로직은 일단 타이틀 위주로 치환)
    
    with open(new_file, "w", encoding="utf-8") as f:
        f.write(new_content)
        
print("1. Successfully rebuilt gongsabi2, gongsabi3, gongsabi4 directories and files.")

# 2. 메인 홈페이지 및 모든 47개 서브페이지(새로 만든 3개 포함)의 메뉴판 링크 전역 동기화
target_dirs = [repo_dir] # 루트 폴더 (index.html 등) 포함
updated_count = 0

for root_dir, dirs, files in os.walk(repo_dir):
    # .git 폴더 제외
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
            
            # 건물종류별 검색 치환
            content = content.replace(
                '<a href="/gongsabi.com/front/data/gongsabi/index.html">건물종류별 검색',
                '<a href="/gongsabi.com/front/data/gongsabi2/index.html">건물종류별 검색'
            )
            # 지역별 검색 치환
            content = content.replace(
                '<a href="/gongsabi.com/front/data/gongsabi/index.html">지역별 검색',
                '<a href="/gongsabi.com/front/data/gongsabi3/index.html">지역별 검색'
            )
            # 연도별 검색 치환
            content = content.replace(
                '<a href="/gongsabi.com/front/data/gongsabi/index.html">연도별 검색',
                '<a href="/gongsabi.com/front/data/gongsabi4/index.html">연도별 검색'
            )
            
            if original_content != content:
                with open(filepath, "w", encoding="utf-8") as f:
                    f.write(content)
                updated_count += 1

print(f"2. Successfully updated navigation routing in {updated_count} HTML files across the repository.")
