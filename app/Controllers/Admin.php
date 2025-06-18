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

        // Ambil data 5 transaksi terbaru masing-masing
        $dataMasuk = $historyModel
            ->where('tipe', 'masuk')
            ->orderBy('tanggal', 'DESC')
            ->findAll(5);

        $dataKeluar = $historyModel
            ->where('tipe', 'keluar')
            ->orderBy('tanggal', 'DESC')
            ->findAll(5);

        $data = [
            'jumlahBarang'   => $jumlahBarang,
            'jumlahPegawai'  => $jumlahPegawai,
            'jumlahMasuk'    => $jumlahMasuk,
            'jumlahKeluar'   => $jumlahKeluar,
            'dataBarang'     => $dataBarang,
            'dataMasuk'      => $dataMasuk,
            'dataKeluar'     => $dataKeluar,
        ];

        return view('admin/dashboard', $data);
    }
}
