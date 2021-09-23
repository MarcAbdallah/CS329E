<?php
    echo "<link rel='stylesheet' type='text/css' href='./signup.css'>";
?>

<!DOCTYPE html>

<html>
<head>
    <title> Sign Up Sheet </title>
    <meta charset="utf=8">
</head>

<body class="vsc-initialized">
<div class="center">
    <h2> Sign Up Sheet </h2>
</div>

<form action="./signup.php" method="GET">
<table>
    <tbody>
    <tr>
        <th> Time </th><th> Name </th>
    </tr>
    <?php
        $file = fopen("./signup.txt", "r");
        $times = ["8:00 am", "9:00 am", "10:00 am", "11:00 am", "12:00 pm", "1:00 pm", "2:00 pm", "3:00 pm", "4:00 pm", "5:00 pm"];
        while (($line = fgets($file)) !== false){
            $linearray = explode(":", $line);
            $array[$linearray[0]] = $linearray[1];
            //echo($linearray[0]. "%" . $linearray[1]);
        }
        fclose($file);

        for ($i = 0; $i < 10; $i++) {
            if (array_key_exists($i, $array)){
                echo "<tr><td>$times[$i]</td><td>$array[$i]</td></tr>";
            }
            else{
                echo "<tr><td>$times[$i]</td><td><input type=\"text\" name=\"$i\"></td></tr>";
            }
        }

    ?>
    <tr>
        <td> <input type="submit" value="Submit" class="button"></td>
        <td> <input type="reset" value="Reset" class="button"></td>
    </tr>
    </tbody></table>
</form>
</body></html>