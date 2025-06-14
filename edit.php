<?php
session_start();
include "db.php"; // Ensure database connection

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$id = $_GET['id'] ?? '';

if (!$id || !is_numeric($id)) {
    echo "<script>alert('Invalid blog ID'); window.location='blogs.php';</script>";
    exit();
}

// Fetch blog details
$stmt = $conn->prepare("SELECT * FROM blogs WHERE id=? AND username=?");
$stmt->bind_param("is", $id, $username);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();
$stmt->close();

if (!$blog) {
    echo "<script>alert('You do not have permission to edit this blog.'); window.location='blogs.php';</script>";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = htmlspecialchars($_POST['location']);
    $date = $_POST['date'];
    $rating = intval($_POST['rating']);
    $image_url = htmlspecialchars($_POST['image_url']);
    $cost = htmlspecialchars($_POST['cost']);
    $security = htmlspecialchars($_POST['security']);

    $stmt = $conn->prepare("UPDATE blogs SET location=?, date=?, rating=?, image_url=?, cost=?, security=? WHERE id=? AND username=?");
    $stmt->bind_param("ssisssis", $location, $date, $rating, $image_url, $cost, $security, $id, $username);

    if ($stmt->execute()) {
        echo "<script>alert('Blog updated successfully!'); window.location='blogs.php';</script>";
    } else {
        echo "<script>alert('Error updating blog.');</script>";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog - Travel Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://static.vecteezy.com/system/resources/previews/008/063/100/large_2x/rear-view-portrait-of-young-man-traveler-with-backpack-standing-on-a-mountain-with-arms-spread-open-travel-life-style-and-adventure-concept-free-photo.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 500px;
        }
        .btn-custom {
            background-color: #ff3333;
            color: white;
            font-weight: bold;
            border-radius: 20px;
        }
        .btn-custom:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center">Edit Your Blog</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($blog['location']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($blog['date']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Rating (1-5)</label>
                <input type="number" name="rating" class="form-control" min="1" max="5" value="<?= htmlspecialchars($blog['rating']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Image URL</label>
                <input type="text" name="image_url" class="form-control" value="<?= htmlspecialchars($blog['image_url']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Cost</label>
                <input type="text" name="cost" class="form-control" value="<?= htmlspecialchars($blog['cost']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Security Level</label>
                <input type="text" name="security" class="form-control" value="<?= htmlspecialchars($blog['security']); ?>" required>
            </div>
            <button type="submit" class="btn btn-custom w-100">Update Blog</button>
        </form>
        <div class="text-center mt-3">
            <a href="blogs.php" class="btn btn-primary">Back to Blogs</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
