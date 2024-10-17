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
            <button class="btn btn-primary" onclick="showCreateModal()">Tambah User</button>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table" id="userTable">
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

<!-- Modal Create/Edit -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    <?= csrf_field(); ?>
                    <input type="hidden" id="userId">
                    <div class="form-group">
                        <label for="name">Masukkan Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option selected disabled>Silahkan Pilih Role :</option>
                            <option value="admin">Admin</option>
                            <option value="konsumen">Konsumen</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="saveUserBtn" onclick="saveUser()">Simpan</button>
            </div>
        </div>
    </div>
</div>


<script>
    function showCreateModal() {
        $('#userModalLabel').text('Tambah User');
        $('#userForm')[0].reset();
        $('#userId').val('');
        $('#userModal').modal('show');
    }

    function saveUser() {
        let id = $('#userId').val();
        let url = id ? '<?= base_url("user/update") ?>/' + id : '<?= base_url("user/store") ?>';
        let type = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: type,
            data: {
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                role: $('#role').val(), // role dapat berupa admin atau konsumen
                <?= csrf_token() ?>: '<?= csrf_hash() ?>' // CSRF token untuk melindungi dari serangan CSRF
            },
            success: function(response) {
                if (response.status === 'error') {
                    let errors = response.errors;

                    // Tampilkan error untuk field 'name'
                    if (errors.name) {
                        alert("Error Name: " + errors.name);
                    }

                    // Tampilkan error untuk field 'email'
                    if (errors.email) {
                        alert("Error Email: " + errors.email);
                    }

                    // Tampilkan error untuk field 'password'
                    if (errors.password) {
                        alert("Error Password: " + errors.password);
                    }

                    // Tampilkan error untuk field 'role'
                    if (errors.role) {
                        alert("Error Role: " + errors.role);
                    }
                } else {
                    // Jika sukses, tutup modal dan refresh halaman
                    $('#userModal').modal('hide');
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                // Tampilkan pesan jika terjadi kesalahan server
                alert('Terjadi kesalahan pada server: ' + error);
            }
        });
    }



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