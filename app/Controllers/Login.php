<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => service('validation'),
        ];
        return view('auth/login', $data);
    }
public function loginAction()
{
    $rules = [
        'username' => 'required|min_length[3]|max_length[255]',
        'password' => 'required|min_length[8]|max_length[255]',
    ];

    if (!$this->validate($rules)) {
        return view('auth/login', [
            'validation' => $this->validator,
        ]);
    }

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Load model
    $userModel = new \App\Models\UserModel();

    // Cek user berdasarkan username
    $user = $userModel->where('username', $username)->first();

    if (!$user) {
        return redirect()->back()->withInput()->with('error', 'Username tidak ditemukan.');
    }

    // Verifikasi password
    if (!password_verify($password, $user['password'])) {
        return redirect()->back()->withInput()->with('error', 'Password salah.');
    }

    // Simpan data ke session
    $session = session();
    $session->set([
        'user_id'   => $user['id'],
        'username'  => $user['username'],
        'role'      => $user['role'],
        'logged_in' => true,
    ]);

    // Redirect berdasarkan role
    switch ($user['role']) {
        case 'admin':
            return redirect()->to('/admin/dashboard');
        case 'customer':
            return redirect()->to('/pegawai/dashboard');
        default:
            return redirect()->to('/login')->with('error', 'Role tidak dikenali.');
    }
}


}