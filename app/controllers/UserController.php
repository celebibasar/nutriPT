<?php
class UserController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $goal = $_POST['goal'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];
    
            if ($password !== $confirmPassword) {
                $_SESSION['error'] = "Passwords do not match!";
                header('Location: /register');
                return;
            }
    
            if ($this->userModel->isEmailExist($email)) {
                $_SESSION['error'] = "Email already exists!";
                header('Location: /register');
                return;
            }
    
            if ($this->userModel->register($username, $name, $surname, $email, $age, $goal, $weight, $height, $password)) {
                header('Location: /login');
            } else {
                $_SESSION['error'] = "Registration failed!";
                header('Location: /register');
            }
        }
    }
    
    


    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            if ($this->userModel->login($email, $password)) {
                $_SESSION['login_success'] = true; 
                header('Location: /nutriPT/home'); 
                exit();
            } else {
                $_SESSION['error'] = "Invalid email or password!";
                header('Location: /login');
                exit();
            }
        }
    }


    public function logout() {
        session_destroy();
        header('Location: /login');
    }
}
?>
