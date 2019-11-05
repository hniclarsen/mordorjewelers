<?php
require_once "logger.php";

class Dao {
    private $host = "us-cdbr-iron-east-05.cleardb.net";
    private $db = "heroku_2f960b6202ae0cc";
    private $user = "b57997f748d7a0";
    private $pass = "d1b50197";
    private $logger;

    public function __construct() {
        $this->logger = new KLogger("/logs", KLogger::DEBUG);
    }

    private function getConnection() {
        try {
            $connection = new PDO(
                "mysql:host={$this->host};
                dbname={$this->db}",
                $this->user,
                $this->pass
            );
        } catch (Exception $e) {
            $this->logger->LogInfo("Database connection failed: {$e}");
        }
        return $connection;
    }

    public function createUser($name, $email, $password) {
        $connection = $this->getConnection();
        try {
            $UUID = uniqid('', true);
            $name = trim($name);
            $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
            $password = password_hash(trim($password), PASSWORD_DEFAULT);
            $creation = date('Y-m-d H:i:s');

            $query = "INSERT INTO users (userUUID, name, email, password, accessType, creationDate)
                    VALUES (:UUID, :name, :email, :password, 1, :creation)";
            $stmt = $connection->prepare("$query");
            $stmt->bindParam(":UUID", $UUID);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":creation", $creation);

            return $stmt->execute();
        } catch(Exception $e) {
            $this->logger->LogInfo("Account creation failed: {$e}");
            exit;
        }
    }

    public function getUser($email, $password) {
        $connection = $this->getConnection();
        try {
            $email = filter_var(trim($email), FILTER_VALIDATE_EMAIL);

            $query = "SELECT * FROM users
                    WHERE email=?";
            $stmt = $connection->prepare($query);
            $stmt->execute([$email]);
   
            $results = $stmt->fetchAll();
            $valid = password_verify($password, $results[0]['password']);
            
            if($valid) return $results[0];
            else return null;
        } catch(Exception $e) {
            $this->logger->LogInfo("Failed to retrieve user: {$e}");
            exit;
        }
    }
}
?>