<?php

namespace App\controller;

use Core\repository\repository_using_mysql;
use Core\Request;
use Core\View;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class addDiscountController implements mainController
{

    public function control(Request $request)
    {
        $token= JWT::decode($_COOKIE['token'],new Key('23','HS256'));
        $db = new repository_using_mysql();
        $db->update_user_discountCode($request->data('userId'),$request->data('code'));
        View::render('home.index');
    }

    public function show()
    {
        // TODO: Implement show() method.
    }
}