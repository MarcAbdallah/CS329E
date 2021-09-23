<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>The PQ Report</title>
    <link rel="stylesheet" href="./hwk13.css">
</head>


<body>
    <h1>The PQ Report</h1>
    <?php
        if(!isset($_COOKIE['loggedin'])) {
            include "./login.php";
        }
        else{
            if (isset($_GET['story'])){
                $story = $_GET['story'];
                $url = "./news$story.html";
                header( "Location: $url" );
            }
            else{
                $url = "./hwk13.html";
                header( "Location: $url" );
            }
        }
        
    ?>
</body>

