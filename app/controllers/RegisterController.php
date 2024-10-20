<?php
class RegisterController {
    public function showRegisterForm(): void
    {
        require_once '/Users/basarcelebi/Documents/GitHub/nutriPT/app/ui/view/register/register_view.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm-password'] ?? '';

            if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
                $error = "All fields are required.";
                require 'app/ui/view/register/register_view.php';
                return;
            }

            if ($password !== $confirmPassword) {
                $error = "Passwords do not match.";
                require 'app/ui/view/register/register_view.php';
                return;
            }


            header("Location: /login");
            exit;
        }
    }
}
