<?php

namespace App\model;

class User
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public bool $isAdmin;

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     * @param bool $isAdmin
     */
    public function __construct(int $id, string $name, string $email, string $password, bool $isAdmin)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }




}