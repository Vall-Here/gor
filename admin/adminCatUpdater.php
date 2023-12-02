<?php
$title = 'Categories Management';
require_once __DIR__ . '/partial/sidebar.php';
require_once __DIR__ . '/navbar_admin.php';

require "../config/connection.php";
require "../function.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();}
if( !isset($_SESSION["logged_in"]) || $_SESSION["cek"] != "admin" ) {
    header("Location: ../login.php");
    exit;}

// if( !isset($_SESSION["login"]) || $_SESSION["login"] != "admin" ) {
//     header("Location: ../index.php");
//     exit;
// }
$kategori = query("SELECT * FROM categories");

?>
<?php 
 
require_once __DIR__ . '/partial/scripts.php'; ?>

<link rel="stylesheet" href="./css/style.css" />


    <!-- navbar end -->

    <div class="container hero" data-animated
    style="margin-inline:300px 0;
    max-width:1890px
    ">
    <section class="content">
        <div class="containerHeader">
            <span>Fields Categories Management</span>
            <div class="btnTambahCtg"><a href="./tambahCtg.php">Tambah</a></div>
        </div>
        <div class="containerMain">
        <?php foreach($kategori as $row_kategori) : ?>
            <div class="card">
                <div class="cardImg" style=" background-image: url(data:image/jpeg;base64,<?php echo base64_encode($row_kategori['photo']) ?>); background-size: cover;"></div>
                <div class="cardText">
                    <h4><?= $row_kategori["name"]; ?></h4>
                </div>
                <div class="btnEditHpsCtg">
                    <div class="editCtgBtn"><a href="#">Edit</a></div>
                    <div class="hapusCtgBtn1"><a href="hapusCtg.php?id_kategori=<?= $row_kategori["id"]; ?>"><ion-icon name="trash-outline"></ion-icon></a></div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </section>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php require_once __DIR__ . '/footerAdmin.php'; ?>



