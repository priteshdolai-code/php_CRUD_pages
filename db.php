<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "travel_blog";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
