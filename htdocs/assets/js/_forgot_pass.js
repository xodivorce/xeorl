const passwordField = document.getElementById('password-field');
const togglePassword = document.getElementById('toggle-password');

togglePassword.addEventListener('click', function () {
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.src = type === 'password' ? 'assets/images/eye.svg' : 'assets/images/eye-off.svg';
});

function togglePasswordVisibility() {
    const confirmPasswordInput = document.getElementById('confirmPassword');
    confirmPasswordInput.type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
}

function resetPassword() {
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const validationMessage = document.getElementById('validation-message');

    if (newPassword.length < 8) {
        showMessage('Password must be at least 8 characters long.', '#FF0000');
        return;
    }

    if (newPassword !== confirmPassword) {
        showMessage('Passwords do not match. Please try again.', '#FF0000');
        return;
    }

    location.href = 'password_reset_success.php';
}

function showMessage(message, color) {
    const validationMessage = document.getElementById('validation-message');
    validationMessage.textContent = message;
    validationMessage.style.color = color;
    validationMessage.style.display = 'block';

    setTimeout(function() {
        validationMessage.style.display = 'none';
    }, 5000);
}
