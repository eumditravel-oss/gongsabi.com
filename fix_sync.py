import os, re

with open(r'D:\gongsabi-workspace\gongsabi-repo\admin\dashboard\index.html', 'r', encoding='utf-8') as f:
    dash_content = f.read()

sidebar_match = re.search(r'<div class="left-side-menu">.*?<div class="content-page">', dash_content, re.DOTALL)
sidebar_html = sidebar_match.group(0)

for root, dirs, files in os.walk(r'D:\gongsabi-workspace\gongsabi-repo\admin'):
    for file in files:
        if file == 'index.html':
            filepath = os.path.join(root, file)
            if 'dashboard' in filepath:
                continue
                
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
            
            content = re.sub(r'<div class="left-side-menu">.*?<div class="content-page">', sidebar_html.replace('\\', '\\\\'), content, flags=re.DOTALL)
            
            if 'admin-modern.css' not in content:
                content = re.sub(
                    r'(<link href="(.*?)/public/static/css/admin/style-pages\.css".*?>)', 
                    r'\1\n        <!-- Zaga Theme Override -->\n        <link href="\2/public/static/admin/assets/css/admin-modern.css" rel="stylesheet" type="text/css">', 
                    content
                )
            
            with open(filepath, 'w', encoding='utf-8', newline='') as f:
                f.write(content)
