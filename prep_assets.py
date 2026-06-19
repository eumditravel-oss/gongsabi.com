import os
import shutil

# 1. 컨코스트 로고 복사 (깨진 이름 해결을 위해 폴더 내 유일한 png를 찾음)
backup_dir = r'F:\백업\공사비'
dest_dir = r'D:\gongsabi-workspace\gongsabi-repo\public\static\img'

for file in os.listdir(backup_dir):
    if file.endswith('.png'):
        src_file = os.path.join(backup_dir, file)
        dest_file = os.path.join(dest_dir, 'concost_logo.png')
        shutil.copy2(src_file, dest_file)
        print(f"Copied CON COST logo: {file} -> concost_logo.png")
        break

# 2. 책 원본 이미지 찾기 (public_html/static/img 에서 찾기)
img_dir = r'D:\gongsabi-workspace\gongsabi-backend\home1\gongsabi\public_html\static\img'
book_candidates = [f for f in os.listdir(img_dir) if f.endswith('.jpg') and ('book' in f or 'slider5' in f)]
print(f"Found book image candidates: {book_candidates}")

