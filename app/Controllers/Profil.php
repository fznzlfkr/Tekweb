<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\UserModel;

class Profil extends BaseController
{
<<<<<<< HEAD
    public function index()
    {
        $pegawaiId = session()->get('pegawai_id');

        $pegawaiModel = new PegawaiModel();
        $userModel = new UserModel();

        // Join UserModel dengan PegawaiModel
        $user = $userModel
            ->select('users.*, pegawai.nama, pegawai.jenis_kelamin, pegawai.alamat, pegawai.no_handphone, pegawai.lokasi_presensi')
            ->join('pegawai', 'pegawai.id = users.id_pegawai')
            ->where('users.id_pegawai', $pegawaiId)
            ->first();

        if (!$user) {
            echo "Data pengguna tidak ditemukan untuk ID: " . $pegawaiId;
            exit;
        }

        return view('pegawai/profil', [
            'title' => 'Profil Pegawai',
            'user'  => $user
        ]);
    }
=======
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

>>>>>>> ff2cfb2d923bf0578aa629112b0d9cf9b7cf1e11
}
