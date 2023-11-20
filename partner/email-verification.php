<?php

$title = 'Email Verif';

?>
<!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;600;700&display=swap" rel="stylesheet" />
<!-- css templates -->
<!-- custom css -->
<link rel="stylesheet" href="../ikbar/css/ikbar.css" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<div class="logo">
    <img src="../ikbar/img/Logo 1.svg" alt="" />
</div>
<div class="body2">
    <img src="../ikbar/img/lock-logo.svg" alt="" class="logo3" />
    <p class="text-inpass">
        <b>Email Verification</b><br><br>
        Forgot your account password? Don't worry, we're here to help you reset your password. Just type in your email and we'll direct you to the password reset page.
    </p>
    <form method="post" action="dashboard.php">
        <div class="input">
            <img src="../ikbar/img/Email-2.svg" alt="" class="img-inbody" />
            <input type="number" name="email" id="email" class="transborder" placeholder="Verification Code" required/>
        </div>
        <div class="submit">
            <input type="submit" value="Submit" class="submit-button" />
        </div>
    </form>
</div>

<script type="text/javascript" src="../ikbar/js/email.js"></script>