<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\PegawaiModel;
use App\Models\HistoryModel;

class Admin extends BaseController
{
    public function index()
    {
        $barangModel = new BarangModel();
        $pegawaiModel = new PegawaiModel();
        $historyModel = new HistoryModel();

        // Ambil data
        $jumlahBarang = $barangModel->countAll();
        $jumlahPegawai = $pegawaiModel->countAll();
        $dataBarang = $barangModel->findAll();

        // Hitung total barang masuk
        $jumlahMasuk = $historyModel
            ->where('tipe', 'masuk')
            ->selectSum('jumlah')
            ->first()['jumlah'] ?? 0;

        // Hitung total barang keluar
        $jumlahKeluar = $historyModel
            ->where('tipe', 'keluar')
            ->selectSum('jumlah')
            ->first()['jumlah'] ?? 0;

        // Ambil semua data history
        $dataMasuk = $historyModel
            ->where('tipe', 'masuk')
            ->orderBy('tanggal', 'DESC')
            ->findAll();

        $dataKeluar = $historyModel
            ->where('tipe', 'keluar')
            ->orderBy('tanggal', 'DESC')
            ->findAll();

        // Hitung total harga beli dari semua barang (tanpa dikali stok)
        $totalHargaBarang = 0;
        foreach ($dataBarang as $barang) {
            $totalHargaBarang += $barang['harga_beli'];
        }


        // Hitung total harga barang keluar (jumlah * harga_jual per item)
        $totalHargaKeluar = 0;
        foreach ($dataKeluar as $item) {
            $barang = $barangModel->where('nama_barang', $item['nama_barang'])->first();
            $harga = $barang['harga_jual'] ?? 0;
            $totalHargaKeluar += $item['jumlah'] * $harga;
        }

        $data = [
            'jumlahBarang'     => $jumlahBarang,
            'jumlahPegawai'    => $jumlahPegawai,
            'jumlahMasuk'      => $jumlahMasuk,
            'jumlahKeluar'     => $jumlahKeluar,
            'dataBarang'       => $dataBarang,
            'dataMasuk'        => $dataMasuk,
            'dataKeluar'       => $dataKeluar,
            'totalHargaBarang' => $totalHargaBarang,
            'totalHargaKeluar' => $totalHargaKeluar,
        ];

        return view('admin/dashboard', $data);
    }
}
