<!-- app/Views/auth/request_email.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Email</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(to bottom, rgba(58, 123, 213, 0.6), rgba(58, 96, 115, 0.6)),
                        url("../img/bg.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 2.5rem;
            color: white;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            max-width: 400px;
            margin: 0 auto;
        }

        .glass-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .title {
            font-size: 2.5rem;
            font-weight: 300;
            text-align: center;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, #fff, rgba(255, 255, 255, 0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            padding: 12px 20px 12px 20px;
            height: auto;
            transition: all 0.3s ease;
            font-size: 16px;
            width: 100%;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .btn-login {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            color: #333;
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 16px;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.9));
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            color: #333;
        }

        .btn-login::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .extra-links {
            display: flex;
            justify-content: center;
            margin-top: 1.5rem;
            font-size: 14px;
        }

        .extra-links a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .extra-links a:hover {
            color: white;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.3);
        }

        .alert {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            color: white;
            margin-bottom: 1.5rem;
            padding: 12px 20px;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.2);
            border-color: rgba(40, 167, 69, 0.4);
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.2);
            border-color: rgba(220, 53, 69, 0.4);
        }

        @media (max-width: 576px) {
            .glass-card {
                margin: 20px;
                padding: 2rem;
            }

            .title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="glass-card">
        <h2 class="title">Reset Password</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php elseif (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('/reset/send-otp') ?>" method="post">
            <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda" required>
            </div>
            <button type="submit" class="btn-login">Kirim OTP</button>
        </form>

        <div class="extra-links">
            <a href="<?= base_url('login') ?>">Kembali ke Login</a>
        </div>
    </div>
</body>
</html>
