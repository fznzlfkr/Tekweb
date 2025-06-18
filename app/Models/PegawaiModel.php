<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['nip', 'nama', 'jenis_kelamin', 'alamat', 'no_handphone', 'foto'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];

    // Callbacks
    protected $allowCallbacks = true;

    /**
     * Ambil data lengkap profil pegawai beserta username dan role dari tabel users
     */
    public function getProfilLengkap($idPegawai)
    {
        return $this->select('pegawai.*, users.username, users.role')
                    ->join('users', 'users.id_pegawai = pegawai.id')
                    ->where('pegawai.id', $idPegawai)
                    ->first();
    }
}
