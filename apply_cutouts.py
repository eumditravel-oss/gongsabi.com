import os
import re

img_dir = r"D:\gongsabi-workspace\gongsabi-repo\public\static\img"
ceo_img = os.path.join(img_dir, "ceo.png")
ceo_nobg = os.path.join(img_dir, "ceo_nobg.png")

book_img = os.path.join(img_dir, "slider5.jpg")
book_nobg = os.path.join(img_dir, "book_nobg.png")

# 1. AI 누끼 따기 (rembg CLI 사용)
print("Removing background from CEO image...")
os.system(f'rembg i "{ceo_img}" "{ceo_nobg}"')
print("Removing background from Book image...")
os.system(f'rembg i "{book_img}" "{book_nobg}"')

# 2. index.html 코드 전면 수정
html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# Slide 2 교체 (건축견적이야기 + 책 누끼 우측 배치)
slide2_old = r'<!-- Slide 2: 건축견적이야기 -->\s*<div class="carousel-item">.*?</div>\s*</div>'
slide2_new = """                <!-- Slide 2: 건축견적이야기 -->
                <div class="carousel-item">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/slider5.jpg'); background-position: center center;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(0,0,0,0.5);"></div>
                    
                    <!-- 책 6권 세트 누끼 사진 (우측 배치) -->
                    <img src="public/static/img/book_nobg.png" alt="건축견적이야기 6권 세트" style="position: absolute; right: 10%; bottom: 10%; max-height: 80%; z-index: 2;">
                    
                    <div class="b2b-hero-content" style="position: relative; z-index: 3; text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: center; display: flex; flex-direction: column; align-items: flex-start; height: 100%;">
                        <p style="font-size: 22px; color: white; margin-bottom: 10px; font-weight: 300;">현장기술자를 위한</p>
                        <h1 style="font-size: 45px; font-weight: 300; margin-bottom: 20px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">건축견적이야기</h1>
                        <p style="font-size: 16px; color: white; margin-bottom: 40px; font-weight: 300;">믿고 보는 교재 전 6권세트 판매중</p>
                        <a href="/gongsabi.com/front/book/index.html" class="b2b-btn-primary" style="background: white; color: #333; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">교재 구매하기</a>
                    </div>
                </div>"""
content = re.sub(slide2_old, slide2_new, content, flags=re.DOTALL)

# Slide 3 교체 (CON COST 시원한 빌딩숲 배경 + 로고 삽입)
slide3_old = r'<!-- Slide 3: CON COST -->\s*<div class="carousel-item">.*?</div>\s*</div>'
slide3_new = """                <!-- Slide 3: CON COST -->
                <div class="carousel-item">
                    <!-- 요란한 와이어프레임(slider8) 대신 깔끔한 빌딩숲 하늘(slider12) 배경 -->
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/slider12.jpg'); background-position: center center;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(0,0,0,0.3);"></div>
                    <div class="b2b-hero-content" style="position: relative; z-index: 3; text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: center; display: flex; flex-direction: column; align-items: flex-start; height: 100%;">
                        
                        <!-- 컨코스트 로고 삽입 -->
                        <img src="public/static/img/concost_logo.png" alt="CON COST" style="height: 50px; margin-bottom: 20px;">
                        
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 20px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">고객이 원하는 시간에 최상의 결과를 제공하자</h1>
                        <p style="font-size: 16px; line-height: 1.6; color: white; margin-bottom: 40px; font-weight: 300;">20여 년간의 경험을 바탕으로 최고를 꿈꾸며,<br>세계 1위 견적기업을 만들겠습니다.<br><br>· 수량산출 · 설계변경 · 기성클레임<br>· 해외/FED 견적 · 공사비 적정성 검토</p>
                        <a href="http://con-cost.com" target="_blank" class="b2b-btn-primary" style="background: white; color: #333; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">홈페이지 바로가기</a>
                    </div>
                </div>"""
content = re.sub(slide3_old, slide3_new, content, flags=re.DOTALL)

# Slide 4 교체 (ceo.png 원본 대신 방금 만든 완벽 누끼 ceo_nobg.png 로 변경)
content = content.replace('src="public/static/img/ceo.png"', 'src="public/static/img/ceo_nobg.png"')

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("HTML code successfully updated with new cutouts and backgrounds.")
