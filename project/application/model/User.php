<?php

namespace App\model;

class User
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public string $discount_code;
    public bool $isAdmin;

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $discount_code
     * @param string $isAdmin
     */
    public function __construct(int $id, string $name, string $email, string $password,string $discount_code, string $isAdmin)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->discount_code = $discount_code;
        if($isAdmin=='true')
            $this->isAdmin = true;
        else
            $this->isAdmin=false;
    }




}