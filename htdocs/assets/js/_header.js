document.addEventListener("DOMContentLoaded", function () {
    const burgerToggle = document.getElementById("burger-toggle");
    const sidebar = document.querySelector(".sidebar");

    sidebar.style.display = "none";

    burgerToggle.addEventListener("click", function () {
        if (sidebar.style.display === "none" || sidebar.style.display === "") {
            sidebar.style.display = "flex";
            sidebar.classList.add("active");
        } else {
            sidebar.style.display = "none";
            sidebar.classList.remove("active");
        }
    });
});

window.addEventListener('scroll', function () {
    const header = document.querySelector('.header');
  
    if (window.scrollY > 0) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});
