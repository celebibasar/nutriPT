<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<pre>";
print_r($_SERVER);
echo "</pre>";

// Gerekli dosyaların yüklenmesi
require_once 'config/database.php';
require_once 'helpers/string_helper.php';
require_once 'modules/home/HomeController.php';
require_once 'modules/login/LoginController.php';
require_once 'modules/register/RegisterController.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

var_dump($request); // "/nutriPT/app/index.php"

if ($request === '/nutriPT/app/index.php' || $request === '/nutriPT/') {
    header('Location: /nutriPT/home');
    exit();
}


// Kök dizini belirleyin
$rootPath = 'http://localhost:63342/nutriPT';

switch ($rootPath) {
    case $rootPath . '/home':
        $controller = new HomeController();
        $controller->index();
        break;
    case $rootPath . '/about':
        $controller = new HomeController();
        $controller->about();
        break;
    case $rootPath . '/services':
        $controller = new HomeController();
        $controller->services();
        break;
    case $rootPath . '/contact':
        $controller = new HomeController();
        $controller->contact();
        break;
    case $rootPath . '/login':
        $controller = new LoginController();
        $controller->index();
        break;
    case $rootPath . '/register':
        $controller = new RegisterController();
        $controller->index();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/modules/404.php'; // 404 sayfasını yükle
        break;
}

?>
