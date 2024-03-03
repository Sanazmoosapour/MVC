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
        $token=JWT::decode($_COOKIE['token'],new Key('23','HS256'));
        $db=new repository_using_mysql();
        $food=$db->get_food_by_name($request->foodName,$request->restaurant);
        $order=new Order($db->get_last_id('order')+1,$token->userId,$food->id);
        if($db->insert_order($order)){
            View::render('home.index');
            return;
        }
        View::render('order.index');


    }

    public function show()
    {
        // TODO: Implement show() method.
    }
}