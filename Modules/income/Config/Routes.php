<?php


$routes->get('/incomes', '\Modules\income\Controllers\IncomeController::index');
$routes->get('/incomes/create', '\Modules\income\Controllers\IncomeController::create');

$routes->post('incomes/store', '\Modules\income\Controllers\IncomeController::store');
$routes->get('incomes/edit/(:num)', '\Modules\income\Controllers\IncomeController::edit/$1');
$routes->post('incomes/update/(:num)', '\Modules\income\Controllers\IncomeController::update/$1');
$routes->get('incomes/delete/(:num)', '\Modules\income\Controllers\IncomeController::delete/$1');


// $routes->get('category/delete/(:num)', '\Modules\category\Controllers\CategoryController::delete/$1');

?>