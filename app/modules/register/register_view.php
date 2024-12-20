<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nutriPT - Register</title>
    <?php
    $baseURL = 'http://localhost:63342/nutriPT'; // Base URL tanımı
    ?>
    <style>
        <?php require_once __DIR__ . '/../styles/style.css'?>
    </style>
</head>
<?php
    include_once __DIR__ . '/../navbar.php';
?>
<body>

<div class="forms-container">
    <h1>Create an Account</h1>
    <form action="/register" method="POST">
        <div class="input-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="input-group">
            <label for="surname">Surname</label>
            <input type="text" id="surname" name="surname" required>
        </div>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="input-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
        </div>
        <div class="error-message" id="error-message"></div>
        
        <button type="submit" class="btn">Register</button>

        <p class="login-link">Already have an account? <a href="<?php echo $baseURL; ?>/login">Login</a></p>
    </form>
</div>


</body>
</html>
