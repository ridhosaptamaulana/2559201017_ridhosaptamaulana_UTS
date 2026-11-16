// Menu navigasi sederhana untuk tampilan layar kecil.
const menuButton = document.querySelector(".menu-toggle");
const mainNavigation = document.querySelector(".main-nav");

if (menuButton && mainNavigation) {
    menuButton.addEventListener("click", function () {
        mainNavigation.classList.toggle("show-menu");
        const isOpen = mainNavigation.classList.contains("show-menu");
        menuButton.setAttribute("aria-expanded", String(isOpen));
        menuButton.setAttribute("aria-label", isOpen ? "Tutup navigasi" : "Buka navigasi");
    });
}
