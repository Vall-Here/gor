<?php 
    $conn = mysqli_connect("localhost", "root", "", "sportease");
    
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah_kategori($data) {
        global $conn;
        $nama_kategori = $data['nama_kategori'];
        $deskripsi_kategori = $data['deskripsi_kategori'];

        // upload gambar
        $gambar_kategori = addslashes(file_get_contents($_FILES['gambar_kategori']['tmp_name']));
        if( !$gambar_kategori ) {
            return false;
        }
        $query = "INSERT INTO categories VALUES('','$nama_kategori','$gambar_kategori','$deskripsi_kategori')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function hapus_kategori($id) {
        global $conn;

        mysqli_query($conn, "DELETE FROM categories WHERE id = $id");
        return mysqli_affected_rows($conn);
    }


    function cari($keyword){
        $query = "SELECT * FROM fields
                    WHERE
                    name LIKE '%$keyword%' OR 
                    description LIKE '%$keyword%'OR
                    price LIKE '%$keyword%'
                    ";
        
        return query($query);
    }

    function cariCat($data){
        $query = "SELECT * FROM fields WHERE category_id LIKE $data";

        return query($query);
    }

?>