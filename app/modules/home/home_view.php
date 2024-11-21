<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nutriPT - Home</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/images/nutriPT-White-Transparent.png">
    <?php
    $baseURL = 'http://localhost:63342/nutriPT'; 
    ?>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <!-- Google Font -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Icons -->
    <style>
        <?php require_once __DIR__ . '/../styles/style.css'?>
    </style>
</head>

<?php
    include_once __DIR__ . '/../navbar.php';
?>
<body>

<main>
    <section class="hero">
        <div class="hero-content">
            <h1>Unlock Your Best Self</h1>
            <p>Personalized Nutrition and Fitness Plans Just for You.</p>
            <a href="<?php echo $baseURL; ?>/services" class="cta-button">Get Started</a>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2>Why Choose nutriPT?</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <i class="fas fa-dumbbell"></i>
                    <h3>Expert Trainers</h3>
                    <p>Work with certified nutritionists and personal trainers to achieve your goals.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-apple-alt"></i>
                    <h3>Personalized Nutrition</h3>
                    <p>Receive tailored meal plans based on your body type and goals.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-heartbeat"></i>
                    <h3>Health Tracking</h3>
                    <p>Monitor your progress with our easy-to-use tracking tools.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container">
        <p>&copy; 2024 nutriPT. All Rights Reserved.</p>
        <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
    </div>
</footer>
</body>
</html>
