<?php

$title = 'login';

?>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;600;700&display=swap" rel="stylesheet" />

    <!-- css templates -->

    <!-- custom css -->
    <link rel="stylesheet" href="../ikbar/css/ikbar.css" />

    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
</head>

<body>
    <div class="logo">
        <img src="../ikbar/img/Logo 1.svg" alt="" />
    </div>
    <div class="body">
        <img src="../ikbar/img/Group 259.svg" alt="" class="logo2" />
        <form action="dashboard.php" method="post" onsubmit="return validateEmail()">
            <div class="input">
                <img src="../ikbar/img/Email-2.svg" alt="" class="img-inbody" />
                <input type="email" name="email" class="transborder" placeholder="Email" required/>
            </div>
            <div class="input">
                <img src="../ikbar/img/Lock.svg" alt="" class="img-inbody" />
                <input type="password" name="password" class="transborder" placeholder="Password" required/>
            </div>
            <div class="submit">
                <input type="submit" value="Sign in" class="submit-button" />
            </div>
        </form>
        <a href="./forgot-password.php" class="forgot-urpass">Forgot Your Password?</a>
        <div class="signin-with">
            <a href="dashboard.php">
                <img src="../ikbar/img/Google Logos By hrhasnai (1).svg" alt="" class="img-insign" />
                <div class="text-insign">Sign in with Google</div>
            </a>
        </div>
        <div class="signin-with">
            <a href="dashboard.php">
                <img src="../ikbar/img/Facebook - Original.svg" alt="" class="img-insign" />
                <div class="text-insign">Sign in with Facebook</div>
            </a>
        </div>
        <p>
            Don't have an account?
            <a href="./register.php">Create an account</a>
        </p>
    </div>
    <script type="text/javascript" src="../ikbar/js/email.js"></script>