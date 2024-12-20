<?php

if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin' || !$_SESSION['isLoggedIn'] || !isset($_SESSION['isLoggedIn'])) {
    header('Location: /home');
    exit();
}

$userId = $_GET['id'];


if (isset($userId)) {
    $this->userModel->removeUser($userId);
    header('Location: /nutriPT/admin/users_list');
    exit;
}
?>