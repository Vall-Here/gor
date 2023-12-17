<?php

session_start();
require 'function.php';

$id = $_SESSION["id"];
$jenis_menu = $_GET["menu"];
$jenis = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM jenis_member WHERE nama_jenis = '$jenis_menu'"));
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'"));
$jenis_id = $jenis["id_jen"];

if (isset($_POST["bayar"])) {
    $bayar = mysqli_query($conn, "INSERT INTO member VALUES(NULL, $id, $jenis_id)");
    if ($bayar) {
        echo "<script>
            alert('Selamat Kartu Membership Anda Telah Aktif!');
            window.location.href = '/gor';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label,
        input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 8px;
        }

        .bank {
            display: block;
            margin-bottom: 10px;
            width: calc(100% - 20px);
            padding: 8px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Checkout - Membership</h1>

        <div>
            <!-- Informasi Membership yang dipilih -->
            <!-- Ganti dengan PHP untuk menampilkan detail membership -->
        </div>

        <hr>

        <form method="post">

            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" readonly value="<?= $user['first_name'] . ' ' . $user['last_name'] ?>">

            <label for="jenis_member">Jenis Member:</label>
            <input type="text" id="jenis_member" readonly value="<?= $jenis['nama_jenis']; ?>">

            <label for="harga">Harga:</label>
            <input type="text" id="harga" value="<?= $jenis['harga']; ?>" required>

            <label for="metode">Bank:</label>
            <select class="bank">
                <option value="BNI">BNI</option>
                <option value="BRI">BRI</option>
                <option value="BCA">BCA</option>
            </select>

            <button type="submit" name="bayar">Bayar</button>
        </form>
    </div>
</body>

</html>