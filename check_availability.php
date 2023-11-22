<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'sportease';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Dapatkan nilai yang dikirimkan melalui AJAX
$rentDate = $_POST['rent_date'];
$lapangan = $_POST['lapangan'];
$waktuSewa = $_POST['waktu_sewa'];

// Lakukan query untuk memeriksa ketersediaan waktu sewa
$sql = "SELECT * FROM orders WHERE tanggal_sewa = '$rentDate' AND field_id = $lapangan AND waktu_sewa = '$waktuSewa'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $available = mysqli_num_rows($result) == 0;
    echo json_encode(['available' => $available]);
} else {
    echo json_encode(['error' => 'Error executing query']);
}

mysqli_close($conn);
?>
