import os, re

correct_header_html = '''            <ul class="b2b-nav">
                <li class="b2b-nav-item">회사소개</li>
                <li class="b2b-nav-item">공사비 검색</li>
                <li class="b2b-nav-item">내역서 작성</li>
                <li class="b2b-nav-item">공사비 교육</li>
                <li class="b2b-nav-item">건설 장터</li>
                <li class="b2b-nav-item">고객센터</li>
            </ul>

            <!-- 메가메뉴 글로벌 패널 (전체 화면 드롭다운) -->
            <div class="b2b-megamenu">
                <div class="b2b-megamenu-inner">
                    <div class="b2b-mega-col">
                        <h4><i class="fas fa-building"></i> 회사소개</h4>
                        <ul>
                            <li><a href="/gongsabi.com/front/company/index.html">대표이사 인사말 <span class="b2b-mega-desc">CEO 메세지</span></a></li>
                            <li><a href="/gongsabi.com/front/company/index.html">기업소개 <span class="b2b-mega-desc">조직 및 연혁</span></a></li>
                            <li><a href="/gongsabi.com/front/company/index.html">채용안내 <span class="b2b-mega-desc">인재상 및 채용</span></a></li>
                            <li><a href="/gongsabi.com/front/company/index.html">오시는길 <span class="b2b-mega-desc">찾아오시는 길</span></a></li>
                        </ul>
                    </div>
                    <div class="b2b-mega-col">
                        <h4><i class="fas fa-search-dollar"></i> 공사비 검색</h4>
                        <ul>
                            <li><a href="/gongsabi.com/front/data/gongsabi/index.html">면적당 공사비 검색 <span class="b2b-mega-desc">건물, 지역, 연도별 검색</span></a></li>
                            <li><a href="/gongsabi.com/front/data/gongsabi/index.html">건물종류별 검색 <span class="b2b-mega-desc">용도별 단가 확인</span></a></li>
                            <li><a href="/gongsabi.com/front/data/gongsabi/index.html">지역별 검색 <span class="b2b-mega-desc">전국 시도별 단가</span></a></li>
                            <li><a href="/gongsabi.com/front/data/gongsabi/index.html">연도별 검색 <span class="b2b-mega-desc">물가상승률 반영</span></a></li>
                            <li><a href="/gongsabi.com/front/data/danga/index.html">공사단가 검색 <span class="b2b-mega-desc">세부 자재별 단가</span></a></li>
                            <li><a href="/gongsabi.com/front/data/goljo/index.html">세부공종별 단가 <span class="b2b-mega-desc">공종별 특화 단가</span></a></li>
                        </ul>
                    </div>
                    <div class="b2b-mega-col">
                        <h4><i class="fas fa-file-invoice"></i> 내역서 작성</h4>
                        <ul>
                            <li><a href="/gongsabi.com/front/report/geonchuk/index.html">건축내역서 작성 <span class="b2b-mega-desc">전체 건축 공사비</span></a></li>
                            <li><a href="/gongsabi.com/front/report/geonchuk/index.html">전기내역서 작성 <span class="b2b-mega-desc">전기 공사비 산출</span></a></li>
                            <li><a href="/gongsabi.com/front/report/gigan/index.html">공사비산정 <span class="b2b-mega-desc">표준 공사비 계산</span></a></li>
                            <li><a href="/gongsabi.com/front/report/goljo/index.html">물조내역서 작성 <span class="b2b-mega-desc">물량산출 기준</span></a></li>
                            <li><a href="/gongsabi.com/front/report/ganjeob/index.html">공사기성 <span class="b2b-mega-desc">기성고 산출</span></a></li>
                            <li><a href="/gongsabi.com/front/community/gongsabi/index.html">매칭 공사비 의뢰 <span class="b2b-mega-desc">외주 견적 요청</span></a></li>
                        </ul>
                    </div>
                    <div class="b2b-mega-col">
                        <h4><i class="fas fa-laptop-code"></i> 공사비 교육</h4>
                        <ul>
                            <li><a href="/gongsabi.com/front/education/youtube/index.html">동영상 강의 <span class="b2b-mega-desc">실무 핵심 강의</span></a></li>
                            <li><a href="/gongsabi.com/front/education/lecture/index.html">산출실무 교육 <span class="b2b-mega-desc">수량산출 마스터</span></a></li>
                            <li><a href="/gongsabi.com/front/education/lecture/index.html">프리미엄 강의 <span class="b2b-mega-desc">대표 직강 세미나</span></a></li>
                            <li><a href="/gongsabi.com/front/customer/faq/index.html">결제/수강 안내 <span class="b2b-mega-desc">온라인 수강 가이드</span></a></li>
                        </ul>
                    </div>
                    <div class="b2b-mega-col">
                        <h4><i class="fas fa-hard-hat"></i> 건설 장터</h4>
                        <ul>
                            <li><a href="/gongsabi.com/front/community/market/index.html">입찰정보 <span class="b2b-mega-desc">주요 입찰 안내</span></a></li>
                            <li><a href="/gongsabi.com/front/community/recruit/index.html">구인구직 <span class="b2b-mega-desc">건설인재 매칭</span></a></li>
                            <li><a href="/gongsabi.com/front/community/market/index.html">건설자재 장터 <span class="b2b-mega-desc">자재 직거래</span></a></li>
                            <li><a href="/gongsabi.com/front/community/market/index.html">중장비 장터 <span class="b2b-mega-desc">장비 임대/매매</span></a></li>
                        </ul>
                    </div>
                    <div class="b2b-mega-col">
                        <h4><i class="fas fa-headset"></i> 고객센터</h4>
                        <ul>
                            <li><a href="/gongsabi.com/front/customer/pds/index.html">현장자료 <span class="b2b-mega-desc">실무 서식 다운로드</span></a></li>
                            <li><a href="/gongsabi.com/front/customer/notice/index.html">공지사항 <span class="b2b-mega-desc">중요 공지 확인</span></a></li>
                            <li><a href="/gongsabi.com/front/customer/notice/index.html">최신뉴스 <span class="b2b-mega-desc">건설/건축 뉴스</span></a></li>
                            <li><a href="/gongsabi.com/front/customer/qna/index.html">문의하기 <span class="b2b-mega-desc">1:1 고객 상담</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="b2b-header-utils">
                <a href="/gongsabi.com/front/auth/login/index.html" class="b2b-btn-outline" style="padding: 8px 16px; font-size: 14px; border-color:#E2E8F0;">로그인</a>
                <a href="/gongsabi.com/front/auth/regist/index.html" class="b2b-btn-primary" style="padding: 8px 16px; font-size: 14px;">무료 회원가입</a>
            </div>
        </div>
    </header>'''

base_dir = r'D:\gongsabi-workspace\gongsabi-repo'
count = 0

for root, dirs, files in os.walk(base_dir):
    for file in files:
        if file.endswith('.html') and 'admin' not in root:
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
                content = f.read()
            
            # nav 태그부터 header 끝까지 통째로 교체
            pattern = re.compile(r'<ul class="b2b-nav">.*?</header>', re.DOTALL)
            
            if pattern.search(content):
                content = pattern.sub(correct_header_html.replace('\\', '\\\\'), content)
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(content)
                count += 1

print(f"Total files fully restored with correct layout structure: {count}")
