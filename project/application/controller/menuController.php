<?php
namespace App\controller;

use Core\Viw;

class menuController
{
    function menu()
    {
        echo "here";
        $breakFastName = $_POST['break'];
        echo $breakFastName;
        $lunchName = $_POST['lunch'];
        $dinnerName = $_POST['dinner'];
            echo "here";
            menu2($breakFastName,$lunchName,$dinnerName);
            $v=new Viw();
            $v->render('menu.index');


    }
}