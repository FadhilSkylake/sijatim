<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg w-50">
            <div class="card-body">
                <h3 class="text-center mb-4">Masuk ke Akun Anda Untuk Melakukan Order</h3>

                <!-- Menampilkan pesan kesalahan jika ada -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <!-- Form login -->
                <form action="<?= base_url('/login') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" placeholder="Masukkan email Anda" value="<?= old('email') ?>" required>
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" name="password" id="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" placeholder="Masukkan kata sandi Anda" required>
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" id="login-btn">Masuk</button>

                    <div class="text-center mt-3">
                        <a href="<?= base_url('/register') ?>">Belum punya akun? Daftar di sini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tambahkan JavaScript untuk validasi real-time -->
    <script>
        document.getElementById('email').addEventListener('input', function() {
            const emailField = this;
            const emailValue = emailField.value;
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailPattern.test(emailValue)) {
                emailField.classList.add('is-invalid');
            } else {
                emailField.classList.remove('is-invalid');
            }
        });

        // Indikasi proses login
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('login-btn').innerHTML = 'Sedang masuk...';
            document.getElementById('login-btn').disabled = true;
        });
    </script>
</body>

</html>