<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - nutriPT</title>
    <?php
    $baseURL = 'http://localhost:63342/nutriPT'; 
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
        <p class="signup-link">Don't have an account? <a href="<?php echo $baseURL; ?>/register">Register here</a></p>
    </form>
</div>

<?php if (isset($_SESSION['login_success'])): ?>
    <div class="toast" id="toast">Giriş başarılı!</div>
    <?php unset($_SESSION['login_success']); ?>
<?php endif; ?>

<script>
    const toast = document.getElementById('toast');
    if (toast) {
        toast.style.opacity = 1; 
        setTimeout(() => {
            toast.style.opacity = 0; 
        }, 3000); 
    }
</script>

</body>
</html>
