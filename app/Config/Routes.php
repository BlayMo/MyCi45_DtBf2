<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('salir', 'Home::salir');
$routes->get('features', 'Home::features');

$routes->match(['GET', 'POST'],'diario','Diario::index',   ['namespace' => 'App\Controllers']);
$routes->get('diario/read/(:num)',     'Diario::read/$1',  ['namespace' => 'App\Controllers']); 

$routes->match(['GET', 'POST'],'diario/list','Diario::list',   ['namespace' => 'App\Controllers']);
$routes->match(['GET', 'POST'],'diario_ss','Diario::dtjson');  

$routes->match(['GET', 'POST'],'tipos','Tipos::index',   ['namespace' => 'App\Controllers']);
$routes->get('tipos/read/(:num)',     'Tipos::read/$1',  ['namespace' => 'App\Controllers']);     
        