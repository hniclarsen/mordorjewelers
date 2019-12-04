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
            $tags = filter_var(trim($tags), FILTER_SANITIZE_STRING);
            $urls = [];

            for($i = 0; $i < 6; ++$i) {
                if($i >= count($imgs['tmp_name']) || $imgs['tmp_name'][$i] == null) {
                    $urls[$i] = null;
                    continue;
                }
                $dest = $_SERVER['DOCUMENT_ROOT'].'/catalog/products/product-imgs/';
                $img = file_get_contents($imgs['tmp_name'][$i]);
                $urls[$i] = $dest.$UUID.'-'.$i.substr($imgs['name'][$i], strrpos($imgs['name'][$i], '.'));
                file_put_contents($urls[$i], $img);
            }

            $query = "INSERT INTO products (productUUID, name, description, price, 
                    image0, image1, image2, image3, image4, image5, quantity, tags)
                    VALUES (:UUID, :name, :desc, :price, :img0, :img1, :img2, :img3, 
                    :img4, :img5, :qty, :tags)";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(":UUID", $UUID);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":desc", $desc);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":img0", $urls[0]);
            $stmt->bindParam(":img1", $urls[1]);
            $stmt->bindParam(":img2", $urls[2]);
            $stmt->bindParam(":img3", $urls[3]);
            $stmt->bindParam(":img4", $urls[4]);
            $stmt->bindParam(":img5", $urls[5]);
            $stmt->bindParam(":qty", $qty);
            $stmt->bindParam(":tags", $tags);

            if($stmt->execute()) {
                return $UUID;
            } else {
                return null;
            }
        } catch(Exception $e) {
            $this->logger->LogInfo("Product creation failed: {$e}");
            exit;
        }
    }

    public function getProduct($productUUID) {
        $connection = $this->getConnection();
        try {
            $productUUID = filter_var(trim($productUUID), FILTER_SANITIZE_STRING);

            $query = "SELECT * FROM products
                    WHERE productUUID=?";
            $stmt = $connection->prepare($query);
            $stmt->execute([$productUUID]);
   
            $results = $stmt->fetchAll();
            
            return $results[0];
        } catch(Exception $e) {
            $this->logger->LogInfo("Failed to retrieve product: {$e}");
            exit;
        }
    }

    public function getProducts() {
        $connection = $this->getConnection();
        try {
            $query = "SELECT * FROM products";
            $stmt = $connection->prepare($query);
            $stmt->execute();
   
            $results = $stmt->fetchAll();
            
            return $results;
        } catch(Exception $e) {
            $this->logger->LogInfo("Failed to retrieve products: {$e}");
            exit;
        }
    }

    public function addWishlist($userUUID, $productUUID) {
        $connection = $this->getConnection();
        try {
            // check if already added to wishlist
            $query = "SELECT COUNT(*) as itemCount FROM wishlist
                    WHERE productUUID=?";
            $stmt = $connection->prepare($query);
            $stmt->execute([$productUUID]);

            $count = $stmt->fetchAll();
            if(($count[0]['itemCount']) > 0) return false;

            $query = "INSERT INTO wishlist (userUUID, productUUID)
                    VALUES (:userUUID, :productUUID)";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(":userUUID", $userUUID);
            $stmt->bindParam(":productUUID", $productUUID);

            return $stmt->execute();
        } catch(Exception $e) {
            $this->logger->LogInfo("Failed to add to wishlist: {$e}");
            exit;
        }
    }

    public function getWishlist($userUUID) {
        $connection = $this->getConnection();
        try {
            $query = "SELECT * FROM wishlist";
            $stmt = $connection->prepare($query);
            $stmt->execute();
   
            $results = $stmt->fetchAll();
            
            return $results;
        } catch(Exception $e) {
            $this->logger->LogInfo("Failed to retrieve wishlist: {$e}");
            exit;
        }
    }

    public function deleteWishlistItem($userUUID, $productUUID) {
        $connection = $this->getConnection();
        try {
            $query = "DELETE FROM wishlist
                        WHERE userUUID=:userUUID
                        AND productUUID=:productUUID";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(":userUUID", $userUUID);
            $stmt->bindParam(":productUUID", $productUUID);
            
            return $stmt->execute();
        } catch(Exception $e) {
            $this->logger->LogInfo("Failed to retrieve wishlist: {$e}");
            exit;
        }
    }
}