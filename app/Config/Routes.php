<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman utama
$routes->get('/', 'Home::index');

// Login
$routes->get('/login', 'Login::index');
$routes->post('/login_action', 'Login::login_action');
$routes->get('/logout', 'Login::logout');

// Register
$routes->get('/register', 'Register::index');
$routes->post('/register_action', 'Register::proses');


// Admin
$routes->get('/admin/index', 'Admin::index');
$routes->get('/admin/data_barang', 'Admin::dataBarang');

// Pegawai
$routes->get('/pegawai/dashboard', 'Pegawai::index');

// Barang (fitur untuk pegawai)
$routes->get('/pegawai/data_barang', 'Barang::index');
$routes->get('/pegawai/create_barang', 'Barang::create');
$routes->post('/pegawai/save_barang', 'Barang::store');
$routes->get('/pegawai/edit_barang/(:num)', 'Barang::edit/$1');
$routes->post('/pegawai/update_barang/(:num)', 'Barang::update/$1');
$routes->post('/pegawai/delete_barang/(:num)', 'Barang::delete/$1');
