<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel', 'ArtikelController::index');
$routes->get('/', 'Home::index');
$routes->get('user/login', 'UserController::index');
$routes->post('user/login', 'UserController::auth');
$routes->get('user/logout', 'UserController::logout');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/artikel/detail/(:segment)', 'Artikel::detail/$1');
$routes->get('/artikel/tambah', 'Artikel::tambah');
$routes->post('/artikel/simpan', 'Artikel::simpan');
$routes->get('/artikel/edit/(:num)', 'Artikel::edit/$1');
$routes->post('/artikel/update/(:num)', 'Artikel::update/$1');
$routes->get('/artikel/delete/(:num)', 'Artikel::delete/$1');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});
