import re, shutil

# 1. 새로 생성된 깨끗한 강의실 이미지를 깃허브 repo로 복사
src_img = r'C:\Users\user102\.gemini\antigravity-ide\brain\f49989b2-ec2f-456f-a6d5-9b5bb7f18329\new_lecture_bg_1781841071717.png'
dest_img = r'D:\gongsabi-workspace\gongsabi-repo\public\static\img\new_lecture_bg.png'
shutil.copy2(src_img, dest_img)

# 2. index.html 코드 교체 (그라데이션 꼼수 제거, 새 배경 씌우기)
filepath = r'D:\gongsabi-workspace\gongsabi-repo\index.html'
with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

new_slide4 = """                <!-- Slide 4: 현동명 강의 (새 강의실 배경 + 누끼 합성) -->
                <div class="carousel-item">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/new_lecture_bg.png'); background-position: center center;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(0,0,0,0.4);"></div>
                    
                    <!-- 대표님 누끼 사진 (우측 하단 밀착) -->
                    <img src="public/static/img/ceo.png" alt="현동명 대표이사" style="position: absolute; right: 10%; bottom: 0; max-height: 95%; z-index: 2;">
                    
                    <div class="b2b-hero-content" style="position: relative; z-index: 3; text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: center; display: flex; flex-direction: column; align-items: flex-start; height: 100%;">
                        <h1 style="font-size: 32px; font-weight: 300; margin-bottom: 10px; color: white;">건축 공사 수량 산출 및 내역서 작성의 자존심</h1>
                        <p style="font-size: 20px; color: white; margin-bottom: 40px; font-weight: 300;">현동명의 건설 원가 관리 강의</p>
                        <a href="/gongsabi.com/front/education/lecture/index.html" class="b2b-btn-primary" style="background: white; color: #333; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none;">강의실 바로가기 →</a>
                    </div>
                </div>"""

# "현동명 강의" 슬라이드 블록(<!-- Slide 4: ...) 전체를 안전하게 치환
pattern = re.compile(r'<!-- Slide 4: 현동명 강의 -->\s*<div class="carousel-item">.*?</div>\s*</div>', re.DOTALL)
content = re.sub(pattern, new_slide4, content)

with open(filepath, 'w', encoding='utf-8') as f:
    f.write(content)
print("Updated index.html with the brand new generated classroom background!")
