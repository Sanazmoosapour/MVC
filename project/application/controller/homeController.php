<?php
namespace App\controller;
use Core\MVC;
use Core\Viw;
use model\Food;

class homeController
{
    public function controll()
    {
        $app=new MVC();
        $v=new Viw();
        $v->render('home.index');

    }
}
