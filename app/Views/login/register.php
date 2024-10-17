<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card w-50 shadow-lg">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Register</h3>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('/register') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group col-md-12">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                        <div class="invalid-feedback">
                            <?= session('errors.name') ?>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                        <small class="form-text text-muted">Use at least 8 characters, including a number and a special character.</small>
                        <div id="password-strength" class="mt-2"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <div id="password-confirmation" style="display:none;">
                            <label for="password_confirm">Confirm Password</label>
                            <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm your password">
                        </div>

                    </div>

                    <!-- <button type="submit" class="btn btn-primary btn-block">Create Account</button> -->
                    <button type="submit" class="btn btn-primary btn-block" id="submit-btn">Register</button>
                    <p class="text-center mt-3">Already have an account? <a href="<?= base_url('/login') ?>">Login here</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        let password = document.getElementById('password').value;
        let passwordConfirm = document.getElementById('password_confirm').value;

        if (password !== passwordConfirm) {
            event.preventDefault();
            alert('Password dan konfirmasi password harus sama.');
        }
    });
</script>
<script>
    document.getElementById('email').addEventListener('input', function() {
        const emailField = this;
        if (!emailField.value.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
            emailField.classList.add('is-invalid');
        } else {
            emailField.classList.remove('is-invalid');
        }
    });
</script>
<script>
    document.getElementById('password').addEventListener('input', function() {
        const strengthMeter = document.getElementById('password-strength');
        const password = this.value;
        let strength = 'Weak';

        if (password.length > 8 && /[\d]/.test(password) && /[\W]/.test(password)) {
            strength = 'Strong';
        } else if (password.length > 5) {
            strength = 'Moderate';
        }

        strengthMeter.textContent = 'Password strength: ' + strength;
    });
</script>
<script>
    document.getElementById('password').addEventListener('input', function() {
        document.getElementById('password-confirmation').style.display = 'block';
    });
</script>
<script>
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('submit-btn').innerHTML = 'Registering...';
        document.getElementById('submit-btn').disabled = true;
    });
</script>

</html>