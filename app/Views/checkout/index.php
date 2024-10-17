<?= $this->extend('main') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>CHECKOUT</h2>

    <?php if (!empty($cart)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= $item['nama_barang'] ?></td>
                        <td>Rp<?= number_format($item['harga_barang'], 0, ',', '.') ?></td>
                        <td>
                            <form action="/cart/add" method="post" class="d-inline">
                                <input type="hidden" name="id_produk" value="<?= $item['id_produk'] ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" max="<?= $item['stok_barang'] ?>" class="form-control" style="width: 80px; display: inline;">
                                <button type="submit" class="btn btn-secondary btn-sm">Update</button>
                            </form>
                        </td>
                        <td>Rp<?= number_format($item['harga_barang'] * $item['quantity'], 0, ',', '.') ?></td>
                        <td>
                            <a href="/cart/remove/<?= $item['id_produk'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php $total += $item['harga_barang'] * $item['quantity']; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h4>Total: Rp<?= number_format($total, 0, ',', '.') ?></h4>
        <a href="/checkout" class="btn btn-primary">Lanjutkan ke Checkout</a>
        <a href="/cart/clear" class="btn btn-warning">Kosongkan Keranjang</a>
    <?php else: ?>
        <p>Keranjang belanja kosong.</p>
        <a href="/" class="btn btn-primary">Kembali Belanja</a>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>