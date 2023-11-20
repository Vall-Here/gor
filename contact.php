<?php

$title = 'Contact';
require_once __DIR__ . '/partials/navbar.php';

?>

<link rel="stylesheet" href="./iqbil/css/contact.css" />

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
    <div class="kiri">
        <h1>Get in touch</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur <br />
            elit bortis arcu enim adipiscingt
        </p>
        <div class="get">
            <img src="./iqbil/img/email (copy 1).png" alt="" class="img" />
            <div>
                <p>Email</p>
                <p>cs@sportease.com</p>
            </div>
        </div>
        <div class="get">
            <img src="./iqbil/img/phone (copy 1).png" alt="" class="img" />
            <div>
                <p>Phone</p>
                <p>+6281234567891</p>
            </div>
        </div>
    </div>
    <div class="kanan">
        <form action="" class="form" name="myFrom" onsubmit="return validateForm()" method="post">
            <div class="grup">
                <div>
                    <label for="name">Full name</label>
                    <input type="text" id="name" name="name" />
                </div>
                <div>
                    <label for="emailaddress">Email address</label>
                    <input type="email" id="emailaddress" name="emailaddress" />
                </div>
            </div>
            <div class="grup">
                <div>
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" />
                </div>
                <div>
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" />
                </div>
            </div>
            <div>
                <label for="massage">Massage</label>
                <textarea name="massage" id="massage" cols="30" rows="10"></textarea>
            </div>
            <div class="bawah">
                <button class="button" type="submit">Save massage</button>
                <div class="footer__socmed-list">
                    <a href="#" class="footer__socmed-link"><img src="./iqbil/img/facebook.png" alt="SportEase Facebook" class="footer__socmed-img" /></a>
                    <a href="#" class="footer__socmed-link"><img src="./iqbil/img/twitter.png" alt="SportEase Twitter" class="footer__socmed-img" /></a>
                    <a href="#" class="footer__socmed-link"><img src="./iqbil/img/instagram.png" alt="SportEase Instagram" class="footer__socmed-img" /></a>
                    <a href="#" class="footer__socmed-link"><img src="./iqbil/img/linkedin-in.png" alt="SportEase LinkedIn" class="footer__socmed-img" /></a>
                    <a href="#" class="footer__socmed-link"><img src="./iqbil/img/youtube.png" alt="SportEase Youtube" class="footer__socmed-img" /></a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end content -->

<?php require_once __DIR__ . '/partials/footer.php'; ?>