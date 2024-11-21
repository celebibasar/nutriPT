<?php
// Kullanıcı oturumu kontrolü
if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    header('Location: /login');
    exit();
}

// Kullanıcı bilgilerini SESSION'dan al
$userData = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php require_once __DIR__ . '/../styles/style.css'?>
    </style>
    <title>Edit Profile</title>
</head>
<?php
    include_once __DIR__ . '/../navbar.php';
?>
<body>
    <div class="profile-edit-container">
        <h1>Edit Profile</h1>
        <!-- Profil düzenleme formu -->
        <form action="/edit-profile" method="POST" class="edit-profile-form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($userData['username'] ?? ''); ?>" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userData['name'] ?? ''); ?>" required>

            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($userData['surname'] ?? ''); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userData['email'] ?? ''); ?>" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($userData['age'] ?? ''); ?>" required>

            <label for="goal">Goal:</label>
            <input type="text" id="goal" name="goal" value="<?php echo htmlspecialchars($userData['goal'] ?? ''); ?>" required>

            <label for="weight">Weight (kg):</label>
            <input type="number" step="0.1" id="weight" name="weight" value="<?php echo htmlspecialchars($userData['weight'] ?? ''); ?>" required>

            <label for="height">Height (cm):</label>
            <input type="number" id="height" name="height" value="<?php echo htmlspecialchars($userData['height'] ?? ''); ?>" required>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="/profile" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
