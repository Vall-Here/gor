<?php

$title = 'Contact';
require_once __DIR__ . '/partials/navbar.php';
 
 require_once 'partials/navbar.php';
 require "./config/connection.php";

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$id = $_SESSION['id'];
$today = date('Y-m-d');
$user = mysqli_query($conn,"SELECT * FROM users");
$row_user = mysqli_fetch_assoc($user);

$faq = mysqli_query($conn,"SELECT * FROM faq WHERE id_user=$id");

if (isset($_POST['submit'])){
    $pertanyaan = $_POST['pertanyaan'];
    // echo $pertanyaan;
    $result = mysqli_query($conn,"INSERT INTO faq(id_user,id_adm,pertanyaan,tanggal_faq) VALUES ($id,1,'$pertanyaan',$today)");
    echo "<script>alert('done');document.location.href = 'contact.php'</script>";
}


?>
<style>
    table,tr,td{
        /* border: 1px solid black; */
    }
    .softeXX {
        /* background-color: red; */
        width: 800px;
        display: flex;
        padding: 20px;
        border-radius: 10px;
        border: 2px solid orangered;
        background-color: transparent;
        backdrop-filter: blur(30px);
        /* align-items: center; */
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5);
        justify-content: center;
    }
    .chat {
        background-color: darkgray;
        /* height: 40px; */
        border-radius: 10px;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
    }
    .answer{
        margin-bottom: 30px;
        background-color: darkgray;
        margin-right: 150px;
        border-radius: 10px;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<link rel="stylesheet" href="./jizdan/css/contact.css">

<script>
    function validateForm() {
        // Mengambil nilai input dari elemen form
        var name = document.forms["myFrom"]["name"].value;
        var email = document.forms["myFrom"]["emailaddress"].value;
        var phone = document.forms["myFrom"]["phone"].value;
        var subject = document.forms["myFrom"]["subject"].value;
        var massage = document.forms["myFrom"]["massage"].value;

        // Melakukan validasi
        if (name == "") {
            alert("Nama harus diisi");
            return false;
        }

        if (email == "") {
            alert("Email harus diisi");
            return false;
        }
        if (phone == "") {
            alert("Phone harus diisi");
            return false;
        }
        if (subject == "") {
            alert("Subject harus diisi");
            return false;
        }
        if (massage == "") {
            alert("Massage harus diisi");
            return false;
            // Menambahkan validasi tambahan sesuai kebutuhan

        }
        alert("Email sudah terkirim");
        return true;
    }
</script>

<!-- content -->
<!-- remove br tags before fill the content -->
<div class="getin container">

    <div class="softeXX">
        <table >
        <?php
            foreach($faq as $row_faq) :
        ?>
            <tr>
                    <td></td>
                    <td>
                        <div class="chat">
                            <?=$row_faq['pertanyaan']?>
                        </div>
                    </td>
                </tr>
            <tr>
                <td>
                    <div class="answer">
                        <?=$row_faq['jawaban']?>
                    </div>
                </td>
                <td></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="kanan">
        <form action="" class="form"  method="post">
          
        
            <div>
                <label for="message">Message</label>
                <textarea name="pertanyaan" id="message" cols="30" rows="10"></textarea>
            </div>
            <div class="bawah">
                <button class="button" type="submit" name="submit">Send Message</button>
   
            </div>
        </form>
    </div>
</div>
<!-- end content -->

<?php require_once __DIR__ . '/partials/footer.php'; ?>