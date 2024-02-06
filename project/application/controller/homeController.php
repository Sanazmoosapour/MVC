<?php
namespace App\controller;
use Core\Viw;
use model\Food;

class homeController
{
    public function controll()
    {
        $app=new Viw();
        $app->render('home.index');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $breakFastName = $_POST['break'];
            $lunchName = $_POST['lunch'];
            $dinnerName = $_POST['dinner'];
            if (empty($break) || empty($lunch) || empty($dinner)) {
                echo " empty";
            }
            else {
                $breakFast=new Food();
                $breakFast->get_by_name($breakFastName);
                $lunch=new Food();
                $lunch->get_by_name($lunchName);
                $dinner=new Food();
                $dinner->get_by_name($dinnerName);
                menu($breakFast,$lunch,$dinner);
                $app->render('menu.index');

            }
        }

    }
}
