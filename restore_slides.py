import os
import re

html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 공통 컨테이너 스타일 (padding-top: 220px)
c_style = 'style="position: relative; z-index: 3; text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: flex-start; padding-top: 220px; display: flex; flex-direction: column; align-items: flex-start; height: 100%;"'

# 통째로 교체할 carousel-inner 전체 내용 조립
full_carousel_inner = f"""<div class="carousel-inner">
                <!-- Slide 1: 공사비닷컴 -->
                <div class="carousel-item active">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/slider.jpg'); background-position: center center;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(0,0,0,0.1);"></div>
                    <div class="b2b-hero-content" {c_style}>
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 15px; color: white; letter-spacing: -1px;">공사비닷컴</h1>
                        <p style="font-size: 18px; line-height: 1.6; color: white; margin-bottom: 40px; font-weight: 300;">대한민국 건설 공사비를<br>건물종류 | 위치 | 면적 | 용도별로<br>설계가 | 도급가 | 실행가 공사비를 찾아보실 수 있습니다.</p>
                        <a href="#" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; text-decoration: none;">공사비닷컴 사용법 다운로드</a>
                    </div>
                </div>

                <!-- Slide 2: 건축견적이야기 -->
                <div class="carousel-item">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/slider5.jpg'); background-position: center center;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(0,0,0,0.5);"></div>
                    <img src="public/static/img/book_nobg.png" alt="건축견적이야기 6권 세트" style="position: absolute; right: 10%; bottom: 10%; max-height: 80%; z-index: 2;">
                    <div class="b2b-hero-content" {c_style}>
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 15px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">건축견적이야기</h1>
                        <p style="font-size: 18px; line-height: 1.6; color: white; margin-bottom: 40px; font-weight: 300; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">현장기술자를 위한 믿고 보는 교재<br>전 6권 세트 절찬 판매중</p>
                        <a href="/gongsabi.com/front/book/index.html" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3); text-decoration: none;">교재 구매하기</a>
                    </div>
                </div>

                <!-- Slide 3: CON COST -->
                <div class="carousel-item">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/slider14.jpg'); background-position: center center;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(0,0,0,0.3);"></div>
                    <div class="b2b-hero-content" {c_style}>
                        <div style="display: flex; align-items: center; margin-bottom: 15px;">
                            <img src="public/static/img/concost_logo.png" alt="CON COST" style="height: 36px; margin-right: 15px;">
                            <h1 style="font-size: 36px; font-weight: 300; margin: 0; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">고객이 원하는 시간에 최상의 결과를 제공하자</h1>
                        </div>
                        <p style="font-size: 18px; line-height: 1.6; color: white; margin-bottom: 40px; font-weight: 300; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">20여 년간의 경험을 바탕으로 최고를 꿈꾸며,<br>세계 1위 견적기업을 만들겠습니다.<br><br>· 수량산출 · 설계변경 · 기성클레임<br>· 해외/FED 견적 · 공사비 적정성 검토</p>
                        <a href="http://con-cost.com" target="_blank" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3); text-decoration: none;">홈페이지 바로가기</a>
                    </div>
                </div>

                <!-- Slide 4: 현동명 강의 -->
                <div class="carousel-item">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/new_lecture_bg.png'); background-position: center center;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(0,0,0,0.4);"></div>
                    <img src="public/static/img/ceo_final_user.png" alt="현동명 대표이사" style="position: absolute; right: 8%; bottom: 0; max-height: 90%; z-index: 2; filter: drop-shadow(0px 10px 10px rgba(0,0,0,0.5));">
                    <div class="b2b-hero-content" {c_style}>
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 15px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">건축 공사 수량 산출 및 내역서 작성의 자존심</h1>
                        <p style="font-size: 18px; line-height: 1.6; color: white; margin-bottom: 40px; font-weight: 300; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">현동명의 건설 원가 관리 강의</p>
                        <a href="/gongsabi.com/front/education/lecture/index.html" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; text-decoration: none;">강의실 바로가기 →</a> 
                    </div>
                </div>

                <!-- Slide 5: ES 시스템 -->
                <div class="carousel-item">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/es_bg.png'); background-position: center right;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(255,255,255,0.4);"></div>
                    <div class="b2b-hero-content" {c_style}>
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 15px; color: #111; text-shadow: 1px 1px 2px rgba(255,255,255,0.8);">전문적인 가격 조정 관리 시스템 <span style="font-weight:bold;">ES</span></h1>
                        <p style="font-size: 18px; color: #333; margin-bottom: 40px; font-weight: 400; line-height: 1.6;">건설 계약 물가변동 조정을 위한 전문 플랫폼<br>Kd계산, 지수 관리, PDF 보고서 자동 생성까지<br>하나의 시스템에서 관리하세요.</p>
                        <a href="#" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3); text-decoration: none;">ES 시스템 접속하기</a>
                    </div>
                </div>
            </div>"""

# 망가진 carousel-inner 부분을 찾아 통째로 교체
# <div class="carousel-inner"> 부터 <section class="b2b-hero-slider">가 끝나는 바로 직전의 </div> </div> 등까지를 잡아야 함
# 가장 안전한 방법은 <!-- MAIN HERO SLIDER --> 아래쪽 영역을 정확히 타겟팅하는 것
pattern = r'<div class="carousel-inner">.*?</div>\s*</div>\s*</section>'
replacement = full_carousel_inner + "\n        </div>\n    </section>"
content = re.sub(pattern, replacement, content, flags=re.DOTALL)

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Successfully restored and injected all 5 perfectly aligned slides.")
