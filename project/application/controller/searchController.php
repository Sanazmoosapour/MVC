<?php

namespace App\controller;

use Core\repository\repository_using_mysql;
use Core\Request;
use Core\View;

class searchController implements mainController
{

    public function control(Request $request)
    {
        $db = new repository_using_mysql();
        $food = $db->get_food_by_name($request->data('foodName'));
        $params = [
            'name' => $food->name,
            'price' => $food->price,
            'restaurant' => $food->restaurant,

        ];
        View::render('search.index',$params);
    }

    public function show()
    {
        // TODO: Implement show() method.
    }
}