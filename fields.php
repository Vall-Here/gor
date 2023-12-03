<?php

$title = 'Fields';
require_once __DIR__ . '/partials/navbar.php';
require "shafy\logics\config\connection.php";
require "function.php";

$fields = query("SELECT * FROM fields");

if (isset($_POST["cari"])){
    $fields = cari($_POST["keyword"]);
}

if (isset($_GET["category_id"])){
    $fields = cariCat($_GET["category_id"]);
}

$query = "SELECT id, name FROM categories";
$hasil = mysqli_query($conn, $query);

if(isset($_SESSION['logged_in'])){
    $hasil2 = query("SELECT * FROM fav WHERE id_user =". $_SESSION['id']); 
}
?>

<link rel="stylesheet" href="./niken/css/fields.css" />

<!-- content -->
<div class="niken container">
    <div class="h1" data-animated>
        <h1>FIELDS</h1>
    </div>
    <!-- navbar2 -->
    <nav data-animated>
        <div class="filter__search"><label for="keyword"><img alt="Search"
        src="./shafy/img/icons/magnifier-gray.png"></label> <input id="keyword" name="keyword" type="search"
        placeholder="Search for fields"> <button type="submit" name="cari" id="tombol-cari">Search</button></div>
        <div class="dropdown">
            <button class="dropbtn">Category</button>
            <div class="dropdown-content">
                <?php while ($row = mysqli_fetch_assoc($hasil)) {?>
                    <a href="./fields.php?category_id=<?= $row['id'] ?>"><?= $row['name'] ?></a>
                <?php }; ?>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Available Date</button>
            <div class="dropdown-content">
                <a href="">09.00-12.00</a>
                <a href="">12.30-14.30</a>
                <a href="">15.00-18.00</a>
                <a href="">18.30-21.00</a>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
    <script>
    function gotofavoritepage() {
        // Ganti "favorite.php" dengan URL halaman favorit yang diinginkan
        window.location.href = "favorite.php";
    }
    </script>


    <div id="content">
    <div class="fields container">
        <div class="fields__body">
            <?php foreach($fields as $row_field) {?>
            <div class="fields__card" data-animated>
                <div class="fields__card-top">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row_field['photo']); ?>" alt="" class="fields__card-img" />
                <button class="fields__card-favorite" >
                    <?php if (isset($_SESSION['logged_in'])): ?>
                        <?php $favoriteFieldIds = array_column($hasil2, 'id_fields'); ?>
                        <?php $favoriteUserIds = array_column($hasil2, 'id_users'); ?>
                        <?php if (in_array($row_field['id'], $favoriteFieldIds) ):?>
                            <img src="./niken/img/heart-solid-primary.png" alt="Favorite" />
                        <?php else: ?>
                            <img src="./niken/img/heart-black.png" alt="Favorite" />
                        <?php endif; ?>
                    <?php else: ?>
                        <img src="./niken/img/heart-black.png" alt="Favorite" />
                    <?php endif; ?>
                </button>
                </div>
                <div class="fields__card-body">
                    <p class="fields__card-price">Rp. <?= $row_field['price']; ?></p>
                    <h3 class="fields__card-name">
                        <a href="./field-single.php?id=<?= $row_field['id'] ?>"><?= $row_field['name']; ?></a>
                    </h3>
                    <!-- <p class="fields__card-location" >
                        <img src="./niken/img/location-gray.png" alt="Location" />
                    </p> -->
                    <hr />
                    <div class="fields__card-feature-list">
                        <div class="fields__card-feature-item">
                            <img src="./niken/img/grid-8-gray.png" alt="Category" />
                            <span><?php if($row_field['category_id'] == 1){
                                echo "futsal";
                            }elseif($row_field['category_id'] == 2){
                                echo "badminton";
                            }elseif($row_field['category_id'] == 3){
                                echo "tennis";
                            }elseif($row_field['category_id'] == 4){
                                echo "basketball";
                            }else{
                                echo "volleyball";
                            }; ?></span></span>
                        </div>
                        <div class="fields__card-feature-item">
                            <img src="./niken/img/crop-gray.png" alt="Size" />
                            <span><?= $row_field['size']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
        
<!-- content end -->
<script src="ikbar/js/script.js"></script>
<?php require_once __DIR__ . '/partials/footer.php'; ?>