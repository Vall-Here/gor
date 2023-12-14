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

if(isset($_SESSION['logged_in'])){
    $hasill = mysqli_query($conn,"SELECT * FROM fav WHERE id_user =". $_SESSION['id']); 
    $hasil2 = mysqli_fetch_assoc($hasill);
}
?>

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
            <a href="../field-single.php?id=<?=$row['id_fields']?>">
                    <div class="cardBoxF"> 
                        <img class="lap" src="data:image/jpeg;base64,<?php echo base64_encode($row['photo']); ?>" alt=""> 
                        <div class="fav">
                            <!-- <img  src="../rere/img/favorite.png" alt=""> -->
                            <button class="fields__card-favorite" style="left: 5px;top:5px">
                                <?php if (isset($_SESSION['logged_in'])): ?>
                                    <?php $favoriteFieldIds = array_column($hasil2, 'id_fields'); ?>
                                    <?php $favoriteUserIds = array_column($hasil2, 'id_users'); ?>
                                        <img src="../niken/img/heart-solid-primary.png" alt="Favorite" />
     
                                <?php else: ?>
                                    <img src="./niken/img/heart-black.png" alt="Favorite" />
                                <?php endif; ?>
                            </button>
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