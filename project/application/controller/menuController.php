<?php
namespace App\controller;

use Core\Request;
use Core\View;
use model\Food;

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
        $food = new Food();
        $breakFast = $food->get_by_name($breakFastName);
        $lunch = $food->get_by_name($lunchName);
        $dinner = $food->get_by_name($dinnerName);
        if( !$food->validate($breakFast) || !$food->validate($lunch) || !$food->validate($dinner)){
            View::render('error.index');
            return;
        }
        $params = [
            'breakFastName' => $breakFast['name'],
            'breakFastPrice' => $breakFast['price'],
            'lunchName' => $lunch['name'],
            'lunchPrice' => $lunch['price'],
            'dinnerName' => $dinner['name'],
            'dinnerPrice' => $dinner['price']
        ];
        View::render('menu.index',$params);
    }
}