<?php
use Core\MVC;

$app = new MVC();

$app::get('/', 'homeController', 'control');

$app::post('/index.php', 'menuController', 'control');

$app->run();