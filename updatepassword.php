<?php
require_once __DIR__ . '/partials/navbar.php';
require 'function.php';
if (!isset($_SESSION)) {
    session_start();
}
$email = $_SESSION["email_reset"];

if (!$email && !$_SESSION["veryf"]) {
    header("Location: veryf.php");
    exit();
}

if (isset($_POST["submit"])) {
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    if ($password == $confirm) {
        $query = "UPDATE users SET `password` = '$password' WHERE email = '$email'";
        mysqli_query($conn, $query);
        $query_delete_reset = "DELETE FROM reset_password WHERE email ='$email'";
        mysqli_query($conn, $query_delete_reset);
        unset($_SESSION["email_reset"]);
        unset($_SESSION["veryf"]);
        echo "<script>
            alert('Password berhasil diubah');
            document.location.href = 'forgotpw.php';
        </script>";
        exit();
    }
    echo "<script>
        alert('Konfirmasi password tidak sama');
        document.location.href = 'updatepassword.php';
    </script>";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
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

        input[type="password"] {
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
        <h2>Reset Password</h2>
        <p>Enter your new password.</p>
        <form method="post">
            <input type="password" name="password" placeholder="New Password" required />
            <br />
            <input type="password" name="confirm" placeholder="Confirm Password" required />
            <br />
            <button type="submit" name="submit">Reset Password</button>
        </form>
    </div>
</body>

</html>