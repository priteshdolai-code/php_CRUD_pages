<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Travel Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?travel,nature') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 800px;
        }
        .contact-info {
            font-size: 18px;
        }
        .map-container {
            border-radius: 10px;
            overflow: hidden;
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

    <!-- About Us Section -->
    <div class="container mt-5">
        <h2 class="text-center">About Us</h2>
        <p class="text-center">Welcome to <strong>Travel Blog</strong> - Your go-to platform for travel stories, experiences, and guides.</p>

        <hr>

        <h4>Contact Information</h4>
        <p class="contact-info"><strong>📍 Location:</strong> 123 Travel Street, Adventure City, Country</p>
        <p class="contact-info"><strong>📞 Phone:</strong> +123 456 7890</p>
        <p class="contact-info"><strong>📧 Email:</strong> contact@travelblog.com</p>

        <hr>

        <h4>Find Us on the Map</h4>
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509365!2d144.95373631531748!3d-37.81627917975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5773c81b68b9b4d!2sTravel%20Adventure%20HQ!5e0!3m2!1sen!2sus!4v1647022042521!5m2!1sen!2sus" 
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
        
        <hr>

        <h4>Our Mission</h4>
        <p>At <strong>Travel Blog</strong>, we strive to bring together passionate travelers from around the world. Share your experiences, find new destinations, and explore the world with us!</p>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">Back to Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
