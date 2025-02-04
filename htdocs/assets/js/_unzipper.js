// Countdown logic
let countdown = 10;
let countdownInterval;
const timerElement = document.getElementById("timer");
const button = document.getElementById("getLinkBtn");

function updateCountdown() {
    if (countdown > 0) {
        countdown--;
        timerElement.textContent = countdown;
    }
    if (countdown <= 0) {
        button.disabled = false; // Enable the button when countdown ends
        button.classList.add("active"); // Optional, if you use active class for style
        button.style.cursor = "pointer"; // Enable cursor
        setTimeout(function () {
            button.textContent = "Getting links..."; // Change text before enabling
        }, 300); // 0.3 seconds delay
        setTimeout(function () {
            button.textContent = "Get link"; // Final button text
        }, 600); // After another 0.3 seconds
        clearInterval(countdownInterval);
    }
}

function startCountdown() {
    countdownInterval = setInterval(updateCountdown, 1000);
}

function stopCountdown() {
    clearInterval(countdownInterval);
}

function init() {
    // Initialize countdown value and button state
    countdown = 10;
    timerElement.textContent = countdown;
    button.disabled = true;
    button.classList.remove("active");
    button.style.cursor = "not-allowed";
    button.textContent = "PLEASE WAIT...";

    startCountdown();
}

document.addEventListener("visibilitychange", () => {
    if (document.hidden) {
        stopCountdown();
    } else {
        startCountdown();
    }
});

window.addEventListener("beforeunload", () => {
    init(); // Reset state when the page is about to be unloaded
});

init(); // Call init to initialize the countdown when the page loads

function redirect() {
    window.location.href = redirectUrl; // Redirect to the full URL
}
