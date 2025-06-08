<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use CodeIgniter\HTTP\ResponseInterface;

class Barang extends BaseController
{
    public function index()
    {   
        $barangModel = new BarangModel();
        
        $data = [
            'title' => 'Data Barang',
            'barang' => $barangModel->findAll(),
        ];

        return view('pegawai/data_barang', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Barang',
        ];

        return view('pegawai/create_barang', $data);
    }
    public function store()
    {
        $barangModel = new BarangModel();

        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'varian' => $this->request->getPost('varian'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
        ];

        if ($barangModel->insert($data)) {
            return redirect()->to('/pegawai/data_barang')->with('success', 'Barang berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('errors', $barangModel->errors());
        }
    }
    public function edit($id)
    {
        $barangModel = new BarangModel();
        $barang = $barangModel->find($id);

        if (!$barang) {
            return redirect()->to('/pegawai/data_barang')->with('error', 'Barang tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Barang',
            'barang' => $barang,
        ];

        return view('pegawai/edit_barang', $data);
    }
public function update($id)
{
    $barangModel = new BarangModel();

    $data = [
        'nama_barang' => $this->request->getVar('nama_barang'),
        'varian' => $this->request->getVar('varian'),
        'harga_beli' => $this->request->getVar('harga_beli'),
        'harga_jual' => $this->request->getVar('harga_jual'),
    ];

    if ($barangModel->update($id, $data)) {
        return redirect()->to('/pegawai/data_barang')->with('success', 'Barang berhasil diupdate.');
    } else {
        return redirect()->back()->withInput()->with('errors', $barangModel->errors());
    }
}

 
    public function delete($id)
    {
        $barangModel = new BarangModel();

        if ($barangModel->delete($id)) {
            return redirect()->to('/pegawai/data_barang')->with('success', 'Barang berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus barang.');
        }
    }
}
