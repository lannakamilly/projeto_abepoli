const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", (e) => {
  navLinks.classList.toggle("open");

  const isOpen = navLinks.classList.contains("open");
  menuBtnIcon.setAttribute(
    "class",
    isOpen ? "ri-close-line" : "ri-menu-3-line"
  );
});

navLinks.addEventListener("click", (e) => {
  navLinks.classList.remove("open");
  menuBtnIcon.setAttribute("class", "ri-menu-3-line");
});
 
document.addEventListener('DOMContentLoaded', function () {
    const userDrawer = document.getElementById('user-drawer');
    const drawerOverlay = document.getElementById('drawer-overlay');
    const btnClose = document.getElementById('close-drawer');

    function abrirDrawer() {
        userDrawer.classList.add('open');
        drawerOverlay.classList.add('active');
    }

    function fecharDrawer() {
        userDrawer.classList.remove('open');
        drawerOverlay.classList.remove('active');
    }

    const userIconDesktop = document.getElementById('user-icon-desktop');
    const userIconMobile = document.getElementById('user-icon-mobile');

    if (userIconDesktop) {
        userIconDesktop.addEventListener('click', abrirDrawer);
    }
    if (userIconMobile) {
        userIconMobile.addEventListener('click', abrirDrawer);
    }

    btnClose.addEventListener('click', fecharDrawer);
    drawerOverlay.addEventListener('click', fecharDrawer);
});
