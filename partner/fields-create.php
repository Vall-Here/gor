<?php

$title = 'Fields Create';
require_once __DIR__ . '/../partials/partner/sidebar.php';

?>


<link rel="stylesheet" href="../dila/css/style1.css" />
<link rel="stylesheet" href="../dila/css/createfields.css">

<!-- page-wrapper -->
<div class="page-wrapper">

    <?php require_once __DIR__ . '/../partials/partner/topbar.php'; ?>

    <!-- content -->
    <div class="form">
        <h3>Edit Your Fields</h3>
        <form action="">
            <p>
                <label for="">Nama Lapangan</label>
                <input type="text" placeholder="lapangan basket">
            </p>
            <p>
                <label for="">Harga Lapangan</label>
                <input type="text" placeholder="Rp.xxxxxxx">
            </p>
            <p>
                <label for="">Available</label>
                <input type="text" placeholder="5 booked">
            </p>
            <p>
                <label for="">Category</label>
                <input type="text" placeholder="lapangan">
            </p>
            <p>
                <label for="">Ukuran</label>
                <input type="text" placeholder="xxxxxxxxxx">
            </p>
            <p>
                <label for="">Time</label>
                <input type="text" placeholder="xxxx, xxxx, xxxx">
            </p>
            <p class="full-width">
                <label for="">Deskripsi</label>
                <textarea name="" id="" cols="30" rows="7">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum rem distinctio, officia veritatis consectetur in, amet possimus quidem eaque a nobis cupiditate unde perferendis ipsum quaerat inventore nulla error sit.
                        Iusto reprehenderit commodi, enim beatae optio nihil numquam excepturi asperiores sapiente eligendi cum corporis, cupiditate sit architecto maiores minus nesciunt aspernatur quibusdam, assumenda eveniet! Vero 
                        laudantium cupiditate excepturi deserunt sint?
                        Cum possimus ut iusto sed! Maxime quas at eveniet culpa reiciendis minima necessitatibus tenetur doloremque eos cum! Accusantium, corrupti nisi perferendis, vel obcaecati cumque eveniet accusamus molestiae a, tenetur temporibus.
                        Error non nemo nisi repellat voluptas, nobis sapiente, quasi laborum nesciunt illum aperiam repellendus, a explicabo itaque quos aliquam nam molestias. Minima omnis dicta autem non, nihil velit aut ipsam?
                        Tempora magni libero voluptatibus delectus temporibus rerum expedita earum! Libero illum velit modi molestiae harum veniam cumque deleniti ipsum dolor beatae quisquam saepe tempore, at maiores adipisci dolorum molestias 
                        dignissimos!
                    </textarea>
            </p>
            <p class="full-width">
                <button>Simpan</button>
            </p>
        </form>
    </div>
</div>
</div>
<!-- end content -->
</div>
<!-- end page-wrapper -->

<?php require_once __DIR__ . '/../partials/partner/scripts.php'; ?>