<?php

namespace model;

use App\model\Model;
use Core\View;

class Food implements Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }
    public function get_by_name(string $name)
    {
        $sql = "SELECT * FROM my_resturant.foods WHERE name = '$name'";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();

    }
    public function __destruct()
    {
        $this->db->close();
    }

    public function validate($result) : bool
    {
        if(!is_string($result['name']) || $result['price']<0){
            return false;
        }
        return true;

    }
}