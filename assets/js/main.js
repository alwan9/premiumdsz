/**
 * Premium Designz - Core Layout & UI Scripts
 * Pure Vanilla JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi AOS
    if (window.AOS) {
        AOS.init({
            duration: 700,
            once: true,
            offset: 60,
            easing: 'ease-out-cubic'
        });
    }

    // 2. Inisialisasi Skeleton Images
    initImageSkeletons();

    // 3. Setup Scroll to Top Floating Button
    initScrollToTop();

    // 4. Inisialisasi Mobile Menu Drawer
    initMobileMenu();

    // 5. Inisialisasi Adaptive Navbar
    initAdaptiveNavbar();

    // 6. Highlight Nav Aktif
    highlightActiveNavigation();

    // 7. Dynamic Glassmorphism Cursor Spotlight Engine
    initGlassSpotlightEngine();
});

window.addEventListener('load', function() {
    if (window.AOS) {
        AOS.refresh();
    }
    initImageSkeletons();
});

// Global Image Skeleton Loader Handler
function initImageSkeletons() {
    document.querySelectorAll('img').forEach(function(img) {
        const parent = img.closest('.skeleton-loader');
        
        if (img.complete && img.naturalHeight !== 0) {
            img.classList.add('img-loaded');
            if (parent) {
                parent.classList.add('skeleton-loaded');
            }
            return;
        }

        img.addEventListener('load', function() {
            img.classList.add('img-loaded');
            if (parent) {
                parent.classList.add('skeleton-loaded');
            }
        }, { once: true });

        img.addEventListener('error', function() {
            img.classList.add('img-loaded');
            if (parent) {
                parent.classList.add('skeleton-loaded');
            }
        }, { once: true });
    });
}

// Scroll to Top Floating Button Logic
function initScrollToTop() {
    const scrollBtn = document.getElementById('scrollToTopBtn');

    function toggleScrollBtn() {
        if (!scrollBtn) return;
        if (window.scrollY > 300) {
            scrollBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-6');
            scrollBtn.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0');
        } else {
            scrollBtn.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
            scrollBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-6');
        }
    }

    window.scrollToTop = function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    };

    window.addEventListener('scroll', toggleScrollBtn, { passive: true });
    toggleScrollBtn();
}

// Mobile Menu Drawer Handler
function initMobileMenu() {
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('mobile-menu-icon');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function() {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                if (menuIcon) menuIcon.setAttribute('icon', 'lucide:x');
            } else {
                mobileMenu.classList.add('hidden');
                if (menuIcon) menuIcon.setAttribute('icon', 'lucide:menu');
            }
        });
    }
}

// Adaptive Navbar Appearance Engine
function initAdaptiveNavbar() {
    const mainNavbar = document.getElementById('main-navbar');
    const brandLogo = document.getElementById('nav-brand-logo');
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    function getUnderlyingDarkElementData() {
        if (!mainNavbar) return { isDark: false, depthRatio: 0 };

        const navRect = mainNavbar.getBoundingClientRect();
        const testY = navRect.top + (navRect.height / 2);
        const testX = window.innerWidth / 2;

        const elements = document.elementsFromPoint(testX, Math.max(10, testY));
        for (let el of elements) {
            if (!el || el === mainNavbar || mainNavbar.contains(el)) continue;

            const darkContainer = el.closest('.bg-zinc-900, .bg-zinc-950, .bg-black, [data-theme="dark"], .dark-hero, .bg-brand-gradient');
            if (darkContainer) {
                const darkRect = darkContainer.getBoundingClientRect();
                const overlapHeight = Math.min(navRect.bottom, darkRect.bottom) - Math.max(navRect.top, darkRect.top);
                const totalDarkHeight = Math.max(1, darkRect.height);
                const scrolledIntoDark = Math.max(0, navRect.top - darkRect.top);
                
                const depthRatio = Math.min(1, Math.max(0.15, (overlapHeight / navRect.height) * 0.5 + (scrolledIntoDark / totalDarkHeight) * 0.5));
                return { isDark: true, depthRatio: depthRatio };
            }

            const style = window.getComputedStyle(el);
            const bg = style.backgroundColor;
            if (bg && bg !== 'transparent' && bg !== 'rgba(0, 0, 0, 0)') {
                const match = bg.match(/\d+/g);
                if (match && match.length >= 3) {
                    const [r, g, b] = match.map(Number);
                    const lum = 0.2126 * r + 0.7152 * g + 0.0722 * b;
                    if (lum < 110) {
                        return { isDark: true, depthRatio: 0.6 };
                    } else {
                        return { isDark: false, depthRatio: 0 };
                    }
                }
            }
        }
        return { isDark: false, depthRatio: 0 };
    }

    function updateNavbarAppearance() {
        if (!mainNavbar) return;

        const { isDark, depthRatio } = getUnderlyingDarkElementData();
        const isScrolled = window.scrollY > 15;
        const desktopLinks = document.querySelectorAll('#nav-desktop-menu .nav-link');
        const mobileLinks = document.querySelectorAll('#mobile-menu .mobile-nav-link');

        if (isDark) {
            const minWhiteAlpha = 0.35;
            const maxWhiteAlpha = 0.70;
            const dynamicWhiteAlpha = isScrolled 
                ? Math.min(0.70, minWhiteAlpha + (depthRatio * (maxWhiteAlpha - minWhiteAlpha)) + 0.10)
                : (minWhiteAlpha + (depthRatio * (maxWhiteAlpha - minWhiteAlpha)));
            
            const borderAlpha = Math.min(0.40, dynamicWhiteAlpha * 0.5);

            mainNavbar.style.backgroundColor = `rgba(255, 255, 255, ${dynamicWhiteAlpha.toFixed(3)})`;
            mainNavbar.style.backdropFilter = 'blur(20px) saturate(180%)';
            mainNavbar.style.webkitBackdropFilter = 'blur(20px) saturate(180%)';
            mainNavbar.style.borderColor = `rgba(228, 228, 231, ${borderAlpha.toFixed(3)})`;
            mainNavbar.style.boxShadow = isScrolled 
                ? '0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 10px -2px rgba(0, 0, 0, 0.05)' 
                : 'none';

            mainNavbar.className = "sticky top-0 z-50 transition-all duration-300 border-b text-zinc-900";

            if (brandLogo && brandLogo.getAttribute('data-logo-light')) {
                brandLogo.src = brandLogo.getAttribute('data-logo-light');
            }

            if (menuBtn) {
                menuBtn.className = "md:hidden p-2.5 rounded-xl text-zinc-800 hover:text-black hover:bg-zinc-100/60 focus:outline-none transition-colors";
            }

            if (mobileMenu) {
                mobileMenu.className = "hidden md:hidden border-t border-zinc-200/80 bg-white/95 text-zinc-900 px-4 pt-3 pb-6 space-y-2 shadow-2xl transition-colors backdrop-blur-xl";
            }

            desktopLinks.forEach(link => {
                if (link.classList.contains('is-active')) {
                    link.className = "nav-link is-active px-3.5 py-2 text-sm font-bold text-brand-600 transition-colors flex items-center space-x-1.5";
                } else {
                    link.className = "nav-link px-3.5 py-2 text-sm font-semibold text-zinc-800 hover:text-brand-600 hover:bg-zinc-100/60 rounded-xl transition-all flex items-center space-x-1.5";
                }
            });

            mobileLinks.forEach(link => {
                if (link.classList.contains('is-active')) {
                    link.className = "mobile-nav-link is-active block px-4 py-2.5 rounded-xl text-sm font-bold bg-brand-50 text-brand-600";
                } else {
                    link.className = "mobile-nav-link block px-4 py-2.5 rounded-xl text-sm font-semibold text-zinc-800 hover:bg-zinc-50";
                }
            });
        } else {
            const lightAlpha = isScrolled ? 0.70 : 0.45;
            mainNavbar.style.backgroundColor = `rgba(255, 255, 255, ${lightAlpha})`;
            mainNavbar.style.backdropFilter = 'blur(20px) saturate(180%)';
            mainNavbar.style.webkitBackdropFilter = 'blur(20px) saturate(180%)';
            mainNavbar.style.borderColor = isScrolled ? 'rgba(228, 228, 231, 0.6)' : 'rgba(244, 244, 245, 0.4)';
            mainNavbar.style.boxShadow = isScrolled 
                ? '0 10px 25px -5px rgba(0, 0, 0, 0.06), 0 4px 6px -2px rgba(0, 0, 0, 0.02)' 
                : 'none';

            mainNavbar.className = "sticky top-0 z-50 transition-all duration-300 border-b text-zinc-800";

            if (brandLogo && brandLogo.getAttribute('data-logo-light')) {
                brandLogo.src = brandLogo.getAttribute('data-logo-light');
            }

            if (menuBtn) {
                menuBtn.className = "md:hidden p-2.5 rounded-xl text-zinc-700 hover:text-zinc-950 hover:bg-zinc-100/60 focus:outline-none transition-colors";
            }

            if (mobileMenu) {
                mobileMenu.className = "hidden md:hidden border-t border-zinc-100 bg-white/95 px-4 pt-3 pb-6 space-y-2 shadow-lg transition-colors backdrop-blur-xl";
            }

            desktopLinks.forEach(link => {
                if (link.classList.contains('is-active')) {
                    link.className = "nav-link is-active px-3.5 py-2 text-sm font-bold text-brand-600 transition-colors flex items-center space-x-1.5";
                } else {
                    link.className = "nav-link px-3.5 py-2 text-sm font-semibold text-zinc-700 hover:text-brand-600 transition-colors flex items-center space-x-1.5";
                }
            });

            mobileLinks.forEach(link => {
                if (link.classList.contains('is-active')) {
                    link.className = "mobile-nav-link is-active block px-4 py-2.5 rounded-xl text-sm font-bold bg-brand-50 text-brand-600";
                } else {
                    link.className = "mobile-nav-link block px-4 py-2.5 rounded-xl text-sm font-semibold text-zinc-700 hover:bg-zinc-50";
                }
            });
        }
    }

    window.addEventListener('scroll', updateNavbarAppearance, { passive: true });
    window.addEventListener('resize', updateNavbarAppearance, { passive: true });
    updateNavbarAppearance();
}

function highlightActiveNavigation() {
    const currentPath = window.location.pathname.toLowerCase();
    const currentPage = currentPath.substring(currentPath.lastIndexOf('/') + 1) || 'index.html';

    let activeNavKey = 'home';
    if (currentPage.includes('portofolio') || currentPage.includes('portfolio')) {
        activeNavKey = 'portofolio';
    } else if (currentPage.includes('marketplace') || currentPage.includes('product')) {
        activeNavKey = 'marketplace';
    } else if (currentPage.includes('about') || currentPage.includes('contact')) {
        activeNavKey = 'about';
    }

    document.querySelectorAll(`[data-nav="${activeNavKey}"]`).forEach(el => {
        el.classList.add('is-active');
    });
}

// ==========================================================================
// 7. DYNAMIC GLASSMORHPISM CURSOR SPOTLIGHT ENGINE
// Tracks cursor coordinates per card for dynamic border & surface illumination
// ==========================================================================
function initGlassSpotlightEngine() {
    const cardSelector = '.glass-spotlight, .glass-card, [data-glass="true"], .product-card, .portfolio-card';
    
    document.addEventListener('pointermove', function(e) {
        const card = e.target.closest(cardSelector);
        if (!card) return;

        const rect = card.getBoundingClientRect();
        const x = Math.round(e.clientX - rect.left);
        const y = Math.round(e.clientY - rect.top);

        card.style.setProperty('--mouse-x', `${x}px`);
        card.style.setProperty('--mouse-y', `${y}px`);
    }, { passive: true });
}

