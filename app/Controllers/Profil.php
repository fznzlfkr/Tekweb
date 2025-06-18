<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        $username = session()->get('username');
    
        if (!$username) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        $userModel = new UserModel();
    
        $user = $userModel
            ->select('users.id, users.username, users.email, users.role, users.id_pegawai, pegawai.nama, pegawai.jenis_kelamin, pegawai.alamat, pegawai.no_handphone')
            ->join('pegawai', 'pegawai.id = users.id_pegawai')
            ->where('users.username', $username)
            ->first();
    
        if (!$user) {
            return redirect()->to('/dashboard')->with('error', 'Data profil tidak ditemukan.');
        }
    
        return view('pegawai/profil', [
            'title' => 'Profil Pegawai',
            'user'  => $user
        ]);
    }
    
    public function save()
    {
        $pegawaiModel = new \App\Models\PegawaiModel();
    
        $pegawaiModel->update($this->request->getPost('id_pegawai'), [
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_handphone'  => $this->request->getPost('no_handphone'),
        ]);
    
        return redirect()->to('/profil')->with('success', 'Profil berhasil diperbarui.');
    }
    
}
