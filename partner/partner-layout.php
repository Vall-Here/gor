<?php

$title = 'Partner Layout';
require_once __DIR__ . '/../partials/partner/sidebar.php';

?>

<!-- page-wrapper -->
<div class="page-wrapper">

    <?php require_once __DIR__ . '/../partials/partner/topbar.php'; ?>

    <!-- content -->
    <div class="content">
        <div class="container container_partner content__container">
            <div class="content__main">
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