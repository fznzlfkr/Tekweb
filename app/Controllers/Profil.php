<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PegawaiModel;

class Profil extends BaseController
{
public function index()
{
    $username = session()->get('username');

    if (!$username) {
        return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $userModel = new \App\Models\UserModel();

    $user = $userModel
        ->where('username', $username)
        ->first();

    if (!$user) {
        return redirect()->to('/dashboard')->with('error', 'Data pengguna tidak ditemukan.');
    }

    $pegawaiModel = new \App\Models\PegawaiModel();
    $pegawai = $pegawaiModel->find($user['id_pegawai']);

    // Gabungkan data user dan pegawai agar bisa diakses dari satu variabel saja di view
    $data = [
        'title'        => 'Profil Pegawai',
        'pegawai'       => array_merge($user, $pegawai ?? []), // Menggabungkan data users & pegawai
    ];

    return view('pegawai/profil', $data);
}



    public function save()
    {
        $pegawaiModel = new PegawaiModel();

        $pegawaiModel->update($this->request->getPost('id_pegawai'), [
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_handphone'  => $this->request->getPost('no_handphone'),
            'email'         => $this->request->getPost('email'),
            'username'      => $this->request->getPost('username')
        ]);
        $userModel = new UserModel();

        $userModel->update($this->request->getPost('id_user'), [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email')
        ]);


        return redirect()->to('/profil')->with('success', 'Profil berhasil diperbarui.');
    }
}
