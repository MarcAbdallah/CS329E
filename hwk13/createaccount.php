<?php
    $file = fopen("./passwd", "r");
    $file_a = fopen("./passwd", "a");
    $new_user = $_POST['username'];
    $new_pw = $_POST['pw'];
    $exists = 0;
    while(! feof($file))  {
        $result = fgets($file);
        $username_pw = explode(":", $result);
        $username = $username_pw[0];
        if ($new_user == $username){
            include "./hwk13.php";
            echo "Username already exists";
            $exists = 1;
            break;
        }
      }
    if ($exists == 0){
        fwrite($file_a, "$new_user:$new_pw\n");
        $url = "./hwk13.html";
        header( "Location: $url" );
        setcookie('loggedin', true, time() + 120);
    }
?>