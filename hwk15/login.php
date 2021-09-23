<?php
    session_start();
    $file = fopen("./dbase/passwd", "r");
    $user_input = $_POST['user'];
    $pw_input = $_POST['pw'];
    while (($line = fgets($file)) !== false) {
        $array = explode(":", $line);
        if ((trim($array[0]) == $user_input) && (trim($array[1]) == $pw_input)){
            $_SESSION['loggedin'] = true;
            $url = "./main.php";
            header("Location: $url");
            fclose($file);
            break;
        }
    }
    include_once("./login.html");
    echo "Login Failed";
    fclose($file);
?>