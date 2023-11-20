<?php
require "../config/connection.php";

if (isset($_GET['bulan'])) {
    $bulan = $conn->real_escape_string($_GET['bulan']);
    
    // Modifikasi query SQL untuk menggabungkan tabel orders dan statistic_1_bulan
    $query = "SELECT fields.name AS 'lapangan',
                    SUM(1) AS 'total_dipinjam'  -- Menghitung total pemesanan
            FROM fields
            LEFT JOIN orders ON orders.field_id = fields.id
            WHERE DATE_FORMAT(orders.tanggal_sewa, '%Y-%m') = '$bulan'
            GROUP BY fields.name";

    $result = $conn->query($query);

    $statistics = array();
    while ($row = $result->fetch_assoc()) {
        $statistics[] = $row;
    }

    echo json_encode($statistics);
} else {
    echo 'Invalid request.';
}
?>
