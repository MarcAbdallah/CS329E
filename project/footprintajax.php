<?php
    session_start();
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

    $username = $_SESSION['user'];
    if ($_GET['act'] == 'load'){
        $result = mysqli_query($connect, "SELECT * FROM $table WHERE user=\"$username\"");
        if($result->num_rows != 0){
            $row = $result->fetch_row();
            $elec = $row[2];
            $gas = $row[3];
            $mpg = $row[4];
            $miles = $row[5];
            echo "$elec:$gas:$mpg:$miles";
        }
        $mysqli->close();
    }

    if ($_GET['act'] == 'save'){
        $elec = $_GET['elec'];
        $gas = $_GET['gas'];
        $mpg = $_GET['mpg'];
        $miles = $_GET['miles'];
        mysqli_query($connect, "UPDATE $table SET elec=$elec, gas=$gas, mpg=$mpg, miles=$miles WHERE user=\"$username\"");
        echo "Success";
    }
?>