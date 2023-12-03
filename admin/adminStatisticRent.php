<?php

$title = 'Statistic';
require_once __DIR__ . '/navbar_admin.php';
require "../config/connection.php";
require "../function.php";
require_once __DIR__ . '/partial/sidebar.php';
require_once __DIR__ . '/partial/scripts.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();}
if( !isset($_SESSION["logged_in"]) || $_SESSION["cek"] != "admin" ) {
    header("Location: ../login.php");
    exit;}

$start_date_default = '2000-01-01';
$today = date('Y-m-d');
$end_date_default = $today;



$start_date = isset($_GET['startDate']) ? $_GET['startDate'] : $start_date_default;
$end_date = isset($_GET['endDate']) ? $_GET['endDate'] : $end_date_default;
$date_condition = "tanggal_sewa BETWEEN '$start_date' AND '$end_date'";

$result = mysqli_query($conn, 
"SELECT 
    orders.id as tId, 
    orders.tanggal_sewa, 
    COUNT(orders.field_id) as total, 
    SUM(orders.price) as grandTotal, 
    fields.name as namafield 
FROM orders 
INNER JOIN fields ON orders.field_id = fields.id 
WHERE $date_condition 
GROUP BY orders.field_id
");


$statistics = array();
$totalHarga = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $statistics[] = $row;
    $totalHarga = $totalHarga + $row['grandTotal'];

}


$field = mysqli_query($conn, "SELECT * FROM fields ");
$row_field = mysqli_fetch_assoc($field);
?>


<link rel="stylesheet" href="./css/style.css" />
<style>
    .containerMainRent table {
        border-collapse: collapse;
        width: 90%;
        margin-bottom: 20px;
        margin-top: 3%;
        font-family: Arial, sans-serif;
    }

    .containerMainRent table th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 10px;
    }

    .containerMainRent table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .containerMainRent table th {
        background-color: orangered;
        color: white;
    }

    .containerMainRent table button {
        background-color: orangered;
        color: white;
        padding: 10px 20px;
        border: none;
        width: 100%;
        height: 60px;
        border-radius: 5px;
        cursor: pointer;
    }

    .containerMainRent table td button a {
        text-decoration: none;
        color: #fff;
        font: 20px tahoma;
    }

      /* Atur lebar dan tinggi gambar */
    #statisticChart {
        margin-bottom: 60px;
    }

  /* Atur warna latar belakang grafik */
    .chart-container {
    background-color: #f0f0f0;
    padding: 10px;
    border-radius: 10px;
    }
    .chose {
        margin-right: 3%;
    }
    .chose select{
        height: 40px;
        width: 200px;
        border-radius: 5px;
        padding-left: 20px;
        font-size: 20px;
        /* background-color: orangered; */
    }
    .chose button {
        height: 40px;
        width: 80px;
        border-radius: 5px;
        border: none;
        background-color: orangered;
        color: #fff;
    }
    input[type="date"] {
            height: 40px;
            border: none;
            padding-left: 3%;
            border-bottom: 1px solid black;
            background-color: transparent;
            color: black;
            margin-right: 20px;
    }
    .chose form {
        display: flex;
    }
</style>

<!-- navbar end -->
<div class="container hero" data-animated
    style="margin-inline:300px 0;
    max-width:1750px
    ">
<section class="content">
    <div class="containerHeader">
        <span>Statistic Lapangan Bulan ini</span>
        <div class="chose">
            <label for="bulan">Pilih Bulan:</label>
            <form action="" method="get">
                    <label for="startDate">Tanggal Mulai:</label>
                    <input type="date" name="startDate" id="startDate" value="<?= $start_date ?>" onchange="this.form.submit()">
                    <label for="endDate">Tanggal Akhir:</label>
                    <input type="date" name="endDate" id="endDate" value="<?= $end_date ?>" onchange="this.form.submit()">
            </form>

            <!-- <button id="filterButton">Tampilkan</button> -->
        </div>
    </div>
    <div class="containerMainRent" style="flex-direction: column; justify-content:center;align-items:center;">
    <table>
    <thead>
        <tr>
            <th>Lapangan</th>
            <th>Total Pemesanan Bulan Ini</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $row_stat) : ?>
        <tr>
            <td><?=$row_stat['namafield']?></td>
            <td><?= $row_stat['total']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <br>
    <br>
    <table>
    <thead>
        <tr>
            <th>tanggal</th>
            <th>Total Pendapatan</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td><?=$start_date?> sampai <?=$end_date?></td>
            <td>Rp.<?= $totalHarga?></td>
        </tr>

    </tbody>
    </table>

    </div>
    <div class="containerMainRent" style="padding : 20px">
    <canvas id="statisticChart" width="300" height="100"></canvas>
    </div>
    <div class="containerMainRent" style="padding : 20px; display:flex;flex-direction:column;">
    <h1 align ='center' >User yang melakukan penyewaan</h1>
        <div class="userrr" style="display: flex; justify-content:space-between; padding:50px">
            <div class="userStat">
                <canvas id="userStat"width="100" height="100"></canvas>
            </div>
            <br>
            <div class="userStatKet" >
                <table>
                    <tr>
                        <th>Nama User</th>
                        <th>Kelamin</th>
                    </tr>
                        <?php 
                                $tbresult = mysqli_query($conn, "SELECT DISTINCT orders.user_id, users.username,users.gender FROM orders
                                INNER JOIN users ON orders.user_id = users.id");
                                foreach($tbresult as $row_tt_user):
                        ?>
                    <tr>
                        <td><?=$row_tt_user['username'] ?></td>
                        <td><?=$row_tt_user['gender'] ?></td>
                    </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>

    </div>
</section>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<script>
// Data statistik untuk digunakan dalam grafik
var labels = <?php echo json_encode(array_column($statistics, 'namafield')); ?>;
var data = <?php echo json_encode(array_column($statistics, 'total')); ?>;

// Buat objek grafik dengan Chart.js
var ctx = document.getElementById('statisticChart').getContext('2d');
var statisticChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total Pemesanan Bulan Ini',
            data: data,
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

<script>
var labels = ['Laki-Laki', 'Perempuan'];

var ctx = document.getElementById('userStat').getContext('2d');
var statisticChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total Pemesanan Bulan Ini',
            data: [
                <?php 
                $laki_result = mysqli_query($conn, "SELECT COUNT(users.id) AS total_male FROM orders
                INNER JOIN users ON orders.user_id = users.id
                WHERE gender = 'male'");
                $laki_data = mysqli_fetch_assoc($laki_result);
                echo $laki_data['total_male'];
                ?>,
                <?php 
                $perem_result = mysqli_query($conn, "SELECT COUNT(users.id) AS total_female FROM orders
                INNER JOIN users ON orders.user_id = users.id
                WHERE gender = 'female'");
                $perem_data = mysqli_fetch_assoc($perem_result);
                echo $perem_data['total_female'];
                ?>
            ],
            backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
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


<script>
    function updateStatistic(data) {
        // Update tabel
        var tableBody = document.querySelector('.containerMainRent table tbody');
        tableBody.innerHTML = '';
        for (var i = 0; i < data.length; i++) {
            var row = document.createElement('tr');
            var lapanganCell = document.createElement('td');
            var totalDipinjamCell = document.createElement('td');
            lapanganCell.textContent = data[i].lapangan;
            totalDipinjamCell.textContent = data[i].total_dipinjam;
            row.appendChild(lapanganCell);
            row.appendChild(totalDipinjamCell);
            tableBody.appendChild(row);
        }

        // Update grafik
        statisticChart.data.labels = data.map(function(item) {
            return item.lapangan;
        });
        statisticChart.data.datasets[0].data = data.map(function(item) {
            return item.total_dipinjam;
        });
        statisticChart.update();
    }

</script>

<?php require_once __DIR__ . '/footerAdmin.php'; ?>
