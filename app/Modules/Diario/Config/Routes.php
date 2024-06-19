<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$routes->group(ADMIN_AREA, ['namespace' => 'App\Modules\Diario\Controllers'], static function ($routes) {
    $routes->match(['GET', 'POST'],'diario','AdminDiario::index');
    $routes->match(['GET', 'POST'],'listss','AdminDiario::listss');
    $routes->match(['GET', 'POST'],'diario_ss','AdminDiario::dtjson');
    $routes->match(['GET', 'POST'],'diario/create',            'AdminDiario::create');
    $routes->match(['GET', 'POST'],'diario/createOk',          'AdminDiario::createOk');
    $routes->match(['GET', 'POST'],'diario/update/(:num)',     'AdminDiario::update/$1');
    $routes->match(['GET', 'POST'],'diario/updateOk',          'AdminDiario::updateOk');
    $routes->get('diario/delete/(:num)',   'AdminDiario::delete/$1'); 
    $routes->post('diario/deletesel',   'AdminDiario::deletesel'); 
    $routes->get('diario/read/(:num)',     'AdminDiario::read/$1');   
    $routes->match(['GET', 'POST'],'diario/filtro',     'AdminDiario::filtro');  
        
});