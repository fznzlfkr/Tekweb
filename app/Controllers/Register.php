<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        return view('auth/register', [
            'validation' => \Config\Services::validation()
        ]);
    }

    public function proses()
    {
        $rules = [
            'username'          => 'required|min_length[3]|is_unique[users.username]',
            'email'             => 'required|valid_email|is_unique[users.email]',
            'password'          => 'required|min_length[6]',
            'confirm_password'  => 'required|matches[password]'
        ];


        if (!$this->validate($rules)) {
            return view('auth/register', [
                'validation' => $this->validator
            ]);
        }

        $userModel = new UserModel();

        $data = [
            'id_pegawai' => 1, // sesuaikan dengan data yang ada di tabel pegawai
            'username'   => $this->request->getVar('username'),
            'email'      => $this->request->getVar('email'),
            'password'   => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role'       => 'Pegawai',
        ];


        $userModel->insert($data);

        session()->setFlashdata('pesan', 'Registrasi berhasil! Silakan login.');
        return redirect()->to(base_url('login'));
    }
}
