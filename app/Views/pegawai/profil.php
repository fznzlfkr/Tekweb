<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-size: 15px;
        }
        .profile-card {
            max-width: 850px;
            margin: 0 auto;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
        }
        .profile-header {
            background: #0d6efd;
            color: white;
            padding: 18px;
            text-align: center;
        }
        .profile-body {
            padding: 25px 20px;
        }
        .profile-info {
            margin-bottom: 12px;
        }
        .profile-info label {
            font-weight: 600;
            color: #495057;
            width: 150px;
            display: inline-block;
        }
        .profile-info i {
            width: 18px;
            display: inline-block;
            color: #0d6efd;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid #dee2e6;
        }
        .btn-sm-custom {
            padding: 5px 12px;
            font-size: 13px;
        }
        .btn-group-custom {
            margin-top: 12px;
        }

        @media (max-width: 768px) {
            .profile-img {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="card profile-card">
        <div class="profile-header">
            <h5 class="mb-1"><i class="bi bi-person-circle me-2"></i><?= esc($pegawai['nama'] ?? 'Profil Pegawai') ?></h5>
            <small><?= esc($pegawai['nip'] ?? '-') ?></small>
        </div>
        <div class="profile-body row align-items-center">
            <!-- Identitas -->
            <div class="col-md-8 col-sm-12">
                <div class="profile-info"><i class="bi bi-person"></i>
                    <label>Username:</label>
                    <span><?= session("username") ?? '-' ?></span>
                </div>
                <div class="profile-info"><i class="bi bi-shield-lock"></i>
                    <label>Role:</label>
                    <span><?= session("role") ?? '-' ?></span>
                </div>
                <div class="profile-info"><i class="bi bi-gender-ambiguous"></i>
                    <label>Jenis Kelamin:</label>
                    <span><?= esc($pegawai['jenis_kelamin'] ?? '-') ?></span>
                </div>
                <div class="profile-info"><i class="bi bi-geo-alt"></i>
                    <label>Alamat:</label>
                    <span><?= esc($pegawai['alamat'] ?? '-') ?></span>
                </div>
                <div class="profile-info"><i class="bi bi-telephone"></i>
                    <label>No. Handphone:</label>
                    <span><?= esc($pegawai['no_handphone'] ?? '-') ?></span>
                </div>
            </div>

            <!-- Foto + Tombol -->
            <div class="col-md-4 col-sm-12 text-center">
                <img src="<?= base_url('uploads/' . ($pegawai['foto'] ?? 'default.jpg')) ?>" alt="Foto Pegawai" class="profile-img mb-2">
                <div class="btn-group-custom d-flex flex-column gap-2 align-items-center">
                    <a href="<?= base_url('pegawai/edit/' . $pegawai['id']) ?>" class="btn btn-warning btn-sm-custom w-75">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="<?= base_url('pegawai/dashboard') ?>" class="btn btn-secondary btn-sm-custom w-75">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>