<?php

$title = 'Change Password';
require_once __DIR__ . '/partials/navbar.php';

?>

<link rel="stylesheet" href="./aris/css/change-pasword.css" />

<div class="content">
    <form action="" method="post" class="changepasword-form">
        <h1 class="changepasword-title">Change Password</h1>
        <label class="changepasword-label" for="current-password">Current Password</label>
        <input class="changepasword-input" type="password" id="current-password" name="current-password" required />
        <label class="changepasword-label" for="new-password">New Password</label>
        <input class="changepasword-input" type="password" id="new-password" name="new-password" required />
        <label class="changepasword-label" for="confirm-password">Confirm New Password</label>
        <input class="changepasword-input" type="password" id="confirm-password" name="confirm-password" required />
        <button class="changepasword-button" type="submit">
            Change Password
        </button>
        <p class="changepasword-p">
            Back to <a href="./index.php">Home</a>
        </p>
    </form>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>