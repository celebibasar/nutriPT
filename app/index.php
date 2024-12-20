<?php
ob_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config/database.php';
require_once 'helpers/string_helper.php';
require_once 'controllers/UserController.php';
require_once 'controllers/NutritionPlanController.php';
require_once 'controllers/MealController.php';
require_once 'controllers/AdminController.php';
require_once 'modules/home/HomeController.php';
require_once 'modules/profile/ProfileController.php';
require_once 'modules/edit_profile/EditProfileController.php';
require_once 'modules/login/LoginController.php';
require_once 'modules/register/RegisterController.php';
require_once 'models/UserModel.php';
require_once 'models/NutritionPlanModel.php';
require_once 'models/MealModel.php';


$database = new Database();
$db = $database->getConnection();

$userModel = new UserModel($db);
$nutritionPlanModel = new NutritionPlanModel($db);
$userController = new UserController($userModel);
$mealModel = new MealModel($db);

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$request = rtrim($request, '/');

// var_dump($request); // Debug line

switch ($request) {
    case '':
    case '/':
    case '/nutriPT/app/index.php': 
    case '/nutriPT': 
    case '/nutriPT/home':
    case '/home': 
        $controller = new HomeController($userModel);
        $controller->index();
        break;
    case '/nutriPT/about':
        $controller = new HomeController($userModel);
        $controller->about();
        break;
    case '/nutriPT/services':
        $controller = new HomeController($userModel);
        $controller->services();
        break;
    case '/nutriPT/contact':
        $controller = new HomeController($userModel);
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
    case '/admin':
        $controller = new HomeController($userModel);
        $controller->admin();
        break;
    case '/nutriPT/admin/users_list':
        $controller = new AdminController($mealModel, $userModel);
        $controller->usersList();
        break;
    case '/nutriPT/admin/meals_list':
        $controller = new AdminController($mealModel, $userModel);
        $controller->mealsList();
        break;
    case '/nutriPT/admin/edit_meal':
        $controller = new AdminController($mealModel, $userModel);
        $controller->editMeal();
        break;
    case '/nutriPT/admin/remove_meal':
        $controller = new AdminController($mealModel, $userModel);
        $controller->removeMeal();
        break;
    case '/nutriPT/admin/add_meal':
        $controller = new AdminController($mealModel, $userModel);
        $controller->addMeal();
        break;
    case '/nutriPT/admin/users_list':
        $controller = new AdminController($mealModel, $userModel);
        $controller->usersList();
        break;
    case '/nutriPT/admin/edit_user':
        $controller = new AdminController($mealModel, $userModel);
        $controller->editUser();
        break;
    case '/nutriPT/admin/remove_user':
        $controller = new AdminController($mealModel, $userModel);
        $controller->removeUser();
        break;
    case '/nutriPT/admin/add_user':
        $controller = new AdminController($mealModel, $userModel);
        $controller->addUser();
        break;
    case '/profile':
        $controller = new ProfileController($userModel);
        $controller->index();
        break;
    case '/edit-profile':
        $userController->updateUser();
        $controller = new EditProfileController($userModel);
        $controller->index();
        break;
    case '/meals/vegan':
        $controller = new MealController($mealModel);
        $controller->showMeals('vegan');
        break;

    case '/meals/diet':
        $controller = new MealController($mealModel);
        $controller->showMeals('diet');
        break;

    case '/meals/low-carb':
        $controller = new MealController($mealModel);
        $controller->showMeals('lowCarb');
        break;
    case '/step1':
        $controller = new NutritionPlanController($nutritionPlanModel, $userModel);
        $controller->step1();
        break;
    case '/step2':
        $controller = new NutritionPlanController($nutritionPlanModel, $userModel);
        $controller->step2();
        break;
    case '/step3':
        $controller = new NutritionPlanController($nutritionPlanModel, $userModel);
        $controller->step3();
        break;
    case '/finish':
        $controller = new NutritionPlanController($nutritionPlanModel, $userModel);
        $controller->finish();
        break;
    case '/meal_plan_calendar':
        $controller = new NutritionPlanController($nutritionPlanModel, $userModel);
        $controller->mealPlanCalendar();
        break;
    case '/register':
        $userController->register();
        $controller = new LoginController();
        $controller->index();
        break;
    case '/login':
        $userController->login();
        $controller = new HomeController($userModel);
        $controller->index();
        break;
    case '/logout':
        $userController->logout();
        $controller = new HomeController($userModel);
        $controller->index();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/modules/404.php'; // 404 sayfasını yükle
        break;
}

ob_end_flush(); // Send output buffering content to the browser
