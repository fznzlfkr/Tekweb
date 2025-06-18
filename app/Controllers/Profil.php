<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Profil extends BaseController
{
   public function index()
{
    $model = new \App\Models\PegawaiModel();

    $data['title'] = 'Profil Pegawai'; // Tambahkan ini
    $data['pegawai'] = $model->getProfilLengkap(1);

    if (!$data['pegawai']) {
        return 'Data pegawai tidak ditemukan.';
    }

    return view('pegawai/profil', $data);
}

}
