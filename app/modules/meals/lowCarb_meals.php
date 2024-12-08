<?php
// Örnek veri, veritabanından dinamik olarak çekilebilir.
$low_carb_meals = [
    [
        'name' => 'Grilled Chicken with Asparagus',
        'image' => '/images/grilled-chicken-asparagus.jpg',
        'description' => 'Grilled chicken breast served with fresh asparagus and a lemon dressing.',
        'carbs' => '5g',
        'protein' => '35g',
        'fat' => '10g'
    ],
    [
        'name' => 'Zucchini Noodles with Pesto',
        'image' => '/images/zucchini-noodles-pesto.jpg',
        'description' => 'Zucchini noodles tossed with a delicious homemade pesto sauce.',
        'carbs' => '8g',
        'protein' => '6g',
        'fat' => '18g'
    ],
    [
        'name' => 'Eggplant Parmesan',
        'image' => '/images/eggplant-parmesan.jpg',
        'description' => 'Baked eggplant with low-fat mozzarella cheese and marinara sauce.',
        'carbs' => '12g',
        'protein' => '18g',
        'fat' => '14g'
    ],
    [
        'name' => 'Salmon with Roasted Vegetables',
        'image' => '/images/salmon-roasted-vegetables.jpg',
        'description' => 'Baked salmon fillet served with a side of roasted low-carb vegetables.',
        'carbs' => '6g',
        'protein' => '28g',
        'fat' => '16g'
    ],
    [
        'name' => 'Avocado Chicken Salad',
        'image' => '/images/avocado-chicken-salad.jpg',
        'description' => 'Grilled chicken on a bed of greens with avocado, cucumbers, and a low-carb dressing.',
        'carbs' => '7g',
        'protein' => '30g',
        'fat' => '20g'
    ],
    [
        'name' => 'Cauliflower Rice Stir Fry',
        'image' => '/images/cauliflower-rice-stirfry.jpg',
        'description' => 'Low-carb cauliflower rice stir-fried with vegetables and a touch of soy sauce.',
        'carbs' => '10g',
        'protein' => '5g',
        'fat' => '8g'
    ],
    [
        'name' => 'Beef and Broccoli',
        'image' => '/images/beef-broccoli.jpg',
        'description' => 'Sautéed beef strips with broccoli in a low-carb soy sauce.',
        'carbs' => '9g',
        'protein' => '26g',
        'fat' => '14g'
    ],
    [
        'name' => 'Grilled Shrimp with Spinach',
        'image' => '/images/grilled-shrimp-spinach.jpg',
        'description' => 'Grilled shrimp on a bed of sautéed spinach with garlic and olive oil.',
        'carbs' => '4g',
        'protein' => '25g',
        'fat' => '7g'
    ],
    [
        'name' => 'Chicken Lettuce Wraps',
        'image' => '/images/chicken-lettuce-wraps.jpg',
        'description' => 'Grilled chicken wrapped in fresh lettuce leaves with a low-carb dressing.',
        'carbs' => '5g',
        'protein' => '30g',
        'fat' => '9g'
    ],
    [
        'name' => 'Cabbage Stir Fry with Tofu',
        'image' => '/images/cabbage-stirfry-tofu.jpg',
        'description' => 'Stir-fried cabbage with tofu and a savory low-carb sauce.',
        'carbs' => '10g',
        'protein' => '15g',
        'fat' => '12g'
    ],
    [
        'name' => 'Pork Tenderloin with Brussel Sprouts',
        'image' => '/images/pork-tenderloin-brussel-sprouts.jpg',
        'description' => 'Roast pork tenderloin served with a side of sautéed Brussel sprouts.',
        'carbs' => '6g',
        'protein' => '35g',
        'fat' => '18g'
    ],
    [
        'name' => 'Chicken Parmesan (Low-Carb)',
        'image' => '/images/low-carb-chicken-parmesan.jpg',
        'description' => 'Chicken breast topped with marinara sauce and parmesan cheese, served with a side of low-carb zucchini noodles.',
        'carbs' => '10g',
        'protein' => '35g',
        'fat' => '20g'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Low Carb Meals - nutriPT</title>
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
            <h1>Discover Low Carb Meals</h1>
            <p>Delicious and healthy meals to keep your carbs low and your nutrition high.</p>
        </div>
    </section>

    <!-- Low Carb Meal List -->
    <section class="meal-list">
        <div class="container">
            <h2>Low Carb Meal Options</h2>
            <div class="meal-grid">
                <?php foreach ($low_carb_meals as $meal): ?>
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
