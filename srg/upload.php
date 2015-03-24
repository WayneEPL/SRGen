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

$sql = "INSERT INTO requests (id, stu_id, form_name, email, status) VALUES (UNIX_TIMESTAMP(), '15', 'bonafide.pdf', 'athulbraj@gmail.com', '0')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>