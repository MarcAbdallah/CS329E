<!DOCTYPE html>

<html><head>
    <title>Green Team</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./base.css">
    <link rel="stylesheet" href="./login.css">

</head>
<body class="vsc-initialized">
    <div id="banner">
        <div id="green-team">Login</div>
        <div id="class-name">CS329E Summer 2021</div>
        <a href="./homepage.html">
            <img id="logo" src="./GTlogo.png" alt="GTlogo">
        </a>
        <div id="background-banner"></div>
    </div>
    
    <div id="navigation">
        <div id="footprint" class="nav" onclick="location.href='./footprint.php'">My Carbon Footprint</div>
        <div id="ocean" class="nav" onclick="location.href='./ocean.html'">Ocean Pollution</div>
        <div id="ice" class="nav" onclick="location.href='./ice.html'">Ice Sheets</div>
        <div id="urban" class="nav" onclick="location.href='./heatislands.html'">Urban Heat Islands</div>
        <div id="animal-plant" class="nav" onclick="location.href='./aplife.html'">Animal/Plant Life</div>
        <div id="human-health" class="nav" onclick="location.href='./humanhealth.html'">Human Health</div>
    </div>

    <div id="main">
        <div id="login" class="grid-item">
            <h1>Login</h1>
            <?php 
                session_start();
                if (isset($_COOKIE['current_user'])){
                    $current_user = $_COOKIE['current_user'];
                    echo "<p style=\"font-weight: bold\">Current User: $current_user</p>";
                }
            ?>
            <form onsubmit="check1(event)" action="./checklogin.php" method="POST">
                <table>
                    <tr>
                        <td><label for="username">User Name: </label></td>
                        <td><input type="text" name="username" id="username"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password: </label></td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Login" class="button"></td>
                        <td><input type="reset" value="Reset" class="button"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="create" class="grid-item">
            <h1>Create New Account</h1>
            <form onsubmit="check2(event)" action="./newaccount.php" method="POST">
            <table>
                    <tr>
                        <td><label for="user">User Name: </label></td>
                        <td><input type="text" name="user" id="user" onchange="ajax()"></td>
                    </tr>
                    <tr>
                        <td><label for="pw">Password: </label></td>
                        <td><input type="password" name="pw" id="pw"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Create Account" class="button"></td>
                        <td><input type="reset" value="Reset" class="button"></td>
                    </tr>
                </table>
            </form>
        </div>
        <script src="./login.js"></script>
    </div>

</body></html>