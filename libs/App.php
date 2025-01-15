<?php require_once  "../config/config.php" ?>

<?php

class App
{
    public $host = DB_HOST;
    public $dbname = DB_NAME;
    public $username = DB_USERNAME;
    public $password = DB_PASSWORD;

    public $link;

    // Create a constructor
    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->link = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);

        if ($this->link) {
            echo "Connected to the database successfully";
        }
    }

    // Select all rows from the database
    public function selectAll($query)
    {
        $rows = $this->link->query($query);
        $rows->execute();

        $allRows = $rows->fetchAll(PDO::FETCH_ASSOC);

        if ($allRows) {
            return $allRows;
        } else {
            return false;
        }
    }

    // Select one row from the database
    public function selectOne($query)
    {
        $row = $this->link->query($query);
        $row->execute();

        $singleRow = $row->fetchAll(PDO::FETCH_ASSOC);

        if ($singleRow) {
            return $singleRow;
        } else {
            return false;
        }
    }

    // Insert data into the database
    public function insert($query, $arr, $path) {
        if($this->validate($arr) == "empty") {
            echo "<script>alert('one or more fields are ampty!')</script>";
        } else {
            $insert_record = $this->link->prepare($query);
            $insert_record->execute($arr);

            header("Location: $path");
        }
    }

    // Update data in the database
    public function update($query, $arr, $path) {
        if($this->validate($arr) == "empty") {
            echo "<script>alert('one or more fields are ampty!')</script>";
        } else {
            $update_record = $this->link->prepare($query);
            $update_record->execute($arr);

            header("Location: $path");
        }
    }

    // Delete data from the database
    public function delete($query, $path) {
            $delete_record = $this->link->query($query);
            $delete_record->execute();

            header("Location: $path");
    }

    // Validate the form
    public function validate($arr){
        if(in_array("", $arr)){
            echo "empty";
        }
    }
}

$obj = new App();
