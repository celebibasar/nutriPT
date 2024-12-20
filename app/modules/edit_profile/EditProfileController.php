<?php
class EditProfileController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function index() {
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: /login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $weight = str_replace(',', '.', $_POST['weight']);
            $height = $_POST['height'];
            $profileImage = $_POST['profile_image'];
            if ($this->userModel->updateUserByEmail($email, $username, $name, $surname, $age, $weight, $height, $profileImage)) {
                $_SESSION['success'] = "Profile updated successfully!";
                header('Location: /profile');
                exit();
            } else {
                $_SESSION['error'] = "Failed to update profile!";
            }
        }

        $userData = $this->userModel->getUserByEmail($_SESSION['email']);

        if (!$userData) {
            header('Location: /profile');
            exit();
        }
        require_once __DIR__ . '/edit_profile_view.php';
    }
}
?>
