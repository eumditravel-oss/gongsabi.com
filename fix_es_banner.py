import os
import re

html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 1. b2b-hero-content 의 style 텍스트 통일 (위치 맞춤)
# 지난번 코드에서 교체가 안 되었거나 또 다른 모양일 수 있으므로 확실히 교체
# 여러 번 눌려서 꼬이지 않게 old_style을 주의 깊게 지정
content = content.replace("justify-content: center;", "justify-content: flex-start; padding-top: 15%;")

# 2. 닷트 인디케이터에 5번째 요소 추가 (로봇의 추천 정규식 활용)
indicator_old = r'<li data-target="#b2bHeroCarousel" data-slide-to="3"[^>]*></li>'
indicator_new = """<li data-target="#b2bHeroCarousel" data-slide-to="3" style="width:10px; height:10px; border-radius:50%; background-color:rgba(255,255,255,0.5); border:none; margin:0 6px;"></li>
                    <li data-target="#b2bHeroCarousel" data-slide-to="4" style="width:10px; height:10px; border-radius:50%; background-color:rgba(255,255,255,0.5); border:none; margin:0 6px;"></li>"""
content = re.sub(indicator_old, indicator_new, content)

# 3. 5번째 슬라이드 내용 추가 (slide4 끝나는 부분 검색)
slide4_end_regex = r'강의실 바로가기 →</a>\s*</div>\s*</div>'
slide5_html = """강의실 바로가기 →</a> </div> </div>
                <!-- Slide 5: ES 시스템 -->
                <div class="carousel-item">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/es_bg.png'); background-position: center right;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(255,255,255,0.4);"></div>
                    <div class="b2b-hero-content" style="position: relative; z-index: 3; text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: flex-start; padding-top: 15%; display: flex; flex-direction: column; align-items: flex-start; height: 100%;">
                        <p style="font-size: 22px; color: #2D63E2; margin-bottom: 10px; font-weight: bold;">건설 계약 물가변동 조정을 위한 전문 플랫폼</p>
                        <h1 style="font-size: 45px; font-weight: 300; margin-bottom: 20px; color: #111; text-shadow: 1px 1px 2px rgba(255,255,255,0.8);">전문적인 가격 조정 관리 시스템 <span style="font-weight:bold;">ES</span></h1>
                        <p style="font-size: 18px; color: #333; margin-bottom: 40px; font-weight: 400; line-height: 1.6;">Kd계산, 지수 관리, PDF 보고서 자동 생성까지<br>하나의 시스템에서 관리하세요.</p>
                        <a href="#" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3); text-decoration: none;">ES 시스템 접속하기</a>
                    </div>
                </div>"""
content = re.sub(slide4_end_regex, slide5_html, content)

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Re-applied correctly using fixed regex.")
