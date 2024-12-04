<?php
// Örnek veri, veritabanından dinamik olarak çekilebilir.
$vegan_meals = [
    [
        'name' => 'Vegan Buddha Bowl',
        'image' => '/images/buddha-bowl.jpg',
        'description' => 'A healthy and colorful bowl filled with grains, vegetables, and tofu.',
        'carbs' => '30g',
        'protein' => '15g',
        'fat' => '10g'
    ],
    [
        'name' => 'Vegan Tacos',
        'image' => '/images/vegan-tacos.jpg',
        'description' => 'Soft tortillas filled with seasoned veggies, guacamole, and salsa.',
        'carbs' => '40g',
        'protein' => '12g',
        'fat' => '8g'
    ],
    [
        'name' => 'Vegan Avocado Salad',
        'image' => '/images/avocado-salad.jpg',
        'description' => 'Fresh avocado slices mixed with a variety of leafy greens and nuts.',
        'carbs' => '20g',
        'protein' => '5g',
        'fat' => '22g'
    ],
    [
        'name' => 'Lentil Soup',
        'image' => '/images/lentil-soup.jpg',
        'description' => 'A hearty soup made with lentils, carrots, and spices.',
        'carbs' => '35g',
        'protein' => '18g',
        'fat' => '7g'
    ],
    [
        'name' => 'Vegan Pizza',
        'image' => '/../images/vegan-pizza.jpg',
        'description' => 'A delicious pizza with a crispy crust topped with veggies and plant-based cheese.',
        'carbs' => '45g',
        'protein' => '10g',
        'fat' => '12g'
    ],
    [
        'name' => 'Chickpea Salad',
        'image' => '/images/chickpea-salad.jpg',
        'description' => 'Chickpeas, cucumber, and tomatoes tossed in a lemon-tahini dressing.',
        'carbs' => '30g',
        'protein' => '10g',
        'fat' => '8g'
    ],
    [
        'name' => 'Sweet Potato Fries',
        'image' => '/images/sweet-potato-fries.jpg',
        'description' => 'Crispy, baked sweet potato fries seasoned with paprika and garlic.',
        'carbs' => '50g',
        'protein' => '3g',
        'fat' => '15g'
    ],
    [
        'name' => 'Vegan Stir-fry',
        'image' => '/images/vegan-stirfry.jpg',
        'description' => 'A colorful stir-fry with tofu, broccoli, bell peppers, and soy sauce.',
        'carbs' => '35g',
        'protein' => '20g',
        'fat' => '12g'
    ],
    [
        'name' => 'Quinoa Salad',
        'image' => '/images/quinoa-salad.jpg',
        'description' => 'A fresh salad with quinoa, cucumbers, tomatoes, and avocado.',
        'carbs' => '40g',
        'protein' => '8g',
        'fat' => '14g'
    ],
    [
        'name' => 'Vegan Burrito',
        'image' => '/images/vegan-burrito.jpg',
        'description' => 'A large tortilla stuffed with seasoned rice, black beans, and avocado.',
        'carbs' => '55g',
        'protein' => '15g',
        'fat' => '18g'
    ],
    [
        'name' => 'Vegan Mac and Cheese',
        'image' => '/images/vegan-mac-and-cheese.jpg',
        'description' => 'Creamy vegan cheese sauce over pasta for a comfort food classic.',
        'carbs' => '60g',
        'protein' => '10g',
        'fat' => '22g'
    ],
    [
        'name' => 'Mushroom Risotto',
        'image' => '/images/mushroom-risotto.jpg',
        'description' => 'A rich and creamy risotto made with wild mushrooms and vegetable broth.',
        'carbs' => '50g',
        'protein' => '8g',
        'fat' => '15g'
    ]
];
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
            <h2>Vegan Meal Options</h2>
            <div class="meal-grid">
                <?php foreach ($vegan_meals as $meal): ?>
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
