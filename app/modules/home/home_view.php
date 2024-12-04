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
    <?php
    $redirectURL = isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ? '/step1' : "$baseURL/login";

    $email = $_SESSION['email'] ?? null;

    $userData = $this->userModel->getUserByEmail($email);


    $userId = null;
    if($userData == null)
    {
        $userId = null;
    }else{
        $userId = $userData['user_id'];
    };
    $hasMealPlan = false; 

    if ($userId) {
        $db = new PDO("mysql:host=localhost;dbname=nutriPT;charset=utf8", "root", "1234567b");

        $query = $db->prepare("SELECT COUNT(*) FROM user_meal_plans WHERE user_id = :user_id");
        $query->execute(['user_id' => $userId]);

        // Sonucu al
        $planCount = $query->fetchColumn();
        if ($planCount > 0) {
            $hasMealPlan = true;
        }
    }

    // Kullanıcı planı varsa yönlendirilecek URL
    if ($hasMealPlan) {
        $redirectURL = "/meal_plan_calendar";
    }
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
            <a href="<?php echo $redirectURL; ?>" class="cta-button">
                Get Started
            </a>
        </div>
    </section>

    <section class="categories">
        <div class="container">
            <h2>Explore Our Meal Categories</h2>
            <div class="categories-grid">
                <div class="category-item">
                    <a href="/meals/vegan" class="category-link">
                        <img src="/../images/vegan-category.jpg" alt="Vegan Meals">
                        <h3>Vegan</h3>
                    </a>
                </div>
                <div class="category-item">
                    <a href="/meals/diet" class="category-link">
                        <img src="/../images/diet-category.jpg" alt="Diet Meals">
                        <h3>Diet</h3>
                    </a>
                </div>
                <div class="category-item">
                    <a href="/meals/low-carb" class="category-link">
                        <img src="/../images/low-carb.jpg" alt="LowCarb Meals">
                        <h3>Low Carb</h3>
                    </a>
                </div>
            </div>
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
