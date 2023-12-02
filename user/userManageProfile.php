<?php
$title = 'My Profile';
require_once __DIR__ . '/navbar.php';
require "../config/connection.php";

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$id = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
$rows_user = mysqli_fetch_assoc($user);



if (isset($_POST["updateData"])){


    function upd_data($data) {
        global $conn;

        $id_user = $data["id"];
        $fname = $data["fname"];
        $lname = $data["lname"];
        $gender = $data["kelamin"];
        $date = $data["lahir"];
        $hp = $data["nomor"];
        $username = $fname.$lname;

        mysqli_query($conn, "UPDATE users SET first_name = '$fname', last_name = '$lname', phone = '$hp',username = '$username',gender = '$gender', date = '$date' WHERE id = $id_user");
        return mysqli_affected_rows($conn);
    }


    if( upd_data($_POST) > 0 ) {
        echo "
            <script>
                alert('Data berhasil di Ubah!');
            </script>
        ";
        echo "<meta http-equiv='refresh' content='1;url=userManageProfile.php'>";
    } else {
        echo "
            <script>
                alert('Data gagal di Ubah!');

            </script>
        ";
    }
        
}





?>

<link rel="stylesheet" href="..//rere/css/profile.css" />
<link rel="stylesheet" href="..//rere/userCssNew/style.css">

<!-- content -->
<div class="mainContent">
    <div class="semua">
        <div id="user_information" class="container">
            <div class="kiri">
                <div class = "userInfo" >
                    <div class="home"><a href="..//profile.php"><ion-icon name="home-outline"></ion-icon></a>  </div>
                    <div id="user_image" style=" background-image: url(data:image/jpeg;base64,<?php echo base64_encode($row['photo'])?>)">
                    </div>
                        <div id="username"> <?= $rows_user["username"];?></div>
                        <hr style="width:80%; height:2px; text-align:center" >
                        
                        <div class="menuIcon">
                        <form action="functions/updatePP.php" method="post" enctype="multipart/form-data">
                            <div class="menu">
                                <div class="icon">
                                    <input name="pp" type="file" style="color:transparent">
                                </div>
                            </div>
                            <input type="text" name="id" hidden value='<?=$rows_user['id'];?>'>
                            <div class="menu">
                                <div class="icon">
                                    <button type="submit" name="updateProfile">Update</button>
                                </div>
                            </div>
                        </form>

                        </div>
                </div>
            </div>
            <div class="kanan">
                
                <div id="user_details">
                    <form action="" method="post">
                    <table border="1">
                        <tr>
                            <td><label for="fname">First name </label></td>
                            <td align="left">
                                <input type="text" id="fname" name="fname" value="<?= $rows_user["first_name"];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="lname">Last name </label></td>
                            <td align="left">
                                <input type="text" id="lname" name="lname" value="<?= $rows_user["last_name"];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><label for="lgender">Gender</label></td>
                            <td class="radioManageProfile">
                                <input type="radio" name="kelamin" value="male" <?php if($rows_user['gender'] == 'male') echo 'checked' ?> > <span>Laki-Laki</span>
                                <input type="radio" name="kelamin" value="female" <?php if($rows_user['gender'] == 'female') echo 'checked' ?>> <span>Perempuan</span>
                                <input type="radio" name="kelamin" value="?" <?php if($rows_user['gender'] == 'undefined') echo 'checked' ?>> <span>Lainnya?</span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="lahir">tanggal lahir </label></td>
                            <td><input type="date" name="lahir" id="lahir" value="<?= $rows_user["date"];?>" /></td>
                        </tr>   
                        <tr>
                            <td><label for="nomor">nomor telpon </label></td>
                            <td>
                                <input type="tel" id="nomor" name="nomor" value="<?= $rows_user["phone"];?>" />
                            </td>
                        </tr>

                    </table>
                    
                </div>
                    <input type="text" name="id" hidden value='<?=$rows_user['id'];?>' >
                <div class="update"><button type="submit" name="updateData">Update</button></div>
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