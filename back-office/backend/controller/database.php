<?php

class database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_create01";

    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public  function get_connection_db()
    {
        return $this->conn;
    }

}

