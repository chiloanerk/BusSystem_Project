<?php

global $router;
$router->addRoute('GET', '/', 'home/home');
$router->addRoute('GET', '/dashboard', 'dashboard/dashboard');
$router->addRoute('GET', '/login', 'login/login');