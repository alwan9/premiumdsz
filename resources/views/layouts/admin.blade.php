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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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
                            600: '#2d6ceb',
                            700: '#1d31a1',
                            800: '#13247f',
                            900: '#061e7d',
                            950: '#041352',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        iconify-icon {
            display: inline-block;
            vertical-align: middle;
        }

        .bg-brand-gradient {
            background: #1d31a1;
            background: linear-gradient(168deg, rgba(29, 49, 161, 1) 0%, rgba(45, 108, 235, 1) 55%, rgba(6, 30, 125, 1) 100%);
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen flex flex-col font-sans selection:bg-brand-600 selection:text-white">

    <div class="flex min-h-screen relative">
        <!-- Sidebar Overlay (Mobile) -->
        <div id="admin-sidebar-overlay" class="fixed inset-0 bg-slate-950/50 z-40 hidden lg:hidden"></div>

        <!-- Sidebar Navigation -->
        <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 flex flex-col justify-between shrink-0 shadow-2xl transition-transform duration-300 -translate-x-full lg:translate-x-0 lg:static lg:z-auto">
            <div>
                <!-- Brand Header -->
                <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                        <img src="{{ asset('assets/other/logo_white.png') }}" alt="Logo Premium Design" class="h-8 w-auto object-contain">
                        <div>
                            <span class="text-sm font-bold text-white tracking-wide font-heading">ADMIN PANEL</span>
                            <p class="text-[10px] text-slate-400 -mt-0.5">Premium Design</p>
                        </div>
                    </a>
                    <button id="close-sidebar-btn" class="lg:hidden text-slate-400 hover:text-white p-1">
                        <iconify-icon icon="lucide:x" class="text-lg"></iconify-icon>
                    </button>
                </div>

                <!-- Navigation Menu -->
                <nav class="p-4 space-y-1 text-xs font-semibold">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-brand-gradient text-white shadow-sm' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors">
                        <iconify-icon icon="lucide:layout-dashboard" class="w-4 text-sm text-center"></iconify-icon>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('admin.produk.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl {{ request()->routeIs('admin.produk.*') ? 'bg-brand-gradient text-white shadow-sm' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors">
                        <iconify-icon icon="lucide:layers" class="w-4 text-sm text-center"></iconify-icon>
                        <span>Produk & Portofolio</span>
                    </a>

                    <a href="{{ route('admin.kategori.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl {{ request()->routeIs('admin.kategori.*') ? 'bg-brand-gradient text-white shadow-sm' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors">
                        <iconify-icon icon="lucide:tags" class="w-4 text-sm text-center"></iconify-icon>
                        <span>Kategori Desain</span>
                    </a>

                    <a href="{{ route('admin.layanan.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl {{ request()->routeIs('admin.layanan.*') ? 'bg-brand-gradient text-white shadow-sm' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors">
                        <iconify-icon icon="lucide:gem" class="w-4 text-sm text-center"></iconify-icon>
                        <span>Paket Layanan & Harga</span>
                    </a>

                    <a href="{{ route('admin.software.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl {{ request()->routeIs('admin.software.*') ? 'bg-brand-gradient text-white shadow-sm' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors">
                        <iconify-icon icon="lucide:monitor" class="w-4 text-sm text-center"></iconify-icon>
                        <span>Software & Tools</span>
                    </a>

                    <a href="{{ route('admin.testimoni.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl {{ request()->routeIs('admin.testimoni.*') ? 'bg-brand-gradient text-white shadow-sm' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors">
                        <iconify-icon icon="lucide:star" class="w-4 text-sm text-center"></iconify-icon>
                        <span>Ulasan & Testimoni</span>
                    </a>

                    <a href="{{ route('admin.settings.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl {{ request()->routeIs('admin.settings.*') ? 'bg-brand-gradient text-white shadow-sm' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }} transition-colors">
                        <iconify-icon icon="lucide:sliders" class="w-4 text-sm text-center"></iconify-icon>
                        <span>Pengaturan & Kontak</span>
                    </a>
                </nav>
            </div>

            <!-- User Info & Logout -->
            <div class="p-4 border-t border-slate-800 space-y-3">
                <div class="flex items-center space-x-3 p-2 rounded-xl bg-slate-800/60 overflow-hidden">
                    <img src="{{ Auth::user()->Profile_url ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80' }}" class="w-8 h-8 rounded-full object-cover shrink-0 border border-slate-700" alt="Avatar">
                    <div class="truncate">
                        <p class="text-xs font-semibold text-white truncate">{{ Auth::user()->Nama_user ?? 'Admin' }}</p>
                        <p class="text-[10px] text-slate-400 truncate">{{ Auth::user()->Email ?? '' }}</p>
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <a href="{{ route('home') }}" target="_blank" class="flex-1 py-2 text-center text-xs font-bold bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-lg transition-colors flex items-center justify-center space-x-1">
                        <iconify-icon icon="lucide:external-link" class="text-xs"></iconify-icon>
                        <span>Web</span>
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full py-2 text-center text-xs font-bold bg-rose-500/10 hover:bg-rose-600 text-rose-400 hover:text-white rounded-lg transition-colors flex items-center justify-center space-x-1">
                            <iconify-icon icon="lucide:log-out" class="text-xs"></iconify-icon>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Topbar -->
            <header class="h-20 bg-white border-b border-slate-200 px-4 sm:px-8 flex items-center justify-between sticky top-0 z-30">
                <div class="flex items-center space-x-3">
                    <button id="open-sidebar-btn" class="lg:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100">
                        <iconify-icon icon="lucide:menu" class="text-xl"></iconify-icon>
                    </button>
                    <div>
                        <h1 class="text-base sm:text-lg font-bold text-slate-900 font-heading">@yield('page_title', 'Dashboard Overview')</h1>
                        <p class="hidden sm:block text-[11px] text-slate-400">Panel Pengelolaan Portofolio, Marketplace & Layanan</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                        Admin Aktif
                    </span>
                </div>
            </header>

            <!-- Main Page Body -->
            <main class="p-4 sm:p-8 flex-1">
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-center space-x-2.5 shadow-sm">
                        <iconify-icon icon="lucide:check-circle-2" class="text-emerald-600 text-base shrink-0"></iconify-icon>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs shadow-sm">
                        <p class="font-bold mb-1">Periksa kembali data input berikut:</p>
                        <ul class="list-disc list-inside space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Responsive Sidebar Script -->
    <script>
        const openBtn = document.getElementById('open-sidebar-btn');
        const closeBtn = document.getElementById('close-sidebar-btn');
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('admin-sidebar-overlay');

        function toggleSidebar() {
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        if (openBtn) openBtn.addEventListener('click', toggleSidebar);
        if (closeBtn) closeBtn.addEventListener('click', toggleSidebar);
        if (overlay) overlay.addEventListener('click', toggleSidebar);
    </script>

</body>
</html>
