<?php require_once __DIR__ . '/shafy/logics/config/global.php';
if (!isset($_SESSION['logged_in'])) {
    header('Location: ./login.php');
    exit;
}

require 'config/connection.php';
$id = $_SESSION["id"];
$user =  mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$row_user = mysqli_fetch_assoc($user);

require_once __DIR__ . '/shafy/logics/libs/data.php';

$title = 'Bukti Pembayaran';
require_once __DIR__ . '/partials/navbar.php'; 


$queryTrans = "SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT 1";
$resultTrans = mysqli_query($conn, $queryTrans);

if ($resultTrans) {
    $row_trans = mysqli_fetch_assoc($resultTrans);
    // $id_transaksi = $row['id_transaksi'] ;
    $id_transaksi = $_GET['id'] ;
} else {
    echo "Error: " . mysqli_error($conn);
    exit;
}


if (isset($_POST['submit'])){
    // Periksa apakah file_bukti ada dalam $_FILES dan bukan null
    if (isset($_FILES['file_bukti'])) {
        // Dapatkan nama file dan data BLOB dari file yang diunggah
        // $bukti = $_FILES['file_bukti'][];
        $new_blob_data = file_get_contents($_FILES['file_bukti']['tmp_name']);

   

        $updateQuery = "UPDATE transaksi SET bukti = ? WHERE id_transaksi = ?";
        $stmt = $conn->prepare($updateQuery);

        // Bind parameter
        $stmt->bind_param("si", $new_blob_data, $id_transaksi);

        // Eksekusi pernyataan
        if ($stmt->execute()) {
            echo '
            <script>
            alert("Berikut Invoice Anda");
            document.location.href = "invoice.php?id=' . $id_transaksi . '";
            </script>
            ';
        } else {
            echo "Error dalam eksekusi pernyataan: " . $stmt->error;
        }

    
    } else {
        echo "Error: File bukti tidak diunggah atau terdapat kesalahan dalam proses unggah.";
    }
}


    



?>
<style>
       input[type='file']{
            width: 100%;
            height: 100px;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px dashed #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
</style>

<main class="container payment">
    <div class="payment__left" data-animated>
        <h1>Transaksi Gateway</h1>
        <p>Silahkan Isi Bukti Pembayaran anda</p>
        <p>Transaksi ID :<?= $row_trans['id_transaksi'] ?><br> 
        <p>Pembayaran Via :<?= $row_trans['pembayaran'] ?><br> 
        <div class="payment__card" data-animated>
            <img alt="Phone" src="./shafy/img/icons/phone.png" class="payment__card-img">
            <div class="payment__card-inner">
                <p class="payment__card-title">Total Bayar : Rp <?= number_format($row_trans['total'], 0, ',', '.') ?></p>

            </div>
        </div>
    </div>
    <form action="" class="payment__right" method="post" enctype="multipart/form-data">
        <div class="payment__form" data-animated>
            <div class="payment__input-group"><label for="rent-date">Nama Anda</label> <input type="text" value="<?=$row_user['username']?>" readonly></div>
            <label for="file_bukti">Kirim Bukti Pembayaran (JPG, JPEG, PNG):</label>
            <input type="file" name="file_bukti" required>
         
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
        </div><button class="payment__button" data-animated name="submit" type="submit" onclick="return confirm('Yakin Sudah Benar ? ')">Upload Bukti</button>
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