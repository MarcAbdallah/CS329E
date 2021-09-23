<?php
    session_start();
    if (!isset($_SESSION['loggedin'])){
        $url = "./login.html";
        header("Location: $url");
    }
    $_SESSION['option'] = 'view';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HWK15</title>
</head>

<body>
    <h1>View Student Record</h1>
    <form action="./database.php" method="POST">
    <table>
        <tr>
            <td><label for="id">ID:</label></td>
            <td><input type="text" name="id" id="id"></td>
        </tr>
        <tr>
            <td><label for="last">Last Name:</label></td>
            <td><input type="text" name="last" id="last"></td>
        </tr>
        <tr>
            <td><label for="first">First Name:</label></td>
            <td><input type="text" name="first" id="first"></td>
        </tr>
    </table>
        <input type="submit" value="View" name="submit">
        <input type="reset" value="Reset"><br>
        <input type="submit" value="View All Student Records" name="submit">
    </form>
</body>
</html>