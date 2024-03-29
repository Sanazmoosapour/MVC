<?php
use Core\MVC;

$app = new MVC();

$app::get('/', 'signInController', 'show');
$app::post('/', 'homeController', 'show');
$app::post('/makeAccount', 'signUpController', 'show');
$app::post('/signIn', 'signInController', 'control');
$app::post('/signUp', 'signUpController', 'control');
$app::post('/home', 'homeController', 'control');
$app::post('/order', 'orderController', 'control');
$app::post('/showMenu', 'menuController', 'control');
$app::post('/changeMenu', 'changeMenuController', 'control');
$app::post('/addDiscount', 'addDiscountController', 'control');
$app::post('/Search', 'searchController', 'control');
$app::post('/setOrder', 'invoiceController', 'control');




$app->run();