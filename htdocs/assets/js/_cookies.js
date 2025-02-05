function acceptCookies() {
    document.cookie = "user_cookies=accepted; path=/; max-age=" + 60*60*24*30;
    document.getElementById("cookieBanner").style.display = "none";
}

window.onload = function() {
    if (document.cookie.indexOf("user_cookies") === -1) {
        document.getElementById("cookieBanner").style.display = "flex";
    } else {
        document.getElementById("cookieBanner").style.display = "none";
    }
};
