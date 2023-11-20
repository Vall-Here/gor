<?php 

require '../function.php';

$id = $_GET["id_kategori"];

if( hapus_kategori($id) > 0 ) {
    echo "
        <script>
            alert('Data kategori berhasil dihapus!');
            document.location.href = './adminCatUpdater.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data kategori gagal dihapus!');
            document.location.href = './adminCatUpdater.php';
        </script>
    ";
}

?>