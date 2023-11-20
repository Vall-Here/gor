<?php

$title = 'Change Password';
require_once __DIR__ . '/../partials/partner/sidebar.php';

?>

<link rel="stylesheet" href="../ikbar/css/change_pasword.css">

<!-- page-wrapper -->
<div class="page-wrapper">

    <?php require_once __DIR__ . '/../partials/partner/topbar.php'; ?>

    <!-- content -->
    <div class="content">
        <div class="container container_partner content__container">
            <div class="content__main">
                <!-- your content in here -->
                <div class="upside">
                    <img src="../ikbar/img/Lock.svg" alt="" class="img-incontent">
                    <b>Change Password</b>
                </div>
                <form action="dashboard.php" method="post" onsubmit="return changePassword(event)">
                    <div class="downside">
                        <label for="password">Current Password</label>
                        <input type="password" name="cur-pass" id="password" required><br>
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" required><br>
                        <label for="con-pass">Confirm New Password</label>
                        <input type="password" name="con-pass" id="password">
                        <input type="submit" value="Change Password" class="forsubmit">
                    </div>
                </form>
                <!-- end your content in here -->
            </div>

            <?php require_once __DIR__ . '/../partials/partner/footer.php'; ?>
        </div>
    </div>
    <!-- end content -->
</div>
<!-- end page-wrapper -->

<script type="text/javascript" src="../ikbar/js/change_pasword.js"></script>

<?php require_once __DIR__ . '/../partials/partner/scripts.php'; ?>