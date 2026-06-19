import os
import re

index_path = r"D:\gongsabi-workspace\gongsabi-repo\index.html"

with open(index_path, "r", encoding="utf-8") as f:
    content = f.read()

# 기존 통계 배너 섹션을 찾아 제거
# 정규식 패턴: <section class="b2b-statistics-section"> 부터 </section> 까지
pattern = r'<section class="b2b-statistics-section">.*?</section>'
match = re.search(pattern, content, re.DOTALL)

if not match:
    print("Error: Could not find the legacy b2b-statistics-section in index.html")
    exit(1)

legacy_code = match.group(0)

# 새로운 디자인 모던 카드 UI + AOS 애니메이션 코드
new_design_code = """
<!-- AOS Library CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- 모던 하단 퀵메뉴 스타일 -->
<style>
.b2b-quick-section { padding: 80px 0; background-color: #f8f9fa; }
.b2b-card {
    background: #fff; border-radius: 12px; padding: 25px; height: 100%;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; border: 1px solid #edf2f7;
}
.b2b-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); border-color:#e2e8f0; }
.quick-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; height: 100%; }
.quick-item {
    background: #f8fafc; border-radius: 10px; padding: 25px 15px; text-align: center;
    transition: all 0.3s; cursor: pointer; border: 1px solid #e2e8f0; color: #4a5568;
}
.quick-item:hover { background: #3b82f6; color: #fff; border-color: #3b82f6; }
.quick-item i { font-size: 32px; margin-bottom: 15px; display: block; color: #3b82f6; transition: color 0.3s; }
.quick-item:hover i { color: #fff; }
.quick-title { font-weight: 600; font-size: 16px; margin:0; }
.contact-box { background: #fff; border-radius: 10px; padding: 20px; border: 1px solid #e2e8f0; margin-bottom: 15px; }
.contact-box h4 { font-size: 16px; color: #718096; margin-bottom: 15px; border-bottom: 1px solid #edf2f7; padding-bottom: 10px; font-weight: 600; }
.contact-box .phone { font-size: 24px; font-weight: 700; color: #1e3a8a; display: flex; align-items: center; }
.contact-box .phone i { font-size: 20px; margin-right: 10px; color: #3b82f6; }
.contact-box p { font-size: 13px; color: #718096; margin: 5px 0 0 30px; }
.notice-list { list-style: none; padding: 0; margin: 0; }
.notice-list li { padding: 12px 0; border-bottom: 1px dashed #e2e8f0; display: flex; justify-content: space-between; }
.notice-list li:last-child { border-bottom: none; }
.notice-list a { color: #4a5568; text-decoration: none; font-size: 14px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 70%; transition: color 0.2s; }
.notice-list a:hover { color: #3b82f6; font-weight: 500; }
.notice-list span { color: #a0aec0; font-size: 13px; }
.notice-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #edf2f7; padding-bottom: 10px; margin-bottom: 15px; }
.notice-header h4 { font-size: 18px; color: #2d3748; margin: 0; font-weight: 600; }
.notice-more { color: #a0aec0; font-size: 12px; border: 1px solid #e2e8f0; border-radius: 4px; padding: 2px 8px; transition: all 0.2s; text-decoration: none; }
.notice-more:hover { background: #f8fafc; color: #4a5568; }
</style>

<section class="b2b-quick-section">
    <div class="container">
        <div class="row">
            <!-- 퀵메뉴 -->
            <div class="col-lg-4 col-md-12 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="b2b-card" style="background:transparent; border:none; box-shadow:none; padding:0;">
                    <div class="quick-grid">
                        <div class="quick-item" onclick="location.href='/gongsabi.com/front/customer/qna/index.html'">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <h5 class="quick-title">교육 요청</h5>
                        </div>
                        <div class="quick-item" onclick="location.href='/gongsabi.com/front/community/partners/index.html'">
                            <i class="fas fa-handshake"></i>
                            <h5 class="quick-title">업무 제휴</h5>
                        </div>
                        <div class="quick-item" onclick="location.href='/gongsabi.com/front/community/recruit/index.html'">
                            <i class="fas fa-users"></i>
                            <h5 class="quick-title">인재 채용</h5>
                        </div>
                        <div class="quick-item" onclick="location.href='/gongsabi.com/front/community/gongsabi/index.html'">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <h5 class="quick-title">견적 요청</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 고객센터 -->
            <div class="col-lg-4 col-md-12 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="b2b-card" style="padding:15px;">
                    <div class="contact-box">
                        <h4>대표 전화</h4>
                        <div class="phone"><i class="fas fa-phone-alt"></i> 02-2202-2258</div>
                        <p>평일 오전 9시 ~ 오후 5시</p>
                        <div class="phone" style="margin-top:10px;"><i class="fas fa-fax"></i> 02-2202-2259</div>
                    </div>
                    <div class="contact-box" style="margin-bottom:0;">
                        <h4>고객센터</h4>
                        <div class="phone" style="font-size:20px;"><i class="fas fa-comment-dots"></i> 24시간 접수 가능</div>
                        <p>고객센터 운영시간에 순차적으로 답변해 드립니다.</p>
                    </div>
                </div>
            </div>

            <!-- 공지사항 -->
            <div class="col-lg-4 col-md-12 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="b2b-card">
                    <div class="notice-header">
                        <h4>공지사항</h4>
                        <a href="/gongsabi.com/front/customer/notice/index.html" class="notice-more"><i class="fas fa-plus"></i> 더보기</a>
                    </div>
                    <ul class="notice-list">
                        <li><a href="/gongsabi.com/front/customer/notice/index.html">특허청 상표등록증을 획득하였습니다.</a> <span>2021-03-10</span></li>
                        <li><a href="/gongsabi.com/front/customer/notice/index.html">대한민국 공사비 정보 플랫폼, '공사비닷...</a> <span>2020-11-27</span></li>
                        <li><a href="/gongsabi.com/front/customer/notice/index.html">[인터뷰] '건축견적 이야기' 펴낸 현동...</a> <span>2020-11-27</span></li>
                        <li><a href="/gongsabi.com/front/customer/notice/index.html">건축견적이야기 출판기념회 성료 (건설경제...</a> <span>2020-11-27</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- AOS Script Init -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    });
</script>
"""

new_content = content.replace(legacy_code, new_design_code)

with open(index_path, "w", encoding="utf-8") as f:
    f.write(new_content)

print("Successfully replaced legacy banner with modern animated quick menu layout!")
