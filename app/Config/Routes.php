<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->setAutoRoute(true);
$routes->get('/', 'Home::index');
$routes->get('/page/(:segment)', [Home::class,'view'],['filter' => 'auth']);
$routes->post('/user/insert',[Home::class, 'store']);


// $routes->setDefaultController('Register');
// $routes->get('/', 'Register::index', ['filter' => 'guestFilter']);
// $routes->get('/register', 'Register::index', ['filter' => 'guestFilter']);
// $routes->post('/register', 'Register::register', ['filter' => 'guestFilter']);
 
// $routes->get('/login', 'Login::index', ['filter' => 'guestFilter']);
// $routes->post('/login', 'Login::authenticate', ['filter' => 'guestFilter']);
 
// $routes->get('/logout', 'Login::logout', ['filter' => 'authFilter']);
// $routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authFilter']);

service('auth')->routes($routes);