<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
</head>
<body>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="glass-card">
                <h1 class="title">Masuk</h1>

                <!-- Flash message -->
                <?php if (session()->getFlashdata('pesan')): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?= base_url('login_action') ?>">
                    <!-- Username -->
                    <div class="input-group">
                        <i class="fas fa-user form-icon"></i>
                        <input type="text"
                               name="username"
                               id="username"
                               class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>"
                               placeholder="Masukkan username"
                               value="<?= old('username') ?>"
                               required />
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <i class="fas fa-lock form-icon"></i>
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>"
                               placeholder="Masukkan password"
                               required />
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>

                    <!-- Show Password & Forgot Password -->
                    <div class="extra-links">
                        <div class="checkbox-wrapper">
                            <input type="checkbox" id="showPassword" class="custom-checkbox">
                            <label for="showPassword">Lihat password</label>
                        </div>
                        <a href="<?= base_url('forgot-password') ?>">Lupa password?</a>
                    </div>

                    <!-- Login Button -->
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Masuk
                        </button>
                    </div>

                    <!-- Register Link -->
                    <p class="register-link">
                        Belum punya akun? <a href="<?= base_url('register') ?>">Daftar Sekarang</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Show/hide password toggle
        document.getElementById('showPassword').addEventListener('change', function() {
            const passwordInput = document.getElementById('password');
            
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });

        // Real-time input validation
        document.getElementById('username').addEventListener('input', function() {
            if (this.value.trim()) {
                this.classList.remove('is-invalid');
            }
        });
        
        document.getElementById('password').addEventListener('input', function() {
            if (this.value.trim()) {
                this.classList.remove('is-invalid');
            }
        });
    </script>
</body>
</html>