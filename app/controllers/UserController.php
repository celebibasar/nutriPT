<?php
class UserController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
        session_start(); // Oturum yönetimi için session_start() ekleyin
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $goal = $_POST['goal'];
            $weight = str_replace(',', '.', $_POST['weight']); // Virgülleri noktaya çevirin
            $height = $_POST['height'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];

            // Parolalar eşleşiyor mu?
            if ($password !== $confirmPassword) {
                $_SESSION['error'] = "Passwords do not match!";
                header('Location: /nutriPT/register');
                return;
            }

            // Email zaten var mı?
            if ($this->userModel->isEmailExist($email)) {
                $_SESSION['error'] = "Email already exists!";
                header('Location: /nutriPT/register');
                return;
            }

            // Kayıt işlemi başarılı mı?
            if ($this->userModel->register($username, $name, $surname, $email, $age, $goal, $weight, $height, $password)) {
                $_SESSION['login_success'] = true; // Giriş başarılı mesajı için session
                header('Location: /login');
            } else {
                $_SESSION['error'] = "Registration failed!";
                header('Location: /nutriPT/register');
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Veritabanından kullanıcıyı e-posta ile al
            $user = $this->userModel->getUserByEmail($email);
    
            // Kullanıcı var mı ve şifre doğru mu?
            if ($user && password_verify($password, $user['password'])) {
                // Kullanıcıyı oturuma kaydet
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['email'] = $user['email'];
                $_SESSION['user'] = [
                    'name' => $user['name'],
                    'surname' => $user['surname'],
                    'username' => $user['username'], // Kullanıcı adı ekleniyor
                    'email' => $user['email'], // E-posta ekleniyor
                    'age' => $user['age'], // Yaş ekleniyor
                    'weight' => $user['weight'], // Kilo ekleniyor
                    'height' => $user['height'], // Boy ekleniyor
                    'profile_image' => $user['profile_image'] // Profil resmi
                ];
                $_SESSION['login_success'] = true;
    
                // Giriş başarılı ise anasayfaya yönlendir
                header('Location: /nutriPT/home');
                exit();
            } else {
                // Hatalı giriş durumunda
                $_SESSION['error'] = "Invalid email or password!";
                header('Location: /nutriPT/login');
                exit();
            }
        }
    }

    public function updateUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_SESSION['user']['email'];
            $username = $_POST['username'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $age = $_POST['age'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];

            $profileImage = null;
            if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
                $profileImage = file_get_contents($_FILES['profile_image']['tmp_name']);
            }

            $result = $this->userModel->updateUserByEmail($email, $username, $name, $surname, $age, $weight, $height, $profileImage);

            if ($result) {
                header('Location: /profile');
                exit();
            } else {
                echo "Failed to update profile.";
            }
        }
    }
    

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /nutriPT/home');
        exit();
    }
}
?>
