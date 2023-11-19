<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectsdsdsd";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Close connection
$conn->close();

?>