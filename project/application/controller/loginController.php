<?php

namespace App\controller;
use Core\View;
use DateTimeImmutable;
use Core\Request;
use Firebase\JWT\JWT;


class loginController implements mainController
{

    public function control(Request $request)
    {
        $secret_Key  = '23';
        $date   = new DateTimeImmutable();
        $expire_at     = $date->modify('+6 minutes')->getTimestamp();
        $request_data = [
            'iat'  => $date->getTimestamp(),
            'exp'  => $expire_at,
            'userName' => $request->data('name'),
        ];

        $token = JWT::encode($request_data,$secret_Key,'HS256');

        setcookie("token",$token,$expire_at,"/","",true,true);

        View::render('home.index');
    }
}