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

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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

        /* Global Anti-Screenshot, Image & Asset Protection */
        *, *::before, *::after {
            -webkit-user-drag: none !important;
            user-drag: none !important;
        }

        body {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        input, textarea, select {
            -webkit-user-select: text !important;
            -moz-user-select: text !important;
            -ms-user-select: text !important;
            user-select: text !important;
        }

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
            pointer-events: auto;
        }

        /* Anti-Print & Anti-PDF Capture */
        @media print {
            html, body {
                display: none !important;
                visibility: hidden !important;
                height: 0 !important;
                overflow: hidden !important;
            }
        }
    </style>
    <!-- AOS (Animate On Scroll) CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body
    class="bg-white text-zinc-800 antialiased min-h-screen flex flex-col selection:bg-brand-600 selection:text-white">

    <!-- Top Info Bar Component -->
    @include('components.topbar')

    <!-- Main Navigation Bar Component -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Global Footer Component -->
    @include('components.footer')

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

    <!-- Auto Scroll to Top Floating Button Component -->
    @include('components.button-to-top')

    <!-- Asset Protection Security Component -->
    @include('components.asset-protection')

</body>

</html>
