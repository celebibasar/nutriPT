<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - nutriPT</title>
    <?php
    $baseURL = 'http://localhost:63342/nutriPT'; // Base URL tanımı
    ?>
    <style>
        <?php require_once "style.css"?>
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Login to nutriPT</h1>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-message"><?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <form action="/login" method="POST">
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Login</button>
        <p>Don't have an account? <a href="<?php echo $baseURL; ?>/register">Register here</a></p>
    </form>
</div>
</body>
</html>
