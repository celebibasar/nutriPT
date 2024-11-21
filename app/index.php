<?php
ob_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config/database.php';
require_once 'helpers/string_helper.php';
require_once 'controllers/UserController.php';
require_once 'modules/home/HomeController.php';
require_once 'modules/profile/ProfileController.php';
require_once 'modules/edit_profile/EditProfileController.php';
require_once 'modules/login/LoginController.php';
require_once 'modules/register/RegisterController.php';
require_once 'models/UserModel.php';


$database = new Database();
$db = $database->getConnection();

$userModel = new UserModel($db);
$userController = new UserController($userModel);

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$request = rtrim($request, '/');

// var_dump($request); // Debug line

switch ($request) {
    case '':
    case '/':
    case '/nutriPT/app/index.php': 
    case '/nutriPT': 
    case '/nutriPT/home': 
        $controller = new HomeController();
        $controller->index();
        break;
    case '/nutriPT/about':
        $controller = new HomeController();
        $controller->about();
        break;
    case '/nutriPT/services':
        $controller = new HomeController();
        $controller->services();
        break;
    case '/nutriPT/contact':
        $controller = new HomeController();
        $controller->contact();
        break;
    case '/nutriPT/login':
        $controller = new LoginController();
        $controller->index();
        break;
    case '/nutriPT/register':
        $controller = new RegisterController();
        $controller->index();
        break;
    case '/profile':
        $controller = new ProfileController($userModel);
        $controller->index();
        break;
    case '/edit-profile':
        $controller = new EditProfileController($userModel);
        $controller->index();
        break;
    case '/register':
        $userController->register();
        $controller = new LoginController();
        $controller->index();
        break;
    case '/login':
        $userController->login();
        $controller = new HomeController();
        $controller->index();
        break;
    case '/logout':
        $userController->logout();
        $controller = new HomeController();
        $controller->index();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/modules/404.php'; // 404 sayfasını yükle
        break;
}

ob_end_flush(); // Send output buffering content to the browser
