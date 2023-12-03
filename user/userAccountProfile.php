<?php
$title = 'Account';
require_once __DIR__ . '/navbar.php';
require "../config/connection.php";

if(!isset($_SESSION)) 
{ 
session_start(); 
}
$id = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
$rows_user = mysqli_fetch_assoc($user);

$query = "SELECT password FROM users";
$hasil = mysqli_query($conn,$query);


if(isset($_POST['update'])){
    $password = $_POST['password'];

    $sql = "UPDATE users SET password=$password WHERE id='$id'";
    $result = (mysqli_query($conn, $sql));
}
if(isset($_POST['delete']))
{
    // $password = $_POST['password'];

    $sql = "DELETE FROM users WHERE id='$id'";
    $result = (mysqli_query($conn, $sql));
}

?>

<link rel="stylesheet" href="..//rere/css/profile.css" />
<link rel="stylesheet" href="..//rere/userCssNew/style.css">

<!-- content -->
<div class="mainContent">
    <div class="kotakRent">
        <span>Account</span>
        <div class="back"><a href="../profile.php">Back</a></div>
    </div>
    <div class="semua">
        <div id="user_information" class="RentCointainer">
            <div class=cardBox >
                <div class="cardAtas">
                    <div>
                        <span class="huruf">Ubah Akun Anda</span>
                    </div>
                    <hr style="width: 95%; display: flex; margin: 2% 0 1% 1%; color: black; background-color: black;">
                </div>
                <form class="formACC" action="" method="POST" enctype="multipart/form-data" >
                        <div>
                        <label for="email">Email</label>
                        <input style="margin-left: 210px;" type="text" id="name" name="name" value="<?= $rows_user["email"]; ?>" disabled>
                        </div>
                        <div>   
                        <label for="password">Password</label>
                        <input type="text" id="password" name="password" value="<?= $rows_user["password"]; ?>" required>
                        </div>
                        <div>
                        <button class="button" name="update" value="update"><span>SAVE</span></button> 
                        <button class="button" name="delete" value="reset" onclick="return confirm('Apakah Anda yakin')"><span>DELETE</span></button>    
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- <div id="user_controls" class="container">
<button>Simpan</button>
</div> -->
<!-- end content -->

<?php require_once __DIR__ . '/footer.php'; ?>