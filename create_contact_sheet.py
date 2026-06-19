import os
from PIL import Image, ImageDraw, ImageFont

img_dir = r'D:\gongsabi-workspace\gongsabi-backend\home1\gongsabi\public_html\static\img'
images = [f for f in os.listdir(img_dir) if f.endswith('.jpg') and ('slider' in f or 'lecture' in f or 'main' in f)]

thumb_size = 400
columns = 4
rows = (len(images) + columns - 1) // columns
sheet_width = columns * thumb_size
sheet_height = rows * (thumb_size + 50)

sheet = Image.new('RGB', (sheet_width, sheet_height), 'white')
draw = ImageDraw.Draw(sheet)
try:
    font = ImageFont.truetype('arial.ttf', 20)
except:
    font = ImageFont.load_default()

for i, img_name in enumerate(images):
    try:
        img_path = os.path.join(img_dir, img_name)
        img = Image.open(img_path)
        img.thumbnail((thumb_size, thumb_size))
        
        col = i % columns
        row = i // columns
        x = col * thumb_size
        y = row * (thumb_size + 50)
        
        sheet.paste(img, (x, y))
        draw.text((x, y + thumb_size + 10), img_name, fill='red', font=font)
    except Exception as e:
        print(f"Error processing {img_name}: {e}")

sheet.save(r'C:\Users\user102\.gemini\antigravity-ide\brain\f49989b2-ec2f-456f-a6d5-9b5bb7f18329\contact_sheet.jpg')
print("Contact sheet created!")
