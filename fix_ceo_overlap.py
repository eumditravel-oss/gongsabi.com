import os, re

def update_css(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # 1. .company_ceo_info_wrapper 수정 (Flex 도입)
    content = re.sub(
        r'\.company_ceo_info_wrapper\s*\{[^}]*\}',
        '.company_ceo_info_wrapper {\n    padding-top: 100px;\n    padding-left: 50px;\n    margin-bottom: 100px;\n    display: flex;\n    align-items: flex-start;\n    gap: 70px;\n}',
        content
    )

    # 2. .company_ceo_info_wrapper > div 수정 (inline-block 제거)
    content = re.sub(
        r'\.company_ceo_info_wrapper\s*>\s*div\s*\{[^}]*\}',
        '.company_ceo_info_wrapper > div {\n    font-size: 16px;\n}',
        content
    )

    # 3. .company_ceo_image 수정 및 img 태그 스타일 추가 (사진 축소 안전장치)
    content = re.sub(
        r'\.company_ceo_info_wrapper\s*\.company_ceo_image\s*\{[^}]*\}',
        '.company_ceo_info_wrapper .company_ceo_image {\n    flex: 0 0 350px;\n}\n.company_ceo_info_wrapper .company_ceo_image img {\n    max-width: 100%;\n    height: auto;\n    display: block;\n}',
        content
    )

    # 4. .company_ceo_message 수정 (padding/width 제거하고 flex: 1 할당)
    content = re.sub(
        r'\.company_ceo_info_wrapper\s*\.company_ceo_message\s*\{[^}]*\}',
        '.company_ceo_info_wrapper .company_ceo_message {\n    flex: 1;\n}',
        content
    )

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)
    print(f"Updated {filepath}")

update_css(r'D:\gongsabi-workspace\gongsabi-repo\public\static\front\css\style.css')
update_css(r'D:\gongsabi-workspace\gongsabi-repo\public\static\front\css\style-pages.css')
