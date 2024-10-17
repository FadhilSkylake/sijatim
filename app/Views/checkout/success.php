<?= $this->extend('main') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h2 class="mb-4">Pesanan Berhasil</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Terima Kasih atas Pesanan Anda!</h5>
            <p class="card-text">Pesanan Anda sedang diproses dengan status <strong>Pending</strong>.</p>
            <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>