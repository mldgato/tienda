<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin', 'Home::inicio');
$routes->post('login', 'Home::login');
$routes->get('logout', 'Home::logout');


$routes->get('admin/users/show/(:num)', 'UserController::show/$1');
$routes->post('admin/users/upload_image_action/(:num)', 'UserController::uploadImage_action/$1');
