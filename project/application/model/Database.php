<?php

namespace model;
class Database
{
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "QWERasd<>1234";
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