<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Reset Password - SportEase Partner</title>

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
        <img src="../ikbar/img/lock-logo.svg" alt="" class="logo3" />
        <p class="text-inpass">
            <b>Reset your password</b><br />
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
            corporis, quo vel itaque tempora earum facere quae, nihil
            pariatur ea deserunt. Laudantium dolor deserunt impedit
            similique veniam voluptatibus aspernatur quam.
        </p>
        <form action="login.php" method="post" onsubmit="return validateForm()">
            <div class="input">
                <img src="../ikbar/img/Email-2.svg" alt="" class="img-inbody" />
                <input type="email" name="email" id="email" class="transborder" placeholder="Email" required />
            </div>
            <div class="input">
                <img src="../ikbar/img/Lock.svg" alt="" class="img-inbody" />
                <input type="password" name="password" id="password" class="transborder" placeholder="Password" required />
            </div>
            <div class="input">
                <img src="../ikbar/img/Lock.svg" alt="" class="img-inbody" />
                <input type="password" name="confirm_password" id="confirm_password" class="transborder" placeholder="Confirm Password" required />
            </div>
            <div class="submit">
                <input type="submit" value="Reset Password" class="submit-button" />
            </div>
        </form>
    </div>

    <script type="text/javascript">
        function validateForm() {
            var emailInput = document.getElementById('email');
            var email = emailInput.value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }

            if (!email.endsWith('.com')) {
                alert('Please enter a valid email address ending with ".com".');
                return false;
            }

            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            if (password == "") {
                alert("Silakan masukkan password!");
                return false;
            } else if (password.length < 8) {
                alert("Password harus memiliki setidaknya 8 karakter!");
                return false;
            } else if (password != confirmPassword) {
                alert("Password dan konfirmasi password tidak cocok!");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
