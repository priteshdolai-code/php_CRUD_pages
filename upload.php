<?php
session_start();
include "db.php"; // Ensure database connection

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $location = htmlspecialchars($_POST['location']);
    $date = $_POST['date'];
    $rating = intval($_POST['rating']);
    $image_url = htmlspecialchars($_POST['image_url']);
    $cost = htmlspecialchars($_POST['cost']);
    $security = htmlspecialchars($_POST['security']);
    $username = $_SESSION['username'];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO blogs (username, location, date, rating, image_url, cost, security) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisss", $username, $location, $date, $rating, $image_url, $cost, $security);

    if ($stmt->execute()) {
        echo "<script>alert('Blog uploaded successfully!'); window.location='blogs.php';</script>";
    } else {
        echo "<script>alert('Error uploading blog.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Blog - Travel Blog</title>
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
        .navbar {
            background-color: #9c8871;
            padding: 10px;
        }
        .logo {
            height: 40px;
            width: 40px;
            object-fit: contain;
            margin-right: 10px;
        }
        .nav-link {
            color: blueviolet !important;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="https://thumbs.dreamstime.com/b/vector-traveller-icon-8056957.jpg" alt="Logo" class="logo">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
                </ul>
                <span class="nav-item me-3"><a class="nav-link" href="logout.php">Logout</a></span>
                <span class="nav-item"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; ?></span>
            </div>
        </div>
    </nav>

    <!-- Upload Blog Form -->
    <div class="container mt-5">
        <h2 class="text-center">Upload Your Blog</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Rating (1-5)</label>
                <input type="number" name="rating" class="form-control" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Image URL</label>
                <input type="text" name="image_url" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Cost</label>
                <input type="text" name="cost" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Security Level</label>
                <input type="text" name="security" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-custom w-100">Upload</button>
        </form>
        <div class="text-center mt-3">
            <a href="blogs.php" class="btn btn-primary">See Blogs</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
