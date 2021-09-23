<?php
	session_start();
	if (!isset($_SESSION['loggedin'])){
		$url = "./login.php";
		header( "Location: $url" );
	}
?>

<!DOCTYPE html>

<html>
<head>
	<title>Astronomy Quiz</title>
	<link rel="stylesheet" href="./hwk14.css">
	<meta charset="UTF-8">
</head>
<body class="vsc-initialized">
	<h1>Astronomy Quiz</h1>

<?php
	function check_time(){
		if ((time() - $_SESSION['starttime']) > 900){
			$url = "./grade_unfinished.php";
			header( "Location: $url" );
		}
	}
	function quiz($question){
		if ($question == 1){
			include_once("./q1.html");
		}
		else if ($question == 2){
			include_once("./q2.html");
		}
		else if ($question == 3){
			include_once("./q3.html");
		}
		else if ($question == 4){
			include_once("./q4.html");
		}
		else if ($question == 5){
			include_once("./q5.html");
		}
		else if ($question == 6){
			include_once("./q6.html");
		}
	}
	check_time();
	quiz($_SESSION['question']);
?>



</body></html>
