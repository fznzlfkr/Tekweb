
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->post('/login_action', 'Login::login_action'); // sesuai action form
$routes->get('/logout', 'Login::logout');



$routes->get('admin/index', 'Admin::index');
$routes->get('admin/data_barang', 'Admin::dataBarang');

$routes->get('pegawai/dashboard', 'Pegawai::index');
$routes->get('/data_barang', 'Pegawai::dataBarang');
