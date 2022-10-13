<?php

$routes->get('category', '\Modules\category\Controllers\CategoryController::index');
$routes->get('category/create', '\Modules\category\Controllers\CategoryController::create');
$routes->post('category/store', '\Modules\category\Controllers\CategoryController::store');

$routes->get('category/edit/(:num)', '\Modules\category\Controllers\CategoryController::edit/$1');
$routes->post('category/update/(:num)', '\Modules\category\Controllers\CategoryController::update_category/$1');

$routes->get('category/delete/(:num)', '\Modules\category\Controllers\CategoryController::delete/$1');
?>