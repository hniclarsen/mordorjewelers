<?php
    require_once 'KLogger.php';

    class Dao {
        private $host = "us-cdbr-iron-east-05.cleardb.net";
        private $db = "heroku_2f960b6202ae0cc";
        private $user = "b57997f748d7a0";
        private $pass = "d1b50197";
        private $logger;

        public function __construct() {
            $this->logger = new KLogger("/logs/log.txt", KLogger::DEBUG);
        }

        public function getConnection() {
            try {
                $connection = new PDO(
                    "mysql:host={$this->host};
                    dbname={$this->db}",
                    $this->user,
                    $this->pass
                );
            } catch (Exception $e) {
                echo print_r($e, 1);
            }
            return $connection;
        }
    }
?>