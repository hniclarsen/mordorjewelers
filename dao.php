<?php
require_once "logger.php";

class Dao {
    private $host = "us-cdbr-iron-east-05.cleardb.net";
    private $db = "passheroku_2f960b6202ae0cc";
    private $user = "b57997f748d7a0";
    private $pass = "d1b50197";
    private $logger;

    public function __construct() {
        $this->logger = new KLogger("/logs/log.txt", KLogger::DEBUG);
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

            $query = "INSERT INTO users (userUUID, name, email, password, accessType)
                    VALUES (:UUID, :name, :email, :password, 1)";
            $query = $connection->prepare("select * from access");
            $query->bindParam(":UUID", $UUID);
            $query->bindParam(":name", $name);
            $query->bindParam(":email", $email);
            $query->bindParam(":password", $password);
            $query->execute();
        } catch(Exception $e) {
            $this->logger->LogInfo("Account creation failed: {$e}");
            exit;
        }
        return 1;
    }
}
?>