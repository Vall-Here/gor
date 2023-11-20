function validateForm() {
  var emailInput = document.getElementById('email');
  var email = emailInput.value;
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email)) {
      alert('Please enter a valid email address.');
      return false;
  }

  if (!email.endsWith('.com')) {
      alert('Please enter a valid email address ending with ".com".');
      return false;
  }
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm_password").value;
  if (password == "") {
    alert("Silakan masukkan password!");
    return false;
  } else if (password.length < 8) {
    alert("Password harus memiliki setidaknya 8 karakter!");
    return false;
  } else if (password != confirmPassword) {
    alert("Password dan konfirmasi password tidak cocok!");
    return false;
  }

    return true;
  }
