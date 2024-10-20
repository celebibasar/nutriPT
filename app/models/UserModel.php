<?php

class UserModel {

    private $db;

    public function __construct() {
        // Veritabanı bağlantısı
        $this->db = new PDO('mysql:host=localhost;dbname=nutript', 'root', '');
    }

    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
