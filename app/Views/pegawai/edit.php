


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
        .form-label {
            font-weight: 600;

            color: #495057;

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
            <h5 class="mb-1"><i class="bi bi-pencil-square me-2"></i>Edit Profil Pegawai</h5>
        </div>
        <form action="<?= base_url('pegawai/update/' . $pegawai['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="profile-body row align-items-center">
                <!-- Form Edit -->
                <div class="col-md-8 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-control" value="<?= esc($pegawai['nip']) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?= esc($pegawai['nama']) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="Laki-laki" <?= $pegawai['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= $pegawai['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control"><?= esc($pegawai['alamat']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Handphone</label>
                        <input type="text" name="no_handphone" class="form-control" value="<?= esc($pegawai['no_handphone']) ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Baru (opsional)</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>

                <!-- Foto -->
                <div class="col-md-4 col-sm-12 text-center">
                    <img src="<?= base_url('uploads/' . ($pegawai['foto'] ?? 'default.jpg')) ?>" alt="Foto Pegawai" class="profile-img mb-2">
                    <div class="btn-group-custom d-flex flex-column gap-2 align-items-center">
                        <button type="submit" class="btn btn-primary btn-sm-custom w-75">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('pegawai/profil/' . $pegawai['id']) ?>" class="btn btn-secondary btn-sm-custom w-75">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>



</body>
</html>