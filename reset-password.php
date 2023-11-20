<?php

$title = 'Reset Password';
require_once __DIR__ . '/partials/navbar.php';

?>

<link rel="stylesheet" href="./elisa/css/forgot-password.css" />

<!-- content -->
<div class="container1 elisa">
    <div class="forgotpassword">
        <form method="POST" onsubmit="return validateForm()">
            <h1>RESET PASSWORD</h1>
            <hr />
            <label for="kata">Lorem ipsum dolor sit amet consectetur adipisicing
                elit.</label>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" />
            <label for="new-password">New Password</label>
            <input type="password" id="new-password" name="new-password" />
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" />
            <div class="button-container1">
                <button type="submit">RESET PASSWORD</button>
            </div>
        </form>
        <a href="login.php">Kembali ke halaman Login</a>
    </div>
    <div class="left">
        <img src="./elisa/img/login.png" alt="" />
    </div>
</div>
<!-- end content -->

<script>
function validateForm() {
    var email = document.getElementById('email').value;
    var newPassword = document.getElementById('new-password').value;
    var confirmPassword = document.getElementById('confirm-password').value;

    if (email === '' || newPassword === '' || confirmPassword === '') {
        alert('Semua input harus diisi!');
        return false;
    }

    // Tampilkan alert jika semua data telah diisi
    alert('Data berhasil disimpan!');
}
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
