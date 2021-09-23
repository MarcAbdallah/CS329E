<h3>Create Account</h3>
<form method="POST" action="./createaccount.php">
    <label for="username">Username: </label>
    <input type="text" name="username" required>
    <label for="pw">Password: </label>
    <input type="text" name="pw" required>
    <input type="submit" value="Submit">

</form>

<h3>Log In</h3>
<form method="POST" action="./checklogin.php">
    <label for="username">Username: </label>
    <input type="text" name="username" required>
    <label for="pw">Password: </label>
    <input type="password" name="pw" required>
    <input type="submit" value="Submit">

</form>