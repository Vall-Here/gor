<?php

$title = 'Sign In';
require_once __DIR__ . '/partials/navbar.php';
$error = "";

require "./config/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lakukan validasi form
    $email = $_POST['email'];
    $password = $_POST['password']; 

    // Periksa apakah input kosong
    if (empty($email) || empty($password)) {
        // Tampilkan pesan kesalahan menggunakan alert()
        echo '<script>alert("Harap isi semua input.");</script>';
    } else {
        // Lakukan validasi email dan password
        if ($email == "admin@gmail.com" && $password == "admin123") {
            // Login berhasil, simpan informasi pengguna ke dalam sesi
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['email'] = $email;

            $_SESSION['logged_in'] = true;
            $_SESSION['id'] = 111;
            $_SESSION['name'] = 'User One';
            $_SESSION['photo'] = 'shafy/img/profiles/admin.jpeg';

            header('Location: admin/index_admin.php');
            exit;
        } 
        else {
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

        // cek username
        if( mysqli_num_rows($result) === 1 ) {

            // cek password
            $row = mysqli_fetch_assoc($result);
            $email_user = $row['email'];
            $id_user = $row['id'];
            
            if( $password == $row["password"] ) {
                
                // set session
                $_SESSION["login"] = $id_user;
                $_SESSION['id'] = $id_user;
                $_SESSION['logged_in'] = true;
                echo '<script>alert("Selamat Datang!");
                document.location.href = "index.php";
                </script>';
                // header("Location: index.php");
                $_SESSION['photo'] =  $photo;
                exit;
            }else {
                echo '<script>alert("Password Salah!");</script>';
            }
        } else if( $username == "partner" && $password == "pertne" ) {
            // set session
            $_SESSION["login"] = "admin";

            header("Location: admin/beranda.php");
            exit;
        }

    }

    }
}


?>

<link rel="stylesheet" href="./elisa/css/login(2).css" />

<!-- content -->
<div class="all">
    <div class="container1 ikbar" data-animated>
        <div class="left">
            <h1>Hello, User</h1>
            <form id="myForm" action="" method="post" onsubmit="return validateEmail()">
                <div class="input">
                    <img src="ikbar/img/Email-2.svg" alt="" class="img-inbody" />
                    <input type="email" name="email" class="transborder" placeholder="Email" required/>
                </div>
                <div class="input">
                    <img src="ikbar/img/Lock.svg" alt="" class="img-inbody" />
                    <input type="password" name="password" class="transborder" placeholder="Password" required/>
                </div>
                <div class="left_text">
                    don't have an account?<a href="register.php"> Create an account</a>
                </div>
                <div class="submit">
                    <input type="submit" value="Sign in" class="submit-button" />
                </div>
            </form>
        </div>

        <div class="right">
        <img src="ikbar/img/gor.jpg" alt="">

            
            <form action="" method="post">
            
                <div class="submit2">
                <h1>Login As Admin</h1></h1>
                    <button class="submit-button"><a href="login_admin.php">Go</a></button>
                </div>
            </form>
        </div>
    
    </div>

</div>    


<?php require_once __DIR__ . '/partials/footer.php'; ?>