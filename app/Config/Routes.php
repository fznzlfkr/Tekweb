<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman utama
$routes->get('/', 'Home::index');

// Login & Register (tanpa filter)
$routes->get('/login', 'Login::index');
$routes->post('/login_action', 'Login::login_action');
$routes->get('/logout', 'Login::logout');

$routes->get('/register', 'Register::index');
$routes->post('/register_action', 'Register::proses');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('index', 'Admin::index');
    $routes->get('data_barang', 'Admin::dataBarang');
});

$routes->group('pegawai', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Pegawai::index');
    $routes->get('data_barang', 'Barang::index');
    $routes->get('create_barang', 'Barang::create');
    $routes->post('save_barang', 'Barang::store');
    $routes->get('edit_barang/(:num)', 'Barang::edit/$1');
    $routes->post('update_barang/(:num)', 'Barang::update/$1');
    $routes->post('delete_barang/(:num)', 'Barang::delete/$1');
});

