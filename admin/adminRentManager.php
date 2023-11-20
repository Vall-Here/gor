<?php
$title = 'Rent Management';
require_once __DIR__ . '/navbar_admin.php';
require "../config/connection.php";
require "../function.php";
require_once __DIR__ . '/partial/sidebar.php';
require_once __DIR__ . '/partial/scripts.php';

// if( !isset($_SESSION["login"]) || $_SESSION["login"] != "admin" ) {
//     header("Location: ../index.php");
//     exit;
// }
$orders = "SELECT * FROM orders";
$result = $conn->query($orders);

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

        .containerMainRent table th, td {
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
    </style>

    <!-- navbar end -->

    <div class="container hero" data-animated
    style="margin-inline:158px 0;
    max-width:1890px
    ">
    <section class="content">
        <div class="containerHeader">
            <span>Rent Manager</span>
            <!-- <div class="btnTambahCtg"><a href="./tambahCtg.php">Tambah</a></div> -->
        </div>
        <div class="containerMainRent">

            <table>
            <tr>
                <th>ID Order</th>
                <th>Nama</th>
                <th>Field</th>
                <th>Harga</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Token</th>
                <th>Admin Status</th>
                <th colspan="2">Operations</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                foreach($result as $row_orders) { ?>
                    <tr>
                    <td> <?= $row_orders["id"] ?> </td>
                    <?php
                        $id_user = $row_orders["user_id"];
                        $orders = "SELECT * FROM users WHERE id  = $id_user";
                        $result = $conn->query($orders);
                        $rows_user = mysqli_fetch_assoc($result);
                    ?>

                    <td> <?= $rows_user["first_name"]?> <?=$rows_user["last_name"] ?> </td>

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
                    <td><button >
                        <a href="crud_rent/hapus_rent.php?id=<?= $row_orders['id'] ?>" onclick="return confirm('Anda yakin ingin menghapus ?')">Hapus
                        </a>
                        </button>
                    </td>
                    <td><button style="background-color: #4CAF50;"><a href="crud_rent/acc_rent.php?id=<?= $row_orders["id"] ?>" onclick="return confirm('Anda yakin  ?')"> Acc</a></button></td>
                    </tr>
                <?php };?>
            <?php } 
            else {
                echo "Tidak ada data supplier.";
            }
            ?>
        </table>
        </div>
    </section>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php require_once __DIR__ . '/footerAdmin.php'; ?>



