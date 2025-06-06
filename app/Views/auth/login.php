<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Login</h3>

                    <?php if (session()->getFlashdata('pesan')): ?>
                        <div class="alert alert-danger text-center">
                            <?= session()->getFlashdata('pesan') ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= base_url('login_action') ?>">
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text"
                                name="username"
                                id="username"
                                class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>"
                                placeholder="Enter your username"
                                value="<?= old('username') ?>" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                name="password"
                                id="password"
                                class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>"
                                placeholder="Enter your password" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Sign In
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
