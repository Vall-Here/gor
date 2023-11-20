<?php 
require "../../config/connection.php";

if (isset($_POST["updateProfile"])) {
    $id_user = $_POST['id'];
    
    function upd_data($data, $id_user) {
        global $conn;
        $photo = file_get_contents($_FILES['pp']['tmp_name']);
    
        $stmt = mysqli_prepare($conn, "UPDATE users SET photo = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, 'si', $photo, $id_user);
        
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
    }
    
    if (upd_data($_POST, $id_user)) {
        echo "<script>alert('Data berhasil diubah!');
            document.location.href = '../userManageProfile.php';
        </script>";

    } else {
        echo "<script>alert('Data gagal diubah!');
            document.location.href = '../userManageProfile.php';
        </script>";
    }
    
    // echo "<meta http-equiv='refresh' content='1;url=userManageProfile.php'>";
}
?>
