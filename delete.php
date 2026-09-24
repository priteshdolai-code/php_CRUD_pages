<?php
session_start();
include "db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$id = $_GET['id'] ?? '';

if (!$id || !is_numeric($id)) {
    header("Location: blogs.php");
    exit();
}

$stmt = $conn->prepare("DELETE FROM blogs WHERE id = ? AND username = ?");
$stmt->bind_param("is", $id, $username);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: blogs.php");
exit();
?>
