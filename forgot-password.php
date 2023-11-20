<?php

$title = 'Forgot Password';
require_once __DIR__ . '/partials/navbar.php';

?>

<link rel="stylesheet" href="./elisa/css/forgot-password.css" />

<!-- content -->
<div class="container1 elisa">
    <div class="forgotpassword">
        <form action="email-verification.php" method="POST" onsubmit="return validateForm()">
            <h1>FORGOT PASSWORD</h1>
            <hr />
            <label for="kata">A Verification code has been sent by email</label>
            <label for="">Email</label>
            <input type="text" id="email" placeholder="example@gmail.com"/>
            <div class="button-container1">
                <button type="submit">FORGOT PASSWORD</button>
            </div>
        </form>
    </div>
    <div class="left">
        <img src="./elisa/img/login.png" alt="" />
    </div>
</div>
<!-- end content -->

<?php require_once __DIR__ . '/partials/footer.php'; ?>

<script>
    function validateForm() {
        var email = document.getElementById('email').value;

        if (email === '') {
            alert('Email harus diisi!');
            return false;
        }

        var message = "A verification code has been sent to " + email + "!";
        alert(message);
    }
</script>
