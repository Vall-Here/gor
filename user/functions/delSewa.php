<?php 

require '../../config/connection.php';


function hapus_order($id_orders) {
    global $conn;
    mysqli_query($conn, "DELETE FROM orders WHERE id = $id_orders ");
    return mysqli_affected_rows($conn);
}


if( hapus_order($_GET["id"]) > 0 ) {
    echo "
        <script>
            alert('Anda berhasil Cancel Penyewaan!');
            document.location.href = '../userRentProfile.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Anda gagal Cancel Penyewaan!');
            document.location.href = '../userRentProfile.php';
        </script>
    ";
}


?>