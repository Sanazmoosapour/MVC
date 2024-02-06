<?php
use Core\MVC;

$app = new MVC();

$app::get('/', 'homeController', 'controll');
$app::post('/', 'homeController', 'controll');
$app->run();

