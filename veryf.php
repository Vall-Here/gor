<?php
require_once __DIR__ . '/partials/navbar.php';

if (!isset($_SESSION)) {
    session_start();
}

$email = $_SESSION["email_reset"];

if (!$email) {
    header("Location: forgotpw.php");
    exit();
}

require 'function.php';

if (isset($_POST["reset"])) {
    $otp = $_POST["otp"];
    $cek = mysqli_query($conn, "SELECT * FROM reset_password WHERE email = '$email' and kode_otp = $otp");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: updatepassword.php");
        $_SESSION["veryf"] = true;
        exit();
    }

    echo "<script>alert('Kode otp tidak sesuai')</script>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <style>
        /* body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        } */

        .container_iqbil {
            width: 600px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            margin-top: 100px;
            margin-bottom: 100px;
        }

        p {
            color: #555;
            font-size: 30px;
            margin-bottom: 30px;
            padding: 20px;
            line-height: 1.5;
        }

        input[type="number"] {
            width: calc(100% - 20px);
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            background-color: orange;
            color: #fff;
            border: none;
            border-radius: 10px;
            margin-top: 20px;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container_iqbil">
        <p><b>Check OTP in your email message</b></p>
        <form method="post">
            <input type="number" name="otp" placeholder="Kode Otp" required />
            <button type="submit" name="reset">Reset Password</button>
        </form>
    </div>
</body>

</html>