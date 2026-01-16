const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");
const icon = document.getElementById("toggleIcon");

function toggleSidebar() {
    if (window.innerWidth <= 768) {
        sidebar.classList.toggle("show");
        overlay.classList.toggle("show");
    } else {
        sidebar.classList.toggle("collapsed");
        icon.classList.toggle("bi-chevron-left");
        icon.classList.toggle("bi-chevron-right");
    }
}

function closeSidebar() {
    sidebar.classList.remove("show");
    overlay.classList.remove("show");
}
