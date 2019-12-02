<?php
require_once "logger.php";

class Dao {
    private $host = "localhost";//"us-cdbr-iron-east-05.cleardb.net";
    private $db = "mordor_jewelers";//"heroku_2f960b6202ae0cc";
    private $user = "root";//"b57997f748d7a0";
    private $pass = "";//"d1b50197";
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
            // check if e-mail is already registered
            $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);

            $query = "SELECT COUNT(*) as registerCount FROM users
                    WHERE email=?";
            $stmt = $connection->prepare($query);
            $stmt->execute([$email]);

            $count = $stmt->fetchAll();
            if(($count[0]['registerCount']) > 0) return false;

            // add user to database
            $UUID = uniqid('', true);
            $name = filter_var(trim($name), FILTER_SANITIZE_STRING);
            $password = password_hash(trim($password), PASSWORD_DEFAULT);
            $creation = date('Y-m-d H:i:s');

            $query = "INSERT INTO users (userUUID, name, email, password, accessType, creationDate)
                    VALUES (:UUID, :name, :email, :password, 1, :creation)";
            $stmt = $connection->prepare($query);
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

    public function createProduct($name, $desc, $price, $imgs, $qty, $tags) {
        $connection = $this->getConnection();
        try {
            $UUID = uniqid('', true);
            $name = filter_var(trim($name), FILTER_SANITIZE_STRING);
            $desc = filter_var(trim($desc), FILTER_SANITIZE_STRING);
            $price = filter_var(trim($price), FILTER_SANITIZE_STRING);
            $qty = filter_var(trim($qty), FILTER_SANITIZE_NUMBER_INT);
            $urls = [];

            for($i = 0; $i < 6; ++$i) {
                $dest = '/catalog/products/product-imgs/';
                $img = file_get_contents($imgs['tmp_name'][$i]);
                $urls[$i] = $dest.substr($imgs[$i], strrpos($imgs[$i], '/'));
                file_put_contents($urls[$i], $img);
            }
            foreach($tags as &$tag) {
                $tag = filter_var(trim($tag), FILTER_SANITIZE_STRING);
            }

            $query = "INSERT INTO products (productUUID, name, description, price, 
                    image0, image1, image2, image3, image4, image5, quantity, tags)
                    VALUES (:UUID, :name, :desc, :price, :img0, :img1, :img2, :img3, 
                    :img4, :img5, :qty, :tags)";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(":UUID", $UUID);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":desc", $desc);
            $stmt->bindParam(":img0", $urls[0]);
            $stmt->bindParam(":img1", $urls[1]);
            $stmt->bindParam(":img2", $urls[2]);
            $stmt->bindParam(":img3", $urls[3]);
            $stmt->bindParam(":img4", $urls[4]);
            $stmt->bindParam(":img5", $urls[5]);
            $stmt->bindParam(":qty", $qty);
            $stmt->bindParam(":tags", $tags);

            return $stmt->execute();
        } catch(Exception $e) {
            $this->logger->LogInfo("Product creation failed: {$e}");
            exit;
        }
    }
}
?>