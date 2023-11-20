<?php require_once __DIR__.'../../shafy/logics/config/global.php';
require "../config/connection.php"
?>
<!doctypehtml>
<html lang="id">
  <head>
    <meta charset="UTF-8"><meta content="IE=edge"http-equiv="X-UA-Compatible">
    <title><?=isset($title)?$title.' - ':''?>SportEase</title>
    <link href="https://fonts.googleapis.com"rel="preconnect">
    <link href="https://fonts.gstatic.com"rel="preconnect"crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;600;700&display=swap"rel="stylesheet">
    <link href="../shafy/css/style.css"rel="stylesheet">
    <link href="./favicon.ico"rel="shortcut icon"type="image/x-icon">
  </head>
  <body>
    <div class="navbar">
      <div class="container navbar__container">
        <a class="navbar__brand"href="./index_admin.php">
          <img alt="SportEase"src="../shafy/img/sportease.png">
        </a>
        <nav class="navbar__nav">
          <!-- <a class="navbar__link"href="./index_admin.php">Home</a> 
          <a class="navbar__link"href="./adminCatUpdater.php">Gor Category</a> 
          <a class="navbar__link"href="./adminFieldUpdater.php">Fields Management</a> 
          <a class="navbar__link"href="./adminRentManager.php">Rent</a> 
          <a class="navbar__link"href="./adminStatisticRent.php"data-favorite>Statistic Rent</a> -->
          <?php 
              $email_adm = $_SESSION['login'];
              $adm = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email_adm'");
              $row_adm = mysqli_fetch_assoc($adm);
          ?>
          <h1 style="font-size: 30px;"><?php echo strtoupper($row_adm['jabatan']);?></h1>
        </nav>
        <div class="navbar__right">
          <!-- <a class="navbar__search"href="./fields.php">
            <img alt="Search"src="../shafy/img/icons/magnifier.png">
          </a> -->
          <?php 
          if(isset($_SESSION['logged_in'])):
        
                $emailadm = $_SESSION['login'];
                $result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$emailadm'");
                $row = mysqli_fetch_assoc($result);
                ?> 
                <a class="navbar__profile"href="profile-admin.php"><div class="pp" style="  background-image: url(data:image/jpeg;base64,<?php echo base64_encode($row['photo'])?>)"></div></a>
                <?php endif ?>
          
              
          </div></div></div>