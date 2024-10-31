<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Registe
$routes->get('/register', 'AuthController::registerForm');
$routes->post('/register', 'AuthController::register');
$routes->get('/login', 'AuthController::loginForm');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');


$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'authCheck']);

// Produk
$routes->group('produk', ['filter' => 'authCheck'], function ($routes) {
    $routes->get('/', 'ProdukController::index'); // untuk route produk
    $routes->get('pilihproduk', 'ProdukController::indexProduk');
    $routes->post('store', 'ProdukController::store');
    $routes->post('update/(:segment)', 'ProdukController::update/$1');
    $routes->delete('delete/(:segment)', 'ProdukController::delete/$1');
    $routes->get('edit/(:num)', 'ProdukController::edit/$1');
    $routes->get('getProduk/(:segment)', 'ProdukController::getProduk/$1');
});


// User
$routes->get('user', 'UserController::index');
$routes->post('user/store', 'UserController::store');
$routes->post('user/update/(:segment)', 'UserController::update/$1');
$routes->delete('user/delete/(:segment)', 'UserController::delete/$1');
$routes->get('user/edit/(:num)', 'UserController::edit/$1');
$routes->get('user/getUser/(:segment)', 'UserController::getUser/$1');

//Email
$routes->group('email', ['filter' => 'authCheck'], function ($routes) {
    // Email Marketing
    $routes->get('/', 'EmailController::index');
    $routes->post('/', 'EmailController::sendEmail');

    // Email Subscribe
    $routes->post('subscribe', 'EmailController::getEmail');
    $routes->get('subscribers', 'EmailController::showEmailSub');
    $routes->delete('delete/(:segment)', 'EmailController::delete/$1');
});


$routes->group('news', ['filter' => 'authCheck'], function ($routes) {
    $routes->get('/', 'NewsController::index'); // Untuk route utama news
    $routes->post('store', 'NewsController::store');
    $routes->post('update/(:segment)', 'NewsController::update/$1');
    $routes->delete('delete/(:segment)', 'NewsController::delete/$1');
    $routes->get('edit/(:num)', 'NewsController::edit/$1');
    $routes->get('getNews/(:segment)', 'NewsController::getNews/$1');
});
