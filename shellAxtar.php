<?php
// Hata raporlama seviyesini ayarla
error_reporting(E_ERROR);
ini_set('max_execution_time', 20000);
ini_set('memory_limit', '512M');

// Doğru içerik türü ayarla
header("Content-Type: text/html; charset=utf-8");

// Zararlı yazılım tarayıcı eşleşmeleri
$matches = array(
    '/(eval|exec|system|passthru|shell_exec|popen|proc_open|curlexec)\s*\(.*\)/i', // Zararlı komutları arar
    '/function_exists\s*\(\s*[\'|\"](eval|exec|proc_open|system|passthru|curlexec)[\'|\"]\s*\)/i', // Potansiyel zararlı fonksiyon kontrolü
    '/base64_decode\s*\(.*\)/i', // Base64-decode
    '/fopen|fwrite|fputs|file_put_contents\s*\(.*\)/i', // Dosya yazma işlemleri
);

// Güvenli yol işleyici
function strdir($str) {
    return rtrim(str_replace(array('\\', '//'), '/', $str), '/');
}

// Antivirüs fonksiyonu
function antivirus($dir, $exs, $matches) {
    if (($handle = opendir($dir)) == false) {
        return false;
    }

    while (false !== ($name = readdir($handle))) {
        if ($name == '.' || $name == '..') {
            continue;
        }

        $path = rtrim($dir, '/') . '/' . $name;

        if (is_dir($path)) {
            if (is_readable($path)) {
                antivirus($path . '/', $exs, $matches);
            }
        } else {
            if (!preg_match($exs, $name) || filesize($path) > 10000000) {
                continue;
            }

            $fp = fopen($path, 'r');
            $code = fread($fp, filesize($path));
            fclose($fp);

            if (empty($code)) {
                continue;
            }

            foreach ($matches as $match) {
                if (preg_match($match, $code, $matches_found)) {
                    foreach ($matches_found as $match_found) {
                        echo "Tehlikeli kod bulundu: " . htmlspecialchars($match_found) . " - {$path}<br>";
                    }
                    break;
                }
            }
        }
    }

    closedir($handle);
    return true;
}

// Form başlatıcı
echo '<form method="POST">';
echo 'Yol: <input type="text" name="dir" value="' . (isset($_POST['dir']) ? strdir($_POST['dir']) : strdir($_SERVER['DOCUMENT_ROOT'])) . '" style="width:400px;"><br>';
echo 'Dosya Uzantıları: <input type="text" name="exs" value="' . (isset($_POST['exs']) ? $_POST['exs'] : '.php|.inc|.phtml') . '" style="width:400px;"><br>';
echo '<input type="submit" value="Taramayı Başlat" style="width:150px;"><br>';
echo '</form>';

// Girdi kontrolü ve tarama
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dir = strdir($_POST['dir'] . '/');
    $exs = '/(' . str_replace('.', '\\.', $_POST['exs']) . ')/i';

    if (file_exists($dir) && is_dir($dir)) {
        echo antivirus($dir, $exs, $matches) ? 'Tarama tamamlandı.' : 'Tarama başarısız.';
    } else {
        echo 'Geçersiz dizin girildi.';
    }
}
?>
