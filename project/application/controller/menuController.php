<?php
namespace App\controller;

use Core\repository\repository;
use Core\repository\repository_using_mysql;
use Core\Request;
use Core\View;
use App\model\Food;

class menuController implements mainController
{
    function control(Request $request)
    {
        $breakFastName = $request->data("break");
        $lunchName = $request->data("lunch");
        $dinnerName = $request->data("dinner");
        if(!$breakFastName || !$lunchName || !$dinnerName){
            View::render('error.index');
            return;
        }
        $db = new repository_using_mysql();
        $breakFast = $db->get_food_by_name($breakFastName);
        $lunch = $db->get_food_by_name($lunchName);
        $dinner = $db->get_food_by_name($dinnerName);

        if( !$breakFast->is_valid || !$lunch->is_valid || !$dinner->is_valid){
            echo 'is valid';
            View::render('error.index');
            return;
        }
        $params = [
            'breakFastName' => $breakFast->name,
            'breakFastPrice' => $breakFast->price,
            'lunchName' => $lunch->name,
            'lunchPrice' => $lunch->price,
            'dinnerName' => $dinner->name,
            'dinnerPrice' => $dinner->price
        ];
        View::render('menu.index',$params);
    }
}