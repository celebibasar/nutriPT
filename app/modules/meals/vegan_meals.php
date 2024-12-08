<?php
$veganMeals = $this->mealModel->getMealsByType('vegan');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegan Meals - nutriPT</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/images/nutriPT-White-Transparent.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        <?php require_once __DIR__ . '/../styles/style.css'?>
    </style>
</head>

<?php
    include_once __DIR__ . '/../navbar.php';
?>

<body>
<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Discover Delicious Vegan Meals</h1>
            <p>Plant-based, nutritious, and mouth-watering meals just for you.</p>
        </div>
    </section>

    <!-- Vegan Meal List -->
    <section class="meal-list">
        <div class="container">
            <h1>Vegan Meals</h1>
            <?php if (!empty($veganMeals)): ?>
                <div class="meal-grid">
                    <?php foreach ($veganMeals as $meal): ?>
                        <div class="meal-item">
                            <img src="<?php echo $meal['image_url']; ?>" alt="<?php echo $meal['name']; ?>">
                            <h3><?php echo $meal['name']; ?></h3>
                            <p><?php echo $meal['description']; ?></p>
                            <ul>
                                <li><strong>Calories:</strong> <?php echo $meal['calories']; ?> kcal</li>
                                <li><strong>Protein:</strong> <?php echo $meal['protein']; ?> g</li>
                                <li><strong>Carbs:</strong> <?php echo $meal['carbs']; ?> g</li>
                                <li><strong>Fat:</strong> <?php echo $meal['fat']; ?> g</li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No vegan meals found.</p>
            <?php endif; ?>
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
