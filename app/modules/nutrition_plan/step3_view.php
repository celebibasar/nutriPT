<?php

if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    header('Location: /login');
    exit();
}

$userData = $_SESSION['user']; 

$step = 3;

$steps = [1, 2, 3];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    header("Location: /home");
        exit();
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
    <title>Step 3: Personal Details</title>
</head>
<body>
    <!-- Step Progress Bar -->
    <ul class="progress-bar">
        <?php foreach ($steps as $i): ?>
            <li class="<?php echo ($i < $step) ? 'completed' : ($i == $step ? 'current' : ''); ?>">
                <span>Step <?php echo $i; ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="forms-container">
        <h1>Step 3: Personal Details and Goal Finalization</h1>

        <!-- Step 3 Form -->
        <form method="POST">
            <div class="input-group">
                <h2>Step 3: Personal Data & Goal Refinement</h2>

                <label for="height">Height (cm):</label>
                <input type="number" name="height" id="height" value="<?php echo htmlspecialchars($userData['height'] ?? ''); ?>" min="100" max="250" required>

                <label for="weight">Weight (kg):</label>
                <input type="number" step="0.1" name="weight" id="weight" value="<?php echo htmlspecialchars($userData['weight'] ?? ''); ?>" min="30" max="200" required>

                <label for="age">Age:</label>
                <input type="number" name="age" id="age" value="<?php echo htmlspecialchars($userData['age'] ?? ''); ?>" min="18" max="100" required>

                <label for="activity_level">Activity Level:</label>
                <select name="activity_level" id="activity_level" required>
                    <option value="Sedentary" <?php echo ($userData['activity_level'] ?? '') === 'Sedentary' ? 'selected' : ''; ?>>Sedentary (Little or no exercise)</option>
                    <option value="Light" <?php echo ($userData['activity_level'] ?? '') === 'Light' ? 'selected' : ''; ?>>Lightly active (Light exercise/sports 1-3 days/week)</option>
                    <option value="Moderate" <?php echo ($userData['activity_level'] ?? '') === 'Moderate' ? 'selected' : ''; ?>>Moderately active (Moderate exercise/sports 3-5 days/week)</option>
                    <option value="Active" <?php echo ($userData['activity_level'] ?? '') === 'Active' ? 'selected' : ''; ?>>Very active (Hard exercise/sports 6-7 days/week)</option>
                    <option value="Super Active" <?php echo ($userData['activity_level'] ?? '') === 'Super Active' ? 'selected' : ''; ?>>Super active (Very hard exercise/sports and physical job)</option>
                </select>
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
