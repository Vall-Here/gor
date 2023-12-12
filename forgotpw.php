<?php

require_once __DIR__ . '/partials/navbar.php';
require 'function.php';
if (!isset($_SESSION)) {
  session_start();
}

$query = "SELECT * FROM orders INNER JOIN users ON orders.user_id = users.id INNER JOIN fields ON field_id = fields.id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

function sendEmail($email, $otp)
{
  $subject = "Kode Verifikasi Reset Password";
  $body = "jangan sebarkan kode OTP berikut: $otp";
  $sender = "From:iqbilqauly17@gmail.com";
  mail($email, $subject, $body, $sender);
}


if (isset($_POST["reset"])) {
  $email = $_POST["email"];
  $kode_otp = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
  $date = date('Y-m-d');

  $cek_akun = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  if (mysqli_num_rows($cek_akun) > 0) {
    $cek_reset = mysqli_query($conn, "SELECT * FROM reset_password WHERE email = '$email'");
    if (mysqli_num_rows($cek_reset) > 0) {
      echo "<script> alert('Kode Otp sudah dikirim') 
        document.location.href='veryf.php';
      </script>";
      exit();
    }
    sendEmail($email, $kode_otp);
    $query = mysqli_query($conn, "INSERT INTO reset_password VALUES (NULL, '$email', $kode_otp, '$date')");
    $_SESSION["email_reset"] = $email;
    header("Location: veryf.php");
  }
  echo "<script> alert('Email tidak terdaftar') 
  document.location.href='forgotpw.php';
  </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <style>
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

    h2 {
      color: #333;
      font-size: 36px;
      margin-bottom: 20px;
    }

    p {
      color: #555;
      font-size: 18px;
      margin-bottom: 30px;
      padding: 20px;
      line-height: 1.5;
    }

    input[type="email"] {
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
    <h2>Forgot Password</h2>
    <p>Enter your email address to reset your password. We'll send you a link to reset it.</p>
    <form method="post">
      <input type="email" name="email" placeholder="Your Email" required />
      <button type="submit" name="reset">Reset Password</button>
    </form>
  </div>
</body>

</html>

<?php require_once __DIR__ . '/partials/footer.php'; ?>