<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
	$routes->extensions(['json']);

    $routes->connect('/', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/dashboard', ['controller' => 'Users', 'action' => 'dashboard']);


    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);


    $routes->fallbacks('DashedRoute');
});


Plugin::routes();
