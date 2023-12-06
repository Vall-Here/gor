<?php

$title = 'Field Single';
require "function.php";
require_once __DIR__ . '/partials/navbar.php';

$id = $_GET['id'];
$query = "SELECT * FROM fields INNER JOIN status ON fields.status_id = status.id_status WHERE id=$id";
$select_field = mysqli_query($conn,$query);

$query2 = "SELECT tanggal_sewa, waktu_sewa, admin_status FROM orders WHERE field_id=$id";
$select_orders = mysqli_query($conn,$query2);

$row = mysqli_fetch_assoc($select_field);

$orders = [];
while($order = mysqli_fetch_array($select_orders)){
    $orders[] = $order;
}
?>

<link rel="stylesheet" href="./niken/css/field-single.css" />
<style>
    td {
        padding-left: 50px;
}
</style>

<script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     var button = document.querySelector(".btn");
    //     button.addEventListener("click", function () {
    //         alert("Apakah anda ingin Sewa?");
    //     });
    // });
</script>

<div class="niken container">
    <div class="h1" data-animated>
        <h1><?php echo $row['name'] ?></h1>
    </div>
    <div class="img" data-animated>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['photo']); ?>" alt="Gambar" style="width: 100%; height: 550px; border-radius: 10px" />
    </div>
    <div class="info-container" data-animated>
        <div style="margin-left: 150px; font-size: 40px">
            <h3>Harga :</h3>
            <p>IDR. <?= $row['price']; ?></p>
        </div>
        <div style="margin-right: 150px; font-size:40px">
            <h3>Ukuran Lapangan :</h3>
            <p><?= $row['size']; ?> Meters</p>
        </div>
    </div>
    <div class="img" data-animated>
        <?php
        if ($row['id'] == 1){
            echo '<img src="./ikbar/img/tenis-indoor.jpg" alt="Gambar" style="width: 60%; height: 350px; border-radius: 30px" />';
        }elseif($row['id'] == 2){
            echo '<img src="./ikbar/img/indoor-futsal.jpg" alt="Gambar" style="width: 60%; height: 350px; border-radius: 30px" />';
        }elseif($row['id'] == 3){
            echo '<img src="./ikbar/img/tenis-outdoor 2.jpg" alt="Gambar" style="width: 60%; height: 350px; border-radius: 30px" />';
        }elseif($row['id'] == 4){
            echo '<img src="./ikbar/img/outdoor-futsal.jpg" alt="Gambar" style="width: 60%; height: 350px; border-radius: 30px" />';
        }elseif($row['id'] == 5){
            echo '<img src="./ikbar/img/tenis-outdoor 1.jpg" alt="Gambar" style="width: 60%; height: 350px; border-radius: 30px" />';
        }elseif($row['id'] == 6){
            echo '<img src="./ikbar/img/indoor-batminton 1.jpg" alt="Gambar" style="width: 60%; height: 350px; border-radius: 30px" />';
        }elseif($row['id'] == 7){
            echo '<img src="./ikbar/img/indoor-volly.jpg" alt="Gambar" style="width: 60%; height: 350px; border-radius: 30px" />';
        }elseif($row['id'] == 8){
            echo '<img src="./ikbar/img/outdoor-basket.jpg" alt="Gambar" style="width: 60%; height: 350px; border-radius: 30px" />';
        }elseif($row['id'] == 9){
            echo '<img src="./ikbar/img/indoor-batminton 2.jpg" alt="Gambar" style="width: 60%; height: 350px; border-radius: 30px" />';
        }
        ?>
    </div>
    
    <div class="info-contr" data-animated>
        <div class="info-left1" style="height: 800;">
            <!-- jadwal -->
            <div class="jadwal">
                <p>
                    <table>
                        <tr colspan="2" rowspan= "2">
                            <th colspan="2"> <h1>Jam Operasional</h1></th>
                        </tr>
                        <tr>
                            <td><span>Senin:</span></td>
                            <td> 09.00 - 21.00 WIB</td>
                        </tr>
                        <tr>
                            <td><span>Selasa:</span></td>
                            <td> 09.00 - 21.00 WIB</td>
                        </tr>
                        <tr>
                            <td><span>Rabu:</span></td>
                            <td> 09.00 - 21.00 WIB</td>
                        </tr>
                        <tr>
                            <td><span>Kamis:</span></td>
                            <td> 09.00 - 21.00 WIB</td>
                        </tr>
                        <tr>
                            <td><span>Jumat:</span></td>
                            <td> 09.00 - 21.00 WIB</td>
                        </tr>
                    </table>
                </p>
            </div>
            <!-- jadwal end -->
        </div>
        <div class="info-right" style="height: 800px;">
            <div class="atas">
                <div class="atas-text">
                    <h2>Status</h2>
                </div>
                <hr>
                <?php
                $waktuArray = ["09.00-12.00", "12.30-14.30", "15.00-18.00", "18.30-21.00"];
                $admin = "ACC";
                $tanggalSewa = isset($_POST['dates']) ? $_POST['dates'] : date("Y-m-d");
                ?>
                <div class="atas-status2"> 
                    <form action="" method="post">
                        <input type="date" name="dates" id="dates" value="<?=  date("Y-m-d"); ?>" onchange="this.form.submit();">
                    </form>
                </div>
                <div class="atas-status">
                    <p><?php echo $row['kondisi_status'] ?></p>
                </div>
                
                <div class="atas-jadwal">
                    <?php foreach ($waktuArray as $waktu) : ?>
                        <?php $is_same = false; ?>
                        <div class="box">
                            <?php foreach ($orders as $order): ?>
                                <?php
                                    if ($waktu == $order['waktu_sewa'] && $admin == $order['admin_status'] && $tanggalSewa == $order['tanggal_sewa']) {
                                        $is_same = true;
                                    }
                                ?>
                            <?php endforeach; ?>

                            <?php
                                if($is_same) {
                                    echo '<div style="background-color: red;">' . $waktu . '</div>';
                                } else {
                                    echo $waktu;
                                }
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="bawah">
                <div class="deskripsi">
                    <h3>Deskripsi :</h3>
                    <p>
                    <?php echo $row['description']; ?>
                    </p>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="container2" data-animated>
        <!-- <a href="sports-arena-single.php" class="button-link-share">More</a> -->
        <a href="favorite.php" class="button-link button-link-fav">
            <span class="fav-icon">&#10084;</span>
            <span class="fav-text">Favorit</span>
        </a>
        <br />
        <br />
        <div class="hr">
            <hr />
        </div>
        <!-- content1 -->
        
        <!-- fasilitas -->
        <div class="fasilitas">
            <h3>Fasilitas :</h3>
            <p>Wifi Corner, Local Parking, Restaurant, Card Payment,</p>
            <p>
                Dilengkapi dengan tiang High Mast 20, 25, 30 Meter pada 4
                titik lapangan. 300W Led High Mast Light untuk 4 titik
                lapangan.
            </p>
        </div>
    </div>
    <div class="button-container" data-animated>
    <?php if ($row['kondisi_status'] == "ditutup" || $row['kondisi_status'] == "diperbaiki"): ?>
        <a class="btn" onclick="alert('Lapangan sedang ditutup, tidak bisa menyewa');">Sewa</a>
    <?php else: ?>
        <a onclick="return confirm('apakah anda ingin sewa?')" href="payment.php?field_id=<?=$id?>" class="btn">Sewa</a>
    <?php endif; ?>
    </div>
    <br />
    <br />
</div>

<script>

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var statusId = <?php echo $row['status_id']; ?>;
        var atasStatus = document.querySelector(".atas-status");

        if (statusId === 1) {
            atasStatus.style.backgroundColor = "green";
        } else if (statusId === 2) {
            atasStatus.style.backgroundColor = "orange";
        } else if (statusId === 3) {
            atasStatus.style.backgroundColor = "red";
        }
    });
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>