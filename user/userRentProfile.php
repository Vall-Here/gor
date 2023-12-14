<?php
$title = 'Rent';
require_once __DIR__ . '/navbar.php';
require "../config/connection.php";

if(!isset($_SESSION)) 
{ 
session_start(); 
}
$id = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
$rows_user = mysqli_fetch_assoc($user);

$orders = mysqli_query($conn, "SELECT * FROM orders 
                        INNER JOIN fields ON orders.field_id = fields.id
                        WHERE user_id = '$id' ");

$items_per_page = 3;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;
$paginated_orders = mysqli_query($conn, "SELECT *,orders.id as fID FROM orders 
                        INNER JOIN fields ON orders.field_id = fields.id
                        WHERE user_id = '$id'
                        ORDER BY orders.id DESC 
                        LIMIT $items_per_page OFFSET $offset");

$total_pages = ceil(mysqli_num_rows($orders) / $items_per_page);
$orders2 = mysqli_query($conn, "SELECT * FROM orders where user_id = '$id'");
$rows_order2= mysqli_fetch_assoc($orders2);
// echo $rows_order2['id'];
// $field = mysqli_query($conn, "SELECT * FROM fields ");
// $row_field = mysqli_fetch_assoc($field);


?>
<style>
    #pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    margin-bottom: 20px;
}

#pagination a {
    padding: 8px 16px;
    margin: 0 4px;
    border: 1px solid orangered;
    text-decoration: none;
    color: orangered;
    border-radius: 4px;
    transition: background-color 0.3s;
}

#pagination a:hover {
    background-color: orangered;
    color: white;
}

#pagination .active {
    background-color: #3498db;
    color: white;
}
#pagination a.active {
            background-color: orangered;
            color: white;
        }
</style>
<link rel="stylesheet" href="..//rere/css/profile.css" />
<link rel="stylesheet" href="..//rere/userCssNew/style.css">

<!-- content -->
<div class="mainContent">
    <div class="kotakRent">
        <span>Rent</span>
        <div class="back"><a href="../profile.php">Back</a></div>
    </div>
    <div class="semua">
        <div id="" class="RentCointainer">
            <?php 
            
            $counter = mysqli_query($conn,"SELECT COUNT(*) as countt FROM orders WHERE orders.user_id = $id");
            $counterResult = mysqli_fetch_assoc($counter);
            $counterResult['countt'] = $counterResult['countt'] * $items_per_page;
            foreach ($paginated_orders as $row_orders):
                ?>
            <div class=cardBox >
                <div class="cardAtas">
                    <div>
                        <!-- <span class="huruf">Rent <?php echo $counterResult['countt'] = $counterResult['countt'] - 1?></span> -->
                    </div>
                    <hr style="width: 95%; display: flex; margin: 2% 0 1% 1%; color: black; background-color: black;">
                </div>
                <div class="cardIsi">
                    <div class="foto"><span><?=$row_orders['name']?></span><img style="width: 300px; height: 200px;" src="data:image/jpeg;base64,<?php echo base64_encode($row_orders['photo']); ?>"  alt=""></div>
                    <div class="JamPesanan"><?= $row_orders['waktu_sewa']?></div>
                    <?php 
                    $databaseDate = $row_orders['tanggal_sewa'];
                    $displayDate = date("d F Y", strtotime($databaseDate));
                    ?>
                    <div class="hari"><?= $displayDate?></div>
                    <div class="harga"><?= $row_orders['price']?></div>
                    <?php 
                    $todayDay = date('Y-m-d');
                    ?>
                    <div class="status">Status: <?php echo ($databaseDate > $todayDay) ? 'Ongoing' : 'Kadaluarsa'; ?></div>
                    <div class="CETAK"><button><a href="../invoice-2.php?id=<?=$row_orders['id']?>">CETAK</a></button></div>
                    <div class="Cancel"><button 
                    onclick="return confirm('yakin ingin meng cancel penyewaan?')"
                    name="delete"><a href="functions/delSewa.php?id=<?=$row_orders['id']?>">Cancel</a></button></div>
                </div>
                <hr style=" width: 95%; display: flex; margin: 2% 0 1% 1%; color: black; background-color: black;" align="center"  >
                <div class="tulisanBawah">
                    
                    <p>Admin Confirmation status</p> 
                    <div class="acc"><?= $row_orders['admin_status']?></div>
                </div>
            </div>
            <?php endforeach; ?>
            <div id="pagination">
            
            <?php if ($current_page > 1) : ?>
                <a href="?page=<?= $current_page - 1 ?>">&laquo; Previous</a>
            <?php endif; ?>

            <?php for ($page = 1; $page <= $total_pages; $page++) : ?>
                <a href="?page=<?= $page ?>" <?= $page == $current_page ? 'class="active"' : '' ?>><?= $page ?></a>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages) : ?>
                <a href="?page=<?= $current_page + 1 ?>">Next &raquo;</a>
            <?php endif; ?>
            
            </div>
        </div>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- <div id="user_controls" class="container">
<button>Simpan</button>
</div> -->
<!-- end content -->

<?php require_once __DIR__ . '/footer.php'; ?>