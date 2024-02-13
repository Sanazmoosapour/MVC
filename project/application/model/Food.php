<?php
namespace App\model;
use Core\View;


class Food
{
    public string $name;
    public string $category;
    public float $price;
    public bool $is_valid;



    public function __construct($name,$price,$category)
    {
        if($this->validate($name,$price,$category)) {
            $this->name = $name;
            $this->price = $price;
            $this->category = $category;
            $this->is_valid = true;
        }
        else{
            $this->is_valid = false;
        }
    }


    public function validate($name,$price,$category) : bool
    {
        if(!$name || !$category || $price<0){
            return false;
        }
        return true;

    }
}