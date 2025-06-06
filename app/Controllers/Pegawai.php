<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pegawai extends BaseController
{
    public function index()
    {
        $data=['title' => 'Dashboard Pegawai'];
        return view('pegawai/dashboard', $data);
    }
    public function dataBarang()
    {
        return view('pegawai/data_barang');
    }
}
