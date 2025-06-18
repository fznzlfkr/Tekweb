<?= $this->extend('pegawai/layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2><?= $title ?></h2>
            <form action="<?= base_url('pegawai/save_barang') ?>" method="post">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                </div>

                <div class="form-group">
                    <label for="varian">Varian</label>
                    <select class="form-control" id="varian" name="varian" required>
                        <option value="">- Pilih Varian -</option>
                        <option value="elektronik">Elektronik</option>
                        <option value="tekstil">Tekstil</option>
                        <option value="makanan/minuman(kemasan)">Makanan/minuman(kemasan)</option>
                        <option value="bahan_baku">Bahan Baku</option>
                        <option value="barang_jadi">Barang Jadi</option>
                        <option value="peralatan">Peralatan</option>
                        <option value="habis_pakai">Bahan Habis Pakai</option>
                        <option value="retur">Barang Retur / Rusak</option>
                        <option value="kedaluwarsa">Barang Kedaluwarsa</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" required>
                </div>

                <div class="form-group">
                    <label for="harga_beli">Harga Beli</label>
                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" required>
                </div>

                <div class="form-group">
                    <label for="harga_jual">Harga Jual</label>
                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
