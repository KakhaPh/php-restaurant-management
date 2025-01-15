<?php require_once  "../config/config.php" ?>

<?php

    class App {
        public $host = DB_HOST;
        public $dbname = DB_NAME;
        public $username = DB_USERNAME;
        public $password = DB_PASSWORD;

        public $link;

        // Create a constructor
        public function __construct() {
            $this->connect();
        }

        public function connect() {
            $this->link = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);

            if($this->link) {
                echo "Connected to the database successfully";
            }
        }
    }

    $obj = new App();
