<?php
namespace App\controller;
use Core\MVC;
use Core\repository\repository_using_mysql;
use Core\Request;
use Core\View;
use App\model\Food;

class homeController implements mainController
{
    public function control(Request $request)
    {
        $token= $_COOKIE['token'];

        if($request->data('select') == 'change'){
            if($token->isAdmin)
                View::render('changeMenu.index');
            else
                View::render('home.index');
        }
        else if($request->data('select') == 'show'){
            View::render('menu.selectRestaurant');
        }
        else if($request->data('select') == 'order'){
            View::render('order.index');
        }

    }

    public function show()
    {
        View::render('home.index');
    }
}
