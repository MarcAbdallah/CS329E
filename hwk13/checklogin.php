<?php
    $file = fopen("./passwd", "r");
    $user = $_POST['username'];
    $pw = $_POST['pw'];
    while(! feof($file))  {
        $result = fgets($file);
        $username_pw = explode(":", $result);
        $username = $username_pw[0];
        $real_pw = $username_pw[1];
        if ($user == $username){
            if ($pw == trim($real_pw)){
                $url = "./hwk13.html";
                setcookie('loggedin', true, time() + 120);
                header( "Location: $url" );
                break;
            }
        }
      }
    include "./hwk13.php";
    echo "Incorrect username or password";
?>