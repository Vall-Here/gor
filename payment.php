<?php require_once __DIR__ . '/shafy/logics/config/global.php';
if (!isset($_SESSION['logged_in'])) {
    header('Location: ./login.php');
    exit;
}

require 'config/connection.php';
$id = $_SESSION["id"];
// echo $_SESSION['id'];
$user =  mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$row_user = mysqli_fetch_assoc($user);

require_once __DIR__ . '/shafy/logics/libs/data.php';
if (!isset($_GET['field_id'])) {
    header('Location: ./fields.php');
    exit;
}
$field = getField($_GET['field_id']);
if (!$field) {
    header('Location: ./fields.php');
    exit;
}
$title = 'Payment';
require_once __DIR__ . '/partials/navbar.php'; 

if (isset($_POST['submit'])){
    $id_admin = 2;
    $id_user = $_SESSION['id'];
    $today = date("Y-m-d"); 
    $waktuTrans = $_POST['waktu'];
    $pembayaran = $_POST['bayar'];
    $result = mysqli_query ($conn, "INSERT INTO transaksi VALUES (null,'$today','$waktuTrans',0,'$pembayaran',$id_user,2)");
    $field_id = $field['id'];
    echo "
    <script>
    alert('Silahkan Lanjut memilih Lapangan');
    document.location.href = 'payment-gateway.php?field_id=$field_id';
    </script>

    ";
}

?>





<main class="container payment">
    <div class="payment__left" data-animated>
        <h1>Transaksi Gateway</h1>
        <p>Silahkan konfirmasi penyewaan anda dengan mengisi semua form yang ada</p>
        <p>Field :<?= $field['name'] ?><br>
        Category :<?= $field['category']['name'] ?></p>
        <div class="payment__card" data-animated>
            <img alt="Phone" src="./shafy/img/icons/phone.png" class="payment__card-img">
            <div class="payment__card-inner">
                <p class="payment__card-title">Harga Satuan : Rp <?= number_format($field['price'], 0, ',', '.') ?></p>
                <!-- <p class="payment__card-content"><?= $field['sports_arena']['partner']['phone'] ?></p> -->
            </div>
        </div>
    </div>
    <form action="" class="payment__right" method="post">
        <div class="payment__form" data-animated>
            <div class="payment__input-group"><label for="rent-date">Nama Anda</label> <input type="text" value="<?=$row_user['username']?>" readonly></div>
            <div class="payment__input-group"><label for="rent-date">Pembayaran</label> 
            <select name="bayar" >
                <option value="cash">Cash</option>
                <option value="Bca">Bca</option>
                <option value="Bri">Bri</option>
                <option value="Qris">Qris</option>
            </select>
            <!-- <input type="text" value="<?=$row_user['username']?>" readonly> -->
            </div>
            <!-- <div class="payment__select-box-group"><span>Pembayaran</span>
                <div class="payment__select-box">
                    <<label><input type="checkbox"> 09.00 - 12.00 WIB <img alt="Checked" src="./shafy/img/icons/check-full-primary.png"></label> 
                    <label><input type="checkbox"> 12.30 - 14.30 WIB <img alt="Checked" src="./shafy/img/icons/check-full-primary.png"></label> 
                    <label><input type="checkbox"> 15.00 - 18.00 WIB <img alt="Checked" src="./shafy/img/icons/check-full-primary.png"></label> 
                    <label><input type="checkbox"> 18.30 - 21.00 WIB <img alt="Checked" src="./shafy/img/icons/check-full-primary.png"></label>  -->
                <!-- </div> -->
            </div>
        </div>
        <div class="payment__list" data-animated>
            <div class="payment__item">
                <p>Tanggal Transaksi Anda</p>
            </div>
            <hr>
            <div class="payment__item">
                <p id="realDate"></p>
            </div>
            <input type="time" name="waktu" id="realTimeInput" hidden>
            <!-- <input type="date" name="realDateInput" > -->
        </div><button class="payment__button" data-animated name="submit" type="submit" onclick="return confirm('Lanjut Memesan ? ')">Lanjut Sewa</button>
    </form>
</main>
<script src="./shafy/js/user/payment.js"></script>
<script>
    function updateRealDate() {
    var realDateElement = document.getElementById('realDate');
    var now = new Date();
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var dateString = now.toLocaleDateString('en-US', options);

    realDateElement.innerHTML = 'Current Date: ' + dateString;
}

updateRealDate();


function updateRealTimeInput() {
    var realTimeInputElement = document.getElementById('realTimeInput');
    var now = new Date();
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    var timeString = hours + ':' + minutes;

    realTimeInputElement.value = timeString;
}

// Panggil fungsi pertama kali
updateRealTimeInput();

// Perbarui setiap detik (1000 ms)
setInterval(updateRealTimeInput, 1000);






</script>



<?php require_once __DIR__ . '/partials/footer.php'; ?>