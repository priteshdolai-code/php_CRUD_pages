<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Travel Blog</title>
</head>
<body>
    <h1>Welcome to Travel Blog</h1>
    <p>Logged in as: <?php echo $_SESSION['username']; ?> | <a href="logout.php">Logout</a></p>
    <a href="upload.php">Upload Blog</a>
    <a href="blogs.php">See Blogs</a>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Home</title>
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
        .navbar-brand {
            background-color: #ffffff;
            border-radius: 50%;
            padding: 10px;
            color: white;
            font-weight: bold;
        }
        .logo {
            height: 40px; /* Adjust height */
            width: 40px; /* Adjust width */
            object-fit: contain; /* Maintain aspect ratio */
            margin-right: 10px;
        }
        .nav-link {
            color: blueviolet !important;
            font-weight: bold;
        }
        .btn-custom {
            background-color: #ff3333;
            color: white;
            font-weight: bold;
            border-radius: 20px;
            padding: 10px 20px;
        }
        .btn-custom:hover {
            background-color: #cc0000;
        }
        .center-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15%;
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
    
    <!-- Center Buttons -->
    <div class="container center-buttons">
        <a href="blogs.php" class="btn btn-custom">See Blogs</a>
        <a href="upload.php" class="btn btn-custom">Add Blog</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

