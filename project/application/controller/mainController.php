<?php

namespace App\controller;

use Core\Request;

interface mainController
{
    public function control(Request $request);
    public function show();
}