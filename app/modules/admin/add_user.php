<?php

if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin' || !$_SESSION['isLoggedIn'] || !isset($_SESSION['isLoggedIn'])) {
    header('Location: /home');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission for adding a user
    $username = $_POST['username'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $result = $this->userModel->addUser($username, $name, $surname ,$email, $role, $password);
    if ($result) {
        $successMessage = "User added successfully!";
        header("Location: /nutriPT/admin/users_list");
    } else {
        $errorMessage = "Failed to add user.";
        header("Location: /nutriPT/admin/add_user");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Meal - Admin Panel</title>
    <style>
        <?php require_once __DIR__ . '/../styles/style.css' ?>
    </style>
</head>
<?php include_once __DIR__ . '/../navbar.php'; ?>
<body>
    <div class="container">
        <h2>Add New User</h2>

        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <?php if (isset($successMessage)): ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php endif; ?>

        <!-- User Add Form -->
        <form action="<?php echo $baseURL; ?>/admin/add_user" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" id="surname" name="surname" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>
</body>
</html>