<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-card {
            max-width: 600px;
            margin: auto;
            border-radius: 1rem;
        }
        .profile-header {
            background-color: #0d6efd;
            color: white;
            padding: 1.5rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .profile-body {
            padding: 1.5rem;
        }
        .profile-item {
            margin-bottom: 0.75rem;
        }
        .btn-back {
            display: block;
            width: fit-content;
            margin: 2rem auto 0;
=======
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg,rgb(255, 255, 255),rgb(255, 255, 255));
            font-family: 'Segoe UI', sans-serif;
        }

        .profile-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            padding: 30px;
            margin-top: 50px;
        }

        .profile-header {
            font-size: 1.8rem;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
        }

        .label {
            font-weight: 600;
            color: #495057;
        }

        .value {
            color: #212529;
        }

        .foto {
            max-width: 180px;
            max-height: 200px;
            object-fit: cover;
            border-radius: 12px;
            border: 4px solid #dee2e6;
        }

        .info-row {
            margin-bottom: 15px;
        }

        .btn-back {
            background-color: #343a40;
            color: white;
            border-radius: 30px;
            padding: 8px 24px;
            font-weight: 500;
        }

        .btn-back:hover {
            background-color: #23272b;
        }

        .card-icon {
            width: 28px;
            height: 28px;
            color: #0d6efd;
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .foto {
                margin-top: 20px;
            }
>>>>>>> ff2cfb2d923bf0578aa629112b0d9cf9b7cf1e11
        }
    </style>
</head>
<body>
<<<<<<< HEAD

<div class="container mt-5">
    <?php if (!empty($user)) : ?>
        <div class="card shadow profile-card">
            <div class="profile-header text-center">
                <h3><?= esc($user['nama']) ?></h3>
                <p class="mb-0"><?= esc($user['jabatan'] ?? '-') ?></p>
            </div>
            <div class="profile-body">
                <div class="profile-item"><strong>Username:</strong> <?= esc($user['username']) ?></div>
                <div class="profile-item"><strong>Email:</strong> <?= esc($user['email']) ?></div>
                <div class="profile-item"><strong>Status:</strong> <?= esc($user['status']) ?></div>
                <div class="profile-item"><strong>Role:</strong> <?= esc($user['role']) ?></div>
                <hr>
                <div class="profile-item"><strong>Jenis Kelamin:</strong> <?= esc($user['jenis_kelamin'] ?? '-') ?></div>
                <div class="profile-item"><strong>Alamat:</strong> <?= esc($user['alamat'] ?? '-') ?></div>
                <div class="profile-item"><strong>No. Handphone:</strong> <?= esc($user['no_handphone'] ?? '-') ?></div>
                <div class="profile-item"><strong>Lokasi Presensi:</strong> <?= esc($user['lokasi_presensi'] ?? '-') ?></div>
            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-warning text-center">Data pegawai tidak ditemukan.</div>
    <?php endif; ?>

    <a href="<?= base_url('pegawai/dashboard') ?>" class="btn btn-secondary btn-back">← Kembali ke Dashboard</a>
=======
<div class="container">
    <?php if (!empty($pegawai)) : ?>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="profile-card">
                    <div class="row">
                        <!-- Informasi Pegawai -->
                        <div class="col-md-8">
                            <div class="profile-header"><i class="fas fa-id-card card-icon"></i>Profil Pegawai</div>

                            <div class="info-row row">
                                <label class="col-sm-4 label">Nama</label>
                                <div class="col-sm-8 value"><?= esc($pegawai['nama']) ?></div>
                            </div>

                            <div class="info-row row">
                                <label class="col-sm-4 label">NIP</label>
                                <div class="col-sm-8 value"><?= esc($pegawai['nip']) ?></div>
                            </div>

                            <div class="info-row row">
                                <label class="col-sm-4 label">Jenis Kelamin</label>
                                <div class="col-sm-8 value"><?= esc($pegawai['jenis_kelamin']) ?></div>
                            </div>

                            <div class="info-row row">
                                <label class="col-sm-4 label">Alamat</label>
                                <div class="col-sm-8 value"><?= esc($pegawai['alamat']) ?></div>
                            </div>

                            <div class="info-row row">
                                <label class="col-sm-4 label">No. Handphone</label>
                                <div class="col-sm-8 value"><?= esc($pegawai['no_handphone']) ?></div>
                            </div>
                        </div>

                        <!-- Foto -->
                        <div class="col-md-4 text-center">
                            <p class="label">Foto Pegawai</p>
                            <?php if (!empty($pegawai['foto'])): ?>
                                <img src="<?= base_url('uploads/' . $pegawai['foto']) ?>" alt="Foto Pegawai" class="foto shadow">
                            <?php else: ?>
                                <img src="<?= base_url('img/default-user.png') ?>" alt="Foto Default" class="foto shadow">
                            <?php endif; ?>
                        </div>
                    </div>

<div class="text-end mt-4 d-flex justify-content-between">
    <a href="<?= base_url('index.php/pegawai/edit/' . $pegawai['id']) ?>" class="btn btn-primary">
        <i class="fas fa-edit me-1"></i> Edit Profil
    </a>
    <a href="<?= base_url('index.php/pegawai/dashboard') ?>" class="btn btn-back">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
    </a>
</div>


                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-warning mt-5 text-center">Data pegawai tidak ditemukan.</div>
    <?php endif; ?>
>>>>>>> ff2cfb2d923bf0578aa629112b0d9cf9b7cf1e11
</div>

<!-- Bootstrap JS (opsional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
