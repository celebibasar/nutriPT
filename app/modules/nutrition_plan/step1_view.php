<?php
// Kullanıcının oturum açıp açmadığını kontrol et
if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    header('Location: /login');
    exit();
}

$userData = $_SESSION['user']; // Kullanıcı bilgilerini al

// Adım kontrolü
$step = isset($_GET['step']) ? (int)$_GET['step'] : 1;
$steps = [1, 2, 3];

// Form submit edildiğinde yönlendirme işlemi yapılacak
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verileri SESSION'a kaydet
    $_SESSION['nutrition_plan']['goal'] = $_POST['goal'] ?? $_SESSION['nutrition_plan']['goal'];
    $_SESSION['nutrition_plan']['activity_level'] = $_POST['activity_level'] ?? $_SESSION['nutrition_plan']['activity_level'];
    $_SESSION['nutrition_plan']['daily_calories'] = $_POST['daily_calories'] ?? $_SESSION['nutrition_plan']['daily_calories'];

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
        <h1>Step <?php echo $step; ?>: Nutrition Plan Creation</h1>

        <form method="POST">
            <div class="input-group">
                <h2>Select your goal</h2>
                <select id="goal" name="goal" class="edit-input" required>
                    <option value="" disabled selected>Select your goal</option>
                    <option value="Lose Weight" <?php echo ($_SESSION['nutrition_plan']['goal'] ?? '') === 'Lose Weight' ? 'selected' : ''; ?>>Lose Weight</option>
                    <option value="Gain Muscle" <?php echo ($_SESSION['nutrition_plan']['goal'] ?? '') === 'Gain Muscle' ? 'selected' : ''; ?>>Gain Muscle</option>
                    <option value="Maintain Weight" <?php echo ($_SESSION['nutrition_plan']['goal'] ?? '') === 'Maintain Weight' ? 'selected' : ''; ?>>Maintain Weight</option>
                </select>
            </div>

            <div class="input-group">
                <h2>Enter your daily activity level</h2>
                <select name="activity_level" required>
                    <option value="Low" <?php echo ($_SESSION['nutrition_plan']['activity_level'] ?? '') === 'Low' ? 'selected' : ''; ?>>Low</option>
                    <option value="Moderate" <?php echo ($_SESSION['nutrition_plan']['activity_level'] ?? '') === 'Moderate' ? 'selected' : ''; ?>>Moderate</option>
                    <option value="High" <?php echo ($_SESSION['nutrition_plan']['activity_level'] ?? '') === 'High' ? 'selected' : ''; ?>>High</option>
                </select>
            </div>

            <div class="input-group">
                <h2>Enter your desired daily calories</h2>
                <input type="number" name="daily_calories" value="<?php echo htmlspecialchars($_SESSION['nutrition_plan']['daily_calories'] ?? ''); ?>" required placeholder="Enter your daily calorie target">
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
