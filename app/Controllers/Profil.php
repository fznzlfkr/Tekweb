<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class Profil extends BaseController
{
    public function index()
{
    $pegawaiId = session()->get('pegawai_id');


    $pegawaiModel = new PegawaiModel();
    // Untuk sementara
    $pegawai = $pegawaiModel->find($pegawaiId);


    if (!$pegawai) {
        echo "Data pegawai tidak ditemukan untuk ID: " . $pegawaiId; exit;
    }

    return view('pegawai/profil', [
        'title' => 'Profil Pegawai',
        'pegawai' => $pegawai
    ]);
}

}
