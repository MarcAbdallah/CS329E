<?php
    $user = $_GET['user'];
    $file = fopen("./passwd", "r");
    while (($line = fgets($file)) !== false) {
        $array = explode(":", $line);
        if (trim($array[0]) == $user){
            echo "Username already taken";
            fclose($file);
            break;
        }
    }
?>