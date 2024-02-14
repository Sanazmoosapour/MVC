<?php
namespace App\controller;
use Core\MVC;
use Core\Request;
use Core\View;
use App\model\Food;

class homeController implements mainController
{
    public function control(Request $request)
    {
        View::render('home.index');
    }

}
