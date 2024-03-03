<?php

namespace App\controller;

use App\model\Food;
use App\model\Order;
use Core\repository\repository_using_mysql;
use Core\Request;
use Core\View;

class orderController implements mainController
{

    public function control(Request $request)
    {
        $token=$_COOKIE['token'];
        $db=new repository_using_mysql();
        $food=$db->get_food_by_name($request->foodName,$request->restaurant);

        $order=new Order($db->get_last_id('order'),$token->userId,$food->id);
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