<?php
$title = 'Fields Management';
require_once __DIR__ . '/navbar_admin.php';
require "../config/connection.php";
require "../function.php";


// if( !isset($_SESSION["login"]) || $_SESSION["login"] != "admin" ) {
//     header("Location: ../index.php");
//     exit;
// }

$kategori = mysqli_query($conn,"SELECT * FROM categories");
$row_kategori = mysqli_fetch_assoc($kategori);

$status = mysqli_query($conn,"SELECT * FROM status");


$id_fields = $_GET['id'];
$fields = mysqli_query($conn,"SELECT * FROM fields WHERE id = $id_fields" );
$row_field = mysqli_fetch_assoc($fields);



if (isset($_GET['ubah'])){
    global $conn;
    $id_fields = $_GET['id'];

    $catG = $_GET['catId'];
    $nama = $_GET['nama'];
    $desk = $_GET['desc'];
    $harga = $_GET['price'];
    $ukuran = $_GET['size'];

    $sql = mysqli_query($conn,"UPDATE fields SET category_id = $catG, name = '$nama', description = '$desk', price = '$harga' ,size = '$ukuran' WHERE id = $id_fields" );
    // echo $id_fields ;
    if ($sql) {
        echo "<script>alert('Fields Berhasil di update')</script>";
        echo "<meta http-equiv='refresh' content='0.1;url=editFields.php?id=$id_fields'>";
    }
    else {
        echo "<script>alert('Fields Gagal di update')</script>";
    }
    
}
if (isset($_GET['statusUp'])){
    global $conn;
    $id_fields = $_GET['id'];

    $statusId = $_GET['status'];
    echo $statusId;

    $sql = mysqli_query($conn,"UPDATE fields SET status_id = $statusId WHERE id = $id_fields" );

    if ($sql) {
        echo "<script>alert('Fields Berhasil di update')</script>";
        echo "<meta http-equiv='refresh' content='0.1;url=editFields.php?id=$id_fields'>";
    }
    else {
        echo "<script>alert('Fields Gagal di update')</script>";
    }
    
}



?>

<link rel="stylesheet" href="./css/style.css" />


    <!-- navbar end -->
    <script>
    function gotofavoritepage() {
        // Ganti "favorite.php" dengan URL halaman favorit yang diinginkan
        window.location.href = "favorite.php"; 
    }
    </script>

    <section class="content">
    <div class="mainContent">
        <div class="containerHeader">
            <span>Menu Edit Lapangan</span>
        </div>
        <div class="containerMainEditF" data-animated>

            <div class="card">
                <div class="cardImgEdit" style=" background-image: url(data:image/jpeg;base64,<?php echo base64_encode($row_field['photo']) ?>); background-size: cover;"></div>

                    <div class="cardText">
                        <h4><?= $row_field["name"]; ?></h4>
                    </div>
                    <form action="" method="get">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <?php  
                                foreach ($status as $row_status):
                                    if ($row_field['status_id'] == $row_status['id_status'] ) {?>
                                        <option selected value="<?=$row_status['id_status']?>"><?=$row_status['kondisi_status']?></option>
                            <?php } else { ?>   
                                        <option  value="<?=$row_status['id_status']?>"><?=$row_status['kondisi_status']?></option>
                            <?php }
                            
                            endforeach;
                            ?>
                            
                        </select>
                        <input type="text" hidden name="id" value="<?=$row_field['id']?>" >
                        <button name="statusUp">Update</button>
                    </form>
            </div>
            <div class="card2">
                <div class="idcard2">
                    <p>ID <?=$row_field['id']?></p>
                </div>
                <form action="" method="get">
                    <div class="card2form">
                        <label for="catId">Category</label>
                        <select name="catId" id="">
                            <?php foreach ($kategori as $fCategory) :
                                if ($row_field['category_id'] == $fCategory['id']) {
                                ?>
                                <option selected value="<?=$fCategory['id']?>"><?=$fCategory['name']?></option>
                                <?php }
                                else {
                                ?>
                                <option value="<?=$fCategory['id']?>"><?=$fCategory['name']?></option>
                                <?php }
                                endforeach;
                                ?>
                        </select>
                    </div>
                    <div class="card2form">
                        <label for="nama">Nama Fields</label>
                        <input type="text" name="nama" value="<?=$row_field['name']?>">
                    </div>
                    <div class="card2form">
                        <label for="">Deskripsi</label>
                        <textarea  name="desc" ><?=$row_field['description']?></textarea>
                    </div>
                    <div class="card2form">
                        <label for="">Harga</label>
                        <input type="text" name="price" value="<?=$row_field['price']?>"> 
                    </div>
                    <div class="card2form">
                        <label for="">Ukuran</label>
                        <input type="text" name="size" value="<?=$row_field['size']?>">
                    </div>
                    <input type="text" hidden name="id" value="<?=$row_field['id']?>" >
                    <button  name="ubah" >Ubah</button>
                </form>
            </div>
        </div>
    </div>



    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        var warnaAwal = 'white';
        var isActive = false;

        function ubahWarnaLatarBelakang(div) {
            if (div.style.backgroundColor === warnaAwal) {
                div.style.backgroundColor = "orangered";
                alert("Kondisi Aktif");
                isActive = true;
            } else {
                div.style.backgroundColor = warnaAwal;
                alert("Kondisi NonAktif");
                isActive = false;
            }
        }
    </script>

<?php require_once __DIR__ . '/footerAdmin.php'; ?>



