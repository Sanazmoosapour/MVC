<?php

namespace App\controller;
use Core\repository\repository_using_mysql;
use Core\View;
use DateTimeImmutable;
use Core\Request;
use Firebase\JWT\JWT;


class signInController implements mainController
{

    public function control(Request $request)
    {
        $db=new repository_using_mysql();
        $user=$db->get_user_ifexist($request->data('name'),$request->data('email'),$request->data('email'));
        if($user==null){
            View::render('signIn.index');
            return;
        }
        $secret_Key  = '23';
        $date   = new DateTimeImmutable();
        $expire_at     = $date->modify('+6 minutes')->getTimestamp();
        $request_data = [
            'iat'  => $date->getTimestamp(),
            'exp'  => $expire_at,
            'userId' => $user->id,
            'isAdmin' => $user->isAdmin,
        ];
        $token = JWT::encode($request_data,$secret_Key,'HS256');
        setcookie("token",$token,$expire_at,"/","",true,true);
        View::render('home.index');

    }

    public function show()
    {
        View::render('signIn.index');
    }
}