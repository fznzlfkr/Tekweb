<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ROUTE UMUM (Tanpa Filter)
$routes->get('/', 'Home::index');


// Login & Register
$routes->get('/login', 'Login::index');
$routes->post('/login_action', 'Login::login_action');
$routes->get('/logout', 'Login::logout');

$routes->get('/register', 'Register::index');
$routes->post('/register_action', 'Register::proses');

// ROUTE UNTUK ADMIN
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('index', 'Admin::index');
    $routes->get('data_barang', 'Admin::dataBarang');
});

// Reset Password
$routes->get('/reset', 'ResetPasswordController::requestEmail');
$routes->post('/reset/send-otp', 'ResetPasswordController::sendOtp');
$routes->get('/reset/verify-otp', 'ResetPasswordController::verifyOtp');
$routes->post('/reset/process-otp', 'ResetPasswordController::processOtp');
$routes->get('/reset/new-password', 'ResetPasswordController::newPassword');
$routes->post('/reset/save-password', 'ResetPasswordController::savePassword');


// ROUTE UNTUK PEGAWAI (dengan filter login)
$routes->group('pegawai', ['filter' => 'auth'], function ($routes) {
    // Dashboard & Profil
    $routes->get('dashboard', 'Pegawai::index');
    $routes->get('profil', 'Profil::index');
    $routes->post('profil/save', 'Profil::save'); // pindahkan ke dalam grup

    // Barang (CRUD)
    $routes->get('data_barang', 'Barang::index');
    $routes->get('create_barang', 'Barang::create');
    $routes->post('save_barang', 'Pegawai::save_barang');
    $routes->get('edit_barang/(:num)', 'Barang::edit/$1');
    $routes->post('update_barang/(:num)', 'Barang::update/$1');
    $routes->post('delete_barang/(:num)', 'Barang::delete/$1');

    // Barang Keluar
    $routes->get('barang_keluar', 'Pegawai::barang_keluar');
    $routes->post('proses_keluar/(:num)', 'Pegawai::proses_keluar/$1');

    // History
    $routes->get('history', 'Pegawai::history');

    // Edit Profil Pegawai (opsional)
    $routes->get('profil', 'Profil::index');
    $routes->get('profil/edit', 'Profil::edit');
    $routes->post('profil/update', 'Profil::update');
    
});

$routes->post('/profil/save', 'Profil::save');


$routes->get('pegawai/dashboard', 'Pegawai::index');
$routes->get('pegawai/data_barang', 'Barang::index');
$routes->get('pegawai/create_barang', 'Barang::create');
$routes->post('pegawai/save_barang', 'Barang::store');
$routes->get('pegawai/edit_barang/(:num)', 'Barang::edit/$1');
$routes->post('pegawai/update_barang/(:num)', 'Barang::update/$1');
$routes->post('pegawai/delete_barang/(:num)', 'Barang::delete/$1');
$routes->get('pegawai/profil', 'Profil::index');
$routes->get('pegawai/edit/(:num)', 'Pegawai::edit/$1');
$routes->post('pegawai/update/(:num)', 'Pegawai::update/$1');
$routes->get('pegawai/profil/(:num)', 'Pegawai::profil/$1');
$routes->post('pegawai/update/(:num)', 'Pegawai::update/$1');



