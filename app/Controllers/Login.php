<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login', [
            'validation' => \Config\Services::validation()
        ]);
    }

   public function login_action()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return view('auth/login', [
                'validation' => $this->validator
            ]);
        }

        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $role = $this->request->getVar('role');
        $no_handphone = $this->request->getVar('no_handphone');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'logged_in' => true,
                    'role'   => $user['role'],
                    'username'  => $user['username'],
                ]);

                switch ($user['role']) {
                    case 'Admin':
                        return redirect()->to('admin/index');
                    case 'Pegawai':
                        return redirect()->to('pegawai/dashboard');
                    default:
                        $session->setFlashdata('pesan', 'Akun anda belum terdaftar!');
                        return redirect()->to(base_url('login'));
                }
            } else {
                $session->setFlashdata('pesan', 'Password salah, silakan coba lagi!');
                return redirect()->to(base_url('login'));
            }
        } else {
            $session->setFlashdata('pesan', 'Username tidak ditemukan!');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }


}