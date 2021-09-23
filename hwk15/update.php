<?php
    session_start();
    if (!isset($_SESSION['loggedin'])){
        $url = "./login.html";
        header("Location: $url");
    }
    $_SESSION['option'] = 'update';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HWK15</title>
</head>

<body>
    <h1>Insert Student Record</h1>
    <form action="./database.php" method="POST">
    <table>
        <tr>
            <td><label for="id">ID:</label></td>
            <td><input type="text" name="id" id="id" required></td>
        </tr>
        <tr>
            <td><label for="last">Last Name:</label></td>
            <td><input type="text" name="last" id="last"></td>
        </tr>
        <tr>
            <td><label for="first">First Name:</label></td>
            <td><input type="text" name="first" id="first"></td>
        </tr>
        <tr>
            <td><label for="major">Major:</label></td>
            <td><input type="text" name="major" id="major"></td>
        </tr>
        <tr>
            <td><label for="gpa">GPA:</label></td>
            <td><input type="text" name="gpa" id="gpa"></td>
        </tr>
    </table>
        <input type="submit" value="Insert">
        <input type="reset" value="Reset">
    </form>
</body>
</html>