<?php

namespace App\controller;

use Core\Request;
use Core\repository\repository_using_mysql;
use Core\View;
class changeMenuController implements mainController
{

    public function control(Request $request)
    {
        if(!$request->data("break") || !$request->data("lunch") || !$request->data("dinner") || !$request->data("restaurant")){
            View::render('error.index');
            return;
        }
        echo $request->data("restaurant");
        $db = new repository_using_mysql();
        $breakFast = $db->get_food_by_name_restaurant($request->data("break") , $request->data("restaurant"));
        $lunch = $db->get_food_by_name_restaurant($request->data("lunch") , $request->data("restaurant"));
        $dinner = $db->get_food_by_name_restaurant($request->data("dinner") , $request->data("restaurant"));
        if( !$breakFast->is_valid || !$lunch->is_valid || !$dinner->is_valid){
            View::render('error.index');
            return;
        }
        echo $breakFast->id;
        $db->update_restaurant_menu($request->data("restaurant"),$breakFast,$lunch,$dinner);

        View::render('home.index');

    }

    public function show()
    {
        // TODO: Implement show() method.
    }
}