<?= $this->extend('main') ?>
<?= $this->section('content') ?>

<div class="container">
    <h2>Pemesanan Produk</h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/pesanan/store" method="post">
        <?= csrf_field() ?>

        <?php foreach ($produk as $p) : ?>
            <div class="form-group">
                <label for="produk_<?= $p['id_produk'] ?>"><?= $p['nama_barang'] ?></label>
                <input type="hidden" name="produk_id[]" value="<?= $p['id_produk'] ?>">
                <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" min="1">
            </div>
        <?php endforeach; ?>

        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>
</div>

<?= $this->endSection() ?>