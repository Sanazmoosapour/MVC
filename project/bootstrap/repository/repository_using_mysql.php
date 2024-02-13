<?php

namespace Core\repository;

use App\model\Food;

class repository_using_mysql implements repository
{

    public function get_food_by_name($name)
    {
        $conn = mysqli_connect("127.0.0.1", "root", "QWERasd<>1234", "my_resturant");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM my_resturant.foods WHERE name = '$name'";
        $result=$conn->query($sql)->fetch_assoc();
        echo $result['name'];
        $conn->close();
        return new Food((string)$result['name'],(float)$result['price'],(string)$result['category']);
    }
}