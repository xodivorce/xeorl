document.querySelector("form").addEventListener("submit", function(event) {
    const inputs = document.querySelectorAll(".input-field");
    let valid = true;

    inputs.forEach(input => {
        if (input.value === "") {
            valid = false;
            input.style.borderColor = "red";
        } else {
            input.style.borderColor = "#555";
        }
    });

    if (!valid) {
        event.preventDefault();
        alert("Please fill all the fields.");
    }
});

document.getElementById('toggle-password').addEventListener('click', function() {
    const passwordField = document.getElementById('password-field');
    const passwordType = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', passwordType);
    this.src = passwordType === 'password' ? 'assets/images/eye.svg' : 'assets/images/eye-off.svg';
});

function toggleSubmitButton() {
    const checkbox = document.getElementById("agree");
    const submitBtn = document.getElementById("submit-btn");
    const errorMessage = document.getElementById("error-message");

    if (checkbox.checked) {
        submitBtn.disabled = false;
        errorMessage.style.display = "none";
    } else {
        submitBtn.disabled = true;
    }
}

document.addEventListener("DOMContentLoaded", toggleSubmitButton);
