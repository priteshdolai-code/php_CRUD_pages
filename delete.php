<?php
session_start();
include "db.php"; // Ensure database connection

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$id = $_GET['id'] ?? '';

$sql = "DELETE FROM blogs WHERE id='$id' AND username='$username'";
if ($conn->query($sql) === TRUE) {
    header("Location: blogs.php"); // Redirect back to blogs page
} else {
    echo "Error: " . $conn->error;
}
?>
