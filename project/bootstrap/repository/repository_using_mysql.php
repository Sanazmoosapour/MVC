<?php

namespace Core\repository;

use App\model\DiscountCode;
use App\model\Food;
use App\model\Menu;
use App\model\Restaurant;
use App\model\User;

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

        $sql = "UPDATE restaurant
                    SET break_fast_id = '$break_fast->id' , lunch_id = '$lunch->id' , dinner_id = '$dinner->id'
                    WHERE name = '$restaurant_name';";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public function get_food_by_name_restaurant($name, $restaurant)
    {
        $conn = $this->connect();

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
        $result = $conn->query($sql)->fetch_assoc();
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
                    f.id AS 'food_id',
                    r.open_time AS 'open_time',
                    r.close_time AS 'close_time'
    
                FROM restaurant r
                JOIN food f ON r.break_fast_id = f.id OR r.lunch_id = f.id OR r.dinner_id = f.id
                JOIN category c ON f.category_id = c.id 
                WHERE r.name = '$name'";
        $result=$conn->query($sql)->fetch_all();
        $conn->close();
        $current= time();
        $is_open=false;
        if($current>=$result[0][5] && $current<$result[0][6]){
            $is_open = true;
        }
        return new Restaurant((string)$result[0][0],
            new Menu((string)$result[0][0],
                new Food((int)$result[0][4], (string)$result[0][1] , (float)$result[0][2],(string)$result[0][3],(string)$result[0][0]),
                new Food((int)$result[1][4],(string)$result[1][1],(float)$result[1][2],(string)$result[1][3],(string)$result[1][0]),
                new Food((int)$result[2][4],(string)$result[2][1],(float)$result[2][2],(string)$result[2][3],(string)$result[2][0])
                    ), $is_open);
    }
    public function get_user_ifexist($name,$password,$email)
    {
        $conn=$this->connect();

        $sql = "SELECT *
                FROM users
                WHERE (users.name = '$name') ";
        $result=$conn->query($sql)->fetch_assoc();
        $conn->close();
        if($result==null)
                return null;

        $discount = $result['discount_code'];
        if($discount == NULL){
            $discount = '';
        }

        return new User($result['id'],$result['name'],$result['email'],$result['password'],$discount,$result['admin']);
    }
    public function insert_user($user)
    {
        $conn=$this->connect();

        $sql = "INSERT INTO `users` VALUES('$user->id','$user->name','$user->isAdmin','$user->email','$user->password',NULL,NULL,NULL)";
        $result=$conn->query($sql);

        $conn->close();
        if($result==true)
            return true;
        return false;
    }
    public function insert_order($order)
    {
        $conn=$this->connect();
        $sql = "INSERT INTO `order` VALUES('$order->order_id','$order->user_id','$order->food_id','$order->price',NULL,NULL)";
        $result=$conn->query($sql);
        $conn->close();
        if($result==true)
            return true;
        return false;
    }
    public function get_last_id($table)
    {
        $conn=$this->connect();

        $sql = "SELECT id
                FROM $table
                ORDER BY id DESC
                LIMIT 1";
        echo $sql;
        $result=$conn->query($sql);
        $conn->close();
        return $result->fetch_assoc()['id'];
    }
    public function get_user_by_id($id)
    {
        $conn=$this->connect();

        $sql = "SELECT *
                FROM users
                WHERE ((users.id = '$id') )";
        $result=$conn->query($sql)->fetch_assoc();
        $conn->close();
        if($result==null)
            return null;
        return new User($result['id'],$result['name'],$result['email'],$result['password'],$result['discount_code'],$result['admin']);
    }

    public function update_user_discountCode($user_id,$discountCode)
    {
        $conn=$this->connect();

        $sql = "UPDATE users
                    SET discount_code = '$discountCode'
                    WHERE id = '$user_id';";
        $result=$conn->query($sql);
        $conn->close();
        echo $result;
        return $result;
    }
    public function get_foods_by_name($name)
    {
        $conn=$this->connect();

        $sql = "SELECT f.id,f.name,f.price,r.name AS restaurant, c.type AS category
    
                FROM food f
                JOIN restaurant r ON  f.restaurant_id = r.id
                JOIN category c ON f.category_id = c.id 
                WHERE f.name LIKE '%$name%'";
        $result=$conn->query($sql);
        $conn->close();
        $foods = [] ;
        $i=0;
        while($row = $result->fetch_assoc()) {
            $foods[$i] = new Food ( $row['id'],$row['name'],$row['price'],$row['category'],$row['restaurant']);
            $i = $i+1;
        }

        return $foods;
    }
    public function getDiscountPercent($code)
    {
        $conn=$this->connect();

        $sql = "SELECT *
                FROM discount_code dc
                WHERE (dc.code = '$code') ";

        $result=$conn->query($sql)->fetch_assoc();
        return new DiscountCode($code,$result['percent']);
    }

}