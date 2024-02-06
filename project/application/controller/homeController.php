<?php
namespace App\controller;
use Core\MVC;
use Core\View;
use model\Food;

class homeController
{
    public function control()
    {
        View::render('home.index');
    }
}
