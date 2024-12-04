<?php
// Örnek veri, veritabanından dinamik olarak çekilebilir.
$diet_meals = [
    [
        'name' => 'Grilled Chicken Salad',
        'image' => '/images/grilled-chicken-salad.jpg',
        'description' => 'A fresh salad with grilled chicken, mixed greens, and a light vinaigrette.',
        'carbs' => '15g',
        'protein' => '30g',
        'fat' => '8g'
    ],
    [
        'name' => 'Turkey Wrap',
        'image' => '/images/turkey-wrap.jpg',
        'description' => 'Whole wheat wrap filled with turkey, veggies, and a low-fat dressing.',
        'carbs' => '20g',
        'protein' => '25g',
        'fat' => '9g'
    ],
    [
        'name' => 'Vegetable Stir-fry',
        'image' => '/images/vegetable-stirfry.jpg',
        'description' => 'Stir-fried vegetables with tofu and a light soy sauce.',
        'carbs' => '30g',
        'protein' => '12g',
        'fat' => '7g'
    ],
    [
        'name' => 'Tuna Salad',
        'image' => '/images/tuna-salad.jpg',
        'description' => 'Tuna with mixed greens, tomatoes, and a low-fat dressing.',
        'carbs' => '10g',
        'protein' => '20g',
        'fat' => '5g'
    ],
    [
        'name' => 'Chicken & Quinoa Bowl',
        'image' => '/images/chicken-quinoa-bowl.jpg',
        'description' => 'Grilled chicken over quinoa with roasted vegetables.',
        'carbs' => '35g',
        'protein' => '40g',
        'fat' => '12g'
    ],
    [
        'name' => 'Egg White Omelette',
        'image' => '/images/egg-white-omelette.jpg',
        'description' => 'Egg whites with spinach, mushrooms, and a sprinkle of low-fat cheese.',
        'carbs' => '5g',
        'protein' => '20g',
        'fat' => '3g'
    ],
    [
        'name' => 'Protein Smoothie',
        'image' => '/images/protein-smoothie.jpg',
        'description' => 'A protein-packed smoothie with almond milk, banana, and protein powder.',
        'carbs' => '25g',
        'protein' => '30g',
        'fat' => '7g'
    ],
    [
        'name' => 'Zucchini Noodles with Turkey Meatballs',
        'image' => '/images/zucchini-noodles.jpg',
        'description' => 'Zucchini noodles served with lean turkey meatballs and marinara sauce.',
        'carbs' => '18g',
        'protein' => '30g',
        'fat' => '10g'
    ],
    [
        'name' => 'Cottage Cheese with Fruit',
        'image' => '/images/cottage-cheese-fruit.jpg',
        'description' => 'A serving of cottage cheese topped with fresh berries.',
        'carbs' => '12g',
        'protein' => '20g',
        'fat' => '6g'
    ],
    [
        'name' => 'Baked Salmon with Veggies',
        'image' => '/images/baked-salmon.jpg',
        'description' => 'Baked salmon fillet served with steamed broccoli and asparagus.',
        'carbs' => '15g',
        'protein' => '35g',
        'fat' => '16g'
    ],
    [
        'name' => 'Cucumber & Hummus Salad',
        'image' => '/images/cucumber-hummus-salad.jpg',
        'description' => 'A refreshing salad with cucumbers, tomatoes, and hummus dressing.',
        'carbs' => '12g',
        'protein' => '6g',
        'fat' => '8g'
    ],
    [
        'name' => 'Greek Yogurt with Almonds',
        'image' => '/images/greek-yogurt-almonds.jpg',
        'description' => 'Creamy Greek yogurt topped with sliced almonds and honey.',
        'carbs' => '15g',
        'protein' => '25g',
        'fat' => '10g'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Meals - nutriPT</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/images/nutriPT-White-Transparent.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        <?php require_once __DIR__ . '/../styles/style.css'?>
        .meal-nutrition {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }
        .meal-nutrition p {
            margin: 0;
        }
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
            <h1>Discover Healthy Diet Meals</h1>
            <p>Nutritious meals that fit your fitness goals and dietary needs.</p>
        </div>
    </section>

    <!-- Diet Meal List -->
    <section class="meal-list">
        <div class="container">
            <h2>Diet Meal Options</h2>
            <div class="meal-grid">
                <?php foreach ($diet_meals as $meal): ?>
                    <div class="meal-card">
                        <img src="<?= $meal['image'] ?>" alt="<?= $meal['name'] ?>">
                        <div class="meal-info">
                            <h3><?= $meal['name'] ?></h3>
                            <p><?= $meal['description'] ?></p>
                            <div class="meal-nutrition">
                                <p><strong>Carbs:</strong> <?= $meal['carbs'] ?></p>
                                <p><strong>Protein:</strong> <?= $meal['protein'] ?></p>
                                <p><strong>Fat:</strong> <?= $meal['fat'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
