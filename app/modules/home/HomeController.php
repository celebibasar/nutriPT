<?php
class HomeController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }
    public function index(): void {
        // Oturumun başlatılmış olduğundan emin olun
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Kullanıcı giriş yapmış mı kontrol et
        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
            $userData = $this->userModel->getUserByEmail($_SESSION['email']);
        }
    
        // View dosyasını çağır
        require_once __DIR__ . '/home_view.php';
    }
    
    public function admin(): void {
        require_once __DIR__ . '/../admin/admin_panel.php';
    }
    public function about(): void
    {
        require_once __DIR__ . '/../about/about_view.php';
    }

    public function services(): void
    {
        require_once __DIR__ . '/../services/services_view.php';
    }

    public function contact(): void
    {
        require_once __DIR__ . '/../contact/contact_view.php';
    }
    public function vegan(): void
    {
        require_once __DIR__ . '/../meals/vegan_meals.php';
    }
    public function diet(): void
    {
        require_once __DIR__ . '/../meals/diet_meals.php';
    }
    public function lowCarb(): void
    {
        require_once __DIR__ . '/../meals/lowCarb_meals.php';
    }
}
?>
