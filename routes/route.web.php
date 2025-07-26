<?php

use App\controller\CitoyenController;

$routes = [
    '/{cin}' => [
        'controller' => ExampleController::class,
        'method' => 'login'
    ],
    '/' => [
        'controller' => ExampleController::class,
        'method' => 'login'
    ]
]; 