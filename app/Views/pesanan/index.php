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
            <h5>Silahkan pilih produk untuk di pesan</h5>
        </div>
        <div class="col-md-6 text-center">
            <div class="border" style="height: 300px; display: flex; align-items: center; justify-content: center;">
                <img src="" alt="" srcset="">
            </div>
        </div>
        <div class="container mt-5">
            <h2>Checkout Produk</h2>

            <!-- Pilih Produk -->
            <form id="checkoutForm" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="product">Pilih Produk</label>
                    <select class="form-control" id="product" name="product" required>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product['id_produk'] ?>">
                                <?= $product['nama_barang'] ?> (Stok: <?= $product['stok_barang'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlah_barang">Jumlah Barang</label>
                    <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Masukkan jumlah barang" required>
                </div>

                <!-- Upload Bukti Pembayaran -->
                <div class="form-group">
                    <label for="buktiPembayaran">Upload Bukti Pembayaran</label>
                    <input type="file" class="form-control-file" id="buktiPembayaran" name="buktiPembayaran" required>
                </div>

                <button type="submit" class="btn btn-primary">Konfirmasi Checkout</button>
            </form>

            <div id="responseMessage" class="mt-3"></div>
        </div>

    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#checkoutForm').on('submit', function(e) {
            e.preventDefault(); // Mencegah form melakukan submit secara default

            let formData = new FormData(this); // Ambil data dari form
            formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>'); // Tambahkan CSRF token ke formData

            $.ajax({
                url: '<?= base_url('checkout') ?>', // Ganti dengan URL controller
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#responseMessage').html('<div class="alert alert-success">Checkout berhasil! Silahkan tunggu konfirmasi.</div>');
                },
                error: function(xhr, status, error) {
                    $('#responseMessage').html('<div class="alert alert-danger">Terjadi kesalahan, silahkan coba lagi.</div>');
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>