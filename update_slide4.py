import re

filepath = r'D:\gongsabi-workspace\gongsabi-repo\index.html'
with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

new_slide4 = """                    <div class="single-hero-slide bg-overlay" style="background-image: url('public/static/img/slider3.jpg'); position: relative; overflow: hidden;">
                        <!-- 대표님 사진 우측 하단 고정 -->
                        <img src="public/static/img/ceo.png" alt="CEO" style="position: absolute; right: 10%; bottom: 0; max-height: 90%; z-index: 10;">
                        
                        <div class="container h-100" style="position: relative; z-index: 20;">
                            <div class="row h-100 align-items-center">
                                <div class="col-12 col-md-7">
                                    <div class="hero-slides-content">
                                        <h2 style="color: white; font-weight: 300; letter-spacing: -1px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">건축 공사 수량 산출 및 내역서 작성의 자존심<br><span style="font-size: 0.7em; font-weight: bold;">현동명</span><span style="font-size: 0.6em;">의 건설 원가 관리 강의</span></h2>
                                        <div class="slide-btn-group mt-50">
                                            <a href="#" class="btn academy-btn" style="background-color: white; color: #333; border-radius: 5px; padding: 10px 20px;">강의실 바로가기 →</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>"""

# 기존 slider2.jpg 가 포함된 슬라이드 블록을 정규식으로 찾아서 교체
pattern = re.compile(r'<div class="single-hero-slide bg-overlay" style="background-image: url\(\'public/static/img/slider2\.jpg\'\);.*?</div>\s*</div>\s*</div>\s*</div>', re.DOTALL)
content = re.sub(pattern, new_slide4, content)

with open(filepath, 'w', encoding='utf-8') as f:
    f.write(content)
print("Updated index.html with separated background and text/image overlay.")
