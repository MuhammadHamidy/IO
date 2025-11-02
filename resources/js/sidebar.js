document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebar = document.getElementById('admin-sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const closeSidebar = document.getElementById('close-sidebar');

    function openSidebar() {
        if (!sidebar || !sidebarOverlay) return;
        sidebar.classList.remove('-translate-x-full');
        sidebarOverlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebarFunc() {
        if (!sidebar || !sidebarOverlay) return;
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
        document.body.style.overflow = '';
    }

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            if (sidebar.classList.contains('-translate-x-full')) {
                openSidebar();
            } else {
                closeSidebarFunc();
            }
        });
    }

    if (closeSidebar) {
        closeSidebar.addEventListener('click', closeSidebarFunc);
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebarFunc);
    }

    document.addEventListener('keydown', function(event) {
        if (sidebar && event.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
            closeSidebarFunc();
        }
    });

    window.addEventListener('resize', function() {
        if (sidebar && window.innerWidth < 768 && !sidebar.classList.contains('-translate-x-full')) {
            closeSidebarFunc();
        }
    });
});
