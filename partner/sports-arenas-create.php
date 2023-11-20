<?php

$title = 'Sports Arenas Create';
require_once __DIR__ . '/../partials/partner/sidebar.php';

?>

<link rel="stylesheet" href="../dila/css/style1.css" />
<link rel="stylesheet" href="../dila/css/createsport.css">

<!-- page-wrapper -->
<div class="page-wrapper">

    <?php require_once __DIR__ . '/../partials/partner/topbar.php'; ?>

    <!-- content -->
    <div class="Form">
        <h3>Tambah Lapangan</h3>
        <form action="">
            <p>
                <label for="">Nama Lapangan</label>
                <input type="text">
            </p>
            <p>
                <label for="">Harga</label>
                <input type="email">
            </p>
            <p>
                <label for="">Alamat</label>
                <input type="email">
            </p>
            <p class="input-file-form">
                <label for="upload">Upload your photo</label>
                <input type="file" name="" id="upload">
            </p>
            <p>
                <button>Save</button>
            </p>
        </form>
    </div>
    <!-- end content -->
</div>
<!-- end page-wrapper -->

<?php require_once __DIR__ . '/../partials/partner/scripts.php'; ?>