<?php
    $file = fopen("./signup.txt", "a");
    $readfile = fopen("./signup.txt", "r");
    $array2 = [];
    while (($line = fgets($readfile)) !== false){
        $linearray = explode(":", $line);
        array_push($array2, $linearray[0]);
    }

    for ($i = 0; $i < 10; $i++) {
        if (!empty($_GET[strval($i)]) && !in_array($i, $array2)){
            fwrite($file, $i . ":" . $_GET[strval($i)] . "\n");
        }
    }
    fclose($file);
    include_once("./hwk12.php");
?>
