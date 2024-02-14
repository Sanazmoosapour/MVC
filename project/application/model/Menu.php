<?php

namespace App\model;

class Menu
{
    public string $restaurant_name;
    public Food $break_fast;
    public Food $lunch;
    public Food $dinner;


    public function __construct(string $restaurant_name, Food $break_fast, Food $lunch, Food $dinner)
    {
        $this->restaurant_name = $restaurant_name;
        $this->break_fast = $break_fast;
        $this->lunch = $lunch;
        $this->dinner = $dinner;
    }


}