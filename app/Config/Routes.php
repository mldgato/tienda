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

$routes->get('admin/suppliers/index', 'SupplierController::index');
$routes->get('admin/suppliers/create', 'SupplierController::create');
$routes->post('admin/suppliers/store', 'SupplierController::store');
$routes->get('admin/suppliers/edit/(:num)', 'SupplierController::edit/$1');
$routes->post('admin/suppliers/update/(:num)', 'SupplierController::update/$1');
$routes->get('admin/suppliers/delete/(:num)', 'SupplierController::delete/$1');

$routes->get('admin/products/index', 'ProductController::index');
$routes->get('admin/products/create', 'ProductController::create');
$routes->post('admin/products/store', 'ProductController::store');
$routes->get('admin/products/edit/(:num)', 'ProductController::edit/$1');
$routes->post('admin/products/update/(:num)', 'ProductController::update/$1');
$routes->get('admin/products/delete/(:num)', 'ProductController::delete/$1');
$routes->post('admin/products/upload_image_action/(:num)', 'ProductController::uploadImage_action/$1');

$routes->get('admin/customers/index', 'CustomerController::index');
$routes->get('admin/customers/create', 'CustomerController::create');
$routes->get('admin/customers/show/(:num)', 'CustomerController::show/$1');
$routes->post('admin/customers/store', 'CustomerController::store');
$routes->get('admin/customers/edit/(:num)', 'CustomerController::edit/$1');
$routes->post('admin/customers/update/(:num)', 'CustomerController::update/$1');
$routes->get('admin/customers/delete/(:num)', 'CustomerController::delete/$1');

$routes->get('admin/roles/index', 'RolController::index');
$routes->get('admin/roles/create', 'RolController::create');
$routes->post('admin/roles/store', 'RolController::store');
$routes->get('admin/roles/edit/(:num)', 'RolController::edit/$1');
$routes->post('admin/roles/update/(:num)', 'RolController::update/$1');
$routes->get('admin/roles/delete/(:num)', 'RolController::delete/$1');