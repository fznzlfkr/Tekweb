<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Baru</title>
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
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
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
            max-width: 400px;
            width: 100%;
            position: relative;
        }

        .glass-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .title {
            font-size: 2rem;
            font-weight: 300;
            text-align: center;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #fff, rgba(255,255,255,0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 12px 40px 12px 15px;
            font-size: 16px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
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
            cursor: pointer;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.9));
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .alert {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            color: white;
            margin-bottom: 1.5rem;
            padding: 12px 20px;
            text-align: center;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.2);
            border-color: rgba(220, 53, 69, 0.4);
        }

        .extra-links {
            text-align: center;
            margin-top: 1rem;
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

        @media (max-width: 576px) {
            .glass-card {
                margin: 20px;
                padding: 2rem;
            }

            .title {
                font-size: 1.7rem;
            }
        }
    </style>
</head>
<body>
    <div class="glass-card">
        <h2 class="title">Buat Password Baru</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('/reset/save-password') ?>" method="post">
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password Baru" required>
                <button type="button" class="toggle-password" onclick="togglePassword()">👁</button>
            </div>
            <button type="submit" class="btn-login">Simpan Password</button>

            <div class="extra-links">
                <a href="<?= base_url('/login') ?>">← Kembali ke Login</a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const isPassword = passwordField.type === 'password';
            passwordField.type = isPassword ? 'text' : 'password';
        }
    </script>
</body>
</html>
