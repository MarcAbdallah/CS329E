<?php

print <<<TOP
<html>
<head>
<title> Database Access </title>
</head>
<body>
<h3> Database Access </h3>
TOP;

$host = "summer-2021.cs.utexas.edu";
$user = "cs329e_mitra_marcabd";
$pwd = "Topaz2Divine2Infer";
$dbs = "cs329e_mitra_marcabd";
$port = "3306";

$mysqli = new mysqli($host, $user, $pwd, $dbs);

if ($mysqli->connect_errno)
{
  die("mysqli_connect failed: " . mysqli_connect_errno());
}

print "Connected to ". $mysqli->host_info . "\n";

$mysqli->close();

print <<<BOTTOM
</body>
</html>
BOTTOM;
?>