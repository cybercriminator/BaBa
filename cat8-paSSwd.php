<?php
for ($uid = 0; $uid < 2000; $uid++) {
    $userInfo = posix_getpwuid($uid); 
    if (!empty($userInfo)) {
        foreach ($userInfo as $key => $value) {
            echo htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . ":"; 
        }
        echo "<br />";
    }
}
?>
