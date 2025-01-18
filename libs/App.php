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
        try {
            $this->link = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Failed to connect to the database: " . $e->getMessage());
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

        $singleRow = $row->fetch(PDO::FETCH_ASSOC);

        if ($singleRow) {
            return $singleRow;
        } else {
            return false;
        }
    }

    public function validateCart($cartQuery) {
        $row = $this->link->query($cartQuery);
        $row->execute();
        $count = $row->rowCount();
        return $count;
    }

    // Insert data into the database
    public function insert($query, $arr, $path)
    {
        if ($this->validate($arr) == "empty") {
            echo "<script>alert('one or more fields are ampty!')</script>";
        } else {
            $insert_record = $this->link->prepare($query);
            $insert_record->execute($arr);

            echo "<script>window.location.href ='$path'</script>";
        }
    }

    // Update data in the database
    public function update($query, $arr, $path)
    {
        if ($this->validate($arr) == "empty") {
            echo "<script>alert('one or more fields are ampty!')</script>";
        } else {
            $update_record = $this->link->prepare($query);
            $update_record->execute($arr);

            header("Location: $path");
            exit;
        }
    }

    // Delete data from the database
    public function delete($query, $path)
    {
        $delete_record = $this->link->query($query);
        $delete_record->execute();

        echo "<script>window.location.href ='$path'</script>";
    }

    // Validate the form
    public function validate($arr)
    {
        if (in_array("", $arr)) {
            echo "empty";
        }
    }

    // Register a new user
    public function register($query, $arr, $path)
    {
        if ($this->validate($arr) == "empty") {
            echo "<script>alert('one or more fields are empty!')</script>";
        } else {
            $register_user = $this->link->prepare($query);
            $register_user->execute($arr);

            header("Location: $path");
            exit;
        }
    }

    // Login a user
    public function login($query, $data, $path)
    {
        $login_record = $this->link->prepare($query);
        $login_record->execute();
        $fetch = $login_record->fetch(PDO::FETCH_ASSOC);

        if ($login_record->rowCount() > 0) {
            if (password_verify($data['password'], $fetch['password'])) {
                // Start session variables
                $_SESSION['email'] = $fetch['email'];
                $_SESSION['username'] = $fetch['username'];
                $_SESSION['user_id'] = $fetch['id'];

                header("Location: $path");
                exit;
            }
        }
    }

    public function startingSession()
    {
        session_start();
    }

    public function validateSession()
    {
        if (isset($_SESSION['user_id'])) {
            echo "<script>window.location.href ='". baseUrl ."'</script>";
        }
    }
}
