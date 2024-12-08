<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nutriPT - About Us</title>
    <?php
    $baseURL = 'http://localhost:63342/nutriPT'; // Base URL tanımı
    ?>
    <style>
        <?php require_once __DIR__ . '/../styles/style.css'?>
    </style>
</head>
<?php
    include_once __DIR__ . '/../navbar.php';
?>
<body>

<section class="hero">
        <div class="hero-content">
            <h1>About nutriPT</h1>
            <p>Your Personal Nutrition and Fitness Journey Begins Here</p>
        </div>
    </section>

<main>
    <section class="about-mission">
        <div class="container">
            <h2>Our Mission</h2>
            <p>At NutriPT, our mission is to empower individuals to lead healthier lives through personalized nutrition and fitness plans. We combine the expertise of certified nutritionists and personal trainers to create a holistic approach to wellness. Whether you're aiming to lose weight, gain muscle, or simply eat healthier, we're here to support you every step of the way.</p>
        </div>
    </section>

    <section class="about-values">
        <div class="container">
            <h2>Our Core Values</h2>
            <div class="values-grid">
                <div class="value-item">
                    <h3>Expert Guidance</h3>
                    <p>We provide you with the best nutrition and fitness advice from certified experts to help you achieve your health goals.</p>
                </div>
                <div class="value-item">
                    <h3>Personalized Plans</h3>
                    <p>Your body is unique, and your nutrition and fitness plan should be too. We tailor everything to your specific needs.</p>
                </div>
                <div class="value-item">
                    <h3>Long-Term Health</h3>
                    <p>We focus on creating sustainable lifestyle changes rather than quick fixes. Health is a journey, and we're here for the long haul.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-team">
        <div class="container">
            <h2>Meet Our Team</h2>
            <p>Our team consists of highly skilled nutritionists, personal trainers, and health experts, all dedicated to helping you achieve your best self. We work together to ensure you have the support and guidance you need throughout your fitness and wellness journey.</p>
            <div class="team-grid">
                <div class="team-member">
                    <img src="/images/team-member1.jpg" alt="Team Member 1">
                    <h3>Başar Çelebi</h3>
                    <p>Certified Nutritionist</p>
                </div>
                <div class="team-member">
                    <img src="/images/team-member2.jpg" alt="Team Member 2">
                    <h3>Umut Aytuğ Semerci</h3>
                    <p>Personal Trainer</p>
                </div>
                <div class="team-member">
                    <img src="/images/team-member3.jpg" alt="Team Member 3">
                    <h3>Emircan Çapkan</h3>
                    <p>Health Coach</p>
                </div>
                <div class="team-member">
                    <img src="/images/team-member4.jpg" alt="Team Member 4">
                    <h3>Göktuğ Ateş</h3>
                    <p>Coach Assistant</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-what-we-do">
        <div class="container">
            <h2>What We Do</h2>
            <p>We offer a wide range of services to cater to your unique health and wellness needs. Whether you're looking for personalized meal plans, workout routines, or health tracking tools, we provide everything you need in one convenient platform. Here's what you can expect:</p>
            <ul>
                <li><strong>Custom Meal Plans:</strong> Nutritionally balanced meals designed to meet your specific goals.</li>
                <li><strong>Personalized Fitness Programs:</strong> Tailored workout routines to help you get stronger and healthier.</li>
                <li><strong>Progress Tracking:</strong> Stay on track with our easy-to-use health and fitness tracking tools.</li>
                <li><strong>Expert Advice:</strong> Access to professional nutritionists and trainers whenever you need it.</li>
            </ul>
        </div>
    </section>

</main>

<footer class="footer">
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
