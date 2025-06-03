<?php
    class Database
    {
        private $host;
        private $db_name;
        private $username;
        private $password;
        private $port;
        public $conn;

        public function __construct()
        {
            if($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_ADDR'] === '127.0.0.1' || $_SERVER['SERVER_ADDR'] === '192.168.1.72'){
                $this->host = "localhost";
                $this->db_name = "itelec_002";
                $this->username = "root";
                $this->password = "";
                $this->port = "3306";
            }
            else{
                $this->host = "localhost";
                $this->db_name = "";
                $this->username = "";
                $this->password = "";
            }
        }

        public function dbConnection()
        {
            $this->conn = null;
            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) 
            {
                echo "Connection error: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }
?>