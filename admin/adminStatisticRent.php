<?php

$title = 'Statistic';
require_once __DIR__ . '/navbar_admin.php';
require "../config/connection.php";
require "../function.php";
require_once __DIR__ . '/partial/sidebar.php';
require_once __DIR__ . '/partial/scripts.php';
// Ambil data statistik dari database
// WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())
$query = "SELECT statistic_1_bulan.field_dipinjam, statistic_1_bulan.total_dipinjam, fields.name AS 'lapangan'
        FROM statistic_1_bulan
        INNER JOIN fields ON statistic_1_bulan.field_dipinjam = fields.id;";


$result = $conn->query($query);

$statistics = array();

while ($row = $result->fetch_assoc()) {
    $statistics[] = $row;
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
</style>

<!-- navbar end -->
<div class="container hero" data-animated
    style="margin-inline:158px 0;
    max-width:1890px
    ">
<section class="content">
    <div class="containerHeader">
        <span>Statistic Lapangan Bulan ini</span>
        <div class="chose">
        <label for="bulan">Pilih Bulan:</label>
        <select id="bulan" name="bulan">
            <option value="2023-11">November</option>
            <option value="2023-10">oktober</option>
            <option value="2023-09">september</option>
        </select>

        <button id="filterButton">Tampilkan</button>
        </div>
    </div>
    <div class="containerMainRent">
    <table>
    <thead>
        <tr>
            <th>Lapangan</th>
            <th>Total Pemesanan Bulan Ini</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($statistics as $row_stat) : ?>
        <tr>
            <td><?=$row_stat['lapangan']?></td>
            <td><?= $row_stat['total_dipinjam']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>
    <div class="containerMainRent" style="padding : 20px">
    <canvas id="statisticChart" width="300" height="100"></canvas>
    </div>
    <div class="containerMainRent" style="padding : 20px; display:flex;flex-direction:column;">
    <h1 align ='center' >User yang melakukan penyewaan</h1>
        <div class="userrr">
            <div class="userStat">
                <canvas id="userStat"width="100" height="100"></canvas>
            </div>
            <div class="userStatKet">
                <table>
                    <tr>
                        <th>Nama User</th>
                        <th>Kelamin</th>
                    </tr>
                        <?php 
                                $tbresult = mysqli_query($conn, "SELECT COUNT(users.id) AS total_user, username,gender FROM orders
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
    <!-- <canvas id="statisticChart" width="300" height="100"></canvas> -->
    </div>
</section>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<script>
// Data statistik untuk digunakan dalam grafik
var labels = <?php echo json_encode(array_column($statistics, 'lapangan')); ?>;
var data = <?php echo json_encode(array_column($statistics, 'total_dipinjam')); ?>;

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
    type: 'pie',
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
    // Dapatkan elemen dropdown
var selectBulan = document.getElementById('bulan');

// Dapatkan elemen tombol filter
var filterButton = document.getElementById('filterButton');

// Tambahkan event listener untuk tombol filter
filterButton.addEventListener('click', function() {
    var selectedBulan = selectBulan.value;
    // Buat permintaan Ajax dengan bulan yang dipilih
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Respons dari server
            var response = JSON.parse(xhr.responseText);
            // Perbarui grafik dan tabel dengan data yang baru
            updateStatistic(response);
        }
    };
    // Gantilah URL ini dengan URL yang sesuai dengan server Anda
    xhr.open('GET', 'get_statistic.php?bulan=' + selectedBulan, true);
    xhr.send();
});

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
