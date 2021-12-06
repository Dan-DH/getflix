<?php
class Database {
    // development server
    private $dbhost = "database"; 
    private $dbuser = "root";
    private $dbpass = "getflixRoot";
    private $db = "getflix";
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=$this->dbhost;dbname=$this->db", $this->dbuser, $this->dbpass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection Error: {$e->getmessage()}";
        }

        return $this->conn;
    }
}