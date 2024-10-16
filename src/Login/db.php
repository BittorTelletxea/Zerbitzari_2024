<?php
$servername = "db";  // docker-compose.yml begiratu
$username = "root";
$password = "root";
$dbname = "myDB"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
