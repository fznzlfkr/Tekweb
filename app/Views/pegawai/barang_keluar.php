<?= $this->extend('pegawai/layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <h2>Barang Keluar</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barang as $b): ?>
                <tr>
                    <td><?= $b['nama_barang'] ?></td>
                    <td><?= $b['stok'] ?></td>
                    <td>
                        <button class="btn btn-warning"
                            onclick="openPopup(<?= $b['id'] ?>, '<?= $b['nama_barang'] ?>', <?= $b['stok'] ?>)">Keluar</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- POPUP -->
<div id="popupForm"
    style="display:none; position:fixed; top:20%; left:35%; background:white; padding:20px; border:1px solid #ccc; z-index:999;">
    <h4>Barang Keluar</h4>
    <form method="post" id="formKeluar">
        <input type="hidden" name="id" id="barang_id">
        <div class="mb-2">
            <label>Nama Barang</label>
            <input type="text" id="nama_barang" class="form-control" readonly>
        </div>
        <div class="mb-2">
            <label>Jumlah Keluar</label>
            <input type="number" name="jumlah_keluar" class="form-control" min="1" id="stok_max">
        </div>
        <button type="submit" class="btn btn-primary">Keluarkan</button>
        <button type="button" onclick="closePopup()" class="btn btn-secondary">Batal</button>
    </form>
</div>

<script>
    function openPopup(id, nama, stok) {
        document.getElementById('popupForm').style.display = 'block';
        document.getElementById('barang_id').value = id;
        document.getElementById('nama_barang').value = nama;
        document.getElementById('stok_max').max = stok;
        document.getElementById('formKeluar').action = "/pegawai/proses_keluar/" + id;
    }

    function closePopup() {
        document.getElementById('popupForm').style.display = 'none';
    }
</script>
<?= $this->endSection() ?>