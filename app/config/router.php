<?php

$router = $di->getRouter();

// Define your routes here

$router->handle($_SERVER['REQUEST_URI']);

$router->add(
    '/dashboard',
    [
        'controller' => 'index',
        'action' => 'dashboard',
    ]
);