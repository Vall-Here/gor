function validateEmail() {
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

    return true;
}
