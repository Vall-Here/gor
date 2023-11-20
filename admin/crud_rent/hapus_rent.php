<?php 

require '../../config/connection.php';


function hapus_suppl($id_orders) {
    global $conn;
    mysqli_query($conn, "DELETE FROM orders WHERE id = $id_orders ");
    return mysqli_affected_rows($conn);
}


if( hapus_suppl($_GET["id"]) > 0 ) {
    echo "
        <script>
            alert('Data ORDER berhasil dihapus!');
            document.location.href = '../adminRentManager.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data ORDER gagal dihapus!');
            document.location.href = '../adminRentManager.php';
        </script>
    ";
}


?>