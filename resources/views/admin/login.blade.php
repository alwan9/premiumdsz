<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Premium Design</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/other/logo_warna.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Iconify Icon Web Component -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    backgroundImage: {
                        'brand-gradient': 'linear-gradient(168deg, rgba(29, 49, 161, 1) 0%, rgba(45, 108, 235, 1) 55%, rgba(6, 30, 125, 1) 100%)',
                    },
                    colors: {
                        brand: {
                            500: '#2d6ceb',
                            600: '#2d6ceb',
                            700: '#1d31a1',
                            900: '#061e7d',
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
<body class="bg-slate-950 text-slate-100 min-h-screen flex items-center justify-center p-4 relative overflow-hidden font-sans selection:bg-brand-500 selection:text-white">

    <!-- Background Ambient Glow -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-brand-600/20 rounded-full blur-[128px] pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-indigo-600/20 rounded-full blur-[128px] pointer-events-none"></div>

    <div class="w-full max-w-md relative z-10">
        <!-- Brand Header -->
        <div class="text-center mb-8 space-y-2">
            <img src="{{ asset('assets/other/logo_white.png') }}" alt="Logo Premium Design" class="h-14 w-auto object-contain mx-auto mb-4 drop-shadow-xl">
            <h1 class="text-2xl font-bold text-white font-heading tracking-tight">Portal Admin Premium Design</h1>
            <p class="text-xs text-slate-400">Masuk untuk mengelola portofolio, produk, layanan, dan ulasan</p>
        </div>

        <!-- Login Form Box -->
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 shadow-2xl space-y-6">
            @if ($errors->any())
                <div class="p-4 rounded-2xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('success'))
                <div class="p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                @csrf
                
                <!-- Username / Email -->
                <div class="space-y-1.5">
                    <label class="text-xs font-semibold text-slate-300">Username atau Email</label>
                    <div class="relative">
                        <iconify-icon icon="lucide:user" class="absolute left-4 top-3.5 text-slate-500 text-sm"></iconify-icon>
                        <input type="text" name="login" value="{{ old('login', 'admin') }}" required class="w-full pl-11 pr-4 py-3 bg-slate-800/80 border border-slate-700 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-colors" placeholder="admin / designzpremium@gmail.com">
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label class="text-xs font-semibold text-slate-300">Password</label>
                    <div class="relative">
                        <iconify-icon icon="lucide:lock" class="absolute left-4 top-3.5 text-slate-500 text-sm"></iconify-icon>
                        <input type="password" name="password" value="password123" required class="w-full pl-11 pr-4 py-3 bg-slate-800/80 border border-slate-700 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-colors" placeholder="••••••••">
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center space-x-2 text-slate-400 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded bg-slate-800 border-slate-700 text-brand-600 focus:ring-brand-500">
                        <span>Ingat saya</span>
                    </label>
                    <span class="text-slate-500">Default: admin / password123</span>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full py-3.5 rounded-xl bg-brand-gradient hover:brightness-110 text-white font-bold text-xs uppercase tracking-wider shadow-lg shadow-brand-700/30 transition-all">
                        Masuk ke Dashboard
                    </button>
                </div>
            </form>

            <div class="pt-2 text-center">
                <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-brand-400 transition-colors flex items-center justify-center space-x-1">
                    <iconify-icon icon="lucide:arrow-left" class="text-xs"></iconify-icon>
                    <span>Kembali ke Website Utama</span>
                </a>
            </div>
        </div>
    </div>

</body>
</html>
