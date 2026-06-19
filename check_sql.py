sql_path = r'D:\gongsabi-workspace\gongsabi-backend\database_backup\gongsabi.sql'
with open(sql_path, 'r', encoding='utf-8', errors='ignore') as f:
    for i in range(50):
        print(f.readline().strip())
    print('==============================')
    
    f.seek(0)
    for line in f:
        if 'INSERT' in line:
            print(line[:200])
            break
