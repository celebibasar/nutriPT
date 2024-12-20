<?php

if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin' || !$_SESSION['isLoggedIn'] || !isset($_SESSION['isLoggedIn'])) {
    header('Location: /home');
    exit();
}

$mealId = $_GET['id'];


$meal = $this->mealModel->getMealById($mealId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $calories = $_POST['calories'];
    $protein = $_POST['protein'];
    $carbs = $_POST['carbs'];
    $fat = $_POST['fat'];
    $image_url = $_POST['image_url'];

    $this->mealModel->updateMeal($mealId, $name, $description, $calories, $protein, $carbs, $fat, $image_url);

    header('Location: /nutriPT/admin/meals_list');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php require_once __DIR__ . '/../styles/style.css' ?>
    </style>
    <title>Edit Meal</title>
</head>
<?php include_once __DIR__ . '/../navbar.php'; ?>
<body>

<h1>Edit Meal</h1>

<form action="" method="POST">
    <label for="name">Meal Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $meal['name']; ?>" required><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required><?php echo $meal['description']; ?></textarea><br>

    <label for="calories">Calories:</label>
    <input type="number" id="calories" name="calories" value="<?php echo $meal['calories']; ?>" required><br>

    <label for="protein">Protein:</label>
    <input type="number" id="protein" name="protein" value="<?php echo $meal['protein']; ?>" required><br>

    <label for="carbs">Carbs:</label>
    <input type="number" id="carbs" name="carbs" value="<?php echo $meal['carbs']; ?>" required><br>

    <label for="fat">Fat:</label>
    <input type="number" id="fat" name="fat" value="<?php echo $meal['fat']; ?>" required><br>

    <label for="image_url">Image URL:</label>
    <input type="text" id="image_url" name="image_url" value="<?php echo $meal['image_url']; ?>"><br>

    <button type="submit">Update Meal</button>
</form>

</body>
</html>
