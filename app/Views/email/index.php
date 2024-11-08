<?= $this->extend('main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Form Email Marketing</h5>
        </div>
        <div class="card-body">
            <form action="email" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Subjek</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="subjek" name="subjek" autofocus placeholder="Isi Subjek" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Pelanggan</label>
                    <div class="col-sm-5">
                        <select name="email_sub[]" class="form-control">
                            <option selected disabled>Pilih Pelanggan</option>
                            <?php $db = db_connect();
                            $query = $db->query('SELECT * FROM email_sub');
                            foreach ($query->getResultArray() as $r) { ?>
                                <option value="<?= $r['email'] ?>">(<?= $r['email'] ?>)</option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Isi Pesan</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="isi" name="isi" placeholder="Isi Pesan" required></textarea>
                    </div>
                </div>

                <br>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Kirim Email</button>
                        <a href="/produk" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>