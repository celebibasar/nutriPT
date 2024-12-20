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
    <?php
    $baseURL = 'http://localhost:63342/nutriPT'; 
    ?>
    <title>Manage Meals - Admin Panel</title>
    <style>
        <?php require_once __DIR__ . '/../styles/style.css'?>   
    </style>
</head>

<?php
    include_once __DIR__ . '/../navbar.php';
?>
<body>

<header>
    <h1>Manage Meals</h1>
</header>


<div class="container">
    <div class="header">
        <h2>All Users</h2>
        <?php
            $baseURL = 'http://localhost:63342/nutriPT'; 
        ?>
        <a href="<?php echo $baseURL; ?>/admin/add_user" class="button add-button">Add User</a>
    </div>

    <!-- Users Table -->
    <table class="meal-list">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['user_id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td class="action-buttons">
                        <a href="<?php echo $baseURL; ?>/admin/edit_user?id=<?php echo $user['user_id']; ?>" class="button">Edit</a>
                        <a href="<?php echo $baseURL; ?>/admin/remove_user?id=<?php echo $user['user_id']; ?>" class="button" style="background-color: #dc3545;">Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>