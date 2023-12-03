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
        
        <?php
            $id = $_SESSION['id'];
            $query = mysqli_query($conn, "SELECT fav.id_fav,fav.id_fields,fav.id_user, fields.name ,fields.photo
                    FROM fav 
                    INNER JOIN fields ON fav.id_fields = fields.id 
                    WHERE fav.id_user = $id");
            ?>
            <?php
            while ($row = mysqli_fetch_assoc($query)) {?>
            <a href="">
                    <div class="cardBoxF"> 
                        <img class="lap" src="data:image/jpeg;base64,<?php echo base64_encode($row['photo']); ?>" alt=""> 
                        <div class="fav">
                            <img  src="../rere/img/favorite.png" alt="">
                        </div>
                        <div class="cardLink">
                            <span><?php echo $row['name']; ?></span>
                        </div>
                    </div>
                </a>
            <?php   
            }
        ?>

    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- <div id="user_controls" class="container">
<button>Simpan</button>
</div> -->
<!-- end content -->

<?php require_once __DIR__ . '/footer.php'; ?>