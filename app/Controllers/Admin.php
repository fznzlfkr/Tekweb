<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/index', [
            'title' => 'Dashboard Admin',
            'validation' => \Config\Services::validation()
        ]);
    }
}
