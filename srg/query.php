<?php
$servername = "localhost";
$username = "soealumni";
$password = "alumnisoe";
$dbname = "srgen";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM requests WHERE status = 0 LIMIT 1 ";
$result = $conn->query($sql);
//echo var_dump($result);

if ($result->num_rows > 0) {
    // output data of each rowa
    while($row = $result->fetch_assoc()) {
        echo $row["stu_id"].",".$row["form_name"].",".$row["id"];
        $delta = $row["id"];
    }
    $sql = "UPDATE requests SET status = status + 1 WHERE id = '$delta' ";
	$result = $conn->query($sql);
} 
else {
    echo "NULL";
}

$conn->close();
?>