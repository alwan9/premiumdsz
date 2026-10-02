<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Jasa Desain Grafis Profesional & Marketplace Desain - Premium Designz')</title>
    <meta name="description" content="@yield('meta_description', 'Jasa desain grafis profesional & custom original: desain logo brand, kemasan box, standing pouch snack, banner wisuda & UMKM, UI/UX website app, CV lamaran kerja, PPT presentasi, dan jersey custom. Pengerjaan cepat & file master lengkap.')">
    <meta name="keywords" content="@yield('meta_keywords', 'jasa desain grafis, jasa desain logo, jasa desain kemasan, jasa desain banner, jasa desain banner wisuda, jasa desain banner umkm, jasa desain ui ux, jasa desain cv, jasa desain ppt, jasa redesain ai, jasa desain jersey, jasa editing foto produk, jasa desain label produk, premium design, premium designz')">
    <meta name="author" content="Premium Designz">
    <meta name="publisher" content="Premium Designz Creative Studio">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook / WhatsApp SEO -->
    <meta property="og:site_name" content="Premium Designz - Jasa Desain Grafis Profesional">
    <meta property="og:title" content="@yield('title', 'Jasa Desain Grafis Profesional & Marketplace Desain - Premium Designz')">
    <meta property="og:description" content="@yield('meta_description', 'Penyedia jasa desain grafis profesional: logo branding, standing pouch kemasan box, banner UMKM & wisuda, UI/UX website, template PPT, CV, dan jersey custom.')">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('assets/other/logo_warna.png'))">
    <meta property="og:image:alt" content="Premium Designz Jasa Desain Grafis">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card SEO -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Jasa Desain Grafis Profesional - Premium Designz')">
    <meta name="twitter:description" content="@yield('meta_description', 'Penyedia jasa desain grafis custom original: logo, kemasan, banner, UI/UX, PPT, CV, dan apparel jersey.')">
    <meta name="twitter:image" content="@yield('og_image', asset('assets/other/logo_warna.png'))">

    <!-- Geo & Language Meta Tags -->
    <meta name="geo.region" content="ID">
    <meta name="geo.placename" content="Indonesia">
    <meta name="language" content="Indonesian">

    <!-- JSON-LD Structured Data for Google Rich Snippets / Top Search Ranking -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "ProfessionalService",
        "name": "Premium Designz - Jasa Desain Grafis Profesional",
        "alternateName": ["Premium Design", "Premium Designz Studio", "Jasa Desain Grafis Premium"],
        "url": "{{ url('/') }}",
        "logo": "{{ asset('assets/other/logo_warna.png') }}",
        "image": "{{ asset('assets/other/logo_warna.png') }}",
        "description": "Studio penyedia jasa desain grafis profesional dan marketplace karya visual: desain logo brand, kemasan boks & pouch snack, banner promosi UMKM & wisuda, UI/UX aplikasi & website, slide presentasi PPT, CV lamaran, stiker label, dan jersey custom.",
        "telephone": "+6285168174679",
        "priceRange": "Rp 10.000 - Rp 500.000",
        "address": {
            "@@type": "PostalAddress",
            "addressCountry": "ID"
        },
        "areaServed": "ID",
        "sameAs": [
            "https://www.instagram.com/premiumdsz/",
            "https://shopee.co.id/premium_dz",
            "https://www.tiktok.com/@premium.designz",
            "https://www.fiverr.com/premiumdz",
            "https://lynk.id/premiumdsz"
        ],
        "aggregateRating": {
            "@@type": "AggregateRating",
            "ratingValue": "5.0",
            "bestRating": "5.0",
            "ratingCount": "120"
        },
        "hasOfferCatalog": {
            "@@type": "OfferCatalog",
            "name": "Katalog Layanan Jasa Desain Grafis",
            "itemListElement": [
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Jasa Desain Logo & Brand Identity" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Jasa Desain Kemasan Box & Standing Pouch" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Jasa Desain Banner Wisuda & Banner UMKM" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Jasa Desain UI/UX Mobile App & Website Figma" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Jasa Desain CV Lamaran & Portfolio" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Jasa Desain Presentasi PowerPoint PPT" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Jasa Redesain Gambar AI & Editing Foto Studio" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Jasa Desain Jersey Custom & Apparel" } }
            ]
        }
    }
    </script>
    @stack('schema')

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/other/logo_warna.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Iconify Icon Web Component -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        heading: ['"Outfit"', 'sans-serif'],
                    },
                    backgroundImage: {
                        'brand-gradient': 'linear-gradient(168deg, rgba(29, 49, 161, 1) 0%, rgba(45, 108, 235, 1) 55%, rgba(6, 30, 125, 1) 100%)',
                    },
                    colors: {
                        brand: {
                            50: '#eef4ff',
                            100: '#dbe7fe',
                            200: '#bfd3fd',
                            300: '#93b5fb',
                            400: '#6090f7',
                            500: '#2d6ceb',
                            600: '#2d6ceb', // Warna aksen terang gradasi (rgba(45, 108, 235, 1))
                            700: '#1d31a1', // Warna dasar atas gradasi (rgba(29, 49, 161, 1))
                            800: '#13247f',
                            900: '#061e7d', // Warna dasar bawah gradasi (rgba(6, 30, 125, 1))
                            950: '#041352',
                        },
                        indigo: {
                            600: '#2d6ceb',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        .font-heading {
            font-family: 'Outfit', sans-serif;
        }

        iconify-icon {
            display: inline-block;
            vertical-align: middle;
        }

        .bg-brand-gradient {
            background: #1d31a1;
            background: linear-gradient(168deg, rgba(29, 49, 161, 1) 0%, rgba(45, 108, 235, 1) 55%, rgba(6, 30, 125, 1) 100%);
        }

        .hero-grid-pattern {
            background-color: #E5E5F7;
            opacity: 0.3;
            background-image: linear-gradient(#444CF7 2.5px, transparent 2.5px), linear-gradient(90deg, #444CF7 2.5px, transparent 2.5px), linear-gradient(#444CF7 1.25px, transparent 1.25px), linear-gradient(90deg, #444CF7 1.25px, #E5E5F7 1.25px);
            background-size: 125px 125px, 125px 125px, 25px 25px, 25px 25px;
            background-position: -2.5px -2.5px, -2.5px -2.5px, -1.25px -1.25px, -1.25px -1.25px;
            mask-image: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 75%);
            -webkit-mask-image: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 75%);
            mask-size: 100% 100%;
            -webkit-mask-size: 100% 100%;
            mask-repeat: no-repeat;
            -webkit-mask-repeat: no-repeat;
        }

        /* Global Image & Asset Protection */
        img, picture, svg, .protected-asset, [data-protected="image"] {
            -webkit-user-drag: none !important;
            -khtml-user-drag: none !important;
            -moz-user-drag: none !important;
            -o-user-drag: none !important;
            user-drag: none !important;
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            user-select: none !important;
            -webkit-touch-callout: none !important;
        }
    </style>
    <!-- AOS (Animate On Scroll) CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body
    class="bg-white text-slate-800 antialiased min-h-screen flex flex-col selection:bg-brand-600 selection:text-white">

    <!-- Top Info Bar -->
    <div class="bg-brand-gradient text-white text-xs py-2 px-4 border-b border-brand-700/40">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <span class="flex items-center text-white font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2 animate-pulse"></span>
                    Jasa Desain Grafis & Marketplace Resmi
                </span>
                <span class="hidden sm:inline text-white/40">|</span>
                <span class="hidden sm:inline text-brand-100">Pengerjaan Tepat Waktu & File Master Lengkap Siap
                    Cetak</span>
            </div>
            <div class="flex items-center space-x-4 text-brand-100">
                <a href="https://www.instagram.com/premiumdsz/" target="_blank"
                    class="hover:text-pink-300 transition-colors flex items-center space-x-1"
                    title="Instagram @premiumdsz">
                    <iconify-icon icon="simple-icons:instagram" class="text-xs"></iconify-icon>
                    <span class="hidden md:inline">@premiumdsz</span>
                </a>
                <a href="https://www.tiktok.com/@premium.designz" target="_blank"
                    class="hover:text-cyan-300 transition-colors flex items-center space-x-1"
                    title="TikTok @premium.designz">
                    <iconify-icon icon="simple-icons:tiktok" class="text-xs"></iconify-icon>
                    <span class="hidden md:inline">TikTok</span>
                </a>
                <a href="https://shopee.co.id/premium_dz" target="_blank"
                    class="hover:text-amber-300 transition-colors flex items-center space-x-1"
                    title="Shopee Official Store">
                    <iconify-icon icon="simple-icons:shopee" class="text-xs"></iconify-icon>
                    <span class="hidden md:inline">Shopee</span>
                </a>
                <a href="https://www.fiverr.com/premiumdz" target="_blank"
                    class="hover:text-emerald-300 transition-colors flex items-center space-x-1"
                    title="Fiverr Global Orders">
                    <iconify-icon icon="simple-icons:fiverr" class="text-sm"></iconify-icon>
                    <span class="hidden md:inline">Fiverr</span>
                </a>
                <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin konsultasi proyek desain.') }}"
                    target="_blank"
                    class="hover:text-white transition-colors flex items-center space-x-1 font-semibold text-brand-100">
                    <iconify-icon icon="simple-icons:whatsapp" class="text-sm"></iconify-icon>
                    <span class="hidden sm:inline">WhatsApp: 0851-6817-4679</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-100 transition-all shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo & SEO Keyword Header -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group"
                    title="Premium Designz - Jasa Desain Grafis Profesional">
                    <img src="{{ asset('assets/other/logo_warna.png') }}"
                        alt="Logo Premium Designz - Jasa Desain Grafis"
                        class="h-10 sm:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105">

                </a>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden md:flex items-center space-x-1" aria-label="Navigasi Utama">
                    <a href="{{ route('home') }}"
                        class="px-3.5 py-2 text-sm font-semibold {{ request()->routeIs('home') ? 'text-brand-600 font-bold' : 'text-slate-600 hover:text-brand-600' }} transition-colors">
                        Home
                    </a>
                    <a href="{{ route('portofolio.index') }}"
                        class="px-3.5 py-2 text-sm font-semibold flex items-center space-x-1.5 {{ request()->routeIs('portofolio.*') || request()->routeIs('portfolio.*') ? 'text-brand-600 font-bold' : 'text-slate-600 hover:text-brand-600' }} transition-colors">
                        <span>Portofolio</span>

                    </a>
                    <a href="{{ route('marketplace.index') }}"
                        class="px-3.5 py-2 text-sm font-semibold flex items-center space-x-1.5 {{ request()->routeIs('marketplace.*') || request()->routeIs('products.*') ? 'text-brand-600 font-bold' : 'text-slate-600 hover:text-brand-600' }} transition-colors">
                        <span>Jasa Desain</span>

                    </a>
                    <a href="{{ route('about') }}"
                        class="px-3.5 py-2 text-sm font-semibold {{ request()->routeIs('about') ? 'text-brand-600 font-bold' : 'text-slate-600 hover:text-brand-600' }} transition-colors">
                        Tentang Kami
                    </a>
                    <a href="{{ route('contact') }}"
                        class="px-3.5 py-2 text-sm font-semibold {{ request()->routeIs('contact') ? 'text-brand-600 font-bold' : 'text-slate-600 hover:text-brand-600' }} transition-colors">
                        Kontak & Order
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
                            class="hidden md:inline-flex items-center px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold">
                            Admin
                        </a>
                    @endauth

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" type="button"
                        class="md:hidden p-2.5 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none"
                        aria-label="Toggle navigation">
                        <iconify-icon id="mobile-menu-icon" icon="lucide:menu" class="text-2xl"></iconify-icon>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-menu"
            class="hidden md:hidden border-t border-slate-100 bg-white px-4 pt-3 pb-6 space-y-2 shadow-lg">
            <a href="{{ route('home') }}"
                class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('home') ? 'bg-brand-50 text-brand-600' : 'text-slate-700 hover:bg-slate-50' }}">
                Home
            </a>
            <a href="{{ route('portofolio.index') }}"
                class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('portofolio.*') || request()->routeIs('portfolio.*') ? 'bg-brand-50 text-brand-600 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                Galeri Portofolio
            </a>
            <a href="{{ route('marketplace.index') }}"
                class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('marketplace.*') ? 'bg-brand-50 text-brand-600' : 'text-slate-700 hover:bg-slate-50' }}">
                Marketplace Jasa Desain
            </a>
            <a href="{{ route('about') }}"
                class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('about') ? 'bg-brand-50 text-brand-600' : 'text-slate-700 hover:bg-slate-50' }}">
                About Us
            </a>
            <a href="{{ route('contact') }}"
                class="block px-4 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('contact') ? 'bg-brand-50 text-brand-600' : 'text-slate-700 hover:bg-slate-50' }}">
                Contact & Konsultasi
            </a>

            <div class="pt-3 border-t border-slate-100 space-y-2">
                <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin memesan desain.') }}"
                    target="_blank"
                    class="w-full flex items-center justify-center space-x-2 py-3 rounded-xl bg-brand-gradient hover:brightness-110 text-white text-xs font-bold uppercase tracking-wider shadow-md">
                    <iconify-icon icon="simple-icons:whatsapp" class="text-sm"></iconify-icon>
                    <span>Chat WhatsApp</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Global Footer -->
    <footer class="bg-slate-950 text-slate-300 pt-16 pb-12 border-t border-slate-800 mt-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up"
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">
                <!-- Brand Info -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('assets/other/logo_white.png') }}" alt="Logo Premium Design"
                            class="h-9 sm:h-10 w-auto object-contain">

                    </div>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed pr-6">
                        Studio desain grafis dan marketplace penyedia layanan visual profesional. Tersedia pemesanan
                        langsung melalui WhatsApp, Shopee Official, Fiverr Pro, dan katalog Lynk.id.
                    </p>
                    <div class="flex items-center space-x-2 pt-2 flex-wrap gap-y-2">
                        <a href="https://www.instagram.com/premiumdsz/" target="_blank"
                            class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 hover:border-pink-500 hover:text-pink-400 text-slate-400 flex items-center justify-center text-xs transition-colors"
                            title="Instagram @premiumdsz">
                            <iconify-icon icon="simple-icons:instagram" class="text-sm"></iconify-icon>
                        </a>
                        <a href="https://www.tiktok.com/@premium.designz" target="_blank"
                            class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 hover:border-cyan-400 hover:text-cyan-400 text-slate-400 flex items-center justify-center text-xs transition-colors"
                            title="TikTok @premium.designz">
                            <iconify-icon icon="simple-icons:tiktok" class="text-xs"></iconify-icon>
                        </a>
                        <a href="https://shopee.co.id/premium_dz" target="_blank"
                            class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 hover:border-amber-500 hover:text-amber-400 text-slate-400 flex items-center justify-center text-xs transition-colors"
                            title="Shopee Official Store">
                            <iconify-icon icon="simple-icons:shopee" class="text-xs"></iconify-icon>
                        </a>
                        <a href="https://www.fiverr.com/premiumdz" target="_blank"
                            class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 hover:border-emerald-500 hover:text-emerald-400 text-slate-400 flex items-center justify-center text-xs font-bold transition-colors"
                            title="Fiverr Global Orders">
                            <iconify-icon icon="simple-icons:fiverr" class="text-sm"></iconify-icon>
                        </a>
                        <a href="https://lynk.id/premiumdsz" target="_blank"
                            class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 hover:border-brand-500 hover:text-brand-400 text-slate-400 flex items-center justify-center text-xs transition-colors"
                            title="Lynk.id Link Hub">
                            <iconify-icon icon="lucide:link-2" class="text-sm"></iconify-icon>
                        </a>
                        <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin konsultasi kebutuhan desain.') }}"
                            target="_blank"
                            class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 hover:border-emerald-500 hover:text-emerald-400 text-slate-400 flex items-center justify-center text-xs transition-colors"
                            title="WhatsApp Studio">
                            <iconify-icon icon="simple-icons:whatsapp" class="text-sm"></iconify-icon>
                        </a>
                    </div>
                </div>

                <!-- Navigasi -->
                <div>
                    <h4 class="text-white font-semibold text-xs uppercase tracking-wider mb-4">Navigasi Utama</h4>
                    <ul class="space-y-2.5 text-xs text-slate-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('portofolio.index') }}"
                                class="hover:text-white transition-colors flex items-center space-x-1.5"><span
                                    class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span><span>Portofolio
                                    Desain</span></a></li>
                        <li><a href="{{ route('marketplace.index') }}"
                                class="hover:text-white transition-colors">Marketplace Desain</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a>
                        </li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Channel Marketplace Resmi -->
                <div>
                    <h4 class="text-white font-semibold text-xs uppercase tracking-wider mb-4">Official Channels</h4>
                    <ul class="space-y-2.5 text-xs text-slate-400">
                        <li><a href="https://shopee.co.id/premium_dz" target="_blank"
                                class="hover:text-amber-400 transition-colors flex items-center space-x-2"><iconify-icon
                                    icon="simple-icons:shopee"
                                    class="text-amber-500 text-xs"></iconify-icon><span>Shopee Store</span></a></li>
                        <li><a href="https://www.fiverr.com/premiumdz" target="_blank"
                                class="hover:text-emerald-400 transition-colors flex items-center space-x-2"><iconify-icon
                                    icon="simple-icons:fiverr"
                                    class="text-emerald-500 text-xs"></iconify-icon><span>Fiverr Global</span></a></li>
                        <li><a href="https://www.instagram.com/premiumdsz/" target="_blank"
                                class="hover:text-pink-400 transition-colors flex items-center space-x-2"><iconify-icon
                                    icon="simple-icons:instagram"
                                    class="text-pink-500 text-xs"></iconify-icon><span>Instagram @premiumdsz</span></a>
                        </li>
                        <li><a href="https://www.tiktok.com/@premium.designz" target="_blank"
                                class="hover:text-cyan-400 transition-colors flex items-center space-x-2"><iconify-icon
                                    icon="simple-icons:tiktok"
                                    class="text-cyan-400 text-xs"></iconify-icon><span>TikTok
                                    @premium.designz</span></a></li>
                        <li><a href="https://lynk.id/premiumdsz" target="_blank"
                                class="hover:text-brand-400 transition-colors flex items-center space-x-2"><iconify-icon
                                    icon="lucide:link-2" class="text-brand-400 text-xs"></iconify-icon><span>Lynk.id
                                    Link Hub</span></a></li>
                    </ul>
                </div>

                <!-- Layanan Cepat -->
                <div>
                    <h4 class="text-white font-semibold text-xs uppercase tracking-wider mb-4">Pusat Layanan</h4>
                    <p class="text-xs text-slate-400 mb-2">Siap mendiskusikan kebutuhan desain Anda?</p>
                    <p class="text-[11px] text-brand-200 mb-3 flex items-center space-x-1.5">
                        <iconify-icon icon="lucide:clock" class="text-brand-300"></iconify-icon>
                        <span>Buka Setiap Hari: 09.00 - 23.00 WIB</span>
                    </p>
                    <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin konsultasi kebutuhan desain.') }}"
                        target="_blank"
                        class="inline-flex items-center justify-center space-x-2 w-full py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white text-xs font-semibold shadow-md shadow-brand-700/30 transition-colors">
                        <iconify-icon icon="simple-icons:whatsapp" class="text-sm"></iconify-icon>
                        <span>WhatsApp: 0851-6817-4679</span>
                    </a>
                </div>
            </div>

            <!-- Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} Premium Design. Hak cipta dilindungi.</p>
                <div class="flex items-center space-x-4 mt-4 sm:mt-0">
                    <a href="{{ route('admin.login') }}" class="hover:text-slate-400 transition-colors">Portal
                        Admin</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
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
    </script>

    <!-- AOS (Animate On Scroll) Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 700,
                once: true,
                offset: 60,
                easing: 'ease-out-cubic'
            });
        });
        window.addEventListener('load', function() {
            AOS.refresh();
        });
    </script>

    <!-- Auto Scroll to Top Floating Button -->
    <button id="scrollToTopBtn" type="button" onclick="scrollToTop()"
        aria-label="Kembali ke Atas"
        class="fixed bottom-6 right-6 z-40 w-12 h-12 rounded-2xl bg-brand-600 hover:bg-brand-500 text-white shadow-xl shadow-brand-700/30 border border-white/20 flex items-center justify-center transition-all duration-300 opacity-0 pointer-events-none translate-y-6 hover:scale-110 active:scale-95 group"
        title="Scroll ke Atas">
        <iconify-icon icon="lucide:arrow-up" class="text-xl group-hover:-translate-y-0.5 transition-transform duration-200"></iconify-icon>
    </button>

    <!-- Scroll to Top Script -->
    <script>
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

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        window.addEventListener('scroll', toggleScrollBtn, { passive: true });
    </script>

    <!-- Asset Protection DevTools Warning Modal -->
    <div id="asset-protection-modal" class="fixed inset-0 z-[9999] hidden bg-slate-950/80 backdrop-blur-sm items-center justify-center p-4 transition-all duration-300 opacity-0 pointer-events-none">
        <div class="relative max-w-md w-full bg-white rounded-3xl p-6 sm:p-8 shadow-2xl border border-slate-200 text-center space-y-4 transform scale-95 transition-all duration-300">
            <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-500 border border-amber-200 flex items-center justify-center mx-auto text-2xl shadow-inner">
                <iconify-icon icon="lucide:shield-alert"></iconify-icon>
            </div>
            <div class="space-y-2">
                <h3 class="text-base sm:text-lg font-bold font-heading text-slate-900">
                    ⚠️ Peringatan Perlindungan Aset
                </h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Aset dan gambar pada website ini dilindungi.<br>
                    Anda tidak memiliki hak untuk menyalin, mengubah, mengambil, atau menggunakan aset tanpa izin pemilik.
                </p>
            </div>
            <div class="pt-2">
                <button type="button" onclick="closeAssetWarning()"
                    class="w-full py-3 px-4 rounded-xl bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold transition-all shadow-md shadow-brand-600/20 active:scale-95">
                    Saya Mengerti & Lanjutkan
                </button>
            </div>
        </div>
    </div>

    <!-- Image Protection Toast Notification -->
    <div id="image-protection-toast" class="fixed bottom-20 left-1/2 -translate-x-1/2 z-[9998] hidden bg-slate-900/90 backdrop-blur-md text-white px-4 py-2.5 rounded-2xl text-xs font-semibold shadow-2xl border border-white/10 items-center space-x-2 transition-all duration-300 opacity-0 pointer-events-none">
        <iconify-icon icon="lucide:shield-ban" class="text-amber-400 text-base"></iconify-icon>
        <span>Aset gambar dilindungi hak cipta</span>
    </div>

    <!-- Global Image Asset Protection & DevTools Detection Script -->
    <script>
        // 1. Console Warning Message
        console.log(
            "%c⚠️ PERINGATAN\n%cSeluruh aset dan gambar pada website ini dilindungi.\nDilarang menyalin, mengambil, memodifikasi, atau menggunakan aset tanpa izin pemilik.",
            "color: #ef4444; font-size: 18px; font-weight: 800; line-height: 1.5;",
            "color: #334155; font-size: 13px; font-weight: 500; line-height: 1.6;"
        );

        // 2. Global Right-Click Prevention on All Images
        document.addEventListener('contextmenu', function(e) {
            const target = e.target;
            const isImage = target.tagName === 'IMG' || 
                            target.closest('img') || 
                            target.classList.contains('protected-asset') || 
                            target.closest('.protected-asset') ||
                            (target.style.backgroundImage && target.style.backgroundImage !== 'none');

            if (isImage) {
                e.preventDefault();
                showImageToast();
                return false;
            }
        }, { capture: true });

        // 3. Global Drag & Drop Prevention on All Images
        document.addEventListener('dragstart', function(e) {
            const target = e.target;
            const isImage = target.tagName === 'IMG' || 
                            target.closest('img') || 
                            target.classList.contains('protected-asset') || 
                            target.closest('.protected-asset');

            if (isImage) {
                e.preventDefault();
                return false;
            }
        }, { capture: true });

        // 4. Keyboard Shortcuts Prevention for Inspect & Save
        document.addEventListener('keydown', function(e) {
            // F12 or Ctrl+Shift+I / Ctrl+Shift+J / Ctrl+Shift+C / Ctrl+U
            if (
                e.key === 'F12' || 
                (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'i' || e.key === 'J' || e.key === 'j' || e.key === 'C' || e.key === 'c')) ||
                (e.ctrlKey && (e.key === 'u' || e.key === 'U'))
            ) {
                e.preventDefault();
                showDevToolsWarning();
                return false;
            }
            // Ctrl+S (Save page)
            if (e.ctrlKey && (e.key === 's' || e.key === 'S')) {
                e.preventDefault();
                showImageToast();
                return false;
            }
        });

        // 5. Toast Notification
        let toastTimeout = null;
        function showImageToast() {
            const toast = document.getElementById('image-protection-toast');
            if (!toast) return;

            toast.classList.remove('hidden');
            setTimeout(() => {
                toast.classList.remove('opacity-0', 'pointer-events-none');
                toast.classList.add('opacity-100', 'flex');
            }, 10);

            if (toastTimeout) clearTimeout(toastTimeout);
            toastTimeout = setTimeout(() => {
                toast.classList.remove('opacity-100');
                toast.classList.add('opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    toast.classList.add('hidden');
                    toast.classList.remove('flex');
                }, 300);
            }, 2200);
        }

        // 6. DevTools Detection & Warning Modal
        let devToolsWarningShown = false;
        function showDevToolsWarning() {
            if (devToolsWarningShown) return;
            devToolsWarningShown = true;

            const modal = document.getElementById('asset-protection-modal');
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(() => {
                    modal.classList.remove('opacity-0', 'pointer-events-none');
                    modal.classList.add('opacity-100', 'pointer-events-auto');
                }, 10);
            }
        }

        function closeAssetWarning() {
            const modal = document.getElementById('asset-protection-modal');
            if (modal) {
                modal.classList.remove('opacity-100', 'pointer-events-auto');
                modal.classList.add('opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }, 300);
            }
        }

        // Check for DevTools window resizing indicator
        function checkDevToolsOpen() {
            const threshold = 160;
            const isOpened = (window.outerWidth - window.innerWidth > threshold) || 
                             (window.outerHeight - window.innerHeight > threshold);

            if (isOpened && !devToolsWarningShown && !sessionStorage.getItem('dt_warned')) {
                sessionStorage.setItem('dt_warned', '1');
                showDevToolsWarning();
            }
        }

        window.addEventListener('resize', checkDevToolsOpen, { passive: true });
        setTimeout(checkDevToolsOpen, 1000);
    </script>

</body>

</html>
