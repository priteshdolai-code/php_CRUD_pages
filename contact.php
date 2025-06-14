<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Travel Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?travel,world') no-repeat center center fixed;
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

    <!-- Contact Us Section -->
    <div class="container mt-5">
        <h2 class="text-center">Contact Us</h2>
        <p class="text-center">Got questions? We’d love to hear from you! Reach out for travel tips, collaborations, or general inquiries.</p>

        <hr>

        <h4>About Our Travel Blog</h4>
        <p>
            Travel Blog is your one-stop destination for discovering hidden gems, planning amazing adventures, and connecting with fellow travelers. 
            We provide travel guides, personal experiences, and expert tips to make your journey unforgettable. Whether you're a backpacker or a luxury traveler, 
            we've got something for you!
        </p>

        <hr>

        <h4>Contact Information</h4>
        <p class="contact-info"><strong>📍 Location:</strong> 123 Travel Street, Wanderlust City, Country</p>
        <p class="contact-info"><strong>📞 Phone:</strong> +123 456 7890</p>
        <p class="contact-info"><strong>📧 Email:</strong> support@travelblog.com</p>

        <hr>

        <h4>Send Us a Message</h4>
        <form method="POST" action="send_message.php">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea name="message" class="form-control" rows="5" placeholder="Type your message here..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>

        <hr>

        <h4>Find Us on the Map</h4>
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509365!2d144.95373631531748!3d-37.81627917975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5773c81b68b9b4d!2sTravel%20Adventure%20HQ!5e0!3m2!1sen!2sus!4v1647022042521!5m2!1sen!2sus" 
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>

        <hr>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">Back to Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
