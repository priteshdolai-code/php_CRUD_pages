<?php
session_start();
include "db.php"; // Ensure database connection

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username']; // Logged-in user

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://static.vecteezy.com/system/resources/previews/008/063/100/large_2x/rear-view-portrait-of-young-man-traveler-with-backpack-standing-on-a-mountain-with-arms-spread-open-travel-life-style-and-adventure-concept-free-photo.jpg') no-repeat center center fixed;
            background-size: cover;
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
            color: white !important;
            font-weight: bold;
        }
        .container {
            margin-top: 50px;
        }
        .blog-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .blog-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
        .btn-edit {
            background-color: #ffc107;
            color: black;
            border-radius: 5px;
            padding: 5px 10px;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
        }
        .btn-primary {
            border-radius: 5px;
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
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="upload.php">Upload Blog</a></li> -->
            </ul>
            <span class="nav-item me-3"><a class="nav-link" href="logout.php">Logout</a></span>
            <span class="nav-item text-white"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; ?></span>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-5">
<h2 class="text-center" style="color:rgb(0, 0, 0);">Travel Blogs</h2>

    <div class="row">
        <?php
        $sql = "SELECT * FROM blogs ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4">';
                echo '<div class="blog-card">';
                echo '<img src="' . htmlspecialchars($row['image_url']) . '" class="blog-img" alt="Blog Image">';
                echo '<h3>' . htmlspecialchars($row['location']) . '</h3>';
                echo '<p><strong>By:</strong> ' . htmlspecialchars($row['username']) . '</p>';
                echo '<p><strong>Date:</strong> ' . htmlspecialchars($row['date']) . '</p>';
                echo '<p><strong>Rating:</strong> ' . htmlspecialchars($row['rating']) . '/5</p>';
                echo '<p><strong>Cost:</strong> ' . htmlspecialchars($row['cost']) . '</p>';
                echo '<p><strong>Security:</strong> ' . htmlspecialchars($row['security']) . '</p>';
                // echo '<a href="view_blog.php?id=' . $row['id'] . '" class="btn btn-primary">Read More</a>';

                if ($_SESSION['username'] === $row['username']) {
                    echo '<a href="edit.php?id=' . $row['id'] . '" class="btn btn-edit ms-2">Edit</a>';
                    echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-delete ms-2' onclick=\"return confirm('Are you sure you want to delete this blog?');\">Delete</a>";
                }

                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p class='text-white text-center'>No blogs available.</p>";
        }
        $conn->close();
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
