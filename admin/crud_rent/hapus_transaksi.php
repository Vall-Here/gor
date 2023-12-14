<?php 

require '../../config/connection.php';


function hapus_trans($id_orders) {
    global $conn;
    mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = $id_orders ");
    mysqli_query($conn, "DELETE FROM orders WHERE id_transaksi = $id_orders ");
    return mysqli_affected_rows($conn);
}


if( hapus_trans($_GET["id"]) > 0 ) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = '../adminRentManager.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Berhasil dihapus!');
            document.location.href = '../adminRentManager.php';
        </script>
    ";
}


?>