<?= $this->extend('pegawai/layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <h2>Riwayat Barang</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tipe</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($history as $item): ?>
                <tr>
                    <td><?= $item['nama_barang'] ?></td>
                    <td><?= $item['jumlah'] ?></td>
                    <td>
                        <span class="badge <?= $item['tipe'] == 'masuk' ? 'bg-success' : 'bg-danger' ?>">
                            <?= ucfirst($item['tipe']) ?>
                        </span>
                    </td>
                    <td><?= $item['tanggal'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
