<?php

if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin' || !$_SESSION['isLoggedIn'] || !isset($_SESSION['isLoggedIn'])) {
    header('Location: /home');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $calories = $_POST['calories'];
    $protein = $_POST['protein'];
    $carbs = $_POST['carbs'];
    $fat = $_POST['fat'];
    $image_url = $_POST['image_url'];

    $this->mealModel->addMeal($name, $description, $calories, $protein, $carbs, $fat, $image_url);

    header("Location: /nutriPT/admin/meals_list");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Meal - Admin Panel</title>
    <style>
        <?php require_once __DIR__ . '/../styles/style.css' ?>
    </style>
</head>
<?php include_once __DIR__ . '/../navbar.php'; ?>
<body>
    <div class="container">
        <h1>Add a New Meal</h1>
        <form action="<?php echo $baseURL; ?>/admin/add_meal" method="POST">
            <div class="form-group">
                <label for="name">Meal Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="calories">Calories</label>
                <input type="number" id="calories" name="calories" required>
            </div>
            <div class="form-group">
                <label for="protein">Protein (g)</label>
                <input type="number" id="protein" name="protein" required>
            </div>
            <div class="form-group">
                <label for="carbs">Carbs (g)</label>
                <input type="number" id="carbs" name="carbs" required>
            </div>
            <div class="form-group">
                <label for="fat">Fat (g)</label>
                <input type="number" id="fat" name="fat" required>
            </div>
            <div class="form-group">
                <label for="image_url">Image URL</label>
                <input type="text" id="image_url" name="image_url" required>
            </div>
            <button type="submit" class="button">Add Meal</button>
        </form>
    </div>
</body>
</html>
