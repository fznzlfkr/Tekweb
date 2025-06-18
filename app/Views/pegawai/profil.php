<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
        }
    </style>
</head>
<body>

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
</div>

<!-- Bootstrap JS (opsional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
