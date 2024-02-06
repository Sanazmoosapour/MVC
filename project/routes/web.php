<?php
use Core\MVC;

$app = new MVC();

$app::get('/', 'homeController', 'controll');

$app::post('/index.php', 'menuController', 'menu');

$app->run();