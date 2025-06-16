<?= $this->extend('pegawai/layout/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <h2>Data Barang</h2>
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <table border="1" cellspacing="0" cellpadding="0" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Varian</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($barang as $brg): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $brg['nama_barang'] ?></td>
                    <td><?= $brg['varian'] ?></td>
                    <td><?= $brg['harga_beli'] ?></td>
                    <td><?= $brg['harga_jual'] ?></td>
                    <td>
                        <a href="<?= base_url('pegawai/edit_barang/' . $brg['id']) ?>" class="btn btn-warning">Edit</a>
                        <form action="<?= base_url('pegawai/delete_barang/' . $brg['id']) ?>" method="post" style="display:inline;">
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>