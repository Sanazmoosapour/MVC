<?php
namespace App\controller;


use Core\repository\repository_using_mysql;
use Core\Request;
use Core\View;


class menuController implements mainController
{
    function control(Request $request)
    {
        if($request->data('select') == 'change'){
            $this->changeMenu($request);
        }
        if($request->data('select') == 'show'){
            $this->showMenu($request);
        }

    }

    function changeMenu(Request $request)
    {

        $params = [
            'restaurantName' => $request->data('restaurant')
        ];
        View::render('changeMenu.index',$params);

    }
    function showMenu(Request $request)
    {
        $db = new repository_using_mysql();
        $restaurant = $db->get_restaurant_by_name($request->data('restaurant'));
        $params = [
            'breakFastName' => $restaurant->menu->break_fast->name,
            'breakFastPrice' => $restaurant->menu->break_fast->price,
            'lunchName' => $restaurant->menu->lunch->name,
            'lunchPrice' => $restaurant->menu->lunch->price,
            'dinnerName' => $restaurant->menu->dinner->name,
            'dinnerPrice' => $restaurant->menu->dinner->price,
            'restaurantName' => $restaurant->name
        ];
        View::render('menu.index',$params);


    }
}