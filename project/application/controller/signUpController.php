<?php

namespace App\controller;

use Core\repository\repository_using_mysql;
use Core\Request;
use Core\View;

class signUpController implements mainController
{

    public function control(Request $request)
    {
        $user=new User($request->name,$request->email,$request->password);
        $db=new repository_using_mysql();
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