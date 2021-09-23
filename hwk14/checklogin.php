<?php
    session_start();
    if (isset($_SESSION['question'])){
        $url = "./hwk14.php";
        header( "Location: $url" );
        exit;
    }
    $file = fopen("./passwd", "r");
    $file2 = fopen("./results", "r");
    $user = $_POST['username'];
    $pw = $_POST['pw'];
    $taken = 0;
    while(! feof($file2))  {
        $score = fgets($file2);
        $user_pw = explode(":", $score);
        $username = $user_pw[0];
        if ($user == $username){
            $taken = 1;
            $login = 1;
            include_once("./login.php");
            echo "You have already taken the quiz";
        }
    }
    if ($taken == 0){
        while(! feof($file))  {
            $result = fgets($file);
            $username_pw = explode(":", $result);
            $username = $username_pw[0];
            $real_pw = $username_pw[1];
            if ($user == $username){
                if ($pw == trim($real_pw)){
                    $url = "./hwk14.php";
                    $login = 1;
                    $_SESSION['loggedin'] = true;
                    $_SESSION['question'] = 1;
                    $_SESSION['score'] = 0;
                    $_SESSION['user'] = $user;
                    $_SESSION['starttime'] = time();
                    header( "Location: $url" );
                    break;
                }
            }
        }
    }
    if ($login == 0){
        include_once "./login.php";
        echo "Incorrect username or password";
    }
?>