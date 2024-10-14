<?php
// Database connection details
$host = 'localhost';  // Database host
$user = 'root';       // Database username
$password = '';       // Database password
$dbname = 'javajam';  // Your database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>