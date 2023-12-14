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
if(isset($_GET['id']) && isset($_POST['jawaban'])) {
    $id_faq = $_GET['id'];
    $jawaban = $_POST['jawaban'];

    $updateQuery = "UPDATE faq SET jawaban = '$jawaban' WHERE id_faq = $id_faq";
    
    if ($conn->query($updateQuery) === TRUE) {
        echo "Jawaban berhasil diupdate.";
    } else {
        echo "Error updating jawaban: " . $conn->error;
    }
}
$start_date_default = '2000-01-01';
$today = date('Y-m-d');
$end_date_default = $today;

$start_date = isset($_GET['startDate']) ? $_GET['startDate'] : $start_date_default;
$end_date = isset($_GET['endDate']) ? $_GET['endDate'] : $end_date_default;
$date_condition = " AND tanggal_faq BETWEEN '$start_date' AND '$end_date'";


$results_per_page = isset($_GET['rowsPerPage']) ? (int)$_GET['rowsPerPage'] : 5;
$result_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM faq INNER JOIN admin ON faq.id_adm = admin.id_admin WHERE 1 $date_condition");
$row_count = mysqli_fetch_assoc($result_count);
$total_pages = ceil($row_count['total'] / $results_per_page);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; 
$start_index = ($current_page - 1) * $results_per_page;


$faq = "SELECT * FROM faq INNER JOIN admin ON faq.id_adm = admin.id_admin WHERE 1 $date_condition ORDER BY faq.id_faq DESC LIMIT $start_index, $results_per_page";
$result = $conn->query($faq);

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
    .containerHeader input[type="text"],.containerHeader input[type="date"] {
            height: 40px;
            border: none;
            padding-left: 2%;
            margin-right: 20px;
            border-bottom: 1px solid black;
            background-color: transparent;
            color: black;
        }
    .containerHeader input[type="date"]:focus{
        outline: none;
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

<div class="container hero" data-animated style="margin-inline:300px 0px;
    max-width:100%
    ">
    <section class="content">
        <div class="containerHeader" >
            <span>List Faq</span>
            <!-- <div class="btnTambahCtg"><a href="./tambahCtg.php">Tambah</a></div> -->
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get" style="width: 40%;">

                <label for="startDate">Tanggal Mulai:</label>
                <input type="date" name="startDate" id="startDate" value="<?= $start_date ?>" onchange="this.form.submit()">
                <label for="endDate">Tanggal Akhir:</label>
                <input type="date" name="endDate" id="endDate" value="<?= $end_date ?>" onchange="this.form.submit()">
            </form>
        </div>
        <div class="containerMainRent" style="flex-direction: column; align-items:center;width:95%">

            <table>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Admin</th>
                    <th>Tanggal</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th>Operations</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    foreach ($result as $row_faq) { ?>
                        <tr>
                            <td> <?= $row_faq["id_faq"] ?> </td>
                            <?php
                            $id_user = $row_faq["id_user"];
                            $faq = "SELECT * FROM users WHERE id  = $id_user";
                            $result = $conn->query($faq);
                            $rows_user = mysqli_fetch_assoc($result);
                            ?>
                            <td> <?= $rows_user["first_name"] ?> <?= $rows_user["last_name"] ?> </td>
                            <td> <?= $row_faq["nama_admin"] ?> </td>
                            <td> <?= $row_faq["tanggal_faq"] ?></td>
                            <td> <?= $row_faq["pertanyaan"] ?></td>
                            <td style="width: 30%;"><form  method="post" action="?id=<?= $row_faq["id_faq"] ?>" onsubmit="return confirm('Anda yakin?')">
                                <textarea style="font-size:15px;" name="jawaban" cols="40" rows="10"><?= $row_faq["jawaban"] ?></textarea>
                                <button type="submit" name="jawab" style="background-color: #4CAF50;width:94%">
                                    <?php echo empty($row_faq['jawaban']) ? 'Jawab' : 'Edit Jawaban'; ?>
                                </button>
                            </form>
                            </td>
                            <!-- <td><textarea style="font-size:15px ;" name="jawaban" cols="40" rows="10"><?= $row_faq["jawaban"] ?></textarea></td>
                            <td><button name="jawab" style="background-color: #4CAF50;"><a href="?id=<?= $row_faq["id_faq"] ?>" onclick="return confirm('Anda yakin  ?')"><?php if(empty($row_faq['jawaban'])){echo 'Jawab';}else {echo 'Edit Jawaban';}?></a></button></td> -->
                            <td><button>
                                    <a href="crud_rent/hapus_rent.php?id=<?= $row_faq['id_faq'] ?>" onclick="return confirm('Anda yakin ingin menghapus ?')">Hapus
                                    </a>
                                </button>
                            </td>
                        </tr>
                    <?php }; ?>
                <?php } else {
                    echo "Tidak ada data.";
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
        </div>
    
        </div>
    </section>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php require_once __DIR__ . '/footerAdmin.php'; ?>