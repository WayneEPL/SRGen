<?php
$servername = "localhost";
$username = "soealumni";
$password = "alumnisoe";
$dbname = "srgen";
error_reporting(E_ERROR);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (strcmp($_GET['api'],"hello")==0)
{
//"SELECT * FROM values WHERE `stu_id` = `".$_GET['id']."` AND `key` = `".$_GET['key']."`;";
$sql = "SELECT ".$_GET['key']." FROM users WHERE `user_id` = '".$_GET['id']."' LIMIT 1";
//echo $sql;
$result = $conn->query($sql);
//echo $sql."<br>";
//echo var_dump($result);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo $row["filename"];
        $a = $_GET['key'];
        echo $row[$a];
    }
} 
else {
    echo "NULL";
}
}
else{
	echo "Invalid API";
}
$conn->close();
?>