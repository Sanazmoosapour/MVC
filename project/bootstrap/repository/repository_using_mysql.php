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
    public function update_restaurant_menu($restaurant_name,$break_fast,$lunch,$dinner)
    {
        $conn=$this->connect();
        echo $restaurant_name;
        echo $break_fast->name;
        $sql = "UPDATE restaurant
                    SET break_fast_id = '$break_fast->id' , lunch_id = '$lunch->id' , dinner_id = '$dinner->id'
                    WHERE name = '$restaurant_name';";
        $result=$conn->query($sql);
        $conn->close();
        echo $result;
        return $result;
    }

    public function get_food_by_name($name,$restaurant)
    {
        $conn=$this->connect();

        $sql = "SELECT
                    f.id AS 'food_id',
                	f.name AS 'food_name',
                    f.price AS 'food_price',
                    r.name AS 'restaurant_name',
                    c.type AS 'food_category'
    
                FROM food f
                JOIN restaurant r ON f.restaurant_id = r.id 
                JOIN category c ON f.category_id = c.id 
                WHERE (f.name = '$name') AND (r.name = '$restaurant')";
        $result=$conn->query($sql)->fetch_assoc();
        echo $result['food_name'];
        $conn->close();
        return new Food($result['food_id'],$result['food_name'],$result['food_price'],$result['food_category'],$result['restaurant_name']);
    }
    public function get_restaurant_by_name($name)
    {
        $conn=$this->connect();

        $sql = "SELECT
                    r.name AS 'restaurant_name',
                	f.name AS 'food_name',
                    f.price AS 'food_price',
                    c.type AS 'food_category',
                    f.id AS 'food_id'
    
                FROM restaurant r
                JOIN food f ON r.break_fast_id = f.id OR r.lunch_id = f.id OR r.dinner_id = f.id
                JOIN category c ON f.category_id = c.id 
                WHERE r.name = '$name'";
        $result=$conn->query($sql)->fetch_all();
        $conn->close();
        return new Restaurant((string)$result[0][0],
            new Menu((string)$result[0][0],
                new Food((int)$result[0][4], (string)$result[0][1] , (float)$result[0][2],(string)$result[0][3],(string)$result[0][0]),
                new Food((int)$result[1][4],(string)$result[1][1],(float)$result[1][2],(string)$result[1][3],(string)$result[1][0]),
                new Food((int)$result[2][4],(string)$result[2][1],(float)$result[2][2],(string)$result[2][3],(string)$result[2][0])
    ));
    }
}