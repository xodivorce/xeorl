<?php
if (isset($_POST['acceptCookies'])) {
    setcookie("user_cookies", "accepted", time() + (86400 * 30), "/");
    exit;
} elseif (isset($_POST['rejectCookies'])) {
    setcookie("user_cookies", "rejected", time() + (86400 * 30), "/");
    exit;
}
?>
<link rel="stylesheet" href="_cookies.css">
<div id="cookieBanner">
    <p>By clicking "Accept All Cookies", you agree to the storing of cookies on your device to enhance site navigation, analyze site usage, and assist in our marketing efforts.</p>
    <button class="cookie-settings">Cookies Settings</button>
    <button class="reject" onclick="setCookieChoice('reject')">Reject All</button>
    <button class="accept" onclick="setCookieChoice('accept')">Accept All Cookies</button>
    <span class="close" onclick="hideBanner()">×</span>
</div>

<script>
function setCookieChoice(choice) {
    fetch("_cookies.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: choice === "accept" ? "acceptCookies=true" : "rejectCookies=true"
    }).then(() => {
        document.getElementById("cookieBanner").style.display = "none";
    });
}

function hideBanner() {
    document.getElementById("cookieBanner").style.display = "none";
}

window.onload = function() {
    if (!document.cookie.includes("user_cookies")) {
        document.getElementById("cookieBanner").style.display = "flex";
    }
};
</script>
