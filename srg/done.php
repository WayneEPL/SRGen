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

echo $sql = "UPDATE `requests` SET `status` = 2,`filename`= '".$_GET['fname']."' WHERE `id` = '".$_GET['id']."'";
echo $result = $conn->query($sql);
//echo var_dump($result);

$conn->close();
?>