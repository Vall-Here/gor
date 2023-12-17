<?php
require_once __DIR__ . '/partials/navbar.php';
require 'function.php';

if (!$_SESSION["login"]) {
  header("Location: login.php");;
}


$jenis_query = mysqli_query($conn, "SELECT * FROM jenis_member");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Subscription Menu</title>
  <style>
    .bo {
      font-family: Arial, sans-serif;
      text-align: center;
    }

    .judul {
      margin-top: 50px;
      margin-bottom: 0px;
      font-family: Verdana;
    }

    .box {
      background-color: rgb(236, 235, 232);

      margin: auto;
      margin-top: 0px;
      height: 75vh;
      background-color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    h1 {
      font-size: 50px;
    }

    h2 {
      margin: 10px;
      font-size: 30px;
    }

    .container_iqbil {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      width: auto;
    }

    .subscription-box {
      background-color: orange;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin: 20px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 300px;
    }

    .subscription-title {
      font-size: 24px;
      font-weight: bold;
      margin: 0px 10px;
      margin-bottom: 20px;
      background-color: #fff;
      padding: 10px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .subscription-price {
      font-size: 18px;
      margin: 10px 0;
    }

    .subscription-description {
      margin: 10px 0;
    }

    .payment-button {
      background-color: #fff;
      font-weight: bold;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 5px;
      text-decoration: none;
    }
  </style>
</head>

<body class="bo">
  <div>
    <h1 class="judul">MEMBERSHIP</h1>
    <div class="box">
      <h2>CHOSE MENU</h2>
      <div class="container_iqbil">
        <?php while ($jenis = mysqli_fetch_assoc($jenis_query)) { ?>
          <div class="subscription-box">
            <div class="subscription-title"><?= $jenis["nama_jenis"]; ?></div>
            <div class="subscription-price">Rp.<?= $jenis["harga"]; ?></div>
            <div class="subscription-description">
              <p>Manfaat:</p>
              <p>
                <?= $jenis["deskripsi"]; ?>
              </p>
            </div>
            <p>Berlaku selama <?= $jenis["exp"]; ?> bulan</p><br>
            <a href="payment_member.php?menu=<?= $jenis['nama_jenis']; ?>" class="payment-button">Get Started</a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  </div>
  </div>
</body>

</html>


<?php require_once __DIR__ . '/partials/footer.php'; ?>