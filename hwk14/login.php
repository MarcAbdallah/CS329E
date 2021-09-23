<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Astronomy Quiz Login</title>
    <link rel="stylesheet" href="./hwk14.css">
</head>

<body>
    <h1>Astronomy Quiz</h1>
    <?php
        session_start();
        echo '
        <h3>Log In</h3>
        <form method="POST" action="./checklogin.php">
        <label for="username">Username: </label>
        <input type="text" name="username" required>
        <label for="pw">Password: </label>
        <input type="password" name="pw" required>
        <input type="submit" value="Submit">
        </form>';
    ?>
</body>