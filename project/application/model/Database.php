<?php

namespace model;
class Database
{
    private $servername = "localhost";
    private $username = "username";
    private $password = "password";
    private $dbname = "my_resturant";
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function close()
    {
        $this->conn->close();
    }
}