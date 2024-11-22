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
        <?php require_once __DIR__ . '/../styles/style.css' ?>
    </style>
    <title>Edit Profile</title>
</head>
<?php include_once __DIR__ . '/../navbar.php'; ?>
<body>
    <div class="profile-container">
        <h1>Edit Profile</h1>
        <form action="/edit-profile" method="POST" class="edit-profile-form" enctype="multipart/form-data">
            <div class="profile-card">
                <div class="profile-header">
                    <!-- Profil Resmi -->
                    <label for="profile_image" class="profile-image-label">
                        <img 
                            src="<?php echo htmlspecialchars($userData['profile_image'] ?? '/images/default-profile.png'); ?>" 
                            alt="Profile Image" 
                            class="profile-image-large"
                            id="profileImagePreview"
                        >
                        <input 
                            type="file" 
                            id="profile_image" 
                            name="profile_image" 
                            accept="image/*" 
                            style="display: none;" 
                            onchange="previewImage(event)"
                        >
                    </label>
                    <div class="profile-info">
                        <div class="profile-item">
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userData['name'] ?? ''); ?>" class="edit-input name-input" required>
                            <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($userData['surname'] ?? ''); ?>" class="edit-input surname-input" required>
                        </div>
                    </div>
                </div>
                <div class="profile-details">
                    <div class="profile-item">
                        <label for="username"><strong>Username:</strong></label>
                        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($userData['username'] ?? ''); ?>" class="edit-input" required>
                    </div>
                    <div class="profile-item">
                        <label for="email"><strong>Email:</strong></label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userData['email'] ?? ''); ?>" class="edit-input" required>
                    </div>
                    <div class="profile-item">
                        <label for="age"><strong>Age:</strong></label>
                        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($userData['age'] ?? ''); ?>" class="edit-input" required>
                    </div>
                    <div class="profile-item">
                        <label for="weight"><strong>Weight:</strong></label>
                        <input type="number" step="0.1" id="weight" name="weight" value="<?php echo htmlspecialchars($userData['weight'] ?? ''); ?>" class="edit-input" required>
                    </div>
                    <div class="profile-item">
                        <label for="height"><strong>Height:</strong></label>
                        <input type="number" id="height" name="height" value="<?php echo htmlspecialchars($userData['height'] ?? ''); ?>" class="edit-input" required>
                    </div>
                </div>
            </div>
            <div class="profile-actions">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="/profile" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
