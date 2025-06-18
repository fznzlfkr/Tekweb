<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
<<<<<<< HEAD
        body { background-color: #f8f9fa; }
        .profile-card { max-width: 600px; margin: auto; border-radius: 1rem; }
=======
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

>>>>>>> 97215e4 (profil)
        .profile-header {
            background-color: #0d6efd;
            color: white;
            padding: 1.5rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .profile-body { padding: 1.5rem; }
        .profile-item { margin-bottom: 0.75rem; }
        .btn-back { display: block; width: fit-content; margin: 2rem auto 0; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card shadow profile-card">
        <div class="profile-header text-center">
            <h3><?= esc($user['username'] ?? 'Profil Pegawai') ?></h3>
        </div>
        <div class="profile-body">
            <div class="profile-item"><strong>Username:</strong> <?= esc($user['username']) ?></div>
            <div class="profile-item"><strong>Email:</strong> <?= esc($user['email']) ?></div>
            <div class="profile-item"><strong>Role:</strong> <?= esc($user['role']) ?></div>
            <hr>

            <?php if (empty($user['nama']) || empty($user['jenis_kelamin']) || empty($user['alamat']) || empty($user['no_handphone'])) : ?>
                <form action="<?= base_url('profil/save') ?>" method="post">
                    <input type="hidden" name="id_pegawai" value="<?= esc($user['id_pegawai']) ?>">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">Pilih</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="no_handphone" class="form-label">No. Handphone</label>
                        <input type="text" name="no_handphone" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Profil</button>
                </form>
            <?php else : ?>
                <div class="profile-item"><strong>Jenis Kelamin:</strong> <?= esc($user['jenis_kelamin']) ?></div>
                <div class="profile-item"><strong>Alamat:</strong> <?= esc($user['alamat']) ?></div>
                <div class="profile-item"><strong>No. Handphone:</strong> <?= esc($user['no_handphone']) ?></div>
            <?php endif; ?>
        </div>
    </div>

    <a href="<?= base_url('pegawai/dashboard') ?>" class="btn btn-secondary btn-back">← Kembali ke Dashboard</a>
</div>

</body>
</html>
