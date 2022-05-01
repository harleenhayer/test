<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('load-more',['controller' => 'LoadMore', 'action' => 'index']);
$router->add('{controller}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);