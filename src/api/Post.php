<?php
    Class Read_movies {
        private $conn;
        private $table = "movies";

        public $movieID;
        public $title;
        public $image;
        public $trailer;
        public $genre;
        public $rating;
        public $synopsis;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = "SELECT * FROM movies;";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }

    Class Read_users {
        private $conn;
        private $table = "users";

        public $userID;
        public $email;
        public $login;
        public $acc_date;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = "SELECT * FROM users;";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }