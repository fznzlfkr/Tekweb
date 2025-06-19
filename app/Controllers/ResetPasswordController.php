<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class ResetPasswordController extends Controller
{
    public function requestEmail()
    {
        return view('auth/request_email');
    }

    public function sendOtp()
    {
        $email = $this->request->getPost('email');
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }

        $otp = rand(100000, 999999);
        $token = bin2hex(random_bytes(16));
        $expired = Time::now()->addMinutes(10);

        $userModel->update($user['id'], [
            'otp_code' => $otp,
            'reset_token' => $token,
            'otp_expired_at' => $expired
        ]);

        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setFrom(env('email.fromEmail'), env('email.fromName'));
        $emailService->setSubject('Kode OTP Reset Password');
        $emailService->setMessage("Halo, <br>Kode OTP kamu adalah: <b>$otp</b><br><br>Berlaku sampai: " . $expired->toDateTimeString());

        if (!$emailService->send()) {
            return redirect()->back()->with('error', 'Gagal mengirim email OTP.');
        }

        session()->set('reset_token', $token);
        return redirect()->to('/reset/verify-otp')->with('success', 'OTP telah dikirim ke email.');
    }

    public function verifyOtp()
    {
        return view('auth/verify_otp');
    }

    public function processOtp()
    {
        $otp = $this->request->getPost('otp');
        $token = session()->get('reset_token');

        $userModel = new UserModel();
        $user = $userModel->where('reset_token', $token)->first();

        if ($user && $user['otp_code'] == $otp && Time::now()->isBefore($user['otp_expired_at'])) {
            return redirect()->to('/reset/new-password');
        }

        return redirect()->back()->with('error', 'OTP salah atau sudah kadaluarsa.');
    }

    public function newPassword()
    {
        return view('auth/new_password');
    }

    public function savePassword()
    {
        $password = $this->request->getPost('password');
        $token = session()->get('reset_token');

        $userModel = new UserModel();
        $user = $userModel->where('reset_token', $token)->first();

        if ($user) {
            $userModel->update($user['id'], [
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'otp_code' => null,
                'reset_token' => null,
                'otp_expired_at' => null
            ]);
            session()->remove('reset_token');
            return redirect()->to('/login')->with('success', 'Password berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Gagal memperbarui password.');
    }
}
