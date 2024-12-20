<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($username, $name, $surname, $email, $password) {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO users (username, name, surname, email, password) 
                VALUES (:username, :name, :surname, :email, :password)
            ");
            return $stmt->execute([
                ':username' => htmlspecialchars($username),
                ':name' => htmlspecialchars($name),
                ':surname' => htmlspecialchars($surname),
                ':email' => filter_var($email, FILTER_SANITIZE_EMAIL),
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
                    'role' => $user['role'],
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

    public function removeUser($userId) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE user_id = ?");
        return $stmt->execute([$userId]);
    }


    public function updateUserByEmail($email, $username, $name, $surname, $age, $weight, $height, $profileImage) {
        // SQL sorgusunu hazırlayın
        $stmt = $this->db->prepare("
            UPDATE users 
            SET username = :username, name = :name, surname = :surname, 
                age = :age, weight = :weight, height = :height, 
                profile_image = :profile_image
            WHERE email = :email
        ");
        
        // Parametreleri bağlayın
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':surname', $surname);
        $stmt->bindValue(':age', $age, PDO::PARAM_INT);
        $stmt->bindValue(':weight', $weight, PDO::PARAM_STR);
        $stmt->bindValue(':height', $height, PDO::PARAM_STR);
        $stmt->bindValue(':profile_image', $profileImage, PDO::PARAM_LOB);
        $stmt->bindValue(':email', $email);
    
        // Sorguyu çalıştırın ve sonucu döndürün
        return $stmt->execute();
    }

    public function addUser($username, $name, $surname, $email, $role, $password) {
        // Check if username or email already exists
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        if ($stmt->fetchColumn() > 0) {
            return false; // Username or email already exists
        }

        // Insert the new user into the database
        $stmt = $this->db->prepare("INSERT INTO users (username, name, surname, email, role, password) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$username, $name, $surname, $email, $role, $password]);
    }

    public function editUser($userId, $name, $email, $role, $password) {
        $query = "UPDATE users SET name = ?, email = ?, role = ? ";
        if ($password) {
            $query .= ", password = ?";
        }
        $query .= " WHERE user_id = ?";

        $stmt = $this->db->prepare($query);
        if ($password) {
            return $stmt->execute([$name, $email, $role, $password, $userId]);
        } else {
            return $stmt->execute([$name, $email, $role, $userId]);
        }
    }

    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    public function getUserById($userId) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_id = :id");
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getUserByEmail($email) {
        try {
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException('Invalid email format.');
            }
    
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
    
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ?: false; 
    
        } catch (InvalidArgumentException $e) {
            error_log("Get User by Email Error: " . $e->getMessage());
            return false;
        } catch (PDOException $e) {
            error_log("Get User by Email Database Error: " . $e->getMessage());
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
