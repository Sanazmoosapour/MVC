<?php

namespace App\model;

 interface Model
{
    public function validate($result) : bool;

}