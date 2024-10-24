<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nutriPT - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <?php
    $baseURL = 'http://localhost:63342/nutriPT'; // Base URL tanımı
    ?>
    <style>
        <?php require_once "style.css"?>
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <h1>Create an Account</h1>
    <form action="/register" method="POST">
        <div class="input-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>
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
