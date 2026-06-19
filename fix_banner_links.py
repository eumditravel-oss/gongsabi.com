import os, re

# 대시보드 파일의 메뉴 영역을 추출하되, 이번에는 경로 이동 스크립트를 더 스마트하게 짭니다.
# 정적 페이지 특성상 어느 깊이에 있든 무조건 /gongsabi.com/admin/banner/index.html?area=main 으로 가도록 절대 경로 사용

with open(r'D:\gongsabi-workspace\gongsabi-repo\admin\dashboard\index.html', 'r', encoding='utf-8') as f:
    dash_content = f.read()

sidebar_match = re.search(r'<div class="left-side-menu">.*?<div class="content-page">', dash_content, re.DOTALL)
sidebar_html = sidebar_match.group(0)

# 상대경로로 되어있던 문제의 배너 링크들을 깃허브 페이지스 전용 절대경로로 모두 치환합니다.
sidebar_html = re.sub(r'href="../../admin/banner\?area=main"', r'href="/gongsabi.com/admin/banner/index.html?area=main"', sidebar_html)
sidebar_html = re.sub(r'href="../../admin/banner\?area=middle"', r'href="/gongsabi.com/admin/banner/index.html?area=middle"', sidebar_html)
sidebar_html = re.sub(r'href="../../admin/banner\?area=bottom"', r'href="/gongsabi.com/admin/banner/index.html?area=bottom"', sidebar_html)

for root, dirs, files in os.walk(r'D:\gongsabi-workspace\gongsabi-repo\admin'):
    for file in files:
        if file == 'index.html':
            filepath = os.path.join(root, file)
                
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
            
            # 사이드바 교체
            content = re.sub(r'<div class="left-side-menu">.*?<div class="content-page">', sidebar_html.replace('\\', '\\\\'), content, flags=re.DOTALL)
            
            # 또한 배너 페이지 자체(admin\banner\index.html)에 Javascript를 넣어, 쿼리스트링에 따라 상단 제목이 바뀌도록 눈속임 처리
            if 'admin\\banner\\index.html' in filepath:
                js_script = '''
<script>
document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const area = urlParams.get('area');
    if (area === 'main') {
        document.querySelector('.page-title').innerText = '메인 슬라이드 관리';
        document.querySelector('.header-title').innerText = '메인 슬라이드 목록';
    } else if (area === 'middle') {
        document.querySelector('.page-title').innerText = '중하단 배너 관리';
        document.querySelector('.header-title').innerText = '중하단 배너 목록';
    } else if (area === 'bottom') {
        document.querySelector('.page-title').innerText = '최하단 배너 관리';
        document.querySelector('.header-title').innerText = '최하단 배너 목록';
    }
});
</script>
'''
                if 'URLSearchParams' not in content:
                    content = content.replace('</body>', js_script + '\n</body>')
            
            with open(filepath, 'w', encoding='utf-8', newline='') as f:
                f.write(content)
