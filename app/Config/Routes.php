<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/page/(:segment)', [Home::class,'view']);
$routes->post('/user/insert',[Home::class, 'store']);
