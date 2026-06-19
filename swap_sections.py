import os
import re

index_path = r"D:\gongsabi-workspace\gongsabi-repo\index.html"

with open(index_path, "r", encoding="utf-8") as f:
    content = f.read()

# 5번 섹션 (퀵메뉴 리뉴얼 영역) 캡처
pattern5 = r'(<!-- ==========================================\s*5\. 퀵메뉴 및 고객센터 리뉴얼 \(Modern Card & AOS\)\s*=========================================== -->\s*<!-- 모던 하단 퀵메뉴 스타일 -->\s*<style>.*?</section>)'

# 6번 섹션 (공사비 교육 프리뷰 영역) 캡처
pattern6 = r'(<!-- ==========================================\s*6\. 공사비 교육 프리뷰 섹션 \(Education Cards\)\s*=========================================== -->\s*<section class="b2b-section b2b-reveal">.*?</section>)'

# 두 섹션이 연달아 나오는 패턴 캡처 (가운데 공백 포함)
pattern_combined = pattern5 + r'(\s*)' + pattern6

def replacer(match):
    s5 = match.group(1)
    space = match.group(2)
    s6 = match.group(3)
    # 순서를 6번(교육) -> 공간 -> 5번(퀵메뉴) 으로 스왑합니다
    return s6 + space + s5

new_content = re.sub(pattern_combined, replacer, content, flags=re.DOTALL)

if content == new_content:
    print("Error: Sections were not swapped. Regex match failed.")
else:
    with open(index_path, "w", encoding="utf-8") as f:
        f.write(new_content)
    print("Successfully swapped 'Education Preview' and 'Quick Menu' sections!")

