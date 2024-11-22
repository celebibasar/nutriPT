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

        $userData = $this->userModel->getUserByEmail($_SESSION['email']);

        if (!$userData) {
            header('Location: /profile');
            exit();
        }
        require_once __DIR__ . '/edit_profile_view.php';
    }
}
?>
