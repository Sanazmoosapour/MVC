<?php

namespace Core\repository;

use App\model\Food;
use App\model\Menu;
use App\model\Restaurant;

class repository_using_mysql implements repository
{

    public function connect()
    {
        $conn = mysqli_connect("127.0.0.1", "root", "QWERasd<>1234", "my_resturant");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
    public function get_restaurant_by_name($name)
    {
        $conn=$this->connect();

        $sql = "SELECT
                    r.name AS 'restaurant_name',
                	f.name AS 'food_name',
                    f.price AS 'food_price',
                    c.type AS 'food_category'
    
                FROM restaurant r
                JOIN food f ON r.break_fast_id = f.id OR r.lunch_id = f.id OR r.dinner_id = f.id
                JOIN category c ON f.category_id = c.id 
                WHERE r.name = '$name'";
        $result=$conn->query($sql)->fetch_all();
        $conn->close();
        return new Restaurant((string)$result[0][0],
            new Menu((string)$result[0][0],
                new Food( (string)$result[0][1] , (float)$result[0][2],(string)$result[0][3],(string)$result[0][0]),
                new Food((string)$result[1][1],(float)$result[1][2],(string)$result[1][3],(string)$result[1][0]),
                new Food((string)$result[2][1],(float)$result[2][2],(string)$result[2][3],(string)$result[2][0])
    ));
    }
}