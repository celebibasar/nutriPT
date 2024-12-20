<?php
if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin' || !$_SESSION['isLoggedIn'] || !isset($_SESSION['isLoggedIn'])) {
    header('Location: /home');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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

<header>
    <h1>Admin Panel</h1>
</header>

<div class="admin-container">
    <div class="admin-menu">
        <h2>Admin Actions</h2>
        <ul>
            <li><a href="<?php echo $baseURL; ?>/admin/meals_list">Manage Meals</a></li>
            <li><a href="<?php echo $baseURL; ?>/admin/add_meal">Add Meal</a></li>
            <li><a href="<?php echo $baseURL; ?>/admin/users_list">Manage Users</a></li>
        </ul>
    </div>

    <div class="admin-content">
        <h2>Welcome, Admin!</h2>
        <p>Select an action from the menu to manage the system.</p>
    </div>
</div>

</body>
</html>
