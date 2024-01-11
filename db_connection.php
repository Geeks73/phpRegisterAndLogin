<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $databasename = "user_registration";
    private $connect;

    public function connect() {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);

        // Check connection
        if (!$this->connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $this->connect;
    }
}


$database = new Database();
$connection = $database->connect();

?>