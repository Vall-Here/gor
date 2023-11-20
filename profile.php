<?php

$title = 'My Profile';
require_once __DIR__ . '/partials/navbar.php';
require "./config/connection.php";

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$id = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
$rows_user = mysqli_fetch_assoc($user);
?>

<link rel="stylesheet" href="./rere/css/profile.css" />
<link rel="stylesheet" href="./rere/userCssNew/style.css">

<style>
    
</style>

<!-- content -->
<div class="mainContent">
    <div class="semua">
        <div id="user_information" class="container">
            <div class="kiriProfile">

                <div class = "userInfo" >
                    <div id="user_image" style=" background-image: url(data:image/jpeg;base64,<?php echo base64_encode($row['photo'])?>)">
                </div>
                    <div id="username"> <?= $rows_user["username"];?></div>
                    <hr style="width:80%; height:2px; text-align:center" >
                    
                    <div class="menuIcon">
                        <div class="menu">
                            <div class="icon">
                                <a href=".\user/userManageProfile.php"><p>Manage</p><ion-icon name="person-outline"></ion-icon></a>
                            </div>
                        </div>
                        <div class="menu">
                        <div class="icon">
                                <a href="./user/userFavoriteProfile.php"><p>Favourite</p><ion-icon name="heart-outline"></ion-icon></ion-icon></a>
                            </div>
                        </div>
                        <div class="menu">
                            <div class="icon">
                                <a href="./user/userRentProfile.php"><p>Rent</p><ion-icon name="cart-outline"></ion-icon></ion-icon></a>
                            </div>
                        </div>
                        <div class="menu">
                            <div class="icon">
                                <a href="./user/userAccountProfile.php"><p>Account</p><ion-icon name="key-outline"></ion-icon></ion-icon></a>
                            </div>
                        </div>
                        <div class="menu">
                            <div class="icon">
                                <a href="logout.php"><p>Logout</p><ion-icon name="log-out-outline"></ion-icon></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kananProfile">
                <div id="user_details">
                    <table border="1">
                        <tr>
                            <td><label for="fname">First name </label></td>
                            <td align="left">
                                <input type="text" id="fname" name="fname" placeholder="<?= $rows_user["first_name"];?>" disabled/>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="lname">Last name </label></td>
                            <td align="left">
                                <input type="text" id="lname" name="lname" placeholder="<?= $rows_user["last_name"];?>" disabled/>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="lgender">Gender</label></td>
                            <td><input type="text" name="lgender" placeholder="<?= $rows_user["gender"];?>" disabled /></td>
                        </tr>
                        <tr>
                            <td><label for="lahir">tanggal lahir </label></td>
                            <td><input type="text" name="lahir" id="lahir" placeholder="<?= $rows_user["date"];?>" disabled /></td>
                        </tr>   
                        <tr>
                            <td><label for="nomor">nomor telpon </label></td>
                            <td>
                                <input type="tel" id="nomor" name="nomor" placeholder="<?= $rows_user["phone"];?>" disabled />
                            </td>
                        </tr>
                        <!-- <tr>
                            <td><label for="nomor">Foto profile </label></td>
                            <td>
                                <input type="file" name="pic" accept="image/*" style="float: left" />
                            </td>
                        </tr> -->
                    </table>
                </div>
            </div>

        </div>
</div>
</div>  
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- <div id="user_controls" class="container">
    <button>Simpan</button>
</div> -->
<!-- end content -->

<?php require_once __DIR__ . '/partials/footer.php'; ?>
