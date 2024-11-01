<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'nutriPT';
    private $username = 'root';
    private $password = '1234567b';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // PDO bağlantı dizesi düzenlendi
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
        
    }
}
?>
