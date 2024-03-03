<?php

namespace App\controller;

use App\model\User;
use Core\repository\repository_using_mysql;
use Core\Request;
use Core\View;

class signUpController implements mainController
{

    public function control(Request $request)
    {
        $db=new repository_using_mysql();

        $user=new User($db->get_last_id('users')+1,$request->name,$request->email,$request->password,false);

        $result=$db->insert_user($user);
        if($result)
            View::render('signIn.index');
        else
            View::render('signUp.index');
    }

    public function show()
    {
        View::render('signUp.index');
    }
}