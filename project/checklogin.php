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


$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($connect, "SELECT * FROM $table WHERE user=\"$username\"");
if($result->num_rows == 0){
    $mysqli->close();
    include_once("./login.php");
    echo "<script>window.alert('Username or password incorrect')</script>";
}
else{
    $row = $result->fetch_row();
    if (crypt($password, $row[1]) == $row[1]){
        session_start();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['user'] = $username;
        setcookie('current_user', $username);
        $url = "./footprint.php";
        header("Location: $url");
    }
    else{
        include_once("./login.php");
        echo "<script>window.alert('Username or password incorrect')</script>";
    }
}

?>