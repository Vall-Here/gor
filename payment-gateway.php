<?php
require_once __DIR__ . '/shafy/logics/config/global.php';
require_once __DIR__ . '/config/connection.php';

// Pastikan Anda memiliki nilai yang sesuai untuk $id_transaksi, $user_id, dan $field_id

if (!isset($_SESSION['logged_in'])) {
    header('Location: ./login.php');
    exit;
}

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
?>

<main class="container payment">
    <div class="payment__left" data-animated>
        <h1>Transaksi Detail</h1>
        <p>Silahkan konfirmasi penyewaan anda dengan mengisi semua form yang ada</p>
        <div class="payment__card" data-animated>
            <img alt="Phone" src="./shafy/img/icons/phone.png" class="payment__card-img">
            <div class="payment__card-inner">
                <p class="payment__card-title">TOTAL BAYAR : Rp <?= number_format($field['price'], 0, ',', '.') ?></p>
            </div>
        </div>
    </div>
    <form action="confirm-payment.php" class="payment__right" method="post">
        <div class="payment__list" data-animated>
            <div class="payment__item">
                <label for="jumlah_lapangan">Jumlah Lapangan</label>
                <input type="number" name="jumlah_lapangan" id="jumlah_lapangan" required>
                <button type="button" id="tambahFormulir">Tambah Formulir</button>
            </div>
        </div>
        <div id="formContainer" class="payment__form">
            <!-- Formulir yang dibuat dinamis akan ditambahkan di sini -->
        </div>
        <button class="payment__button" data-animated name="submit" type="submit">Next</button>
    </form>
</main>

<script src="./shafy/js/user/payment.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var jumlahLapanganInput = document.getElementById("jumlah_lapangan");
        var tambahFormulirButton = document.getElementById("tambahFormulir");
        var formContainer = document.getElementById("formContainer");

        function tambahFormulir() {
            var jumlahLapangan = parseInt(jumlahLapanganInput.value);

            // Hapus formulir yang ada di dalam container
            formContainer.innerHTML = "";

            // Tambahkan formulir sebanyak jumlah lapangan
            for (var i = 0; i < jumlahLapangan; i++) {
                var formulir = `
                    <div class="payment__input-group">
                        <label for="rent-date-${i}">Rent Date</label>
                        <input type="date" name="rent_date[]" id="rent-date-${i}" required>
                    </div>
                    <div class="payment__input-group">
                        <label for="lapangan-${i}">Lapangan</label>
                        <select name="lapangan[]" id="lapangan-${i}" required>
                            <?php
                            $sqlField = mysqli_query($conn, "SELECT * FROM fields");
                            foreach ($sqlField as $row_sqlfield) :
                            ?>
                                <option value="<?= $row_sqlfield['id'] ?>"><?= $row_sqlfield['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="payment__select-box-group">
                        <span>Rent Time</span>
                        <div class="payment__select-box">
                            <label><input type="radio" name="rent_time[${i}]" value="09.00-12.00"> 09.00-12.00 WIB <img alt="Checked" src="./shafy/img/icons/check-full-primary.png"></label>
                            <label><input type="radio" name="rent_time[${i}]" value="12.30-14.30"> 12.30-14.30 WIB <img alt="Checked" src="./shafy/img/icons/check-full-primary.png"></label>
                            <label><input type="radio" name="rent_time[${i}]" value="15.00-18.00"> 15.00-18.00 WIB <img alt="Checked" src="./shafy/img/icons/check-full-primary.png"></label>
                            <label><input type="radio" name="rent_time[${i}]" value="18.30-21.00"> 18.30-21.00 WIB <img alt="Checked" src="./shafy/img/icons/check-full-primary.png"></label>
                        </div>
                    </div>
                    <hr width="90%" align="center">
                    <br>
                `;

                formContainer.innerHTML += formulir;
            }

            // Tambahkan event listener untuk setiap radio button
            for (var i = 0; i < jumlahLapangan; i++) {
                var rentTimeRadios = document.getElementsByName(`rent_time[${i}]`);

                rentTimeRadios.forEach(function (radio) {
                    radio.addEventListener("change", function () {
                            var rentDate = document.getElementById(`rent-date-${i}`).value;
                            var lapangan = document.getElementById(`lapangan-${i}`).value;
                            var waktuSewa = radio.value;

                            fetch('check_availability.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'rent_date=' + rentDate + '&lapangan=' + lapangan + '&waktu_sewa=' + waktuSewa,
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Lakukan sesuatu berdasarkan respons dari server
                            if (data.available) {
                                console.log('Waktu sewa tersedia.');
                            } else {
                                console.log('Waktu sewa sudah terisi.');
                                // Tambahkan logika di sini untuk men-disable radio button atau memberikan pesan peringatan
                            }
                        })
                        .catch((error) => {
                            console.error('Error:', error);
                        });
                    });
                });
            }
        }

        // Tambahkan event listener untuk tombol tambahFormulir
        tambahFormulirButton.addEventListener("click", tambahFormulir);
    });
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
