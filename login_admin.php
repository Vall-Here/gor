<?php

$title = 'Sign In';
require_once __DIR__ . '/partials/navbar.php';
$error = "";

require "./config/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    if (empty($email) || empty($password)) {
        echo '<script>alert("Harap isi semua input.");</script>';
    } else {

        $result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");

        // cek username
        if( mysqli_num_rows($result) === 1 ) {

            $row = mysqli_fetch_assoc($result);
            $email_adm = $row['email'];
            $id_adm = $row['id'];
            $jbt_adm = $row['jabatan'];
            $photo = $row['photo'];
            
            if( $password == $row["password"] ) {
                $_SESSION["login"] = $email_adm;
                $_SESSION["cek"] = 'admin';
                $_SESSION['id'] = $id_adm;
                $_SESSION['jbt'] = $jbt_adm;
                $_SESSION['logged_in'] = true;
                header("Location: admin/index_admin.php");
                $_SESSION['photo'] =  $photo;
                exit;
            }
            else {
                echo "<script>alert('password salah')</script>";
            }
        }else {
            echo '<script>alert("Email tidak ada!");</script>';
        } 

    

    }
}


?>

<link rel="stylesheet" href="./elisa/css/login(2).css" />

<!-- content -->
<div class="all">
    <div class="container1 ikbar" data-animated>
        <div class="left">
            <h1>Hello, Admin</h1>
            <form id="myForm" action="" method="post" onsubmit="return validateEmail()">
                <div class="input">
                    <img src="ikbar/img/Email-2.svg" alt="" class="img-inbody" />
                    <input type="email" name="email" class="transborder" placeholder="Email" required/>
                </div>
                <div class="input">
                    <img src="ikbar/img/Lock.svg" alt="" class="img-inbody" />
                    <input type="password" name="password" class="transborder" placeholder="Password" required/>
                </div>
                <div class="submit">
                    <input type="submit" value="Sign in" class="submit-button" />
                </div>
            </form>
        </div>

        <div class="right">
        <img src="ikbar/img/gor.jpg" alt="">

            
 
        </div>
    
    </div>

</div>    


<?php require_once __DIR__ . '/partials/footer.php'; ?>