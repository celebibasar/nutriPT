<?php
class AdminController {
    private $mealModel;
    private $userModel;

    public function __construct($mealModel, $userModel) {
        $this->mealModel = $mealModel;
        $this->userModel = $userModel;
    }

    public function mealsList() {
        require_once __DIR__ . '/../modules/admin/meals_list.php';
    }

    public function usersList() {
        $users = $this->userModel->getAllUsers();
        require_once __DIR__ . '/../modules/admin/users_list.php';
    }

    public function editUser() {
        require_once __DIR__ . '/../modules/admin/edit_user.php';
    }

    public function editMeal() {
        require_once __DIR__ . '/../modules/admin/edit_meal.php';
    }

    public function removeMeal() {
        require_once __DIR__ . '/../modules/admin/remove_meal.php';
    }
    public function addMeal() {
        require_once __DIR__ . '/../modules/admin/add_meal.php';
    }
    public function addUser() {
        require_once __DIR__ . '/../modules/admin/add_user.php';
    }
    public function removeUser() {
        require_once __DIR__ . '/../modules/admin/remove_user.php';
    }
}

?>
