<?php

namespace App\model;

class Restaurant
{
    public string $name;
    public Menu $menu;
    public bool $is_open;

    public function __construct( string $name, Menu $menu,bool $is_open)
    {
        $this->name = $name;
        $this->menu = $menu;
        $this->is_open=$is_open;
    }

}