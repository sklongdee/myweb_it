<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_it";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//mysqli_query($conn, "utf8");
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?> 