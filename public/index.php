<?php

use app\classes\Router;

require_once '../app/helpers/functions.php';

spl_autoload_register(function ($className) {
    $baseDir = __DIR__ . '/../';

    // This converts namespace separators to directory separators
    $className = str_replace('\\', '/', $className);

    // full path to class file
    $file = $baseDir . $className . '.php';

    // Include the class file if it exists
    if (file_exists($file)) {
        require_once $file;
    }
});

// Starting the router class
$router = new Router();

// Path to routes file
require_once base_path('app/routes/routes.php');

$router->handleRequest();
