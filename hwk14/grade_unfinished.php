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
        if (!isset($_SESSION['user'])){
            $url = "./login.php";
            header( "Location: $url" );
            exit;
        }
        $score = $_SESSION['score'];
        $user = $_SESSION['user'];
        $file = fopen("./results", "a");
        fwrite($file, "$user:$score\n");
        fclose($file);
        echo "Times up!\n";
        echo "You, $user, got a $score out of 60";
        session_destroy();
    ?>
</body>
</html>