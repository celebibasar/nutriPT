<?php
class HomeController {
    public function index(): void {
        require_once __DIR__ . '/home_view.php';
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
}
?>
