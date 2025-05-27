 document.addEventListener('DOMContentLoaded', () => {
        const userIcon = document.getElementById('user-icon');
        const userDrawer = document.getElementById('user-drawer');
        const closeDrawerBtn = document.getElementById('close-drawer');
        const drawerOverlay = document.getElementById('drawer-overlay');

        if (userIcon && userDrawer && closeDrawerBtn && drawerOverlay) {
            userIcon.addEventListener('click', () => {
                userDrawer.classList.add('open');
                drawerOverlay.classList.add('show');
            });

            closeDrawerBtn.addEventListener('click', () => {
                userDrawer.classList.remove('open');
                drawerOverlay.classList.remove('show');
            });

            drawerOverlay.addEventListener('click', () => {
                userDrawer.classList.remove('open');
                drawerOverlay.classList.remove('show');
            });
        }
    }
    );