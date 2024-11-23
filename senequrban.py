#!/usr/bin/env python
# -*- coding: utf-8 -*-

import subprocess

# Tüm domainleri listele
def get_domains():
    try:
        # Plesk komutunu çalıştır
        result = subprocess.check_output(["plesk", "bin", "subscription", "--list"], stderr=subprocess.STDOUT)
        # Sonuçları UTF-8 formatında döndür
        return result.decode('utf-8').splitlines()
    except subprocess.CalledProcessError as e:
        print("Hata: {0} domain listesi alınamadı.".format(e.output))
        return []

# Domainleri güncelle
def update_subscriptions():
    domains = get_domains()
    if domains:
        for domain in domains:
            try:
                print("Abonelik güncelleniyor: {0}".format(domain))
                # Plesk komutunu çalıştır
                subprocess.check_call(["plesk", "bin", "subscription", "--update", domain, "-user", "riko"])
            except subprocess.CalledProcessError as e:
                print("Hata: {0} domain güncellenemedi: {1}".format(domain, e.output))
    else:
        print("Hiç domain bulunamadı.")

if __name__ == '__main__':
    update_subscriptions()
    print("Tüm domainler güncellendi.")
