<?php
    $username = $_POST['user'];
    $pw = $_POST['pw'];
    $file = fopen("./passwd", "a");
    $store = $username.":".$pw."\n";
    fwrite($file, $store);
    fclose($file);
?>
