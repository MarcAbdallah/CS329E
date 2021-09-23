<?php
    $host = "summer-2021.cs.utexas.edu";
    $user = "cs329e_mitra_marcabd";
    $pwd = "Topaz2Divine2Infer";
    $dbs = "cs329e_mitra_marcabd";
    $port = "3306";
    $table = "USERS";
    $mysqli = new mysqli($host, $user, $pwd, $dbs);

    $connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);
    if (empty($connect))
    {
        die("mysqli_connect failed: " . mysqli_connect_errno());
    }

    $username = $_GET['user'];
    $result = mysqli_query($connect, "SELECT * FROM $table WHERE user=\"$username\"");
    if($result->num_rows != 0){
        echo "Username Taken";
    }
    $mysqli->close();
?>