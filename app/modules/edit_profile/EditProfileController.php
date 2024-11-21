<?php
class EditProfileController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function index() {
        // Kullanıcının giriş yapıp yapmadığını kontrol et
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: /login');
            exit();
        }

        // Profil güncelleme işlemi
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $goal = $_POST['goal'];
            $weight = str_replace(',', '.', $_POST['weight']); // Virgül yerine nokta kullanımı
            $height = $_POST['height'];

            // Kullanıcıyı güncelle
            if ($this->userModel->updateUserByEmail($email, $username, $name, $surname, $age, $goal, $weight, $height)) {
                $_SESSION['success'] = "Profile updated successfully!";
                header('Location: /profile');
                exit();
            } else {
                $_SESSION['error'] = "Failed to update profile!";
            }
        }

        // Kullanıcı verilerini çek
        $email = $_SESSION['email'];
        $user = $this->userModel->getUserByEmail($email);

        // Kullanıcı verilerini view'a gönder
        include_once __DIR__ . '/edit_profile_view.php';
    }
}
?>
