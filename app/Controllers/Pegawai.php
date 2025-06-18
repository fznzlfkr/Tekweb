<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\BarangModel;
use App\Models\HistoryModel;
class Pegawai extends BaseController
{
    // Halaman utama dashboard pegawai
    public function index()
    {
        
        $data=['title' => 'Dashboard Pegawai'];
        return view('pegawai/dashboard', $data);
    }

    // Halaman data barang pegawai
    public function dataBarang()
    {
        $model = new BarangModel();
        return view('pegawai/data_barang', [
            'title' => 'Data Barang',
            'barang' => $model->findAll()
        ]);
    }

    public function barang_keluar()
    {
        $model = new BarangModel();
        return view('pegawai/barang_keluar', [
            'title' => 'Barang Keluar',
            'barang' => $model->findAll()
        ]);
    }

    public function proses_keluar($id)
    {
        $barangModel = new BarangModel();
        $historyModel = new HistoryModel();

        $barang = $barangModel->find($id);
        $jumlah = (int) $this->request->getPost('jumlah_keluar');

        if (!$barang || $jumlah < 1 || $jumlah > $barang['stok']) {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        // Kurangi stok
        $barangModel->update($id, ['stok' => $barang['stok'] - $jumlah]);

        // Simpan ke history
        $historyModel->insert([
            'nama_barang' => $barang['nama_barang'],
            'jumlah' => $jumlah,
            'tipe' => 'keluar',
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/pegawai/barang_keluar')->with('success', 'Barang berhasil dikeluarkan');
    }

    public function proses_masuk()
    {
        $barangModel = new BarangModel();
        $historyModel = new HistoryModel();

        $id = $this->request->getPost('barang_id');
        $jumlah = (int) $this->request->getPost('jumlah_masuk');

        $barang = $barangModel->find($id);
        if (!$barang || $jumlah < 1) {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        // Tambah stok
        $barangModel->update($id, ['stok' => $barang['stok'] + $jumlah]);

        // Simpan ke history
        $historyModel->insert([
            'nama_barang' => $barang['nama_barang'],
            'jumlah' => $jumlah,
            'tipe' => 'masuk',
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/pegawai/data_barang')->with('success', 'Barang berhasil ditambahkan');
    }

    public function save_barang()
    {
        $barangModel = new BarangModel();
        $historyModel = new HistoryModel();

        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'varian' => $this->request->getPost('varian'),
            'stok' => (int) $this->request->getPost('stok'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual')
        ];

        // Simpan ke tabel barang
        if (!$barangModel->insert($data)) {
            dd('Insert ke barang gagal!', $barangModel->errors());
        }

        $inserted = $barangModel->getInsertID();

        // Simpan ke tabel history
        $history = [
            'nama_barang' => $data['nama_barang'],
            'jumlah' => $data['stok'],
            'tipe' => 'masuk',
            'tanggal' => date('Y-m-d H:i:s')
        ];

        if (!$historyModel->insert($history)) {
            dd('Insert ke history gagal!', $historyModel->errors(), $history);
        }

        return redirect()->to('/pegawai/data_barang')->with('success', 'Barang berhasil ditambahkan.');
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