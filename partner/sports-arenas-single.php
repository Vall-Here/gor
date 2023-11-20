<?php

$title = 'Sports Arenas';
require_once __DIR__ . '/../partials/partner/sidebar.php';

?>

<link rel="stylesheet" href="../dila/css/style4.css" />
<link rel="stylesheet" href="../dila/css/fielduser.css">
<link rel="stylesheet" href="../dila/css/index2.css">

<!-- page-wrapper -->
<div class="page-wrapper">

    <?php require_once __DIR__ . '/../partials/partner/topbar.php'; ?>

    <!-- content -->
    <div class="card-wrapper">
        <div class="card">
            <!-- card left -->
            <div class="product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        <img src="../dila/img/lapangan 1.jpg" alt="lapangan 1">
                        <img src="../dila/img/lapangan 2.jpg" alt="lapangan 2">
                        <img src="../dila/img/lapangan 3.jpg" alt="lapangan 3">
                    </div>
                </div>
                <div class="img-select">
                    <div class="img-item">
                        <a href="#" data-id="1">
                            <img src="../dila/img/lapangan 1.jpg" alt="lapangan 1">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="2">
                            <img src="../dila/img/lapangan 2.jpg" alt="lapangan 2">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="3">
                            <img src="../dila/img/lapangan 3.jpg" alt="lapangan 3">
                        </a>
                    </div>
                    <div class="img-item">
                        <a href="#" data-id="4">
                            <img src="../dila/img/tambah.png" alt="tambah">
                        </a>
                    </div>
                </div>
            </div>
            <!-- card right -->
            <div class="product-content">
                <h2 class="product-title">Lapangan Saya</h2>
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>

                <div class="product-detail">
                    <h2>about this item: </h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p>
                    <ul>
                        <li>Ukuran: <span>xxxx</span></li>
                        <li>Available: <span>5 booked</span></li>
                        <li>Category: <span>Lapangan Badminton</span></li>
                        <li>Time: <span>xxxx,xxxx,xxx</span></li>
                    </ul>
                </div>

                <div class="purchase-info">
                    <a href="fields-create.php"><button type="button" class="btn">
                            Edit <i class="fas fa-shopping-cart"></i>
                        </button></a>
                </div>
            </div>
        </div>
    </div>
    <script src="../dila/js/index2.js"></script>
    <!-- end your content in here -->

    <?php require_once __DIR__ . '/../partials/partner/footer.php'; ?>
</div>
</div>
<!-- end content -->
</div>
<!-- end page-wrapper -->

<?php require_once __DIR__ . '/../partials/partner/scripts.php'; ?>