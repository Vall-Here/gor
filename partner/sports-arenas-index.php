<?php

$title = 'Sports Arenas';
require_once __DIR__ . '/../partials/partner/sidebar.php';

?>

<link rel="stylesheet" href="../dila/css/style4.css" />
<link rel="stylesheet" href="../dila/css/fielduser.css">

<!-- page-wrapper -->
<div class="page-wrapper">

    <?php require_once __DIR__ . '/../partials/partner/topbar.php'; ?>

    <!-- content -->
    <br>
    <center>
        <p>All SportEase</p>
    </center>
    <div class="fields container">
        <div class="fields__body">
            <div class="fields__card">
                <div class="fields__card-top">
                    <img src="../dila/img/lapangan 1.jpg" alt="" class="fields__card-img" />
                    <button class="fields__card-detail">
                        <img src="../dila/img/detail.png" alt="detail" />
                    </button>
                </div>
                <div class="fields__card-body">
                    <p class="fields__card-price">$17</p>
                    <h3 class="fields__card-name">Diana Badminton</h3>
                    <p class="fields__card-location">
                        <img src="../dila/img/location.png" alt="Location" />
                        Jl. Pemuda Kaffa No. 21 Sampang
                    </p>
                    <hr />
                    <div class="fields__card-feature-list">
                        <div class="fields__card-feature-item">
                            <a href="./sports-arenas-single.php"><button>More Details</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fields__card">
                <div class="fields__card-top">
                    <img src="../dila/img/lapangan 2.jpg" alt="lapangan 2" class="fields__card-img" />
                    <button class="fields__card-detail">
                        <img src="../dila/img/detail.png" alt="Favorite" />
                    </button>
                </div>
                <div class="fields__card-body">
                    <p class="fields__card-price">$17</p>
                    <h3 class="fields__card-name">Lapangan Basket Diana</h3>
                    <p class="fields__card-location">
                        <img src="../dila/img/location.png" alt="Location" />
                        Jl. Pemuda Kaffa No. 21 Sampang
                    </p>
                    <hr />
                    <div class="fields__card-feature-list">
                        <div class="fields__card-feature-item">
                            <a href="./sports-arenas-single.php"><button>More Details</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fields__card">
                <div class="fields__card-top">
                    <img src="../dila/img/lapangan 3.jpg" alt="lapangan 3" class="fields__card-img" />
                    <button class="fields__card-detail">
                        <img src="../dila/img/detail.png" alt="Favorite" />
                    </button>
                </div>
                <div class="fields__card-body">
                    <p class="fields__card-price">$17</p>
                    <h3 class="fields__card-name">Diana Futsal</h3>
                    <p class="fields__card-location">
                        <img src="../dila/img/location.png" alt="Location" />
                        Jl. Pemuda Kaffa No. 21 Sampang
                    </p>
                    <hr />
                    <div class="fields__card-feature-list">
                        <div class="fields__card-feature-item">
                            <a href="./sports-arenas-single.php"><button>More Details</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fields__card">
                <div class="fields__card-top">
                    <img src="../dila/img/tambah.png" alt="tambah
                                class=" fields_tambah-img" />
                </div>
                <div class="fields__card-body">
                    <hr />
                    <div class="fields__card-feature-list">
                        <div class="fields__card-feature-item">
                            <span><a href="sports-arenas-create.php">Tambah Lapangan</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end your content in here -->

    <?php require_once __DIR__ . '/../partials/partner/footer.php'; ?>
</div>
</div>
<!-- end content -->
</div>
<!-- end page-wrapper -->

<?php require_once __DIR__ . '/../partials/partner/scripts.php'; ?>