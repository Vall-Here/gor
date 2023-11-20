<?php

$title = 'My Profile';
require_once __DIR__ . '/../partials/partner/sidebar.php';

?>

<link rel="stylesheet" href="../elisa/css/profile.css" />

<!-- page-wrapper -->
<div class="page-wrapper">

    <?php require_once __DIR__ . '/../partials/partner/topbar.php'; ?>

    <!-- content -->
    <div class="content">
        <div class="container container_partner content__container">
            <div class="content__main">
                <div class="container1">
                    <div class="column">
                        <label for="namadepan">Nama Depan:</label>
                        <input type="text" id="namadepan" name="namadepan" value="Elisa" readonly />
                        <label for="email">Email:</label>
                        <input type="text" id="email1" name="email1" value="elisa@gmail.com" readonly />
                        <label for="hp">No. Hp:</label>
                        <input type="text" id="hp" name="hp" value="085755357484" readonly/>
                    </div>
                    <div class="column">
                        <label for="namabelakang">Nama Belakang:</label>
                        <input type="text" id="namabelakang" name="namabelakang" value="Fitriana" readonly />
                        <label for="tlahir">Tanggal Lahir</label>
                        <input type="date" id="tlahir" name="tlahir" value="2023-06-01" disabled />
                        <label for="telephone">Telephone</label>
                        <input type="text" id="telephone" name="telephone" value="678546734" readonly />
                    </div>
                    <div class="column">
                        <img src="../elisa/img/profil.jpg" alt="Foto" />
                    </div>
                </div>

                <!-- your content in here -->
                <!-- end your content in here -->
            </div>

            <?php require_once __DIR__ . '/../partials/partner/footer.php'; ?>
        </div>
    </div>
    <!-- end content -->
</div>
<!-- end page-wrapper -->

<?php require_once __DIR__ . '/../partials/partner/scripts.php'; ?>