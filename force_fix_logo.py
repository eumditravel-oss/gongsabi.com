import os

html_file = r"D:\gongsabi-workspace\gongsabi-repo\index.html"
with open(html_file, "r", encoding="utf-8") as f:
    content = f.read()

# 줄바꿈과 띄어쓰기 오차를 무시할 수 있는 확실한 방식
old_block = """<div class="b2b-hero-content" style="position: relative; z-index: 3; text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: flex-start; padding-top: 220px; display: flex; flex-direction: column; align-items: flex-start; height: 100%;">
                        <div style="display: flex; align-items: center; margin-bottom: 15px;">
                            <img src="public/static/img/concost_logo.png" alt="CON COST" style="height: 36px; margin-right: 15px;">
                            <h1 style="font-size: 36px; font-weight: 300; margin: 0; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">고객이 원하는 시간에 최상의 결과를 제공하자</h1>
                        </div>"""

new_block = """<div class="b2b-hero-content" style="position: relative; z-index: 3; text-align: left; max-width: 1200px; margin: 0 auto; padding-left: 40px; justify-content: flex-start; padding-top: 169px; display: flex; flex-direction: column; align-items: flex-start; height: 100%;">
                        <img src="public/static/img/concost_logo.png" alt="CON COST" style="height: 36px; margin-bottom: 15px; display: block;">
                        <h1 style="font-size: 36px; font-weight: 300; margin-bottom: 15px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">고객이 원하는 시간에 최상의 결과를 제공하자</h1>"""

if old_block in content:
    content = content.replace(old_block, new_block)
    with open(html_file, "w", encoding="utf-8") as f:
        f.write(content)
    print("Successfully replaced block!")
else:
    print("Failed to find exact block. Falling back to targeted replace...")
    # 타겟팅 리플레이스 (한 줄 한 줄 확실하게 쪼개서 리플레이스)
    content = content.replace(
        '<div style="display: flex; align-items: center; margin-bottom: 15px;">',
        '<!-- logo wrapper removed -->'
    )
    content = content.replace(
        '<img src="public/static/img/concost_logo.png" alt="CON COST" style="height: 36px; margin-right: 15px;">',
        '<img src="public/static/img/concost_logo.png" alt="CON COST" style="height: 36px; margin-bottom: 15px; display: block;">'
    )
    content = content.replace(
        '<h1 style="font-size: 36px; font-weight: 300; margin: 0; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">고객이 원하는 시간에 최상의 결과를 제공하자</h1>\n                        </div>',
        '<h1 style="font-size: 36px; font-weight: 300; margin-bottom: 15px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">고객이 원하는 시간에 최상의 결과를 제공하자</h1>'
    )
    # padding-top 수정 (3번 슬라이드 한정)
    # 2번 슬라이드 뒷부분의 Slide 3을 찾아서 padding-top 220px을 169px로 바꿈
    import re
    content = re.sub(r'(<!-- Slide 3: CON COST -->.*?padding-top:\s*)220px', r'\g<1>169px', content, flags=re.DOTALL)
    
    with open(html_file, "w", encoding="utf-8") as f:
        f.write(content)
    print("Successfully applied targeted replace!")
