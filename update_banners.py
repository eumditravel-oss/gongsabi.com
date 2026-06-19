import os, re

new_slider_html = '''    <section class="b2b-hero-slider">
        <div id="b2bHeroCarousel" class="carousel slide b2b-hero-carousel" data-ride="carousel" data-interval="6000">
            <!-- Indicators -->
            <ol class="carousel-indicators b2b-hero-indicators" style="margin-bottom:30px;">
                <li data-target="#b2bHeroCarousel" data-slide-to="0" class="active" style="width:10px; height:10px; border-radius:50%; background-color:rgba(255,255,255,0.5); border:none; margin:0 6px;"></li>
                <li data-target="#b2bHeroCarousel" data-slide-to="1" style="width:10px; height:10px; border-radius:50%; background-color:rgba(255,255,255,0.5); border:none; margin:0 6px;"></li>
                <li data-target="#b2bHeroCarousel" data-slide-to="2" style="width:10px; height:10px; border-radius:50%; background-color:rgba(255,255,255,0.5); border:none; margin:0 6px;"></li>
                <li data-target="#b2bHeroCarousel" data-slide-to="3" style="width:10px; height:10px; border-radius:50%; background-color:rgba(255,255,255,0.5); border:none; margin:0 6px;"></li>
            </ol>

            <div class="carousel-inner">
                <!-- Slide 1: 공사비닷컴 -->
                <div class="carousel-item active">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/slider.jpg'); background-position: center center;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(0,0,0,0.1);"></div>
                    <div class="b2b-hero-content" style="text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: center; display: flex; flex-direction: column; align-items: flex-start; padding-top: 50px;">
                        <h1 style="font-size: 50px; font-weight: 300; margin-bottom: 20px; color: white; letter-spacing: -1px;">공사비닷컴</h1>
                        <p style="font-size: 18px; line-height: 1.6; color: white; margin-bottom: 40px; font-weight: 300;">대한민국 건설 공사비를<br>건물종류 | 위치 | 면적 | 용도별로<br>설계가 | 도급가 | 실행가 공사비를 찾아보실 수 있습니다.</p>
                        <a href="#" class="b2b-btn-primary" style="background: white; color: #333; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none;">공사비닷컴 사용법 다운로드</a>
                    </div>
                </div>

                <!-- Slide 2: 건축견적이야기 -->
                <div class="carousel-item">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/slider5.jpg'); background-position: center center;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(0,0,0,0.3);"></div>
                    <div class="b2b-hero-content" style="text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: center; display: flex; flex-direction: column; align-items: flex-start;">
                        <p style="font-size: 22px; color: white; margin-bottom: 10px; font-weight: 300;">현장기술자를 위한</p>
                        <h1 style="font-size: 45px; font-weight: 300; margin-bottom: 20px; color: white;">건축견적이야기</h1>
                        <p style="font-size: 16px; color: white; margin-bottom: 40px; font-weight: 300;">믿고 보는 교재 전 6권세트 판매중</p>
                        <a href="/gongsabi.com/front/book/index.html" class="b2b-btn-primary" style="background: white; color: #333; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none;">교재 구매하기</a>
                    </div>
                </div>

                <!-- Slide 3: CON COST -->
                <div class="carousel-item">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/slider8.jpg'); background-position: center center;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(0,0,0,0.1);"></div>
                    <div class="b2b-hero-content" style="text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: center; display: flex; flex-direction: column; align-items: flex-start;">
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 20px; color: white;">고객이 원하는 시간에 최상의 결과를 제공하자</h1>
                        <p style="font-size: 16px; line-height: 1.6; color: white; margin-bottom: 40px; font-weight: 300;">20여 년간의 경험을 바탕으로 최고를 꿈꾸며,<br>세계 1위 견적기업을 만들겠습니다.<br><br>· 수량산출 · 설계변경 · 기성클레임<br>· 해외/FED 견적 · 공사비 적정성 검토</p>
                        <a href="http://con-cost.com" target="_blank" class="b2b-btn-primary" style="background: white; color: #333; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none;">홈페이지 바로가기</a>
                    </div>
                </div>

                <!-- Slide 4: 현동명 강의 -->
                <div class="carousel-item">
                    <div class="b2b-hero-bg" style="background-image: url('public/static/img/slider2.jpg'); background-position: center center;"></div>
                    <div class="b2b-hero-overlay" style="background: rgba(0,0,0,0.2);"></div>
                    <div class="b2b-hero-content" style="text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: center; display: flex; flex-direction: column; align-items: flex-start;">
                        <h1 style="font-size: 32px; font-weight: 300; margin-bottom: 10px; color: white;">건축 공사 수량 산출 및 내역서 작성의 자존심</h1>
                        <p style="font-size: 20px; color: white; margin-bottom: 40px; font-weight: 300;">현동명의 건설 원가 관리 강의</p>
                        <a href="/gongsabi.com/front/education/lecture/index.html" class="b2b-btn-primary" style="background: white; color: #333; padding: 12px 25px; font-size: 15px; border-radius: 5px; font-weight: bold; border: none;">강의실 바로가기 →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>'''

filepath = r'D:\gongsabi-workspace\gongsabi-repo\index.html'
with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

# 기존 캐러셀 섹션 통째로 날리고 새로운 4단 슬라이드로 교체
pattern = re.compile(r'<section class="b2b-hero-slider">.*?</section>', re.DOTALL)
if pattern.search(content):
    content = pattern.sub(new_slider_html.replace('\\', '\\\\'), content)
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)
    print("index.html 배너 4종 완벽 교체 성공.")
else:
    print("패턴을 찾지 못했습니다.")
