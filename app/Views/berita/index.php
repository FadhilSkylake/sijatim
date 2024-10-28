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
            <h5>Kelola Berita</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add News</button>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table" id="newsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul Berita</th>
                            <th>Isi Berita</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($news as $key => $n): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $n['judul_berita'] ?></td>
                                <td><?= $n['isi_berita'] ?></td>
                                <td>
                                    <a href="/news/edit/<?= $n['id_news']; ?>" class="btn btn-warning  font-weight-bold text-xs" data-toggle="tooltip">
                                        Edit
                                    </a>
                                    <button class="btn btn-danger" onclick="deleteNews(<?= $n['id_news'] ?>)">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form action="/news/store" method="post">
    <?= csrf_field(); ?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" class="form-control" name="judul berita" placeholder="judul_berita">
                    </div>
                    <div class="form-group">
                        <label>Isi Berita</label>
                        <textarea class="form-control" placeholder="isi berita" name="isi_berita"></textarea>
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
    function deleteNews(id) {
        if (confirm('Apakah Anda yakin ingin menghapus berita ini?')) {
            $.ajax({
                url: '<?= base_url("news/delete") ?>/' + id,
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