const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024 && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
        }
    });
}

const hoverElements = document.getElementsByClassName('hoverThis');

Array.from(hoverElements).forEach((hoverElement) => {
    const dropdown = hoverElement.nextElementSibling;

    hoverElement.addEventListener('mouseenter', () => {
        dropdown.classList.remove('hidden');
        dropdown.classList.add('block');
    });

    hoverElement.addEventListener('mouseleave', () => {
        setTimeout(() => {
            if (!dropdown.matches(':hover')) {
                dropdown.classList.add('hidden');
                dropdown.classList.remove('block');
            }
        }, 100);
    });

    dropdown.addEventListener('mouseenter', () => {
        dropdown.classList.remove('hidden');
        dropdown.classList.add('block');
    });

    dropdown.addEventListener('mouseleave', () => {
        dropdown.classList.add('hidden');
        dropdown.classList.remove('block');
    });
});

const profileMenuBtn = document.getElementById('profile-menu-btn');
const profileMenu = document.getElementById('profile-menu');
const profileMenuIcon = document.getElementById('profile-menu-icon');

if (profileMenuBtn && profileMenu) {
    profileMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isHidden = profileMenu.classList.contains('hidden');
        profileMenu.classList.toggle('hidden');
        
        if (profileMenuIcon) {
            if (isHidden) {
                profileMenuIcon.style.transform = 'rotate(180deg)';
            } else {
                profileMenuIcon.style.transform = 'rotate(0deg)';
            }
        }
    });

    document.addEventListener('click', (e) => {
        if (!profileMenuBtn.contains(e.target) && !profileMenu.contains(e.target)) {
            profileMenu.classList.add('hidden');
            if (profileMenuIcon) {
                profileMenuIcon.style.transform = 'rotate(0deg)';
            }
        }
    });
    
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !profileMenu.classList.contains('hidden')) {
            profileMenu.classList.add('hidden');
            if (profileMenuIcon) {
                profileMenuIcon.style.transform = 'rotate(0deg)';
            }
        }
    });
}
