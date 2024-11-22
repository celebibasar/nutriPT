<?php
if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    header('Location: /login');
    exit();
}

$userData = $_SESSION['user']; // Kullanıcı bilgilerini al

$step = 2;
$steps = [1, 2, 3];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['nutrition_plan']['vegetarian'] = $_POST['vegetarian'] ?? $_SESSION['nutrition_plan']['vegetarian'];
    $_SESSION['nutrition_plan']['meal_preference'] = $_POST['meal_preference'] ?? $_SESSION['nutrition_plan']['meal_preference'];
    $_SESSION['nutrition_plan']['meal_count'] = $_POST['meal_count'] ?? $_SESSION['nutrition_plan']['meal_count'];

    if ($step < count($steps)) {
        $nextStep = $step + 1;
        header("Location: /step$nextStep");
        exit();
    }
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
    <title>Create Nutrition Plan - Step <?php echo $step; ?></title>
</head>
<?php
    include_once __DIR__ . '/../navbar.php';
?>
<body>

    <ul class="progress-bar">
        <?php foreach ($steps as $i): ?>
            <li class="<?php echo ($i < $step) ? 'completed' : ($i == $step ? 'current' : ''); ?>">
                <span>Step <?php echo $i; ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="forms-container">
        <h1>Step <?php echo $step; ?>: Meal Preferences</h1>

        <form method="POST">
            <div class="input-group">
                <h2>Select your meal preferences and habits</h2>

                <label for="vegetarian">Are you vegetarian?</label>
                <select name="vegetarian" id="vegetarian" required>
                    <option value="No" <?php echo ($_SESSION['nutrition_plan']['vegetarian'] ?? '') === 'No' ? 'selected' : ''; ?>>No</option>
                    <option value="Yes" <?php echo ($_SESSION['nutrition_plan']['vegetarian'] ?? '') === 'Yes' ? 'selected' : ''; ?>>Yes</option>
                </select>

                <label for="meal_preference">What is your preferred type of meals?</label>
                <select name="meal_preference" id="meal_preference" required>
                    <option value="Traditional" <?php echo ($_SESSION['nutrition_plan']['meal_preference'] ?? '') === 'Traditional' ? 'selected' : ''; ?>>Traditional Meals</option>
                    <option value="Quick Meals" <?php echo ($_SESSION['nutrition_plan']['meal_preference'] ?? '') === 'Quick Meals' ? 'selected' : ''; ?>>Quick Meals</option>
                    <option value="Balanced Meals" <?php echo ($_SESSION['nutrition_plan']['meal_preference'] ?? '') === 'Balanced Meals' ? 'selected' : ''; ?>>Balanced Meals</option>
                </select>

                <label for="meal_count">How many meals do you typically have per day?</label>
                <input type="number" name="meal_count" id="meal_count" value="<?php echo htmlspecialchars($_SESSION['nutrition_plan']['meal_count'] ?? ''); ?>" min="1" max="7" required>
            </div>

            <div class="actions">
                <?php if ($step > 1): ?>
                    <a href="/step<?php echo $step - 1; ?>" class="cta-button">Back</a>
                <?php endif; ?>
                <button type="submit" class="cta-button"><?php echo $step == 3 ? 'Finish' : 'Next'; ?></button>
            </div>
        </form>

    </div>
</body>
</html>
