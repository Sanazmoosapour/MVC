<?php

namespace App\model;

class User
{
    public int $id;
    public string $name;
    public bool $isAdmin;

    public function __construct(int $id, string $name, bool $isAdmin)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isAdmin = $isAdmin;
    }
    public function validate($name) : bool
    {
        if(!$name ){
            return false;
        }
        return true;

    }

}