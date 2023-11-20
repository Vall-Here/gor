<?php
require '../../function.php';
require_once __DIR__.'/../../shafy/logics/config/global.php';
$keyword = $_GET['keyword'];

$query = "SELECT * FROM fields
            WHERE
            name LIKE '%$keyword%' OR 
            description LIKE '%$keyword%'OR
            price LIKE '%$keyword%'
            ";
$fields = query($query);

?>

    <div class="fields container">
        <div class="fields__body">
            <?php foreach($fields as $row_field) {?>
            <div class="fields__card" data-animated>
                <div class="fields__card-top">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row_field['photo']); ?>" alt="" class="fields__card-img" />
                    <button class="fields__card-favorite" onclick="gotofavoritepage()">
                        <img src="./niken/img/heart-black.png" alt="Favorite" />
                        <img src="./niken/img/heart-solid-primary.png" alt="Favorite" />
                    </button>
                </div>
                <div class="fields__card-body">
                    <p class="fields__card-price">Rp. <?= $row_field['price']; ?></p>
                    <h3 class="fields__card-name">
                        <a href="./field-single.php"><?= $row_field['name']; ?></a>
                    </h3>
                    <!-- <p class="fields__card-location" >
                        <img src="./niken/img/location-gray.png" alt="Location" />
                    </p> -->
                    <hr />
                    <div class="fields__card-feature-list">
                        <div class="fields__card-feature-item">
                            <img src="./niken/img/grid-8-gray.png" alt="Category" />
                            <span><?= $row_field['category_id']; ?></span></span>
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


    <?php require_once __DIR__ . '/../../partials/footer.php'; ?>