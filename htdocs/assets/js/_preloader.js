window.addEventListener("load", function() {
    setTimeout(() => {
        document.querySelector(".preloader").classList.add("hidden");
        document.documentElement.style.overflow = "auto";
        document.body.style.overflow = "auto";
    }, 3500);
});
