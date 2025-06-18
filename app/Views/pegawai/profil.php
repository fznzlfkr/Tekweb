<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        }
    </style>
</head>
<body>
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
</div>
</body>
</html>
