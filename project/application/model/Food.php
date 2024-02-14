<?php
namespace App\model;
use Core\View;


class Food
{
    public int $id;
    public string $name;
    public string $category;
    public string $restaurant;
    public float $price;
    public bool $is_valid;



    public function __construct($id,$name,$price,$category,$restaurant)
    {
        if($this->validate($name,$price,$category)) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->restaurant = $restaurant;
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