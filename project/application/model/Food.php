<?php

namespace model;

class Food
{
    private $db;




    public function __construct()
    {
        $this->db = new Database();

    }
    public function get_by_name(string $name)
    {
        $sql = "SELECT * FROM my_resturant.foods WHERE name = $name";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();

    }


    public function __destruct()
    {
        $this->db->close();
    }
}