<?php
$title = 'Sign Up';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Location: ./login.php');
    exit;
    }
require_once __DIR__ . '/partials/navbar.php';
?>

<link rel="stylesheet" href="./elisa/css/register.css" />

<!-- content -->
<div class="container1 elisa" data-animated>
    <div class="register">
        <form onsubmit="return validateForm()" method="POST" action="register.php">
            <div class="top-form">
                <h1>Register Now</h1>
                <hr />
            </div>
            <div class="form-container">
                <div class="input-group">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" />
                </div>
                <div class="input-group">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" />
                </div>
            </div>
            <div class="form-container">
                <div class="input-group">
                    <label for="fname">Email</label>
                    <input type="text" id="email" name="email" />
                </div>
                <div class="input-group">
                    <label for="lname">No. HP</label>
                    <input type="text" id="nohp" name="nohp" />
                </div>
            </div>
            <div class="form-container">
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" />
                </div>
                <div class="input-group">
                    <label for="Cpasswordd">Confirm Password</label>
                    <input type="password" id="Cpasswordd" name="Cpasswordd" />
                </div>
            </div>
            <div class="hyperlink">
                Do you have an account? Please<a href="./login.php"> Login</a>
            </div>
                
            <div class="button-container1">
                <button type="submit">SIGN UP</button>
            </div>
        </form>
    </div>
    <div class="left">
        <img src="ikbar/img/gor.jpg" alt=""/>
    </div>
</div>

<!-- end content -->

<script>
   
    function validateForm() {
        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;
        var email = document.getElementById("email").value;
        var nohp = document.getElementById("nohp").value;
        var password = document.getElementById("password").value;
        var cpassword = document.getElementById("Cpasswordd").value;

        if (fname === "" || lname === "" || email === "" || nohp === "" || password === "" || cpassword === "") {
            alert("Please fill in all fields.");
            return false;
        }

        alert("Data berhasil disimpan.");
        return true;
    }
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
