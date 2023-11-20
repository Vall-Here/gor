  
function changePassword(event) {
    event.preventDefault(); // Mencegah form submit

    // Mendapatkan nilai dari input password
    var currentPassword = document.querySelector('input[name="cur-pass"]').value;
    var newPassword = document.querySelector('input[name="password"]').value;
    var confirmPassword = document.querySelector('input[name="con-pass"]').value;

    // Lakukan validasi jika diperlukan
    if (newPassword !== confirmPassword) {
        alert("New password and confirm password do not match!");
        return;
    }

    // Lakukan proses perubahan password
    // ...

    // Reset nilai input password
    document.querySelector('input[name="cur-pass"]').value = '';
    document.querySelector('input[name="password"]').value = '';
    document.querySelector('input[name="con-pass"]').value = '';

    // Tampilkan notifikasi atau lakukan tindakan lainnya
    alert("Password has been changed successfully!");
}

document.querySelector('form').addEventListener('submit', changePassword);
