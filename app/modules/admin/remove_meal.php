<?php
if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin' || !$_SESSION['isLoggedIn'] || !isset($_SESSION['isLoggedIn'])) {
    header('Location: /home');
    exit();
}

$mealId = $_GET['id'];


if (isset($mealId)) {
    $this->mealModel->deleteMeal($mealId);
    header('Location: /nutriPT/admin/meals_list');
    exit;
}
?>