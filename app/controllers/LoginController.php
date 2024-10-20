<?php

class LoginController {

    public function showLoginForm(): void
    {
        require_once '/Users/basarcelebi/Documents/GitHub/nutriPT/app/ui/view/login/login_view.php';
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        require_once 'app/models/UserModel.php';
        $userModel = new UserModel();
        $user = $userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /home');
            exit;
        } else {
            $_SESSION['error'] = 'Invalid email or password.';
            header('Location: /login');
            exit;
        }
    }
}
