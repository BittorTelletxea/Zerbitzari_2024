class Database{

$servername = "db";  
$username = "root";
$password = "root";
$dbname = "eguraldia"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
}