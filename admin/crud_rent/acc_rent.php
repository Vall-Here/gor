<?php 

require '../../config/connection.php';


function acc_suppl($id_orders) {
    global $conn;
    mysqli_query($conn, "UPDATE orders SET admin_status = 'ACC' WHERE id = $id_orders ");
    return mysqli_affected_rows($conn);
}


if( acc_suppl($_GET["id"]) > 0 ) {
    echo "
        <script>
            alert('Data berhasil di ACC!');
            document.location.href = '../adminRentManager.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal di ACC!');
            document.location.href = '../adminRentManager.php';
        </script>
    ";
}


?>