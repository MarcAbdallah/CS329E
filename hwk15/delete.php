<?php
    session_start();
    if (!isset($_SESSION['loggedin'])){
        $url = "./login.html";
        header("Location: $url");
    }
    $_SESSION['option'] = 'delete';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HWK15</title>
</head>

<body>
    <h1>Delete Student Record</h1>
    <form action="./database.php" method="POST">
            <label for="id">ID:</label>
            <input type="text" name="id" id="id" required><br>
        <input type="submit" value="Delete">
        <input type="reset" value="Reset">
    </form>
</body>
</html>