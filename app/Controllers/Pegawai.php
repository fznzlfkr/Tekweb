<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pegawai extends BaseController
{
    public function index()
    {
        return view('pegawai/dashboard');
    }
    public function dataBarang()
    {
        return view('pegawai/data_barang');
    }
}
