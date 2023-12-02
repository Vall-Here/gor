<?php require_once __DIR__ . '../../shafy/logics/libs/data.php';

$fields = getFields();
// $cities = getCities();
$categories = getCategories();
require_once __DIR__ . '/navbar_admin.php';
require "../config/connection.php" ;
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


if( !isset($_SESSION["logged_in"]) || $_SESSION["cek"] != "admin" ) {
    header("Location: ../login.php");
    exit;
}
   $email_adm = $_SESSION['login'];
   $adm = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email_adm'");
   $row_adm = mysqli_fetch_assoc($adm);

    $start_date_default = '2000-01-01';
    $today = date('Y-m-d');
    $end_date_default = $today;
    
    $start_date = $start_date_default;
    $end_date = $end_date_default;
    $date_condition = "tanggal_sewa BETWEEN '$start_date' AND '$end_date'";
    $monthlyRevenueQuery = "
    SELECT 
        MONTH(tanggal_sewa) as bulan, 
        SUM(price) as total_pendapatan 
    FROM orders 
    WHERE $date_condition 
    GROUP BY bulan";

    $monthlyRevenueResult = mysqli_query($conn, $monthlyRevenueQuery);

    // Menginisialisasi array untuk menyimpan data bulan dan total pendapatan
    $monthlyRevenueData = array_fill(1, 12, 0); // Inisialisasi nilai 0 untuk setiap bulan

    // Mengisi array dengan data dari hasil query
    while ($row = mysqli_fetch_assoc($monthlyRevenueResult)) {
        $bulan = $row['bulan'];
        $totalPendapatan = $row['total_pendapatan'];
        $monthlyRevenueData[$bulan] = $totalPendapatan;
    }

    // Konversi data ke format yang dapat digunakan oleh chart.js
    $labels = array_keys($monthlyRevenueData);
    $data = array_values($monthlyRevenueData);
?>

<?php 
require_once __DIR__ . '/partial/sidebar.php'; 
require_once __DIR__ . '/partial/scripts.php'; ?>


<link rel="stylesheet" href="./css/style.css">
<main>
  <div class="container hero" data-animated
  style="max-width: 1200px;"
  >
    <div class="hero__left">
      <h1 class="hero__title">Rent our fields and conquer the game</h1>
      <p class="hero__subtitle" style="font-size: 25px;">Selamat Datang <?=$row_adm["jabatan"] ?></p>
      <a href="#container-fields" class="hero__button">Do Work</a>
    </div>
    <div class="hero__right">
      <div class="hero__img-group"><img alt="Field" src="..//shafy/img/heros/hero-1.png"> <img alt="Field"
          src="..//shafy/img/heros/hero-2.png"></div>
      <div class="hero__img-group"><img alt="Field" src="..//shafy/img/heros/hero-3.png"> <img alt="Field"
          src="..//shafy/img/heros/hero-4.png"></div>
    </div>
  </div>
  
  <div class="promotion">
    <div class="containerMainRent" style="padding : 20px; margin-left:20%;width:60%;flex-direction:column">
          <h1>Perkembangan Gor</h1>
          <canvas id="monthlyRevenueChart" width="300" height="100"></canvas>
      </div>
  </div>
  <div class="container join">
    <div class="join__card join__card_partner" data-animated>
      <h2 class="join__title">List Subscriber </h2>
      <p class="join__description"></p><a href="./partner/login.php" class="join__button join__button_primary" data-animated>Subscriber</a>
    </div>
    <div class="join__card" data-animated>
      <h2 class="join__title">Rent our field today</h2>
      <p class="join__description">Lorem ipsum dolor sit amet conse ctetur adipiscing elit ipsum at iaculis nulla nulla
        justo.</p><a href="./login.php" class="join__button" data-animated>Join as a user</a>
    </div>
  </div>
</main>
<!-- <script src="../../shafy/js/user/landing-page.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var ctx = document.getElementById('monthlyRevenueChart').getContext('2d');
var monthlyRevenueChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($labels); ?>,
        datasets: [{
            label: 'Total Pendapatan Per Bulan',
            data: <?= json_encode($data); ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php require_once 'footerAdmin.php' ?>