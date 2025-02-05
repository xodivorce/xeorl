function storeEmailAndContinue() {
    var email = document.getElementById('email').value;
    sessionStorage.setItem('userEmail', email);
    location.href = 'forgot_pass_step_two.php';
}

document.getElementById('userEmail').textContent = sessionStorage.getItem('userEmail') || 'supportxeorl@example.com';
