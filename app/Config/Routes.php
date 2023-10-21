<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin', 'Home::inicio');
$routes->post('login', 'Home::login');
$routes->get('logout', 'Home::logout');


$routes->get('admin/users/index', 'UserController::index');
$routes->get('admin/users/create', 'UserController::create');
$routes->post('admin/users/store', 'UserController::store');
$routes->get('admin/users/show/(:num)', 'UserController::show/$1');
$routes->post('admin/users/update/(:num)', 'UserController::update/$1');
$routes->post('admin/users/updatePass/(:num)', 'UserController::updatePass/$1');
$routes->get('admin/users/delete/(:num)', 'UserController::delete/$1');
$routes->post('admin/users/upload_image_action/(:num)', 'UserController::uploadImage_action/$1');
