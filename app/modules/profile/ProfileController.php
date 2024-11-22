<?php
class ProfileController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function index() {
        $email = $_SESSION['user']['email'];

        $userData = $this->userModel->getUserByEmail($email);

        if (!$userData) {
            header('Location: /login');
            exit();
        }

        require_once __DIR__ . '/profile_view.php';
    }
}
?>
