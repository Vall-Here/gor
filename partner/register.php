<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Sign Up - SportEase Partner</title>

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
    <div class="left-reg">
        <div class="body">
            <div class="logo-reg">
                <img src="../ikbar/img/Logo 1.svg" alt="" />
            </div>
            <p><b class="b-reg">Create an account</b><br/></p>
            <p class="p-reg">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Voluptatibus rem obcaecati ipsum, nihil veniam, modi porro
                autem, fugit enim optio doloremque rerum? Quos deserunt
                voluptate dicta cupiditate, id dolor velit!
            </p>
            <form action="email-verification.php" method="post" onsubmit="return validateForm()">
                <div class="input">
                    <input type="name" name="fullname" class="transborder-reg" placeholder="Full Name" required/>
                </div>
                <div class="input">
                    <input type="email" name="email" id="email" class="transborder-reg" placeholder="Email Address" required/>
                </div>
                <div class="input">
                    <input type="password" name="password" class="transborder-reg" placeholder="Password" required/>
                </div>
                <div class="submit">
                    <input type="submit" value="Sign in" class="submit-button" />
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="checkbox" name="checkbox" />
                    <span style="margin-left: 5px">Accept Terms & Condition</span>
                </div>
            </form>
            <div class="signin-with">
                <a href="login.php">
                    <img src="../ikbar/img/Google Logos By hrhasnai (1).svg" alt="" class="img-insign" />
                    <div class="text-insign">Sign in with Google</div>
                </a>
            </div>
            <div class="signin-with">
                <a href="login.php">
                    <img src="../ikbar/img/Facebook - Original.svg" alt="" class="img-insign" />
                    <div class="text-insign">Sign in with Facebook</div>
                </a>
            </div>
        </div>
    </div>
    <div class="right-reg">
        <img src="../ikbar/img/gambar di reg.svg" alt="" />
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

            return true;
        }
    </script>
</body>

</html>
