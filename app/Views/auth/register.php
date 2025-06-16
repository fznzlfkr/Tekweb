<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">
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
