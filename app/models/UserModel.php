<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($username, $name, $surname, $email, $age, $goal, $weight, $height, $password) {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO users (username, name, surname, email, age, goal, weight, height, password) 
                VALUES (:username, :name, :surname, :email, :age, :goal, :weight, :height, :password)
            ");
            return $stmt->execute([
                ':username' => htmlspecialchars($username),
                ':name' => htmlspecialchars($name),
                ':surname' => htmlspecialchars($surname),
                ':email' => filter_var($email, FILTER_SANITIZE_EMAIL),
                ':age' => intval($age),
                ':goal' => htmlspecialchars($goal),
                ':weight' => floatval($weight),
                ':height' => floatval($height),
                ':password' => password_hash($password, PASSWORD_BCRYPT),
            ]);
        } catch (PDOException $e) {
            error_log("Registration Error: " . $e->getMessage());
            return false;
        }
    }

    public function login($email, $password) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => htmlspecialchars($user['username']),
                    'name' => htmlspecialchars($user['name']),
                    'surname' => htmlspecialchars($user['surname']),
                    'email' => htmlspecialchars($user['email']),
                    'profile_image' => $user['profile_image'] ?? '/images/default-profile.png',
                ];
                return true;
            }

            return false;
        } catch (PDOException $e) {
            error_log("Login Error: " . $e->getMessage());
            return false;
        }
    }
    public function updateUserByEmail($email, $username, $name, $surname, $age, $goal, $weight, $height) {
        // Veritabanı bağlantınızı burada sağlıyorsunuz
        $stmt = $this->db->prepare("UPDATE users SET username = ?, name = ?, surname = ?, age = ?, goal = ?, weight = ?, height = ? WHERE email = ?");
        $stmt->bind_param("sssssds", $username, $name, $surname, $age, $goal, $weight, $height, $email);
        return $stmt->execute();
    }

    public function getUserById($userId) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_id = :id");
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($userId, $name, $surname, $email, $age, $goal, $weight, $height) {
        $stmt = $this->db->prepare("UPDATE users SET name = :name, surname = :surname, email = :email, age = :age, goal = :goal, weight = :weight, height = :height WHERE id = :id");
        return $stmt->execute([
            ':id' => $userId,
            ':name' => $name,
            ':surname' => $surname,
            ':email' => $email,
            ':age' => $age,
            ':goal' => $goal,
            ':weight' => $weight,
            ':height' => $height
        ]);
    }

    public function getUserByEmail($email) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Get User by Email Error: " . $e->getMessage());
            return false;
        }
    }

    public function isEmailExist($email) {
        try {
            $stmt = $this->db->prepare("SELECT 1 FROM users WHERE email = :email");
            $stmt->execute([':email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (PDOException $e) {
            error_log("Email Existence Check Error: " . $e->getMessage());
            return false;
        }
    }
}
?>
