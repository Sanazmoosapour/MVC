<?php

namespace App\controller;

use App\model\Order;
use App\model\User;
use Core\repository\repository_using_mysql;
use Core\Request;
use Core\View;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class invoiceController implements mainController
{

    public function control(Request $request)
    {
        $token=JWT::decode($_COOKIE['token'],new Key('23','HS256'));
        $db=new repository_using_mysql();
        $food=$db->get_food_by_name_restaurant($request->data('name'),$request->data('restaurant'));
        echo $db->get_last_id('order');
        $order=new Order($db->get_last_id('my_resturant.order')+1,$token->userId,$food->id,$request->data('price'));
        $db->insert_order($order);
        View::render('home.index');
    }

    public function show()
    {
        // TODO: Implement show() method.
    }
}