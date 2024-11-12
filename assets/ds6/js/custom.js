document.addEventListener("DOMContentLoaded", function() {
    const menuItems = document.querySelectorAll(".head-more-menu");
    menuItems.forEach(item => {
        const submenu = item.querySelector(".head-more");
        item.addEventListener("mouseenter", () => {
            submenu.style.display = "block";
        });
        item.addEventListener("mouseleave", () => {
            submenu.style.display = "none";
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.querySelector(".gen-left-list-mobile");
    const menu = document.querySelector(".drawer-list");
    const overlay = document.querySelector(".drawer-list-bg");
    menuButton.addEventListener("click", function() {
        menu.style.display = "block";
        overlay.style.display = "block";
    });
    overlay.addEventListener("click", function() {
        menu.style.display = "none";
        overlay.style.display = "none";
    });
});
