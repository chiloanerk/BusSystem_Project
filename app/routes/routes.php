<?php

global $router;
$router->addRoute('GET', '/', 'home/home');

$router->addRoute('GET', '/login', 'login/login');
$router->addRoute('POST', '/login', 'login/login');

$router->addRoute('GET', '/signup', 'login/signup');
$router->addRoute('POST', '/signup', 'login/signup');

$router->addRoute('GET', '/application', 'application/application');
$router->addRoute('POST', '/checkout', 'application/checkout');
$router->addRoute('GET', '/panel', 'panel/panel');

