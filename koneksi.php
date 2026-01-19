<?php
$servername = "localhost";
$username = "root";
$password = "";
$nama_database="kampus";

// Create connection
$conn = new mysqli($servername, $username, $password,$nama_database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
