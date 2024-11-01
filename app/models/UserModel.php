<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    
    public function register($username, $name, $surname, $email, $age, $goal, $weight, $height, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (username, name, surname, email, age, goal, weight, height, password) VALUES (:username, :name, :surname, :email, :age, :goal, :weight, :height, :password)");
        $stmt->execute([
            ':username' => $username,
            ':name' => $name,
            ':surname' => $surname,
            ':email' => $email,
            ':age' => $age,
            ':goal' => $goal,
            ':weight' => $weight,
            ':height' => $height,
            ':password' => password_hash($password, PASSWORD_BCRYPT),
        ]);
    }
    

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false; 
    }


    public function isEmailExist($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }
}
?>
