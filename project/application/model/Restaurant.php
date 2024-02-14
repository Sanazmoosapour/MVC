<?php

namespace App\model;

class Restaurant
{
    public string $name;
    public Menu $menu;

    public function __construct( string $name, Menu $menu)
    {

        $this->name = $name;
        $this->menu = $menu;
    }

}