<?php
$title = 'Rent';
require_once __DIR__ . '/navbar.php';
require "../config/connection.php";

if(!isset($_SESSION)) 
{ 
session_start(); 
}
$id = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
$rows_user = mysqli_fetch_assoc($user);
?>

<link rel="stylesheet" href="..//rere/css/profile.css" />
<link rel="stylesheet" href="..//rere/userCssNew/style.css">

<!-- content -->
<div class="mainContent">
    <div class="kotakRent">
        <span>Favorite</span>
        <div class="back"><a href="../profile.php">Back</a></div>
    </div>
    <div class="kontenF">
                <a href="">
                    <div class="cardBoxF"> 
                        <img class="lap" src="../rere/img/lapangan 1.jpg" alt=""> 
                        <div class="fav">
                            <img  src="../rere/img/favorite.png" alt="">
                        </div>
                        <div class="cardLink">
                            <span>Nama Lapangan</span>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="cardBoxF"> 
                        <img class="lap" src="../rere/img/lapangan 1.jpg" alt=""> 
                        <div class="fav">
                            <img  src="../rere/img/favorite.png" alt="">
                        </div>
                        <div class="cardLink">
                            <span>Nama Lapangan</span>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="cardBoxF"> 
                        <img class="lap" src="../rere/img/lapangan 1.jpg" alt=""> 
                        <div class="fav">
                            <img  src="../rere/img/favorite.png" alt="">
                        </div>
                        <div class="cardLink">
                            <span>Nama Lapangan</span>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="cardBoxF"> 
                        <img class="lap" src="../rere/img/lapangan 1.jpg" alt=""> 
                        <div class="fav">
                            <img  src="../rere/img/favorite.png" alt="">
                        </div>
                        <div class="cardLink">
                            <span>Nama Lapangan</span>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="cardBoxF"> 
                        <img class="lap" src="../rere/img/lapangan 1.jpg" alt=""> 
                        <div class="fav">
                            <img  src="../rere/img/favorite.png" alt="">
                        </div>
                        <div class="cardLink">
                            <span>Nama Lapangan</span>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="cardBoxF"> 
                        <img class="lap" src="../rere/img/lapangan 1.jpg" alt=""> 
                        <div class="fav">
                            <img  src="../rere/img/favorite.png" alt="">
                        </div>
                        <div class="cardLink">
                            <span>Nama Lapangan</span>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="cardBoxF"> 
                        <img class="lap" src="../rere/img/lapangan 1.jpg" alt=""> 
                        <div class="fav">
                            <img  src="../rere/img/favorite.png" alt="">
                        </div>
                        <div class="cardLink">
                            <span>Nama Lapangan</span>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="cardBoxF"> 
                        <img class="lap" src="../rere/img/lapangan 1.jpg" alt=""> 
                        <div class="fav">
                            <img  src="../rere/img/favorite.png" alt="">
                        </div>
                        <div class="cardLink">
                            <span>Nama Lapangan</span>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="cardBoxF"> 
                        <img class="lap" src="../rere/img/lapangan 1.jpg" alt=""> 
                        <div class="fav">
                            <img  src="../rere/img/favorite.png" alt="">
                        </div>
                        <div class="cardLink">
                            <span>Nama Lapangan</span>
                        </div>
                    </div>
                </a>
  
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- <div id="user_controls" class="container">
<button>Simpan</button>
</div> -->
<!-- end content -->

<?php require_once __DIR__ . '/footer.php'; ?>