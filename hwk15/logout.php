<?php
    session_start();
    session_destroy();
    $url = "./login.html";
    header("Location: $url");
?>