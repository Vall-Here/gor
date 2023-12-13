<?php
require_once __DIR__ . '/config/connection.php';
session_start();
// Pastikan Anda menangani data dengan aman untuk mencegah SQL Injection
$id = $_SESSION["id"];
// echo $_SESSION['id'];
$user =  mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$row_user = mysqli_fetch_assoc($user);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_lapangan = $_POST['jumlah_lapangan'];
    $rent_dates = $_POST['rent_date'];
    $lapangans = $_POST['lapangan'];
    $rent_times = $_POST['rent_time'];


    $user_id = $row_user['id']; 


    $query = "SELECT id_transaksi,pembayaran FROM transaksi ORDER BY id_transaksi DESC LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $id_transaksi = $row['id_transaksi'] ;
        $pembayaran = $row['pembayaran'] ;
    } else {
        // Penanganan kesalahan jika query tidak berhasil
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    // Generate token
    

    // Lakukan loop untuk setiap formulir
    for ($i = 0; $i < $jumlah_lapangan; $i++) {
        $rent_date = $rent_dates[$i];
        $lapangan_id = $lapangans[$i];
        $rent_time =$rent_times[$i];
        $token = bin2hex(random_bytes(4));
    
        // Ambil harga dari tabel fields berdasarkan lapangan_id
        $harga_result = mysqli_query($conn, "SELECT price FROM fields WHERE id = $lapangan_id");
        
        // Periksa apakah query berhasil
        if ($harga_result) {
            $harga_data = mysqli_fetch_assoc($harga_result);
            $price = $harga_data['price'];
    
            // Lakukan operasi SQL INSERT untuk setiap formulir
            $sql = "INSERT INTO orders (id_transaksi, user_id, field_id, price, tanggal_sewa, waktu_sewa, token, admin_status) 
                VALUES ($id_transaksi, $user_id, $lapangan_id, $price, '$rent_date', '$rent_time', '$token', 'PENDING')";
            mysqli_query($conn, $sql);
        } else {
            // Handle kesalahan jika query tidak berhasil
            echo "Error: " . mysqli_error($conn);
        }
    }
    
    // Setelah semua formulir ditambahkan, lakukan tindakan berikutnya (jika ada)
    // ...
    $updateTotalQuery = "UPDATE transaksi SET total = (SELECT SUM(price) FROM orders WHERE id_transaksi = $id_transaksi) WHERE id_transaksi = $id_transaksi";
    mysqli_query($conn, $updateTotalQuery);

    if ($pembayaran === 'cash') {
        echo '<script>alert("Anda Berhasil Melakukan Sewa, Silahkan Cek Profil anda untuk data lebih lanjut!");
            document.location.href = "invoice.php?id=' . $id_transaksi . '";
        </script>';
    } else {
        echo '<script>alert("Anda Berhasil Melakukan Sewa, Silahkan Upload Bukti Pembayaran!");
            document.location.href = "buktiBayar?id=' . $id_transaksi . '";
        </script>';
    }
} else {
    echo '<script>alert("Terjadi Kesalahan!");</script>';
}
?>
