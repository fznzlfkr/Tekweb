<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\PegawaiModel;

class Admin extends BaseController
{
    public function index()
    {
        $barangModel = new BarangModel();
        $pegawaiModel = new PegawaiModel();

        $jumlahBarang = $barangModel->countAll();
        $jumlahPegawai = $pegawaiModel->countAll();

        $data = [
            'jumlahBarang'   => $jumlahBarang,
            'jumlahPegawai'  => $jumlahPegawai,
        ];

        return view('admin/dashboard', $data);
    }
}
