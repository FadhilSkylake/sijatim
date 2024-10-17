<?= $this->extend('main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
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
    <div class="card">
        <div class="card-header">
            <h5>Daftar Produk</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Produk</button>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table" id="produkTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Berat Barang</th>
                            <th>Stok Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produk as $key => $p): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $p['nama_barang'] ?></td>
                                <td><?= $p['harga_barang'] ?></td>
                                <td><?= $p['berat_barang'] ?></td>
                                <td><?= $p['stok_barang'] ?></td>
                                <td>
                                    <a href="/produk/edit/<?= $p['id_produk']; ?>" class="btn btn-warning  font-weight-bold text-xs" data-toggle="tooltip">
                                        Edit
                                    </a>
                                    <button class="btn btn-danger" onclick="deleteProduk(<?= $p['id_produk'] ?>)">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form action="/produk/store" method="post">
    <?= csrf_field(); ?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>nama_barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="nama_barang">
                    </div>
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input class="form-control" placeholder="harga Barang" name="harga_barang">
                    </div>
                    <div class="form-group">
                        <label>Berat Barang</label>
                        <input class="form-control" placeholder="berat Barang" name="berat_barang">
                    </div>
                    <div class="form-group">
                        <label>Stok Barang</label>
                        <input class="form-control" placeholder="stok Barang" name="stok_barang">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function deleteProduk(id) {
        if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
            $.ajax({
                url: '<?= base_url("produk/delete") ?>/' + id,
                type: 'DELETE',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    }
</script>
<?= $this->endSection() ?>