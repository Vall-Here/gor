<?php require_once __DIR__ . '../../shafy/logics/libs/data.php';

$fields = getFields();
// $cities = getCities();
$categories = getCategories();
require_once __DIR__ . '/navbar_admin.php';
require "../config/connection.php" ;
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
   $email_adm = $_SESSION['login'];
   $adm = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email_adm'");
   $row_adm = mysqli_fetch_assoc($adm);
// if (!isset($_SESSION['id'])){
//   $rows_user["first_name"] = "User";
//   session_abort();
// }else{
// $id = $_SESSION['id'];
// $user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
// $rows_user = mysqli_fetch_assoc($user);
// }
?>

<?php 
require_once __DIR__ . '/partial/sidebar.php'; 
require_once __DIR__ . '/partial/scripts.php'; ?>


<link rel="stylesheet" href="./css/style.css">
<main>
  <div class="container hero" data-animated
  style="max-width: 1200px;"
  >
    <div class="hero__left">
      <h1 class="hero__title">Rent our fields and conquer the game</h1>
      <p class="hero__subtitle" style="font-size: 25px;">Selamat Datang <?=$row_adm["jabatan"] ?></p>
      <a href="#container-fields" class="hero__button">Do Work</a>
    </div>
    <div class="hero__right">
      <div class="hero__img-group"><img alt="Field" src="..//shafy/img/heros/hero-1.png"> <img alt="Field"
          src="..//shafy/img/heros/hero-2.png"></div>
      <div class="hero__img-group"><img alt="Field" src="..//shafy/img/heros/hero-3.png"> <img alt="Field"
          src="..//shafy/img/heros/hero-4.png"></div>
    </div>
  </div>
  
  <div class="promotion">
    <div class="container promotion__container" data-animated>
      <div class="promotion__left">
        <h2 class="promotion__title">Experience the best field rental service</h2>
        <p class="promotion__description">Lorem ipsum dolor sit amet consectetur adipiscing elit odio massa eget posuere
          at proin lectus proin morbi euismod itae purus donec cursus neque adipiscing maecenas proin eu viverra commodo
          felis risus at amet ornare pellentesque nulla ipsu.</p><a href="./fields.php" class="promotion__button"
          data-animated>Explore fields</a>
      </div>
      <div class="promotion__right"><img alt="Promotion" src="..//shafy/img/promotions/promotion-1.png"
          class="promotion__img"> <img alt="Promotion" src="..//shafy/img/promotions/promotion-2.png"
          class="promotion__img" data-animated></div>
    </div>
  </div>
  <div class="container join">
    <div class="join__card join__card_partner" data-animated>
      <h2 class="join__title">List Subscriber </h2>
      <p class="join__description"></p><a href="./partner/login.php" class="join__button join__button_primary" data-animated>Subscriber</a>
    </div>
    <div class="join__card" data-animated>
      <h2 class="join__title">Rent our field today</h2>
      <p class="join__description">Lorem ipsum dolor sit amet conse ctetur adipiscing elit ipsum at iaculis nulla nulla
        justo.</p><a href="./login.php" class="join__button" data-animated>Join as a user</a>
    </div>
  </div>
</main>
<!-- <script src="../../shafy/js/user/landing-page.js"></script> -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php require_once 'footerAdmin.php' ?>