<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->post('login_action', 'Login::loginAction');
$routes->get('register', 'Register::index');

$routes->get('/dashboard', 'Pegawai::index');
$routes->get('/data_barang', 'Pegawai::dataBarang');
