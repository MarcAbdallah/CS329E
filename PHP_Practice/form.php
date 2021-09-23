
<?php
  # hard code the form input
  $username = $_POST['user'];
  $pw = $_POST['pw'];
  # open file for reading
  $inFile = fopen ("./passwd", "r");

  # boolean flag 
  $found = false;

  # read file line by line
  while (!feof($inFile)) {
    $line = fgets($inFile);
    $line = trim($line);
    $tokens = explode (":", $line);
    if ($userName == $tokens[0]) {
	    print($username);
	    print($tokens[0]);
      $found = true;
      break;
    }
  }

  # close file
  fclose ($inFile);

  # if found alert user
  if ($found) {
    print ("Registration Failed. User Name taken. \n");
  }
  else {
    print ("Registration Successful. \n");
    $outFile = fopen ("./passwd", "a");
    $str = strval($userName) . ":" . strval($userPaswd) . "\n";
    fwrite ($outFile, $str);
    fclose ($outFile);
  }
?>
