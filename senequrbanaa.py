#!/usr/bin/env python
# -*- coding: utf-8 -*-

import subprocess

# Plesk komutlarının tam yolu
plesk_path = "/usr/local/psa/bin/plesk"

# Tüm domainleri listele
def get_domains():
    try:
        # Plesk komutunu çalıştır
        process = subprocess.Popen([plesk_path, "bin", "subscription", "--list"], stdout=subprocess.PIPE, stderr=subprocess.PIPE)
        result, error = process.communicate()
        
        if process.returncode != 0:
            print("Hata: {0}".format(error))
            return []
        
        # Sonuçları UTF-8 formatında döndür
        return result.decode('utf-8').splitlines()
    except Exception as e:
        print("Hata: {0}".format(str(e)))
        return []

# Domainleri güncelle
def update_subscriptions():
    domains = get_domains()
    if domains:
        for domain in domains:
            try:
                print("Abonelik güncelleniyor: {0}".format(domain))
                # Plesk komutunu çalıştır
                subprocess.check_call([plesk_path, "bin", "subscription", "--update", domain, "-user", "riko"])
            except subprocess.CalledProcessError as e:
                print("Hata: {0} domain güncellenemedi: {1}".format(domain, e.output))
    else:
        print("Hiç domain bulunamadı.")

if __name__ == '__main__':
    update_subscriptions()
    print("Tüm domainler güncellendi.")
