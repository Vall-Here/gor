<?php
require_once __DIR__ . '/partials/navbar.php';
require 'function.php';
$fields = $_GET['id'];
$user = $_SESSION['id'];
$query1 = "SELECT * FROM orders 
           INNER JOIN users ON orders.user_id = users.id 
           INNER JOIN fields ON orders.field_id = fields.id 
           WHERE orders.id = $fields AND orders.user_id = $user";
$result = mysqli_query($conn, $query1);
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <link rel="stylesheet" type="text/css" href="iqbil/css/styles.css" />
</head>

<body>
    <section>
        <div class="invoice">
            <div class="header">
                <div class="i_row">
                    <div class="i_logo">
                        <p>Sportease</p>
                    </div>
                    <div class="i_title">
                        <h2>INVOICE</h2>
                        <!-- <p class="p_title text_right">April 20, 2023</p> -->
                    </div>
                </div>
                <div class="i_row">
                    <div class="i_number">
                        <?php $invoice = generateInvoiceCode(); ?>
                        <p class="p_title"><?= "TOKEN : ".$row['token']?></p>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="i_table">
                    <div class="i_table_head">
                        <div class="i_row">
                            <div class="i_col w_14">
                                <p class="p_title">QTY</p>
                            </div>
                            <div class="i_col w_55">
                                <p class="p_title">DESCRIPTION</p>
                            </div>
                            <div class="i_col w_15">
                                <p class="p_title">WAKTU SEWA</p>
                            </div>
                            <div class="i_col w_15">
                                <p class="p_title">PRICE</p>
                            </div>
                        </div>
                    </div>
                    <div class="i_table_body">

                        <?php
                        $total_qty = 0;
                        mysqli_data_seek($result, 0);
                        while ($row = mysqli_fetch_array($result)) {
                            $total_qty++; ?>
                            <div class="i_row">
                                <div class="i_col w_14">
                                    <p><?= $total_qty; ?></p>
                                </div>
                                <div class="i_col w_55">
                                    <p><?= $row['name']; ?></p>
                                </div>
                                <div class="i_col w_15">
                                    <p><?= $row['waktu_sewa']; ?></p>
                                </div>
                                <div class="i_col w_15">
                                    <p>$<?= $row['price']; ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    
                </div>
            </div>
            <div class="footer">
                <div class="i_row">
                    <div class="i_col w_50">
                        <p class="p_title">Payment Method</p>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Cumque, dicta distinctio! Laudantium voluptatibus est nemo.
                        </p>
                    </div>
                    <div class="i_col w_50 text_right">
                        <p class="p_title">Terms and Conditions</p>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Cumque, dicta distinctio! Laudantium voluptatibus est nemo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php require_once __DIR__ . '/partials/footer.php'; ?>