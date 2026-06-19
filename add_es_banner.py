import os
import shutil
import re

# 1. 생성된 ES 배경 이미지 복사
src_img = r"C:\Users\user102\.gemini\antigravity-ide\brain\f49989b2-ec2f-456f-a6d5-9b5bb7f18329\es_bg_clean_abstract_1781845609279.png"
dest_img = r"D:\gongsabi-workspace\gongsabi-repo\public\static\img\es_bg.png"
shutil.copy2(src_img, dest_img)

html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 2. 모든 b2b-hero-content 의 justify-content: center; 를 flex-start 와 padding-top: 20% 로 변경
old_style = "justify-content: center;"
new_style = "justify-content: flex-start; padding-top: 15%;"
content = content.replace(old_style, new_style)

# 3. 닷트 인디케이터에 5번째 요소 추가
indicator_old = r'<li data-target="#b2b-hero-carousel" data-slide-to="3"></li>\s*</ol>'
indicator_new = """<li data-target="#b2b-hero-carousel" data-slide-to="3"></li>
                    <li data-target="#b2b-hero-carousel" data-slide-to="4"></li>
                </ol>"""
content = re.sub(indicator_old, indicator_new, content)

# 4. 5번째 슬라이드(ES 시스템) 내용 구성
slide5_html = """
                <!-- Slide 5: ES 시스템 -->
                <div class="carousel-item">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/es_bg.png'); background-position: center right;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(255,255,255,0.4);"></div> <!-- 하얀 배경이므로 어두운 오버레이 대신 밝은 오버레이 적용 -->
                    <div class="b2b-hero-content" style="position: relative; z-index: 3; text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: flex-start; padding-top: 15%; display: flex; flex-direction: column; align-items: flex-start; height: 100%;">
                        <p style="font-size: 22px; color: #2D63E2; margin-bottom: 10px; font-weight: bold;">건설 계약 물가변동 조정을 위한 전문 플랫폼</p>
                        <h1 style="font-size: 45px; font-weight: 300; margin-bottom: 20px; color: #111; text-shadow: 1px 1px 2px rgba(255,255,255,0.8);">전문적인 가격 조정 관리 시스템 <span style="font-weight:bold;">ES</span></h1>
                        <p style="font-size: 18px; color: #333; margin-bottom: 40px; font-weight: 400; line-height: 1.6;">Kd계산, 지수 관리, PDF 보고서 자동 생성까지<br>하나의 시스템에서 관리하세요.</p>
                        <a href="#" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3); text-decoration: none;">ES 시스템 접속하기</a>
                    </div>
                </div>
            </div>
            
            <!-- Controls -->"""

# slide 4 가 끝나는 지점 </div> </div> 밑에 5번째 슬라이드 추가.
# Controls 부분 앞쪽을 기준으로 찾아 바꿈.
insert_target = r'</div>\s*<!-- Controls -->'
content = re.sub(insert_target, slide5_html, content)

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Updated HTML with unified text alignment and 5th ES banner.")
