<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(to bottom, rgba(58, 123, 213, 0.6), rgba(58, 96, 115, 0.6)),
                        url("<?= base_url('img/bg.jpg') ?>");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 2.5rem;
            color: white;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            position: relative;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .title {
            font-size: 2rem;
            font-weight: 500;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #fff;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 1rem;
            font-size: 15px;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: none;
            color: white;
        }

        .btn-register {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.7) 100%);
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
        }

        .btn-register:hover {
            background: linear-gradient(135deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0.9) 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            color: #333;
        }

        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .btn-register:hover::before {
            left: 100%;
        }

        .register-link {
            text-align: center;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.85);
            margin-top: 1.5rem;
        }

        .register-link a {
            color: white;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .glass-card {
                margin: 20px;
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="glass-card">
        <h1 class="title">Buat Akun</h1>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form method="post" action="<?= base_url('register_action') ?>">
            <input type="text" class="form-control" name="username" placeholder="Nama Pengguna" required>
            <input type="email" class="form-control" name="email" placeholder="Alamat Email" required>
            <input type="password" class="form-control" name="password" placeholder="Kata Sandi" id="password" required>
            <input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi Kata Sandi" id="confirm_password" required>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="showPasswordCheck" onclick="togglePassword()">
                <label class="form-check-label" for="showPasswordCheck" style="color: rgba(255, 255, 255, 0.8);">
                    Tampilkan Kata Sandi
                </label>
            </div>

            <button type="submit" class="btn-register">Buat Akun</button>
        </form>

        <p class="register-link">
            Sudah punya akun? <a href="<?= base_url('login') ?>">Masuk</a>
        </p>
    </div>

    <script>
        function togglePassword() {
            const pw = document.getElementById('password');
            const cpw = document.getElementById('confirm_password');
            const type = pw.type === 'password' ? 'text' : 'password';
            pw.type = cpw.type = type;
        }

        // Validasi konfirmasi password
        document.querySelector('form').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Kata sandi tidak cocok!');
            }
        });
    </script>
</body>
</html>
