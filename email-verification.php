<?php

$title = 'Email Verification';
require_once __DIR__ . '/partials/navbar.php';

?>

<link rel="stylesheet" href="./elisa/css/email-verification.css" />

<!-- content -->
<div class="container1 elisa">
    <div class="login">
        <form action="reset-password.php" method="POST" onsubmit="return validateForm()">
            <h1>ENTER CODE VERIFICATION</h1>
            <hr />
            <!-- <h2>Please Login</h2> -->
            <label for="nama">Enter the code that was sent to your email</label>
            <input type="text" id="verificationCode" placeholder="0000" pattern="[0-9]{4}"/>
            <div class="button-container1">
                <button type="submit"><a href="#"></a> VERIFICATION</button>
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
        var verificationCode = document.getElementById('verificationCode').value;
        
        if (verificationCode === '') {
            alert('Please enter the verification code.');
            return false;
        }
        
        alert('Code berhasil diinput dan benar');
    }
</script>
