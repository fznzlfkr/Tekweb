<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    // Halaman utama dashboard pegawai
    public function index()
    {
<<<<<<< HEAD
        
        $data=['title' => 'Dashboard Pegawai'];
=======
        $data = ['title' => 'Dashboard Pegawai'];
>>>>>>> ff2cfb2d923bf0578aa629112b0d9cf9b7cf1e11
        return view('pegawai/dashboard', $data);
    }

    // Halaman data barang pegawai
    public function dataBarang()
    {
        return view('pegawai/data_barang');
    }

    // Menampilkan profil pegawai
    public function profil($id)
    {
        $pegawaiModel = new PegawaiModel();
        $pegawai = $pegawaiModel->find($id);

        if (!$pegawai) {
            return redirect()->to(base_url('pegawai'))->with('error', 'Data pegawai tidak ditemukan.');
        }

        $data = [
            'title'   => 'Profil Pegawai',
            'pegawai' => $pegawai
        ];

        return view('pegawai/profil', $data);
    }

    // Menampilkan form edit profil pegawai
    public function edit($id)
    {
        $pegawaiModel = new PegawaiModel();
        $pegawai = $pegawaiModel->find($id);

        if (!$pegawai) {
            return redirect()->to('/')->with('error', 'Data tidak ditemukan');
        }

        $data = [
            'title'   => 'Edit Profil Pegawai',
            'pegawai' => $pegawai
        ];

        return view('pegawai/edit', $data);
    }

    // Proses update data pegawai
    public function update($id)
    {
        $pegawaiModel = new PegawaiModel();
        $pegawai = $pegawaiModel->find($id);

        if (!$pegawai) {
            return redirect()->to(base_url('pegawai'))->with('error', 'Data tidak ditemukan.');
        }

        $data = $this->request->getPost();
        $foto = $this->request->getFile('foto');

        // Jika ada upload foto baru
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/', $newName);
            $data['foto'] = $newName;

            // Hapus foto lama jika ada
            if (!empty($pegawai['foto']) && file_exists('uploads/' . $pegawai['foto'])) {
                unlink('uploads/' . $pegawai['foto']);
            }
        }

        $pegawaiModel->update($id, $data);

        return redirect()->to(base_url('pegawai/profil/' . $id))->with('success', 'Data berhasil diperbarui');
    }
}
