
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
$routes->get('pegawai/data_barang', 'Barang::index');
$routes->get('pegawai/create_barang', 'Barang::create');
$routes->post('pegawai/save_barang', 'Barang::store');
$routes->get('pegawai/edit_barang/(:num)', 'Barang::edit/$1');
$routes->post('pegawai/update_barang/(:num)', 'Barang::update/$1');
$routes->post('pegawai/delete_barang/(:num)', 'Barang::delete/$1');
$routes->get('pegawai/profil', 'Profil::index');
