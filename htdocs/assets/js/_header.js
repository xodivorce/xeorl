document.addEventListener("DOMContentLoaded", function () {
    const burgerToggle = document.getElementById("burger-toggle");
    const sidebar = document.querySelector(".sidebar");

    // Ensure sidebar is hidden initially
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
    const header = document.querySelector('.header'); // Get the header element
  
    // Check if the page has been scrolled
    if (window.scrollY > 0) {
        header.classList.add('scrolled'); // Add the "scrolled" class
    } else {
        header.classList.remove('scrolled'); // Remove the "scrolled" class
    }
});
