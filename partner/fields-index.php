<?php

$title = 'Fields';
require_once __DIR__ . '/../partials/partner/sidebar.php';

?>

<link rel="stylesheet" href="../dila/css/style1.css" />

<!-- page-wrapper -->
<div class="page-wrapper">

    <?php require_once __DIR__ . '/../partials/partner/topbar.php'; ?>

    <!-- content -->
    <div class="content">
        <br>
        <p>All Fields</p> <br>
        <table>

            <thead>
                <tr>
                    <th scope="col" width="100px">Gambar Lapangan</th>
                    <th scope="col" width="290px">Jenis Lapangan</th>
                    <th scope="col">Date</th>
                    <th scope="col">Price</th>
                    <th scope="col" width="70px">Time</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Due Date"><img src="../dila/img/lapangan 1.1.jpg" class="tab-img"></td>
                    <td data-label="Amount">Lapangan Basket</td>
                    <td data-label="Period">03/01/2022</td>
                    <td data-label="Due Date">$64.00</td>
                    <td data-label="Period"><i class="fa fa-gear ticon">12.00</i>
                    <td data-label="Amount" style="position: relative;"><span class="pe"></span>Kosong</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>

                <tr class="active-tr">
                    <td data-label="Due Date"><img src="../dila/img/lapangan 1.1.jpg" class="tab-img"></td>
                    <td data-label="Amount">Lapangan Futsal</td>
                    <td data-label="Period">03/01/2022</td>
                    <td data-label="Due Date">$64.00</td>
                    <td data-label="Period"><i class="fa fa-gear  ticon">12.00</i>
                    <td data-label="Amount" style="position: relative;"><span class="de"></span>Booked</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>
                <tr>
                    <td data-label="Due Date"><img src="../dila/img/lapangan 1.1.jpg" class="tab-img"></td>
                    <td data-label="Amount">Lorem ispum dummy text industry.</td>
                    <td data-label="Period">03/01/2022</td>
                    <td data-label="Due Date">$64.00</td>
                    <td data-label="Period"><i class="fa fa-gear ticon">12.00</i>
                    <td data-label="Amount" style="position: relative;"><span class="pe"></span>Kosong</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>

                <tr>
                    <td data-label="Due Date"><img src="../dila/img/lapangan 1.1.jpg" class="tab-img"></td>
                    <td data-label="Amount">Lorem ispum dummy text industry.</td>
                    <td data-label="Period">03/01/2022</td>
                    <td data-label="Due Date">$64.00</td>
                    <td data-label="Period"><i class="fa fa-gear ticon">12.00</i>
                    <td data-label="Amount" style="position: relative;"><span class="pe"></span>Kosong</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>
                <tr>
                    <td data-label="Due Date"><img src="../dila/img/lapangan 1.1.jpg" class="tab-img"></td>
                    <td data-label="Amount">Lorem ispum dummy text industry.</td>
                    <td data-label="Period">03/01/2022</td>
                    <td data-label="Due Date">$64.00</td>
                    <td data-label="Period"><i class="fa fa-gear ticon">12.00</i>
                    <td data-label="Amount" style="position: relative;"><span class="de"></span>Booked</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>

                <tr>
                    <td data-label="Due Date"><img src="../dila/img/lapangan 1.1.jpg" class="tab-img"></td>
                    <td data-label="Amount">Lorem ispum dummy text industry.</td>
                    <td data-label="Period">03/01/2022</td>
                    <td data-label="Due Date">$64.00</td>
                    <td data-label="Period"><i class="fa fa-gear ticon">12.00</i>
                    <td data-label="Amount" style="position: relative;"><span class="pe"></span>Kosong</td>

                    <i class="fa fa-angle-down ticon"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- end your content in here -->

    <?php require_once __DIR__ . '/../partials/partner/footer.php'; ?>
</div>
</div>
<!-- end content -->
</div>
<!-- end page-wrapper -->

<?php require_once __DIR__ . '/../partials/partner/scripts.php'; ?>