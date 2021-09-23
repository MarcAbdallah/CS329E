<?php
    session_start();
    if (!isset($_SESSION['loggedin'])){
        $url = "./login.html";
        header("Location: $url");
    }
?>

<html>
<head>
<title>HWK15</title>
<meta charset="utf-8">
<link rel="stylesheet" href="./hwk15.css">
</head>
<body>

<?php
$host = "summer-2021.cs.utexas.edu";
$user = "cs329e_mitra_marcabd";
$pwd = "Topaz2Divine2Infer";
$dbs = "cs329e_mitra_marcabd";
$port = "3306";
$table = "STUDENTS";
$mysqli = new mysqli($host, $user, $pwd, $dbs);

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

if (empty($connect))
{
    die("mysqli_connect failed: " . mysqli_connect_errno());
}
if ($_SESSION['option'] == 'insert'){
        echo "<h1>Insert Student Record</h1>";

        $id = $_POST['id'];
        $last = $_POST['last'];
        $first = $_POST['first'];
        $major = $_POST['major'];
        $gpa = $_POST['gpa'];
        
        $stmt = $mysqli->prepare("INSERT INTO $table VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('isssd', $id, $last, $first, $major, $gpa);

        $stmt->execute();

        printf("%d row inserted.\n", $stmt->affected_rows);

        $mysqli->close();
    }

else if ($_SESSION['option'] == 'update'){
    echo "<h1>Update Student Record</h1>";     
        $id = $_POST['id'];
        $result = mysqli_query($connect, "SELECT * FROM $table WHERE ID=$id");
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_row();
            $last_ = $row[1];
            $first_ = $row[2];
            $major_ = $row[3];
            $gpa_ = $row[4];
            $result->free();
            if (isset($_POST['last']) && trim($_POST['last']) !== "") {
                $last_ = $_POST['last'];
            }
            if (isset($_POST['first']) && trim($_POST['first']) !== "") {
                $first_ = $_POST['first'];
            }
            if (isset($_POST['major']) && trim($_POST['major']) !== "") {
                $major_ = $_POST['major'];
            }
            if (isset($_POST['gpa']) && trim($_POST['gpa']) !== "") {
                $gpa_ = $_POST['gpa'];
            }
            mysqli_query($connect, "DELETE FROM $table WHERE ID=$id");
            $stmt = $mysqli->prepare("INSERT INTO $table VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('isssd', $id, $last_, $first_, $major_, $gpa_);

            $stmt->execute();

            printf("%d row updated.\n", $stmt->affected_rows);
          } else {
            echo "No student with ID $id found";
        }
    }

else if ($_SESSION['option'] == 'delete'){
    echo "<h1>Delete Student Record</h1>";     
        $id = $_POST['id'];
        mysqli_query($connect, "DELETE FROM $table WHERE ID=$id");
        printf("%d row deleted.\n", $stmt->affected_rows);
        $mysqli->close();
    }

else if ($_SESSION['option'] == 'view'){
    echo "<h1>View Student Record</h1>";
    if ($_POST['submit'] == 'View All Student Records'){
        $result = mysqli_query($connect, "SELECT * FROM $table ORDER BY LAST, FIRST");
    }
    else{
        $id = $_POST['id'];
        $last = $_POST['last'];
        $first = $_POST['first'];
        if (isset($_POST['id']) && trim($_POST['id']) !== "") {
            $result = mysqli_query($connect, "SELECT * FROM $table WHERE ID=$id ORDER BY LAST, FIRST");
        }
        if(isset($_POST['last']) && trim($_POST['last']) !== ""){
            $result = mysqli_query($connect, "SELECT * FROM $table WHERE LAST=\"$last\" ORDER BY LAST, FIRST");
        }
        if(isset($_POST['first']) && trim($_POST['first']) !== ""){
            $result = mysqli_query($connect, "SELECT * FROM $table WHERE FIRST=\"$first\" ORDER BY LAST, FIRST");
        }
        if(isset($_POST['first']) && trim($_POST['first']) !== "" && isset($_POST['last']) && trim($_POST['last']) !== ""){
            $result = mysqli_query($connect, "SELECT * FROM $table WHERE (FIRST = \"$first\" AND LAST = \"$last\") ORDER BY LAST, FIRST");
        }
    }
    echo "<table><thead><tr><td>ID</td><td>Last Name</td><td>First Name</td><td>Major</td><td>GPA</td></tr></thead>";
    while ($row = $result->fetch_row()){
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
    }
    echo "</table>";
}
?>
<br>
<a href="./main.php">Back To Database Access</a>
</body>
</html>