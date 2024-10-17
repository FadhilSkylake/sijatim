<?= $this->extend('main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Edit Produk</h5>
        </div>
        <div class="card-body">
            <form action="/produk/update/<?= $id; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <!-- Tampilkan pesan kesalahan jika ada -->
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Tampilkan pesan keberhasilan jika ada -->
                <?php if (session()->getFlashdata('pesan')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif; ?>

                <div class="form-group row">
                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" autofocus value="<?= (old('nama_barang')) ? old('nama_barang') : esc($produk['nama_barang']) ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="harga_barang" class="col-sm-2 col-form-label">Harga Barang</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="harga_barang" name="harga_barang" value="<?= (old('harga_barang')) ? old('harga_barang') : esc($produk['harga_barang']) ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="berat_barang" class="col-sm-2 col-form-label">Berat Barang</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="berat_barang" name="berat_barang" value="<?= (old('berat_barang')) ? old('berat_barang') : esc($produk['berat_barang']) ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="stok_barang" class="col-sm-2 col-form-label">Stok Barang</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="stok_barang" name="stok_barang" value="<?= (old('stok_barang')) ? old('stok_barang') : esc($produk['stok_barang']) ?>" required>
                    </div>
                </div>

                <br>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update Data</button>
                        <a href="/produk" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>