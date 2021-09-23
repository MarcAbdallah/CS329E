<?php
    session_start();
    if (!isset($_SESSION['loggedin'])){
        $url = "./login.html";
        header("Location: $url");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HWK15</title>
</head>

<body>
    <h1>Student Database Access</h1>
    <ul>
        <li><a href="./insert.php">Insert Student Record</a></li>
        <li><a href="./update.php">Update Student Record</a></li>
        <li><a href="./delete.php">Delete Student Record</a></li>
        <li><a href="./view.php">View Student Record</a></li>
        <li><a href="./logout.php">Logout</a></li>
    </ul>
</body>

</html>