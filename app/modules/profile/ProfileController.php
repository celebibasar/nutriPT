<?php
class ProfileController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function index() {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $user = $_SESSION['user'];
            include_once __DIR__ . '/profile_view.php';
        } else {
            header('Location: /login');
            exit();
        }
    }
}
?>
