<?php

namespace App\controller;

use App\model\Food;
use App\model\Order;
use Core\repository\repository_using_mysql;
use Core\Request;
use Core\View;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class orderController implements mainController
{

    public function control(Request $request)
    {
        $token = JWT::decode($_COOKIE['token'],new Key('23','HS256'));
        $db = new repository_using_mysql();
        $restaurant = $db->get_restaurant_by_name($request->data('restaurant'));
        if(!$restaurant->is_open){
            echo "not open";
            View::render('error.in_valid');
            return;
        }
        if($request->data('discount') != '') {
            if (!$db->get_user_by_id($token->userId)->discount_code == $request->data('discount')) {
                View::render('error.in_valid');
                return;
            }
        }

        $food = $db->get_food_by_name_restaurant($request->data('foodName'),$request->data('restaurant'));
        if($request->data('discount') != ''){
            $price = $food->price * (100 - $db->getDiscountPercent($request->data('discount'))->percent)/100.0;
        }
        else
            $price = $food->price;

        $params = [
            'foodName' => $food->name,
            'price' => $price,
            'restaurant' => $restaurant->name
        ];
        View::render('invoice.index',$params);

    }

    public function show()
    {
        // TODO: Implement show() method.
    }
}