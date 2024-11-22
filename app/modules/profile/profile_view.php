<?php
if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    header('Location: /login');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php require_once __DIR__ . '/../styles/style.css'?>
    </style>
    <title>Profile</title>
</head>
<?php
    include_once __DIR__ . '/../navbar.php';
?>
<body>
    <div class="profile-container">
        <h1>User Profile</h1>
        <div class="profile-card">
            <div class="profile-header">
                <!-- Profil resmini göster -->
                <img src="<?php echo htmlspecialchars($userData['profile_image'] ?? '/images/default-profile.png'); ?>" alt="Profile Image" class="profile-image-large">
                <div class="profile-info">
                    <div class="profile-item">
                        <h2 class="user-name"><?php echo htmlspecialchars($userData['name'] ?? '') . ' ' . htmlspecialchars($userData['surname'] ?? ''); ?></h2>
                    </div>
                </div>
            </div>
            <div class="profile-details">
                <div class="profile-item">
                    <p><strong>Username:</strong> <?php echo htmlspecialchars($userData['username'] ?? ''); ?></p>
                </div>
                <div class="profile-item">
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email'] ?? ''); ?></p>
                </div>
                <div class="profile-item">
                    <p><strong>Age:</strong> <?php echo htmlspecialchars($userData['age'] ?? '-'); ?></p>
                </div>
                <div class="profile-item">
                    <p><strong>Weight:</strong> <?php echo htmlspecialchars($userData['weight'] ?? '-'); ?> kg</p>
                </div>
                <div class="profile-item">
                    <p><strong>Height:</strong> <?php echo htmlspecialchars($userData['height'] ?? '-'); ?> cm</p>
                </div>
            </div>
        </div>
        <div class="profile-actions">
            <a href="/edit-profile" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</body>
</html>
