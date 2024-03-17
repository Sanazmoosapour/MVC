<?php
namespace App\controller;
use Core\MVC;
use Core\repository\repository_using_mysql;
use Core\Request;
use Core\View;
use App\model\Food;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class homeController implements mainController
{
    public function control(Request $request)
    {
        $token = JWT::decode($_COOKIE['token'],new Key('23','HS256'));
        if($request->data('select') == 'change'){
            if($token->isAdmin)
                View::render('changeMenu.index');
            else
                View::render('error.no_access');
        }
        else if($request->data('select') == 'show'){
            View::render('menu.selectRestaurant');
        }
        else if($request->data('select') == 'order'){
            View::render('order.index');
        }
        else if($request->data('select') == 'search'){
            View::render('search.foodSearch');
        }
        else if($request->data('select') == 'add_discount_code'){
            if($token->isAdmin == 'true')
                View::render('addDiscount.index');
            else
                View::render('error.no_access');
        }
        else if($request->data('select') == 'change_account'){
                View::render('signIn.index');
        }

    }

    public function show()
    {
        View::render('home.index');
    }
}
