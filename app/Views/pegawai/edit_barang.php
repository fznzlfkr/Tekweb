<?= $this->extend('pegawai/layout/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2><?= $title ?></h2>
                <form action="<?= base_url('pegawai/update_barang/' . $barang['id']) ?>" method="post">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang['nama_barang'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Varian</label>
                        <input type="text" class="form-control" id="nama_barang" name="varian" value="<?= $barang['varian'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Stok</label>
                        <input type="text" class="form-control" id="nama_barang" name="stok" value="<?= $barang['stok'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Beli</label>
                        <input type="text" class="form-control" id="harga" name="harga_beli" value="<?= $barang['harga_beli'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Jual</label>
                        <input type="text" class="form-control" id="harga" name="harga_jual" value="<?= $barang['harga_jual'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>