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
$routes->get('produk', 'ProdukController::index');
$routes->get('pilihproduk', 'ProdukController::indexProduk');
$routes->post('produk/store', 'ProdukController::store');
$routes->post('produk/update/(:segment)', 'ProdukController::update/$1');
$routes->delete('produk/delete/(:segment)', 'ProdukController::delete/$1');
$routes->get('produk/edit/(:num)', 'ProdukController::edit/$1');
$routes->get('produk/getProduk/(:segment)', 'ProdukController::getProduk/$1');

// User
$routes->get('user', 'UserController::index');
$routes->post('user/store', 'UserController::store');
$routes->post('user/update/(:segment)', 'UserController::update/$1');
$routes->delete('user/delete/(:segment)', 'UserController::delete/$1');
$routes->get('user/edit/(:num)', 'UserController::edit/$1');
$routes->get('user/getUser/(:segment)', 'UserController::getUser/$1');

// Email Marketing
$routes->get('email', 'EmailController::index');
$routes->post('/email', 'EmailController::sendEmail');

// News
$routes->get('news', 'NewsController::index');
$routes->get('pilihnews', 'NewsController::indexNews');
$routes->post('news/store', 'NewsController::store');
$routes->post('news/update/(:segment)', 'NewsController::update/$1');
$routes->delete('news/delete/(:segment)', 'NewsController::delete/$1');
$routes->get('news/edit/(:num)', 'NewsController::edit/$1');
$routes->get('news/getNews/(:segment)', 'NewsController::getNews/$1');

$routes->get('pesanan', 'PesananController::index');

$routes->get('pesanan/create', 'PesananController::create');
$routes->post('pesanan/store', 'PesananController::store');

$routes->post('/checkout', 'CheckoutController::submit', ['filter' => 'authCheck']);

$routes->get('pesanan', 'PesananController::index');
