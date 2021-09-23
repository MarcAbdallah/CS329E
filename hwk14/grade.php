<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || !isset($_SESSION['question'])){
		$url = "./login.php";
		header( "Location: $url" );
	}
    else{
        $question = $_SESSION['question'];
        if ($question == 1){
            $answer = $_POST['q1'];
            if ($answer == 'False'){
                $_SESSION['score'] += 10;
            }
        }

        else if ($question == 2){
            $answer = $_POST['q2'];
            if ($answer == 'True'){
                $_SESSION['score'] += 10;
            }
        }

        else if ($question == 3){
           $answer = $_POST['q3'];
           if (count($answer) == 1 && $answer[0] == 'b'){
                $_SESSION['score'] += 10;
           }
        }

        else if ($question == 4){
            $answer = $_POST['q4'];
            if (count($answer) == 1 && $answer[0] == 'd'){
                 $_SESSION['score'] += 10;
            }
        }

        else if ($question == 5){
            $answer = $_POST['q5'];
            if (strtolower($answer) == 'galaxy'){
                $_SESSION['score'] += 10;
            }
        }

        else if ($question == 6){
            $answer = $_POST['q6'];
            if (strtolower($answer) == 'age'){
                $_SESSION['score'] += 10;
            }
            $url = "./score.php";
            header( "Location: $url" );
        }

        if ($question != 6){
            $_SESSION['question']++;
            $url = "./hwk14.php";
            header( "Location: $url" );
        }
    }
?>