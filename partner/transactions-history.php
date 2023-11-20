<?php

$title = 'Transactions History';
require_once __DIR__ . '/../partials/partner/sidebar.php';

?>

<link rel="stylesheet" href="../aris/css/style1.css" />

<!-- page-wrapper -->
<div class="page-wrapper">

    <?php require_once __DIR__ . '/../partials/partner/topbar.php'; ?>

    <!-- content -->
    <div class="content">
        <p>History orders</p><br><br>
        <table>

            <thead>
                <tr>
                    <th scope="col" width="50px">ID</th>
                    <th scope="col" width="100px">Nama</th>
                    <th scope="col" width="290px">Alamat</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Lapangan</th>
                    <th scope="col">Harga</th>
                    <th scope="col" width="70px">Waktu</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Account">#1</td>
                    <td data-label="Due Date">Burhan</td>
                    <td data-label="Amount">JL. Pemuda No.21 Sumenep</td>
                    <td data-label="Period">09/06/2023</td>
                    <td data-label="Amount">Futsal </td>
                    <td data-label="Due Date">Rp 60.000</td>
                    <td data-label="Period"><i class="fa fa-gear ticon">19.30</i>
                    <td data-label="Amount" style="position: relative;"><span class="pe"></span>Pending</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>

                <tr class="active-tr">
                    <td data-label="Account">#2</td>
                    <td data-label="Due Date">Mustofa</td>
                    <td data-label="Amount">Jalan Pahlawan No. 21 Sampang</td>
                    <td data-label="Period">09/05/2023</td>
                    <td data-label="Amount">Basket</td>
                    <td data-label="Due Date">Rp 70.000</td>
                    <td data-label="Period"><i class="fa fa-gear  ticon">09.00</i>
                    <td data-label="Amount" style="position: relative;"><span class="de"></span>Dispatch</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>
                <tr>
                    <td data-label="Account">#3</td>
                    <td data-label="Due Date">Baki</td>
                    <td data-label="Amount">Jalan Wijaya Kusuma No. 03 Sampang</td>
                    <td data-label="Period">03/08/2023</td>
                    <td data-label="Amount">Tenis</td>
                    <td data-label="Due Date">Rp 90.000</td>
                    <td data-label="Period"><i class="fa fa-gear ticon">21.00</i>
                    <td data-label="Amount" style="position: relative;"><span class="pe"></span>Pending</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>

                <tr>
                    <td data-label="Account">#4</td>
                    <td data-label="Due Date">Inem</td>
                    <td data-label="Amount">Jalan Raya Labang Bangkalan</td>
                    <td data-label="Period">06/05/2023</td>
                    <td data-label="Amount">Badminton</td>
                    <td data-label="Due Date">Rp 50.000</td>
                    <td data-label="Period"><i class="fa fa-gear ticon">12.30</i>
                    <td data-label="Amount" style="position: relative;"><span class="pe"></span>Pending</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>
                <tr>
                    <td data-label="Account">#5</td>
                    <td data-label="Due Date">Maimunah</td>
                    <td data-label="Amount">Jalan Pemuda No. 2 Pamekasan</td>
                    <td data-label="Period">08/07/2023</td>
                    <td data-label="Amount">Tenis</td>
                    <td data-label="Due Date">Rp 90.000</td>
                    <td data-label="Period"><i class="fa fa-gear ticon">07.00</i>
                    <td data-label="Amount" style="position: relative;"><span class="de"></span>Dispatch</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>

                <tr>
                    <td data-label="Account">#6</td>
                    <td data-label="Due Date">Ikbar</td>
                    <td data-label="Amount">JLN Raya Telang No. 05 Kamal</td>
                    <td data-label="Period">03/01/2023</td>
                    <td data-label="Amount">Basket</td>
                    <td data-label="Due Date">Rp 60.000</td>
                    <td data-label="Period"><i class="fa fa-gear ticon">22.00</i>
                    <td data-label="Amount" style="position: relative;"><span class="pe"></span>Pending</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- end your content in here -->
</div>

<?php require_once __DIR__ . '/../partials/partner/footer.php'; ?>
</div>
</div>
<!-- end content -->
</div>
<!-- end page-wrapper -->

<?php require_once __DIR__ . '/../partials/partner/scripts.php'; ?>