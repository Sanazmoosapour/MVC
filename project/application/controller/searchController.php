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
        $foods = $db->get_foods_by_name($request->data('food'));
        $params = [
            'foods' => $foods,
        ];
        View::render('search.index',$params);
    }

    public function show()
    {
        // TODO: Implement show() method.
    }
}