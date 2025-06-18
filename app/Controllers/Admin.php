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
        $dataBarang = $barangModel->findAll(); // Tambahkan ini

        $data = [
            'jumlahBarang'   => $jumlahBarang,
            'jumlahPegawai'  => $jumlahPegawai,
            'dataBarang'     => $dataBarang, // Kirim data barang ke view
        ];

        return view('admin/dashboard', $data);
    }
}
