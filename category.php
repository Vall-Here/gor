<?php

$title = 'Category';
require_once __DIR__ . '/partials/navbar.php';
require "shafy\logics\config\connection.php";
require "function.php";

$categories = query("SELECT * FROM categories");
?>

<link rel="stylesheet" href="./niken/css/fields.css" />


    <!-- navbar end -->
    <script>
    function gotofavoritepage() {
        // Ganti "favorite.php" dengan URL halaman favorit yang diinginkan
        window.location.href = "favorite.php";
    }
    </script>
    <div class="fields container">
        <div class="fields__body">
        <?php foreach($categories as $row) {?>
            <div class="fields__card" data-animated>
                <div class="fields__card-top">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['photo']); ?>" alt="" class="fields__card-img" />
                    <!-- <button class="fields__card-favorite" onclick="gotofavoritepage()">
                        <img src="./niken/img/heart-black.png" alt="Favorite" />
                        <img src="./niken/img/heart-solid-primary.png" alt="Favorite" />
                    </button> -->
                </div>
                <div class="fields__card-body">
                    <h3 class="fields__card-name">
                        <a href="./fields.php?category_id=<?= $row['id'] ?>"><?= $row['name']; ?></a>
                    </h3>
                    <p class="fields__card-location" >
                        <?= $row['deskripsiCtg']; ?>
                    </p>
                </div>
            </div>
        <?php }?>

        </div>
    </div>
</div>
<!-- content end -->

<?php require_once __DIR__ . '/partials/footer.php'; ?>