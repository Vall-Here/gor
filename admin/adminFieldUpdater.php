<?php
$title = 'Fields Management';
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
require_once __DIR__ . '/partial/sidebar.php';
require_once __DIR__ . '/partial/scripts.php';
?>

<link rel="stylesheet" href="./css/style.css" />


    <!-- navbar end -->
    <script>
    function gotofavoritepage() {
        // Ganti "favorite.php" dengan URL halaman favorit yang diinginkan
        window.location.href = "favorite.php"; 
    }
    </script>
    <div class="container hero" data-animated
    style="margin-inline:158px 0;
    max-width:1950px
    ">
    <section class="content">
    <?php foreach($kategori as $row_kategori) : ?>
    <div class="mainContent" data-animated>
        <div class="containerHeader">
            <span>Kategori  <?= $row_kategori["name"]; ?></span>
            <div class="btnTambahCtg"><a href="">Tambah</a></div>
        </div>
        <div class="containerMain" data-animated>
            <?php
            $id_Categories = $row_kategori['id'];
            $fields = query("SELECT * FROM fields WHERE category_id = $id_Categories");
            foreach ($fields as $rows_fields) : ?>
                <div class="card">
                    <div class="cardImg" style="background-image: url(data:image/jpeg;base64,<?php echo base64_encode($rows_fields['photo']) ?>); background-size: cover;"></div>
                    <div class="cardText">
                        <h4><?= $rows_fields["name"]; ?></h4>
                    </div>
                    <div class="btnEditHpsCtg">
                        <div class="editCtgBtn"><a href="editFields.php?id=<?= $rows_fields['id'] ?>">Edit</a></div>
                        <div class="hapusCtgBtn1 <?= ($rows_fields['status_id'] == 3) ? 'red-background' : ''; ?>"><a href="#"><ion-icon name="close-outline"></ion-icon></a></div>
                        <div class="hapusCtgBtn2 <?= ($rows_fields['status_id'] == 2) ? 'red-background' : ''; ?>"><a href="#"><ion-icon name="checkmark-outline"></ion-icon></a></div>
                        <div class="hapusCtgBtn3 <?= ($rows_fields['status_id'] == 1) ? 'red-background' : ''; ?>"><a href="#"><ion-icon name="checkmark-done-outline"></ion-icon></a></div>
                    </div>
                </div>
            <?php endforeach; ?>
            
        </div>
    </div>
<?php endforeach; ?>


    </section>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        var warnaAwal = 'white';
        var isActive = false;

        function ubahWarnaLatarBelakang(div) {
            if (div.style.backgroundColor === warnaAwal) {
                div.style.backgroundColor = "orangered";
                // alert("Kondisi Aktif");
                // isActive = true;
            } else {
                div.style.backgroundColor = warnaAwal;
                // alert("Kondisi NonAktif");
                // isActive = false;
            }
        }
    </script>

<?php require_once __DIR__ . '/footerAdmin.php'; ?>



