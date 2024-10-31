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
            <h5><?= $breadcrumbs; ?></h5>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table" id="universalTables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($email as $key => $u): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $u['email'] ?></td>
                                <td>
                                    <button class="btn btn-danger" onclick="deleteEmail(<?= $u['id_email'] ?>)">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteEmail(id) {
        if (confirm('Apakah Anda yakin ingin menghapus email ini?')) {
            $.ajax({
                url: '<?= base_url("email/delete") ?>/' + id,
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