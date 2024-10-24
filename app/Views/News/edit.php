<?= $this->extend('main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Edit Berita</h5>
        </div>
        <div class="card-body">
            <form action="/news/update/<?= $id; ?>" method="POST" enctype="multipart/form-data">
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
                    <label for="judul_berita" class="col-sm-2 col-form-label">Judul Berita</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="judul_berita" name="judul_berita" autofocus value="<?= (old('judul_berita')) ? old('judul_berita') : esc($news['judul_berita']) ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="isi_berita" class="col-sm-2 col-form-label">Isi Berita</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="isi_berita" name="isi_berita" required><?= (old('isi_berita')) ? old('isi_berita') : esc($news['isi_berita']) ?></textarea>
                    </div>
                </div>

                <br>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update Data</button>
                        <a href="/news" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>