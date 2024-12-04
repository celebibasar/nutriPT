<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nutriPT - Services</title>
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
        <h1>Our Services</h1>
        <p>Comprehensive Solutions to Help You Achieve Your Health and Fitness Goals</p>
    </div>
</section>

<main>
    <section class="services-introduction">
        <div class="container">
            <h2>Our Expert Services</h2>
            <p>At NutriPT, we offer a range of personalized health and wellness services designed to cater to your unique needs. Whether you want to get in shape, eat healthier, or improve your overall well-being, we have the tools and expertise to help you succeed. Below are the services we offer:</p>
        </div>
    </section>

    <section class="services-list">
        <div class="container">
            <div class="services-grid">
                <div class="service-item">
                    <h3>Personalized Meal Plans</h3>
                    <p>Our certified nutritionists create meal plans tailored to your goals, whether you're looking to lose weight, build muscle, or improve your overall health. Each meal plan is nutritionally balanced and customized just for you.</p>
                </div>
                <div class="service-item">
                    <h3>Fitness Programs</h3>
                    <p>Our fitness experts design personalized workout routines that fit your lifestyle and fitness level. Whether you're a beginner or an experienced athlete, we have a plan that will help you achieve your fitness goals.</p>
                </div>
                <div class="service-item">
                    <h3>Progress Tracking</h3>
                    <p>Keep track of your progress with our easy-to-use health and fitness tracking tools. Monitor your workouts, meals, and overall wellness in one convenient place, and make adjustments as needed to stay on track.</p>
                </div>
                <div class="service-item">
                    <h3>Expert Advice</h3>
                    <p>Our team of certified nutritionists and personal trainers are available to provide expert advice whenever you need it. Whether you have a question about your meal plan, need workout tips, or want guidance on your wellness journey, we're here to help.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="services-contact">
        <div class="container">
            <h2>Get Started Today</h2>
            <p>Ready to take your health and fitness journey to the next level? Contact us today to get started with a personalized plan that fits your needs. Our team is here to support you every step of the way!</p>
            <a href="<?php echo $baseURL; ?>/contact" class="btn-primary">Contact Us</a>
        </div>
    </section>
</main>

<footer class="services-footer">
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
