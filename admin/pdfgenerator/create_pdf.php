<?php
require('fpdf.php');
require "../../config/connection.php";

class PDF extends FPDF
{
    function Header()
    {
        // Sesuaikan dengan header PDF Anda
        $this->SetFont('Arial', 'B', 22);
        $this->Cell(120, 10, 'PENYEWAAN', 1);

    }

    function Footer()
    {
        // Sesuaikan dengan footer PDF Anda
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM orders WHERE id = $id");

// Pastikan query berhasil dieksekusi
if ($result) {
    $row_orders = mysqli_fetch_assoc($result); // Ambil data dari hasil query pertama

    $id_user = $row_orders["user_id"];
    $orders = "SELECT * FROM users WHERE id  = $id_user";
    $result2 = $conn->query($orders);
    $row_user = mysqli_fetch_assoc($result2); // Ambil data dari hasil query kedua

    $id_fields = $row_orders["field_id"];
    $fieldss = "SELECT * FROM fields WHERE id  = $id_fields";
    $resultt = $conn->query($fieldss);
    $row_field = mysqli_fetch_assoc($resultt); // Ambil data dari hasil query ketiga

    $pdf->SetFont('Arial', '', 12);
    $pdf->Ln(); // Pindah ke baris berikutnya
    $pdf->Cell(40, 10, 'ID ORDERS', 1);
    $pdf->Cell(40, 10, 'ID TRANSAKSI', 1);
    $pdf->Cell(40, 10, 'PELANGGAN', 1);
    $pdf->Ln();
    $pdf->Cell(40, 10, $row_orders["id"], 1);
    $pdf->Cell(40, 10, $row_orders["id_transaksi"], 1);
    $pdf->Cell(40, 10, $row_user["username"], 1);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'LAPANGAN', 1);
    $pdf->Cell(40, 10, 'TANGGAL SEWA', 1);
    $pdf->Cell(40, 10, 'WAKTU SEWA', 1);
    $pdf->Ln();
    $pdf->Cell(40, 10, $row_field["name"], 1);
    $pdf->Cell(40, 10, $row_orders["tanggal_sewa"], 1);
    $pdf->Cell(40, 10, $row_orders["waktu_sewa"], 1);
    $pdf->Ln();
    $pdf->Cell(80, 10, 'HARGA', 1); // Sel kosong untuk Price
    $pdf->Cell(40, 10, $row_orders["price"], 1);
    $pdf->Ln();
    $pdf->Cell(120, 10, 'TOKEN', 1);
    $pdf->Ln();
    $pdf->MultiCell(120, 10, $row_orders["token"], 1);
    $pdf->Ln();
    $pdf->Cell(80, 10, 'ADMIN', 1); // Sel kosong untuk Admin Status
    $pdf->Cell(40, 10, '', 1);
    $pdf->Ln(); // Pindah ke baris berikutnya

    $pdf->Output('output' . $id . '.pdf', 'D'); // Output ke browser sebagai download
} else {
    echo "Query tidak berhasil dieksekusi.";
}
?>
