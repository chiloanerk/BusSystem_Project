<?php

global $router;
$router->addRoute('GET', '/', 'home/home');

$router->addRoute('GET', '/login', 'login/login');
$router->addRoute('GET', '/logout', 'login/logout');
$router->addRoute('POST', '/login', 'login/login');

$router->addRoute('GET', '/signup', 'login/signup');
$router->addRoute('POST', '/signup', 'login/signup');

$router->addRoute('GET', '/application', 'application/application');
$router->addRoute('POST', '/review', 'application/review');
$router->addRoute('GET', '/review', 'application/review');
$router->addRoute('POST', '/complete', 'application/complete');
$router->addRoute('GET', '/checkout', 'application/checkout');
$router->addRoute('GET', '/final', 'application/final');

$router->addRoute('GET', '/dashboard', 'admin/dashboard');
$router->addRoute('GET', '/approve', 'admin/approve');

