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
            <h5>Daftar User</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add User</button>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table" id="universalTables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $key => $u): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $u['name'] ?></td>
                                <td><?= $u['email'] ?></td>
                                <td><?= $u['role'] ?></td>
                                <td>
                                    <a href="/user/edit/<?= $u['id_user']; ?>" class="btn btn-warning  font-weight-bold text-xs" data-toggle="tooltip">
                                        Edit
                                    </a>
                                    <button class="btn btn-danger" onclick="deleteUser(<?= $u['id_user'] ?>)">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form action="/user/store" method="post">
    <?= csrf_field(); ?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="name" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="email" name="email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="password" name="password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option selected disabled>--Pilih Role--</option>
                            <option value="admin"> Admin </option>
                            <option value="konsumen"> Konsumen </option>

                        </select>
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
    function deleteUser(id) {
        if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
            $.ajax({
                url: '<?= base_url("user/delete") ?>/' + id,
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