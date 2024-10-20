<?php

require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/RegisterController.php';

$controller = null;

switch ($_SERVER['REQUEST_URI']) {
    case '/app/ui/view/login/login_view.php':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new LoginController();
            $controller->login();
        } else {
            $controller = new LoginController();
            $controller->showLoginForm();
        }
        break;

    case '/app/ui/view/register/register_view.php':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new RegisterController();
            $controller->register();
        } else {
            $controller = new RegisterController();
            $controller->showRegisterForm();
        }
        break;

    default:
        $controller = new HomeController();
        $controller->index();
        break;
}
