<!-- Main Navigation Bar Component -->
<header id="main-navbar" class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-zinc-100 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group"
                title="Premium Designz - Jasa Desain Grafis Profesional">
                <img id="nav-brand-logo" src="{{ asset('assets/other/logo_warna.png') }}"
                    data-logo-light="{{ asset('assets/other/logo_warna.png') }}"
                    data-logo-dark="{{ asset('assets/other/logo_white.png') }}"
                    alt="Logo Premium Designz - Jasa Desain Grafis"
                    class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
            </a>

            <!-- Desktop Navigation Menu -->
            <nav id="nav-desktop-menu" class="hidden md:flex items-center space-x-1" aria-label="Navigasi Utama">
                <a href="{{ route('home') }}" data-nav="home"
                    class="nav-link px-3.5 py-2 text-sm font-semibold {{ request()->routeIs('home') ? 'is-active text-brand-600 font-bold' : 'text-zinc-600 hover:text-brand-600' }} transition-colors">
                    Home
                </a>
                <a href="{{ route('portofolio.index') }}" data-nav="portofolio"
                    class="nav-link px-3.5 py-2 text-sm font-semibold flex items-center space-x-1.5 {{ request()->routeIs('portofolio.*') || request()->routeIs('portfolio.*') ? 'is-active text-brand-600 font-bold' : 'text-zinc-600 hover:text-brand-600' }} transition-colors">
                    <span>Portofolio</span>
                </a>
                <a href="{{ route('marketplace.index') }}" data-nav="marketplace"
                    class="nav-link px-3.5 py-2 text-sm font-semibold flex items-center space-x-1.5 {{ request()->routeIs('marketplace.*') || request()->routeIs('products.*') ? 'is-active text-brand-600 font-bold' : 'text-zinc-600 hover:text-brand-600' }} transition-colors">
                    <span>Jasa Desain</span>
                </a>
                <a href="{{ route('about') }}" data-nav="about"
                    class="nav-link px-3.5 py-2 text-sm font-semibold {{ request()->routeIs('about') ? 'is-active text-brand-600 font-bold' : 'text-zinc-600 hover:text-brand-600' }} transition-colors">
                    Tentang Kami
                </a>
                <a href="{{ route('contact') }}" data-nav="contact"
                    class="nav-link px-3.5 py-2 text-sm font-semibold {{ request()->routeIs('contact') ? 'is-active text-brand-600 font-bold' : 'text-zinc-600 hover:text-brand-600' }} transition-colors">
                    Kontak
                </a>
            </nav>

            <!-- Action Button & Mobile Hamburger -->
            <div class="flex items-center space-x-2 sm:space-x-3">
                <!-- Modern Segmented Language Switcher (Desktop & Tablet) -->
                <div class="notranslate inline-flex items-center p-1 rounded-xl bg-zinc-100/90 border border-zinc-200/90 shadow-2xs" id="desktop-lang-switcher" aria-label="Pilih Bahasa">
                    <button type="button" onclick="window.changeSiteLanguage('id')" data-lang-pill="id"
                        class="lang-pill-btn px-2.5 py-1 rounded-lg text-xs font-bold transition-all duration-200 cursor-pointer select-none"
                        title="ID - Bahasa Indonesia">
                        <span>ID</span>
                    </button>
                    <button type="button" onclick="window.changeSiteLanguage('en')" data-lang-pill="en"
                        class="lang-pill-btn px-2.5 py-1 rounded-lg text-xs font-bold transition-all duration-200 cursor-pointer select-none"
                        title="EN - English">
                        <span>EN</span>
                    </button>
                </div>

                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="hidden md:inline-flex items-center px-3 py-1.5 rounded-lg bg-zinc-100 hover:bg-zinc-200 text-zinc-700 text-xs font-semibold">
                        Admin
                    </a>
                @endauth

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" type="button"
                    class="md:hidden p-2.5 rounded-xl text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 focus:outline-none transition-colors"
                    aria-label="Toggle navigation">
                    <iconify-icon id="mobile-menu-icon" icon="lucide:menu" class="text-2xl"></iconify-icon>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div id="mobile-menu"
        class="hidden md:hidden border-t border-zinc-100 bg-white px-4 pt-3 pb-6 space-y-2 shadow-lg transition-colors">
        <a href="{{ route('home') }}"
            class="mobile-nav-link block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('home') ? 'is-active bg-brand-50 text-brand-600' : 'text-zinc-700 hover:bg-zinc-50' }}">
            Home
        </a>
        <a href="{{ route('portofolio.index') }}"
            class="mobile-nav-link block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('portofolio.*') || request()->routeIs('portfolio.*') ? 'is-active bg-brand-50 text-brand-600 font-bold' : 'text-zinc-700 hover:bg-zinc-50' }}">
            Galeri Portofolio
        </a>
        <a href="{{ route('marketplace.index') }}"
            class="mobile-nav-link block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('marketplace.*') ? 'is-active bg-brand-50 text-brand-600' : 'text-zinc-700 hover:bg-zinc-50' }}">
            Marketplace Jasa Desain
        </a>
        <a href="{{ route('about') }}"
            class="mobile-nav-link block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('about') ? 'is-active bg-brand-50 text-brand-600' : 'text-zinc-700 hover:bg-zinc-50' }}">
            About Us
        </a>
        <a href="{{ route('contact') }}"
            class="mobile-nav-link block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('contact') ? 'is-active bg-brand-50 text-brand-600' : 'text-zinc-700 hover:bg-zinc-50' }}">
            Kontak
        </a>

        <!-- Mobile Language Selector -->
        <div class="pt-4 border-t border-zinc-100 notranslate">
            <div class="flex items-center justify-between px-1 mb-2">
                <span class="text-[11px] font-bold text-zinc-500 uppercase tracking-wider flex items-center space-x-1.5">
                    <iconify-icon icon="lucide:languages" class="text-base text-brand-600"></iconify-icon>
                    <span>Bahasa</span>
                </span>
                <span id="mobile-current-lang-tag" class="text-[10px] font-extrabold uppercase px-2.5 py-0.5 rounded-full bg-brand-50 text-brand-700 border border-brand-200/60">
                    ID
                </span>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <button type="button" onclick="window.changeSiteLanguage('id')" data-mobile-lang="id"
                    class="mobile-lang-btn flex items-center justify-center py-2 px-3 rounded-xl border text-xs font-bold transition-all duration-200 cursor-pointer shadow-xs">
                    <span>ID</span>
                </button>
                <button type="button" onclick="window.changeSiteLanguage('en')" data-mobile-lang="en"
                    class="mobile-lang-btn flex items-center justify-center py-2 px-3 rounded-xl border text-xs font-bold transition-all duration-200 cursor-pointer shadow-xs">
                    <span>EN</span>
                </button>
            </div>
        </div>
    </div>
</header>

<script>
    (function() {
        // Mobile menu toggle
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('mobile-menu-icon');
        const mainNavbar = document.getElementById('main-navbar');
        const brandLogo = document.getElementById('nav-brand-logo');

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

        // Adaptive White-Blur Over Dark Elements Engine
        function getUnderlyingDarkElementData() {
            if (!mainNavbar) return { isDark: false, depthRatio: 0 };

            const navRect = mainNavbar.getBoundingClientRect();
            const testY = navRect.top + (navRect.height / 2);
            const testX = window.innerWidth / 2;

            const elements = document.elementsFromPoint(testX, Math.max(10, testY));
            for (let el of elements) {
                if (!el || el === mainNavbar || mainNavbar.contains(el)) continue;

                // Cek elemen berlatar gelap
                const darkContainer = el.closest('.bg-zinc-900, .bg-zinc-950, .bg-black, [data-theme="dark"], .dark-hero, .bg-brand-gradient');
                if (darkContainer) {
                    const darkRect = darkContainer.getBoundingClientRect();
                    // Hitung ketebalan overlap elemen gelap di bawah navbar
                    const overlapHeight = Math.min(navRect.bottom, darkRect.bottom) - Math.max(navRect.top, darkRect.top);
                    const totalDarkHeight = Math.max(1, darkRect.height);
                    const scrolledIntoDark = Math.max(0, navRect.top - darkRect.top);
                    
                    // Rasio kedalaman/ketebalan (0.0 sampai 1.0)
                    const depthRatio = Math.min(1, Math.max(0.15, (overlapHeight / navRect.height) * 0.5 + (scrolledIntoDark / totalDarkHeight) * 0.5));
                    
                    return { isDark: true, depthRatio: depthRatio };
                }

                // Cek computed background color
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
                // WHITE FROSTY BLUR OVER DARK ELEMENT (OPASITAS MAKSIMAL 70%)
                const minWhiteAlpha = 0.35;
                const maxWhiteAlpha = 0.70; // Maksimal 70%
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
                // LIGHT DEFAULT THEME NAVBAR (OPASITAS MAKSIMAL 70%)
                const lightAlpha = isScrolled ? 0.70 : 0.45; // Maksimal 70% saat scroll
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
        window.addEventListener('load', updateNavbarAppearance);
        document.addEventListener('DOMContentLoaded', updateNavbarAppearance);
        updateNavbarAppearance();
    })();
</script>
