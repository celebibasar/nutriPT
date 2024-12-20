<?php

if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin' || !$_SESSION['isLoggedIn'] || !isset($_SESSION['isLoggedIn'])) {
    header('Location: /home');
    exit();
}

$meals = $this->mealModel->getAllMeals(); // MealModel'den tüm yemekleri al

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $baseURL = 'http://localhost:63342/nutriPT'; 
    ?>
    <title>Manage Meals - Admin Panel</title>
    <style>
        <?php require_once __DIR__ . '/../styles/style.css'?>   
    </style>
</head>

<?php
    include_once __DIR__ . '/../navbar.php';
?>
<body>

<header>
    <h1>Manage Meals</h1>
</header>

<div class="container">
    <div class="header">
        <h2>All Meals</h2>
        <a href="<?php echo $baseURL; ?>/admin/add_meal" class="button add-button">Add</a>
    </div>
    <table class="meal-list">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th>Calories</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($meals as $meal): ?>
                <tr>
                    <td><img src="<?php echo $meal['image_url']; ?>" alt="<?php echo $meal['name']; ?>"></td>
                    <td><?php echo $meal['name']; ?></td>
                    <td><?php echo ucfirst($meal['type']); ?></td>
                    <td><?php echo $meal['description']; ?></td>
                    <td><?php echo $meal['calories']; ?> kcal</td>
                    <td class="action-buttons">
                        <a href="/nutriPT/admin/edit_meal?id=<?php echo $meal['id']; ?>" class="button">Edit</a>
                        <a href="/nutriPT/admin/remove_meal?id=<?php echo $meal['id']; ?>" class="button" style="background-color: #dc3545;">Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
