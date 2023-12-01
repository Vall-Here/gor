<?php

$title = 'My Profile';
require_once __DIR__ . 'navbar_admin.php';
require "./config/connection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();}
if( !isset($_SESSION["logged_in"]) || $_SESSION["cek"] != "admin" ) {
    header("Location: ../login.php");
    exit;}
    $email_adm = $_SESSION['login'];
    $adm = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email_adm'");
    $row_adm = mysqli_fetch_assoc($adm);

?>
  
$id = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
$rows_user = mysqli_fetch_assoc($user);
?>

<link rel="stylesheet" href="./rere/css/profile.css" />

<!-- content -->
<div id="user_information" class="container">
    <div class = "userInfo" >
        <div id="user_image" style=" background-image: url(<?= $_SESSION["photo"];?>)">
        </div>
        <div id="username">Admin Ganteng</div>
        <div class="icon">
            <a href="logout.php"><ion-icon name="log-out-outline"></ion-icon></a>
        </div>
    </div>
    <div id="user_details">
        <table border="1">
            <tr>
                <td><label for="fname">Username</label></td>
                <td align="left">
                    <input type="text" id="fname" name="fname" placeholder="AdminGanteng123" disabled/>
                </td>
            </tr>
            <tr>
                <td><label for="lname">Job </label></td>
                <td align="left">
                    <input type="text" id="lname" name="lname" placeholder="CEO" disabled/>
                </td>
            </tr>
            <tr>
                <td><label for="lgender">Contact</label></td>
                <td><input type="text" name="lgender" placeholder="adminganteng@gmail.com" disabled /></td>
            </tr>
            <!-- <tr>
                <td><label for="lahir">tanggal lahir </label></td>
                <td><input type="text" name="lahir" id="lahir" placeholder="<?= $rows_user["date"];?>" disabled /></td>
            </tr>   
            <tr>
                <td><label for="nomor">nomor telpon </label></td>
                <td>
                    <input type="tel" id="nomor" name="nomor" placeholder="<?= $rows_user["phone"];?>" disabled />
                </td>
            </tr> -->
            <!-- <tr>
                <td><label for="nomor">Foto profile </label></td>
                <td>
                    <input type="file" name="pic" accept="image/*" style="float: left" />
                </td>
            </tr> -->
        </table>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- <div id="user_controls" class="container">
    <button>Simpan</button>
</div> -->
<!-- end content -->

<?php require_once __DIR__ . '/partials/footer.php'; ?>