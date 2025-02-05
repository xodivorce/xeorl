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
        button.disabled = false;
        button.classList.add("active");
        button.style.cursor = "pointer";
        setTimeout(() => {
            button.textContent = "Getting links...";
        }, 300);
        setTimeout(() => {
            button.textContent = "Get link";
        }, 600);
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
    init();
});

init();

function redirect() {
    window.location.href = redirectUrl;
}
