<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil - <?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
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

        .btn-save {
            background-color: #0d6efd;
            color: white;
            border-radius: 30px;
            padding: 10px 24px;
            font-weight: 500;
        }

        .btn-save:hover {
            background-color: #0b5ed7;
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
            border-radius: 30px;
            padding: 10px 24px;
            font-weight: 500;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        .foto {
            max-width: 180px;
            max-height: 200px;
            object-fit: cover;
            border-radius: 12px;
            border: 4px solid #dee2e6;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="profile-card">
                <div class="profile-header">
                    <i class="fas fa-edit me-2"></i>Edit Profil Pegawai
                </div>

                <form action="<?= base_url('pegawai/update/' . $pegawai['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-8">

                            <div class="mb-3">
                                <label for="nama" class="form-label label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= esc($pegawai['nama']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="nip" class="form-label label">NIP</label>
                                <input type="text" name="nip" id="nip" class="form-control" value="<?= esc($pegawai['nip']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Laki-laki" <?= $pegawai['jenis_kelamin'] === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= $pegawai['jenis_kelamin'] === 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="2" required><?= esc($pegawai['alamat']) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="no_handphone" class="form-label label">No. Handphone</label>
                                <input type="text" name="no_handphone" id="no_handphone" class="form-control" value="<?= esc($pegawai['no_handphone']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label label">Foto Baru (jika ingin diganti)</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                            </div>

                        </div>

                        <!-- Foto Sekarang -->
                        <div class="col-md-4 text-center">
                            <p class="label">Foto Saat Ini</p>
                            <?php if (!empty($pegawai['foto'])): ?>
                                <img src="<?= base_url('uploads/' . $pegawai['foto']) ?>" alt="Foto Pegawai" class="foto shadow">
                            <?php else: ?>
                                <img src="<?= base_url('img/default-user.png') ?>" alt="Foto Default" class="foto shadow">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <a href="<?= base_url('pegawai/profil/' . $pegawai['id']) ?>" class="btn btn-back">
                            <i class="fas fa-arrow-left me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-save">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
