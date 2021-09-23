<?php
    $user = $_POST['user'];
    $file = fopen("./passwd", "r");
    $taken = false;
    while (($line = fgets($file)) !== false) {
        $array = explode(":", $line);
        if (trim($array[0]) == $user){
            include_once("./hwk16.html");
            echo "Username already taken";
            fclose($file);
            $taken = true;
            break;
        }
    }
    fclose($file);
    if ($taken == false){
        $pw = $_POST['pw'];
        $password = crypt($pw);
        $file = fopen("./passwd", "a");
        fwrite($file, "$user:$password\n");
        fclose($file);
        $url = "./registrationsuccessful.html";
        header("Location: $url");
    }
?>