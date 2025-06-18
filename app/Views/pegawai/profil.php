<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffffff, #aed6f1);
            font-family: 'Segoe UI', sans-serif;
        }
        .profile-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            padding: 30px;
            max-width: 600px;
            margin: 50px auto;
        }
        .profile-header {
            text-align: center;
        }
        .profile-header img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #0d6efd;
            margin-bottom: 15px;
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
    <div class="card shadow profile-card">
        <div class="profile-header text-center">
            <h3><?= esc($user['username']) ?></h3>
        </div>
        <div class="profile-body">
            <div class="profile-item"><strong>Username:</strong> <?= esc($user['username']) ?></div>
            <div class="profile-item"><strong>Email:</strong> <?= esc($user['email']) ?></div>
            <div class="profile-item"><strong>Role:</strong> <?= esc($user['role']) ?></div>
            <hr>
            <div class="profile-item"><strong>Nama:</strong> <?= esc($user['nama'] ?? '-') ?></div>
            <div class="profile-item"><strong>Jenis Kelamin:</strong> <?= esc($user['jenis_kelamin'] ?? '-') ?></div>
            <div class="profile-item"><strong>Alamat:</strong> <?= esc($user['alamat'] ?? '-') ?></div>
            <div class="profile-item"><strong>No. Handphone:</strong> <?= esc($user['no_handphone'] ?? '-') ?></div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="<?= base_url('profil/edit') ?>" class="btn btn-primary">Edit Profil</a>
        <a href="<?= base_url('pegawai/dashboard') ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>


</body>
</html>
