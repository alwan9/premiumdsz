<!-- Main Navigation Bar Component -->
<header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-zinc-100 transition-all shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group"
                title="Premium Designz - Jasa Desain Grafis Profesional">
                <img src="{{ asset('assets/other/logo_warna.png') }}"
                    alt="Logo Premium Designz - Jasa Desain Grafis"
                    class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
            </a>

            <!-- Desktop Navigation Menu -->
            <nav class="hidden md:flex items-center space-x-1" aria-label="Navigasi Utama">
                <a href="{{ route('home') }}"
                    class="px-3.5 py-2 text-sm font-semibold {{ request()->routeIs('home') ? 'text-brand-600 font-bold' : 'text-zinc-600 hover:text-brand-600' }} transition-colors">
                    Home
                </a>
                <a href="{{ route('portofolio.index') }}"
                    class="px-3.5 py-2 text-sm font-semibold flex items-center space-x-1.5 {{ request()->routeIs('portofolio.*') || request()->routeIs('portfolio.*') ? 'text-brand-600 font-bold' : 'text-zinc-600 hover:text-brand-600' }} transition-colors">
                    <span>Portofolio</span>
                </a>
                <a href="{{ route('marketplace.index') }}"
                    class="px-3.5 py-2 text-sm font-semibold flex items-center space-x-1.5 {{ request()->routeIs('marketplace.*') || request()->routeIs('products.*') ? 'text-brand-600 font-bold' : 'text-zinc-600 hover:text-brand-600' }} transition-colors">
                    <span>Jasa Desain</span>
                </a>
                <a href="{{ route('about') }}"
                    class="px-3.5 py-2 text-sm font-semibold {{ request()->routeIs('about') ? 'text-brand-600 font-bold' : 'text-zinc-600 hover:text-brand-600' }} transition-colors">
                    Tentang Kami
                </a>
                <a href="{{ route('contact') }}"
                    class="px-3.5 py-2 text-sm font-semibold {{ request()->routeIs('contact') ? 'text-brand-600 font-bold' : 'text-zinc-600 hover:text-brand-600' }} transition-colors">
                    Kontak &amp; Order
                </a>
            </nav>

            <!-- Action Button & Mobile Hamburger -->
            <div class="flex items-center space-x-3">
                <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin konsultasi kebutuhan desain.') }}"
                    target="_blank"
                    class="hidden sm:inline-flex items-center space-x-2 px-5 py-2.5 rounded-xl bg-brand-gradient hover:brightness-110 text-white text-xs font-bold uppercase tracking-wider shadow-md shadow-brand-700/20 transition-all">
                    <iconify-icon icon="simple-icons:whatsapp" class="text-sm"></iconify-icon>
                    <span>Pesan Sekarang</span>
                </a>

                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="hidden md:inline-flex items-center px-3 py-1.5 rounded-lg bg-zinc-100 hover:bg-zinc-200 text-zinc-700 text-xs font-semibold">
                        Admin
                    </a>
                @endauth

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" type="button"
                    class="md:hidden p-2.5 rounded-xl text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 focus:outline-none"
                    aria-label="Toggle navigation">
                    <iconify-icon id="mobile-menu-icon" icon="lucide:menu" class="text-2xl"></iconify-icon>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div id="mobile-menu"
        class="hidden md:hidden border-t border-zinc-100 bg-white px-4 pt-3 pb-6 space-y-2 shadow-lg">
        <a href="{{ route('home') }}"
            class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('home') ? 'bg-brand-50 text-brand-600' : 'text-zinc-700 hover:bg-zinc-50' }}">
            Home
        </a>
        <a href="{{ route('portofolio.index') }}"
            class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('portofolio.*') || request()->routeIs('portfolio.*') ? 'bg-brand-50 text-brand-600 font-bold' : 'text-zinc-700 hover:bg-zinc-50' }}">
            Galeri Portofolio
        </a>
        <a href="{{ route('marketplace.index') }}"
            class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('marketplace.*') ? 'bg-brand-50 text-brand-600' : 'text-zinc-700 hover:bg-zinc-50' }}">
            Marketplace Jasa Desain
        </a>
        <a href="{{ route('about') }}"
            class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('about') ? 'bg-brand-50 text-brand-600' : 'text-zinc-700 hover:bg-zinc-50' }}">
            About Us
        </a>
        <a href="{{ route('contact') }}"
            class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('contact') ? 'bg-brand-50 text-brand-600' : 'text-zinc-700 hover:bg-zinc-50' }}">
            Contact &amp; Konsultasi
        </a>

        <div class="pt-3 border-t border-zinc-100 space-y-2">
            <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin memesan desain.') }}"
                target="_blank"
                class="w-full flex items-center justify-center space-x-2 py-3 rounded-xl bg-brand-gradient hover:brightness-110 text-white text-xs font-bold uppercase tracking-wider shadow-md">
                <iconify-icon icon="simple-icons:whatsapp" class="text-sm"></iconify-icon>
                <span>Chat WhatsApp</span>
            </a>
        </div>
    </div>
</header>

<script>
    (function() {
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
    })();
</script>
