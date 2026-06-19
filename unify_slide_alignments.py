import os
import re

html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 공통 컨테이너 스타일 (padding-top: 220px 절대값으로 고정하여 모니터 해상도 변화에도 흔들림 방지)
common_container_style = 'style="position: relative; z-index: 3; text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: flex-start; padding-top: 220px; display: flex; flex-direction: column; align-items: flex-start; height: 100%;"'

# 슬라이드별 교체 내용 (4번 슬라이드 폰트 사이즈 기준: h1=36px, p=18px)
slide1_content = f"""<div class="b2b-hero-content" {common_container_style}>
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 15px; color: white; letter-spacing: -1px;">공사비닷컴</h1>
                        <p style="font-size: 18px; line-height: 1.6; color: white; margin-bottom: 40px; font-weight: 300;">대한민국 건설 공사비를<br>건물종류 | 위치 | 면적 | 용도별로<br>설계가 | 도급가 | 실행가 공사비를 찾아보실 수 있습니다.</p>
                        <a href="#" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; text-decoration: none;">공사비닷컴 사용법 다운로드</a>
                    </div>"""

slide2_content = f"""<div class="b2b-hero-content" {common_container_style}>
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 15px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">건축견적이야기</h1>
                        <p style="font-size: 18px; line-height: 1.6; color: white; margin-bottom: 40px; font-weight: 300; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">현장기술자를 위한 믿고 보는 교재<br>전 6권 세트 절찬 판매중</p>
                        <a href="/gongsabi.com/front/book/index.html" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3); text-decoration: none;">교재 구매하기</a>
                    </div>"""

slide3_content = f"""<div class="b2b-hero-content" {common_container_style}>
                        <div style="display: flex; align-items: center; margin-bottom: 15px;">
                            <img src="public/static/img/concost_logo.png" alt="CON COST" style="height: 36px; margin-right: 15px;">
                            <h1 style="font-size: 36px; font-weight: 300; margin: 0; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">고객이 원하는 시간에 최상의 결과를 제공하자</h1>
                        </div>
                        <p style="font-size: 18px; line-height: 1.6; color: white; margin-bottom: 40px; font-weight: 300; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">20여 년간의 경험을 바탕으로 최고를 꿈꾸며,<br>세계 1위 견적기업을 만들겠습니다.<br><br>· 수량산출 · 설계변경 · 기성클레임<br>· 해외/FED 견적 · 공사비 적정성 검토</p>
                        <a href="http://con-cost.com" target="_blank" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3); text-decoration: none;">홈페이지 바로가기</a>
                    </div>"""

slide4_content = f"""<div class="b2b-hero-content" {common_container_style}>
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 15px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">건축 공사 수량 산출 및 내역서 작성의 자존심</h1>
                        <p style="font-size: 18px; line-height: 1.6; color: white; margin-bottom: 40px; font-weight: 300; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">현동명의 건설 원가 관리 강의</p>
                        <a href="/gongsabi.com/front/education/lecture/index.html" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; text-decoration: none;">강의실 바로가기 →</a> 
                    </div>"""

slide5_content = f"""<div class="b2b-hero-content" {common_container_style}>
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 15px; color: #111; text-shadow: 1px 1px 2px rgba(255,255,255,0.8);">전문적인 가격 조정 관리 시스템 <span style="font-weight:bold;">ES</span></h1>
                        <p style="font-size: 18px; color: #333; margin-bottom: 40px; font-weight: 400; line-height: 1.6;">건설 계약 물가변동 조정을 위한 전문 플랫폼<br>Kd계산, 지수 관리, PDF 보고서 자동 생성까지<br>하나의 시스템에서 관리하세요.</p>
                        <a href="#" class="b2b-btn-primary" style="background: #2D63E2 !important; color: white !important; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.3); text-decoration: none;">ES 시스템 접속하기</a>
                    </div>"""

# Replace content sections using regex
import re
content = re.sub(r'<div class="b2b-hero-content"[^>]*>.*?<a href="#" class="b2b-btn-primary"[^>]*>공사비닷컴 사용법 다운로드</a>\s*</div>', slide1_content, content, flags=re.DOTALL)
content = re.sub(r'<div class="b2b-hero-content"[^>]*>.*?<a href="/gongsabi.com/front/book/index.html" class="b2b-btn-primary"[^>]*>교재 구매하기</a>\s*</div>', slide2_content, content, flags=re.DOTALL)
content = re.sub(r'<div class="b2b-hero-content"[^>]*>.*?<a href="http://con-cost.com" target="_blank" class="b2b-btn-primary"[^>]*>홈페이지 바로가기</a>\s*</div>', slide3_content, content, flags=re.DOTALL)
content = re.sub(r'<div class="b2b-hero-content"[^>]*>.*?<a href="/gongsabi.com/front/education/lecture/index.html" class="b2b-btn-primary"[^>]*>강의실 바로가기 →</a>\s*</div>', slide4_content, content, flags=re.DOTALL)
content = re.sub(r'<div class="b2b-hero-content"[^>]*>.*?<a href="#" class="b2b-btn-primary"[^>]*>ES 시스템 접속하기</a>\s*</div>', slide5_content, content, flags=re.DOTALL)

with open(html_file, "w", encoding="utf-8") as f:
    f.write(content)
print("Unified all slide alignments and font sizes based on slide 4.")
