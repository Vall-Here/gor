
<?php
$title = 'Rent Management';
require_once __DIR__ . '/navbar_admin.php';
require "../config/connection.php";
require "../function.php";
require_once __DIR__ . '/partial/sidebar.php';
require_once __DIR__ . '/partial/scripts.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["logged_in"]) || $_SESSION["cek"] != "admin") {
    header("Location: ../login.php");
    exit;
}
$start_date_default = '2000-01-01';
$today = date('Y-m-d');
$end_date_default = $today;

$start_date = isset($_GET['startDate']) ? $_GET['startDate'] : $start_date_default;
$end_date = isset($_GET['endDate']) ? $_GET['endDate'] : $end_date_default;
$date_condition = " AND tanggal_sewa BETWEEN '$start_date' AND '$end_date'";

$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_condition = !empty($search) ? " AND (tanggal_sewa LIKE '%$search%' OR admin_status LIKE '%$search%' OR price LIKE '%$search%' OR waktu_sewa LIKE '%$search%' OR token LIKE '%$search%' OR id_transaksi LIKE '%$search%')" : '';

$results_per_page = isset($_GET['rowsPerPage']) ? (int)$_GET['rowsPerPage'] : 10;
$result_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM orders WHERE 1 $search_condition $date_condition");
$row_count = mysqli_fetch_assoc($result_count);
$total_pages = ceil($row_count['total'] / $results_per_page);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; 
$start_index = ($current_page - 1) * $results_per_page;

$start_index = min($start_index, $row_count['total']);

$orders = "SELECT * FROM orders WHERE 1 $search_condition $date_condition ORDER BY orders.id DESC LIMIT $start_index, $results_per_page";
$result = $conn->query($orders);

$results_per_page2 =10;
$result_count2 = mysqli_query($conn, "SELECT COUNT(*) as total2 FROM transaksi");
$row_count2 = mysqli_fetch_assoc($result_count2);
$total_pages2 = ceil($row_count2['total2'] / $results_per_page2);
$current_page1 = isset($_GET['pages']) ? $_GET['pages'] : 1; 
$start_index1= ($current_page1 - 1) * $results_per_page2;


$transaksi = "SELECT * FROM transaksi ORDER BY transaksi.id_transaksi DESC LIMIT $start_index1, $results_per_page2";
$result2 = $conn->query($transaksi);

?>
<script>

function tampilkanPopup() {
    document.getElementById('popupContainer').style.display = 'block';

    document.getElementById('gambarPopup').src = 'data:image/jpeg;base64,' + '<?php echo base64_encode($blobData); ?>';
}
</script>
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
    .containerHeader input[type="text"],.containerHeader input[type="date"] {
            height: 40px;
            border: none;
            padding-left: 2%;
            margin-right: 20px;
            border-bottom: 1px solid black;
            background-color: transparent;
            color: black;
        }
    .containerHeader input[type="text"],.containerHeader input[type="date"]:focus {
        outline: orangered;
    }
    .containerHeader input[type="text"] {
        margin-right: 40px;
    }
    .pagination {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .pagination a {
            padding: 8px 16px;
            text-decoration: none;
            color: black;
            background-color: #f1f1f1;
            margin: 0 4px;
            border-radius: 5px;
        }

        .pagination a.active {
            background-color: #354c7c;
            color: white;
        }
</style>

<!-- navbar end -->



<div class="container hero" data-animated style="margin-inline:300px 0;
    max-width:1750px
    ">
    <section class="content">
        <div class="containerHeader" >
            <span>Rent Manager</span>
            <!-- <div class="btnTambahCtg"><a href="./tambahCtg.php">Tambah</a></div> -->
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get" style="width: 55%;">
                <input type="text" name="search" placeholder="Cari..." value="<?= $search ?>" onchange="this.form.submit()">
                <label for="startDate">Tanggal Mulai:</label>
                <input type="date" name="startDate" id="startDate" value="<?= $start_date ?>" onchange="this.form.submit()">
                <label for="endDate">Tanggal Akhir:</label>
                <input type="date" name="endDate" id="endDate" value="<?= $end_date ?>" onchange="this.form.submit()">
            </form>
        </div>
     
        <div class="containerMainRent" style="flex-direction: column; align-items:center">

            <table>
                <tr>
                    <th>ID Order</th>
                    <th>ID Transaksi</th>
                    <th>Nama</th>
                    <th>Field</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Token</th>
                    <th>Admin Status</th>
                    <th colspan="3">Operations</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    foreach ($result as $row_orders) { ?>
                        <tr>
                            <td> <?= $row_orders["id"] ?> </td>
                            <td> <?= $row_orders["id_transaksi"] ?> </td>
                            <?php
                            $id_user = $row_orders["user_id"];
                            $orders = "SELECT * FROM users WHERE id  = $id_user";
                            $result = $conn->query($orders);
                            $rows_user = mysqli_fetch_assoc($result);
                            ?>

                            <td> <?= $rows_user["first_name"] ?> <?= $rows_user["last_name"] ?> </td>

                            <?php
                            $id_fields = $row_orders["field_id"];
                            $fieldss = "SELECT * FROM fields WHERE id  = $id_fields";
                            $resultt = $conn->query($fieldss);
                            $rows_field = mysqli_fetch_assoc($resultt);
                            ?>
                            <td> <?= $rows_field["name"] ?> </td>
                            <td> <?= $row_orders["price"] ?></td>
                            <td> <?= $row_orders["tanggal_sewa"] ?></td>
                            <td> <?= $row_orders["waktu_sewa"] ?></td>
                            <td> <?= $row_orders["token"] ?></td>
                            <td> <?= $row_orders["admin_status"] ?></td>
                            <td><button>
                                    <a href="crud_rent/hapus_rent.php?id=<?= $row_orders['id'] ?>" onclick="return confirm('Anda yakin ingin menghapus ?')"><ion-icon name="trash-outline"></ion-icon>
                                    </a>
                                </button>
                            </td>
                            <td><button style="background-color: #4CAF50;"><a href="crud_rent/acc_rent.php?id=<?= $row_orders["id"] ?>" onclick="return confirm('Anda yakin  ?')"> Acc</a></button></td>
                            <td><button style="background-color: #4CAF50;"><a href="pdfgenerator/create_pdf.php?id=<?= $row_orders["id"] ?>" target="_blank" onclick="return confirm('Print Laporan ?')"><ion-icon name="print-outline"></ion-icon></a></button></td>
                            
                        </tr>
                    <?php }; ?>
                <?php } else {
                    echo "Tidak ada data supplier.";
                }
                ?>
            </table>
        
            <div class="pagination">
            <?php if ($current_page > 1) : ?>
                <a href="?page=<?= $current_page - 1 ?>&search=<?= $search ?>&rowsPerPage=<?= $results_per_page ?>&startDate=<?= $start_date ?>&endDate=<?= $end_date ?>">&laquo; Previous</a>
            <?php endif; ?>

            <?php for ($page = 1; $page <= $total_pages; $page++) : ?>
                <a href="?page=<?= $page ?>&search=<?= $search ?>&rowsPerPage=<?= $results_per_page ?>&startDate=<?= $start_date ?>&endDate=<?= $end_date ?>" <?= $page == $current_page ? 'class="active"' : '' ?>><?= $page ?></a>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages) : ?>
                <a href="?page=<?= $current_page + 1 ?>&search=<?= $search ?>&rowsPerPage=<?= $results_per_page ?>&startDate=<?= $start_date ?>&endDate=<?= $end_date ?>">Next &raquo;</a>
            <?php endif; ?>

            <?php if ($total_pages > 10 && $current_page < $total_pages - 9) : ?>
                <!-- Tambahkan link ke halaman terakhir -->
                <a href="?page=<?= $total_pages ?>&search=<?= $search ?>&rowsPerPage=<?= $results_per_page ?>&startDate=<?= $start_date ?>&endDate=<?= $end_date ?>"><?= $total_pages ?></a>
            <?php endif; ?>
        </div>

    
        </div>


        <div class="containerMainRent" style="flex-direction: column; align-items:center">
            <h1>Bukti Pembayaran</h1>
        <table>
                <tr>
                    <th>ID Transaksi</th>
                    <th>tanggal</th>
                    <th>Waktu</th>
                    <th>Total Harga</th>
                    <th>Pembayaran</th>
                    <th>Bukti</th>
                    <th>User</th>
                    <th>Admin</th>
                    <th>Operations</th>
                </tr>
                <?php
                if ($result2->num_rows > 0) {
                    foreach ($result2 as $row_transaksi) { ?>
                        <tr>
                            <td> <?= $row_transaksi["id_transaksi"] ?> </td>

                            
                            <td> <?= $row_transaksi["tanggal"] ?> </td>
                            <td> <?= $row_transaksi["waktu"] ?></td>
                            <td> <?= $row_transaksi["total"] ?></td>
                            <td> <?= $row_transaksi["pembayaran"] ?></td>
                            <td>
                            <?php
                                $blobData = $row_transaksi['bukti'];
                                ?>
                                <a href='data:image/jpeg;base64,<?php echo base64_encode($blobData); ?>' download='gambar_download.jpg'>
                                    <?php echo $blobData ? 'Download disini' : 'Tidak ada data'; ?>
                                </a>
                                <!-- <a href="javascript:void(0);" onclick="tampilkanPopup()">Tampilkan Gambar</a> -->
                                <!-- <button style="background-color: orangered;" onclick="tampilkanPopup()"> -->
                                <div id="popupContainer" style="display: none;">
                                    <img id="gambarPopup" src="" alt="Popup Gambar">
                                </div>
                            </td>
                            <?php 
                            $id_user2 = $row_transaksi["id_user"];
                            $transss = "SELECT * FROM users WHERE id  = $id_user2";
                            $resultt = $conn->query($transss);
                            $rows_users = mysqli_fetch_assoc($resultt);
                            ?>

                            <td> <?= $rows_users['username']?></td>
                            <td> Admin</td>
                            <td><button style="background-color: orangered;"><a href="crud_rent/hapus_transaksi.php?id=<?=$row_transaksi['id_transaksi'] ?>" onclick="return confirm('DATA PADA ORDERS AKAN IKUT TERHAPUS, ANDA YAKIN ?')"> <ion-icon name="trash-outline"></ion-icon></a></button></td>
                        </tr>
                    <?php }; ?>
                <?php } else {
                    echo "Tidak ada data supplier.";
                }
                ?>
            </table>
        
            <div class="pagination">
            <?php if ($current_page1 > 1) : ?>
                <a href="?pages=<?= $current_page1 - 1 ?>">&laquo; Previous</a>
            <?php endif; ?>

            <?php for ($page = 1; $page <= $total_pages2; $page++) : ?>
                <a href="?pages=<?= $page ?>" <?= $page == $current_page1 ? 'class="active"' : '' ?>><?= $page ?></a>
            <?php endfor; ?>

            <?php if ($current_page1 < $total_pages2) : ?>
                <a href="?pages=<?= $current_page1 + 1 ?>">Next &raquo;</a>
            <?php endif; ?>
            </div>
    
        </div>
    </section>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php require_once __DIR__ . '/footerAdmin.php'; ?>