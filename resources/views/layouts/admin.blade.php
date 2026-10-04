<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Premium Design')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/other/logo_warna.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Iconify Icon Web Component -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

    <!-- Tailwind CSS -->
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
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fafafa;
            margin: 0;
            padding: 0;
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

        /* Organic Curved Sidebar Protrusion with Brand Theme Gradient */
        .curved-dock {
            background: linear-gradient(168deg, rgba(29, 49, 161, 1) 0%, rgba(45, 108, 235, 1) 55%, rgba(6, 30, 125, 1) 100%);
            border-top-right-radius: 36px;
            border-bottom-right-radius: 36px;
            position: relative;
        }

        .curved-dock::before {
            content: '';
            position: absolute;
            top: -24px;
            left: 0;
            width: 24px;
            height: 24px;
            background: transparent;
            border-bottom-left-radius: 24px;
            box-shadow: -6px 6px 0 6px rgba(29, 49, 161, 1);
            pointer-events: none;
        }

        .curved-dock::after {
            content: '';
            position: absolute;
            bottom: -24px;
            left: 0;
            width: 24px;
            height: 24px;
            background: transparent;
            border-top-left-radius: 24px;
            box-shadow: -6px -6px 0 6px rgba(6, 30, 125, 1);
            pointer-events: none;
        }

        /* Smooth custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #d4d4d8;
            border-radius: 9999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a1a1aa;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 9999px;
        }
    </style>
</head>

<body class="text-zinc-800 antialiased min-h-screen bg-zinc-50 flex selection:bg-brand-600 selection:text-white">

    <!-- FULL EDGE-TO-EDGE ADMIN LAYOUT -->
    <div class="flex-1 flex min-h-screen relative w-full overflow-x-hidden">

        <!-- MOBILE FLOATING TOGGLE BUTTON -->
        <button id="mobile-toggle-btn"
            class="lg:hidden fixed bottom-6 left-6 z-50 w-12 h-12 rounded-2xl bg-brand-600 text-white shadow-2xl flex items-center justify-center text-xl hover:scale-110 active:scale-95 transition-transform"
            aria-label="Toggle Sidebar">
            <iconify-icon icon="lucide:menu"></iconify-icon>
        </button>

        <!-- FIXED SIDEBAR (DUAL MODE: MINIMAL ICON-ONLY VS EXPANDED WITH NAME ONLY) -->
        <aside id="main-sidebar"
            class="sidebar-expanded group shrink-0 fixed inset-y-0 left-0 z-50 transition-all duration-300 -translate-x-full lg:translate-x-0 h-screen flex flex-col justify-between py-4 pl-0 pr-2">

            <!-- Main Sidebar Container with Curved Shape -->
            <div id="sidebar-inner"
                class="curved-dock text-white py-6 flex flex-col justify-between h-full shadow-[0_20px_50px_rgba(29,49,161,0.3)] transition-all duration-300 w-64 overflow-hidden">

                <!-- TOP SECTION: LOGO & MENU -->
                <div class="px-4 space-y-5 overflow-y-auto sidebar-scroll flex-1">
                    <!-- Top Logo & Toggle -->
                    <div class="flex items-center justify-between pb-3 border-b border-white/15">
                        <a href="{{ route('home') }}" class="flex items-center space-x-3 overflow-hidden hover:opacity-80 transition-opacity" title="Ke Halaman Utama (Website Index)">
                            <img src="{{ asset('assets/other/logo_white.png') }}" alt="Logo Premium Design"
                                class="h-9 w-auto object-contain shrink-0">
                        </a>

                        <!-- Collapse / Expand Mode Toggle Button -->
                        <button id="sidebar-toggle-mode-btn" type="button"
                            class="hidden lg:flex w-7 h-7 rounded-xl bg-white/15 hover:bg-white/25 text-white items-center justify-center text-xs transition-all shrink-0"
                            title="Ubah Mode Minimalis / Lengkap">
                            <iconify-icon id="toggle-mode-icon" icon="lucide:chevron-left"></iconify-icon>
                        </button>
                    </div>

                    <!-- NAVIGATION MENU LIST (ICON & NAME ONLY) -->
                    <nav class="space-y-1.5 pt-1">
                        <!-- 1. Dashboard -->
                        <div class="relative menu-item-wrapper">
                            <a href="{{ route('admin.dashboard') }}"
                                class="flex items-center space-x-3 px-3.5 py-3 rounded-2xl {{ request()->routeIs('admin.dashboard') ? 'bg-white text-brand-700 font-bold shadow-md shadow-black/10' : 'text-white/85 hover:bg-white/15 hover:text-white' }} transition-all text-xs font-semibold"
                                title="Dashboard">
                                <iconify-icon icon="lucide:layout-dashboard" class="text-lg shrink-0"></iconify-icon>
                                <span class="sidebar-text truncate font-bold">Dashboard</span>
                            </a>
                        </div>

                        <!-- 2. Jasa & Portofolio -->
                        <div class="relative menu-item-wrapper">
                            <a href="{{ route('admin.produk.index') }}"
                                class="flex items-center space-x-3 px-3.5 py-3 rounded-2xl {{ request()->routeIs('admin.produk.*') ? 'bg-white text-brand-700 font-bold shadow-md shadow-black/10' : 'text-white/85 hover:bg-white/15 hover:text-white' }} transition-all text-xs font-semibold"
                                title="Jasa & Portofolio">
                                <iconify-icon icon="lucide:palette" class="text-lg shrink-0"></iconify-icon>
                                <span class="sidebar-text truncate font-bold">Jasa &amp; Portofolio</span>
                            </a>
                        </div>

                        <!-- 3. Kategori Desain -->
                        <div class="relative menu-item-wrapper">
                            <a href="{{ route('admin.kategori.index') }}"
                                class="flex items-center space-x-3 px-3.5 py-3 rounded-2xl {{ request()->routeIs('admin.kategori.*') ? 'bg-white text-brand-700 font-bold shadow-md shadow-black/10' : 'text-white/85 hover:bg-white/15 hover:text-white' }} transition-all text-xs font-semibold"
                                title="Kategori Desain">
                                <iconify-icon icon="lucide:tags" class="text-lg shrink-0"></iconify-icon>
                                <span class="sidebar-text truncate font-bold">Kategori Desain</span>
                            </a>
                        </div>

                        <!-- 4. Layanan & Harga -->
                        <div class="relative menu-item-wrapper">
                            <a href="{{ route('admin.layanan.index') }}"
                                class="flex items-center space-x-3 px-3.5 py-3 rounded-2xl {{ request()->routeIs('admin.layanan.*') ? 'bg-white text-brand-700 font-bold shadow-md shadow-black/10' : 'text-white/85 hover:bg-white/15 hover:text-white' }} transition-all text-xs font-semibold"
                                title="Paket Layanan">
                                <iconify-icon icon="lucide:sparkles" class="text-lg shrink-0"></iconify-icon>
                                <span class="sidebar-text truncate font-bold">Paket Layanan</span>
                            </a>
                        </div>

                        <!-- 5. Software & Tools -->
                        <div class="relative menu-item-wrapper">
                            <a href="{{ route('admin.software.index') }}"
                                class="flex items-center space-x-3 px-3.5 py-3 rounded-2xl {{ request()->routeIs('admin.software.*') ? 'bg-white text-brand-700 font-bold shadow-md shadow-black/10' : 'text-white/85 hover:bg-white/15 hover:text-white' }} transition-all text-xs font-semibold"
                                title="Software Tools">
                                <iconify-icon icon="lucide:pen-tool" class="text-lg shrink-0"></iconify-icon>
                                <span class="sidebar-text truncate font-bold">Software Tools</span>
                            </a>
                        </div>

                        <!-- 6. Ulasan & Testimoni -->
                        <div class="relative menu-item-wrapper">
                            <a href="{{ route('admin.testimoni.index') }}"
                                class="flex items-center space-x-3 px-3.5 py-3 rounded-2xl {{ request()->routeIs('admin.testimoni.*') ? 'bg-white text-brand-700 font-bold shadow-md shadow-black/10' : 'text-white/85 hover:bg-white/15 hover:text-white' }} transition-all text-xs font-semibold"
                                title="Ulasan & Testimoni">
                                <iconify-icon icon="lucide:message-square-heart" class="text-lg shrink-0"></iconify-icon>
                                <span class="sidebar-text truncate font-bold">Ulasan &amp; Testimoni</span>
                            </a>
                        </div>

                        <!-- 7. Pengaturan Website -->
                        <div class="relative menu-item-wrapper">
                            <a href="{{ route('admin.settings.index') }}"
                                class="flex items-center space-x-3 px-3.5 py-3 rounded-2xl {{ request()->routeIs('admin.settings.*') ? 'bg-white text-brand-700 font-bold shadow-md shadow-black/10' : 'text-white/85 hover:bg-white/15 hover:text-white' }} transition-all text-xs font-semibold"
                                title="Pengaturan">
                                <iconify-icon icon="lucide:settings" class="text-lg shrink-0"></iconify-icon>
                                <span class="sidebar-text truncate font-bold">Pengaturan</span>
                            </a>
                        </div>
                    </nav>
                </div>

                <!-- BOTTOM SECTION: USER & LOGOUT -->
                <div class="px-4 pt-4 border-t border-white/15 space-y-3 shrink-0">
                    <!-- User Profile Pill -->
                    <div class="flex items-center space-x-3 p-2 rounded-2xl bg-white/10 overflow-hidden">
                        <img src="{{ Auth::user()->Profile_url ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80' }}"
                            class="w-8 h-8 rounded-xl object-cover shrink-0 border border-white/30" alt="Avatar">
                        <div class="sidebar-text truncate">
                            <p class="text-xs font-bold text-white truncate">{{ Auth::user()->Nama_user ?? 'Admin' }}</p>
                            <p class="text-[10px] text-brand-100 truncate">{{ Auth::user()->Email ?? 'admin@premiumdz.com' }}</p>
                        </div>
                    </div>

                    <!-- Logout Button -->
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-2xl bg-rose-500/20 hover:bg-rose-500 text-rose-100 hover:text-white transition-all text-xs font-bold"
                            title="Logout">
                            <iconify-icon icon="lucide:log-out" class="text-base shrink-0"></iconify-icon>
                            <span class="sidebar-text">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Mobile Backdrop Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-zinc-950/40 backdrop-blur-xs z-40 hidden lg:hidden"></div>

        <!-- MAIN PAGE CONTENT (FIXED OFFSET FOR SIDEBAR, ZINC THEME) -->
        <main id="main-content" class="flex-1 min-h-screen p-6 sm:p-8 lg:p-10 transition-all duration-300 bg-zinc-50 lg:ml-64 max-w-full">
            <!-- Flash Notification Messages -->
            @if (session('success'))
                <div
                    class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-center space-x-3 shadow-xs">
                    <iconify-icon icon="lucide:check-circle-2" class="text-emerald-600 text-lg shrink-0"></iconify-icon>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div
                    class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs shadow-xs space-y-1">
                    <p class="font-bold flex items-center space-x-1.5">
                        <iconify-icon icon="lucide:alert-circle" class="text-rose-600 text-base"></iconify-icon>
                        <span>Periksa kembali data formulir:</span>
                    </p>
                    <ul class="list-disc list-inside space-y-0.5 text-zinc-700 pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Yield Page Content -->
            @yield('content')
        </main>
    </div>

    <!-- Sidebar Mode Toggle & Mobile Drawer Script -->
    <script>
        (function() {
            const mainSidebar = document.getElementById('main-sidebar');
            const sidebarInner = document.getElementById('sidebar-inner');
            const mainContent = document.getElementById('main-content');
            const toggleModeBtn = document.getElementById('sidebar-toggle-mode-btn');
            const toggleModeIcon = document.getElementById('toggle-mode-icon');
            const sidebarTexts = document.querySelectorAll('.sidebar-text');

            const mobileToggleBtn = document.getElementById('mobile-toggle-btn');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            // Check saved preference from localStorage
            const savedMode = localStorage.getItem('admin_sidebar_mode') || 'expanded';
            applySidebarMode(savedMode);

            function applySidebarMode(mode) {
                if (mode === 'minimal') {
                    mainSidebar.classList.remove('sidebar-expanded');
                    mainSidebar.classList.add('sidebar-minimal');
                    sidebarInner.classList.remove('w-64');
                    sidebarInner.classList.add('w-20');
                    if (mainContent) {
                        mainContent.classList.remove('lg:ml-64');
                        mainContent.classList.add('lg:ml-20');
                    }
                    if (toggleModeIcon) toggleModeIcon.setAttribute('icon', 'lucide:chevron-right');
                    sidebarTexts.forEach(el => el.classList.add('hidden'));
                } else {
                    mainSidebar.classList.remove('sidebar-minimal');
                    mainSidebar.classList.add('sidebar-expanded');
                    sidebarInner.classList.remove('w-20');
                    sidebarInner.classList.add('w-64');
                    if (mainContent) {
                        mainContent.classList.remove('lg:ml-20');
                        mainContent.classList.add('lg:ml-64');
                    }
                    if (toggleModeIcon) toggleModeIcon.setAttribute('icon', 'lucide:chevron-left');
                    sidebarTexts.forEach(el => el.classList.remove('hidden'));
                }
            }

            if (toggleModeBtn) {
                toggleModeBtn.addEventListener('click', function() {
                    const isMinimal = mainSidebar.classList.contains('sidebar-minimal');
                    const newMode = isMinimal ? 'expanded' : 'minimal';
                    localStorage.setItem('admin_sidebar_mode', newMode);
                    applySidebarMode(newMode);
                });
            }

            // Mobile Drawer
            function toggleMobileSidebar() {
                if (mainSidebar.classList.contains('-translate-x-full')) {
                    mainSidebar.classList.remove('-translate-x-full');
                    sidebarOverlay.classList.remove('hidden');
                } else {
                    mainSidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                }
            }

            if (mobileToggleBtn) mobileToggleBtn.addEventListener('click', toggleMobileSidebar);
            if (sidebarOverlay) sidebarOverlay.addEventListener('click', toggleMobileSidebar);
        })();
    </script>
</body>

</html>
