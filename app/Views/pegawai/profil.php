<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4"><?= esc($title) ?></h2>

    <?php if (!empty($pegawai)) : ?>
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-primary"><?= esc($pegawai['nama'] ?? '-') ?></h5>
                <p><strong>NIP:</strong> <?= esc($pegawai['nip'] ?? '-') ?></p>
                <p><strong>Jenis Kelamin:</strong> <?= esc($pegawai['jenis_kelamin'] ?? '-') ?></p>
                <p><strong>Alamat:</strong> <?= esc($pegawai['alamat'] ?? '-') ?></p>
                <p><strong>No. Handphone:</strong> <?= esc($pegawai['no_handphone'] ?? '-') ?></p>
                <p><strong>Jabatan:</strong> <?= esc($pegawai['jabatan'] ?? '-') ?></p>
                <p><strong>Lokasi Presensi:</strong> <?= esc($pegawai['lokasi_presensi'] ?? '-') ?></p>
                <p><strong>Username:</strong> <?= esc($pegawai['username'] ?? '-') ?></p>
                <p><strong>Role:</strong> <?= esc($pegawai['role'] ?? '-') ?></p>
                <p><strong>Status:</strong> <?= esc($pegawai['status'] ?? '-') ?></p>

            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-warning">Data pegawai tidak ditemukan.</div>
    <?php endif; ?>

    <a href="<?= base_url('pegawai/dashboard') ?>" class="btn btn-secondary mt-4">Kembali</a>
</div>
</body>
</html>
