
<?php 
 require_once 'partials/navbar.php';
 require "./config/connection.php";

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$today = date('Y-m-d');
$id = $_SESSION['id'];
$user = mysqli_query($conn,"SELECT * FROM users");
$row_user = mysqli_fetch_assoc($user);

$faq = mysqli_query($conn,"SELECT * FROM faq");

if (isset($_POST['submit'])){

    $pertanyaan = $_POST['pertanyaan'];
    $result = mysqli_query($conn,"INSERT INTO faq(id_user,id_adm,pertanyaan,tanggal_faq) VALUES ($id,1,'$pertanyaan',$today)");
    echo "<script>alert('done');document.location.href = 'FAQ.php';</script>";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ PAGE</title>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="jizdan/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   
</head>

<body>



     



        <h1 class="faq-heading">FAQ'S</h1>
        <section class="faq-container">
            <?php
                foreach($faq as $row_faq) :
            ?>            
            <div class="faq-one">
                <h4 class="faq-page"><?=$row_faq['pertanyaan']?></h1>
                <div class="faq-body">
                    <p><?=$row_faq['jawaban']?></p>
                </div>
            </div>
            <hr class="hr-line">
            <?php endforeach; ?>

            <!-- <div class="faq-two">

                
                <h4 class="faq-page">Bagaimana saya mencari layanan dalam sportease?</h1>

                

                <div class="faq-body">
                    <p>ada dapat mencari layanan dengan menggunakan kolom pencarian</p>
                </div>
            </div>
            <hr class="hr-line">


            <div class="faq-three">

                
                <h4 class="faq-page">apakah saya perlu membuat akun untuk melakukan pencarian layanan?</h1>

                
                <div class="faq-body">
                    <p>anda tidak perlu membuat akun untuk melakukan pencarian layanan</p>
                </div>
            </div>

            <div class="faq-four">

            
            <h4 class="faq-page">apa keuntungan saya memesan layanan di sportease</h1>

            
            <div class="faq-body">
                <p>untuk pemasanan layanan lapangan bola besar anda tidak perlu membawa bola lagi karena di sportease sudah menyediakan seperti bola futsal, bola basket, dll</p>
            </div>
            </div>
            <hr class="hr-line">

            <div class="faq-five">

            
            <h4 class="faq-page">apakah ada perbedaan pemesanan layanan di waktu siang dengan waktu malam?</h1>

            
            <div class="faq-body">
                <p>untuk harga pemesanan waktu malam berbeda, harga bertambah 10.000 dari harga siang</p>
            </div>
            </div>
            <hr class="hr-line">

            <div class="faq-six">

            
            <h4 class="faq-page">kapan sportease membuka pemesanan layanan lapangan?</h1>

            
            <div class="faq-body">
                <p>sportease buka setiap hari pada jam 06:00-17:00 & 18:00-02:00</p>
            </div>
            </div>
            <hr class="hr-line"> -->

        </section>
    

    <section id="contact" class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Ajukan Pertanyaan</h2>
                <form id="contactForm" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" value="<?=$row_user['username']?>" required>
                    </div>
    
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name='pertanyaan' placeholder="Enter your message" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100" >send</button>
                </form>
            </div>
        </div>
    </section>

    <script src="jizdan/main.js"></script>
</body>


</html>


<?php  require_once "partials/footer.php"?>