@extends('layouts.admin')

@section('title', 'Dashboard Overview - Admin Premium Design')
@section('page_title', 'Dashboard')

@section('content')

    <!-- TOP HERO GREETING & QUICK ACTIONS -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <div class="flex items-center space-x-2.5">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-zinc-900 tracking-tight font-heading">
                    Selamat Datang, {{ Auth::user()->Nama_user ?? 'Admin' }}! 👋
                </h1>
                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-brand-50 text-brand-600 border border-brand-100">
                    Super Admin
                </span>
            </div>
            <p class="text-xs sm:text-sm text-zinc-500 mt-1">
                Kelola katalog portofolio, jasa desain, kategori layanan, dan testimoni studio Anda.
            </p>
        </div>

        <div class="flex items-center space-x-2.5 flex-wrap gap-y-2">
            <a href="{{ route('home') }}" target="_blank" 
                class="px-4 py-2.5 rounded-2xl bg-zinc-100 hover:bg-zinc-200 text-zinc-700 text-xs font-bold transition-all flex items-center space-x-1.5 shadow-xs whitespace-nowrap">
                <iconify-icon icon="lucide:external-link" class="text-sm"></iconify-icon>
                <span>Lihat Website</span>
            </a>
            <a href="{{ route('admin.produk.create') }}" 
                class="px-4 py-2.5 rounded-2xl bg-brand-gradient hover:brightness-110 text-white text-xs font-bold transition-all flex items-center space-x-1.5 shadow-md shadow-brand-700/20 active:scale-95 whitespace-nowrap">
                <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                <span>Tambah Jasa</span>
            </a>
        </div>
    </div>

    <!-- 4 MAIN METRIC CARDS (REAL DATA) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <!-- Card 1: Total Jasa -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-zinc-100 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-wider">Jasa &amp; Portofolio</p>
                <h3 class="text-3xl font-extrabold text-zinc-900 mt-1.5 font-heading">{{ $totalProduk }}</h3>
                <a href="{{ route('admin.produk.index') }}" class="text-[11px] text-brand-600 font-bold hover:underline mt-1.5 inline-flex items-center space-x-1">
                    <span>Lihat Semua</span>
                    <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center text-2xl shadow-xs">
                <iconify-icon icon="lucide:palette"></iconify-icon>
            </div>
        </div>

        <!-- Card 2: Total Kategori -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-zinc-100 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-wider">Kategori Aktif</p>
                <h3 class="text-3xl font-extrabold text-zinc-900 mt-1.5 font-heading">{{ $totalKategori }}</h3>
                <a href="{{ route('admin.kategori.index') }}" class="text-[11px] text-emerald-600 font-bold hover:underline mt-1.5 inline-flex items-center space-x-1">
                    <span>Spesialisasi Desain</span>
                    <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl shadow-xs">
                <iconify-icon icon="lucide:tags"></iconify-icon>
            </div>
        </div>

        <!-- Card 3: Total Layanan -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-zinc-100 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-wider">Paket Layanan</p>
                <h3 class="text-3xl font-extrabold text-zinc-900 mt-1.5 font-heading">{{ $totalLayanan }}</h3>
                <a href="{{ route('admin.layanan.index') }}" class="text-[11px] text-brand-600 font-bold hover:underline mt-1.5 inline-flex items-center space-x-1">
                    <span>Pricelist Dinamis</span>
                    <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center text-2xl shadow-xs">
                <iconify-icon icon="lucide:sparkles"></iconify-icon>
            </div>
        </div>

        <!-- Card 4: Total Testimoni & Rating -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-zinc-100 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.05)] hover:shadow-lg transition-all flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-wider">Testimoni Klien</p>
                <h3 class="text-3xl font-extrabold text-zinc-900 mt-1.5 font-heading">{{ $totalTestimoni }}</h3>
                <span class="text-[11px] text-amber-500 font-bold mt-1.5 inline-flex items-center space-x-1">
                    <span>Rating {{ number_format($avgRating, 1) }}</span>
                    <iconify-icon icon="lucide:star" class="text-amber-500 text-xs fill-amber-500"></iconify-icon>
                </span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center text-2xl shadow-xs">
                <iconify-icon icon="lucide:message-square-heart"></iconify-icon>
            </div>
        </div>
    </div>

    <!-- MAIN GRID SECTION (RECENT SERVICES & RECENT REVIEWS) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- RECENT SERVICES TABLE (7 COLS) -->
        <div class="lg:col-span-7 bg-white rounded-3xl p-5 sm:p-7 border border-zinc-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] space-y-4 max-w-full">
            <div class="flex items-center justify-between pb-2 border-b border-zinc-100">
                <div>
                    <h3 class="text-base font-bold text-zinc-900 font-heading">Karya &amp; Jasa Desain Terbaru</h3>
                    <p class="text-xs text-zinc-400">Daftar item jasa desain yang baru diunggah</p>
                </div>
                <a href="{{ route('admin.produk.create') }}" 
                    class="px-3 py-1.5 bg-brand-50 hover:bg-brand-100 text-brand-600 rounded-xl text-xs font-bold transition-colors inline-flex items-center space-x-1 whitespace-nowrap shrink-0">
                    <iconify-icon icon="lucide:plus" class="text-xs"></iconify-icon>
                    <span>Tambah Jasa</span>
                </a>
            </div>

            <div class="rounded-2xl border border-zinc-200/80 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs whitespace-nowrap">
                        <thead class="bg-zinc-50 border-b border-zinc-200 text-zinc-500 font-bold uppercase tracking-wider text-[10px]">
                            <tr>
                                <th class="py-2.5 px-3">ID Jasa</th>
                                <th class="py-2.5 px-3">Nama Jasa</th>
                                <th class="py-2.5 px-3">Kategori</th>
                                <th class="py-2.5 px-3">Stok Kuota</th>
                                <th class="py-2.5 px-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-100">
                            @forelse ($recentProduk as $prod)
                                <tr class="hover:bg-zinc-50/80 transition-colors">
                                    <td class="py-2.5 px-3">
                                        <span class="px-2 py-0.5 rounded-md font-mono font-bold text-[11px] bg-brand-50 text-brand-700 border border-brand-100">
                                            {{ $prod->custom_id }}
                                        </span>
                                    </td>
                                    <td class="py-2.5 px-3">
                                        <a href="{{ route('admin.produk.show', $prod->Id_produk) }}" class="font-bold text-zinc-800 hover:text-brand-600 truncate max-w-[130px] sm:max-w-[170px] block text-xs" title="{{ $prod->Nama_produk }}">
                                            {{ $prod->Nama_produk }}
                                        </a>
                                    </td>
                                    <td class="py-2.5 px-3 text-zinc-500">
                                        <span class="px-2 py-0.5 rounded-md bg-zinc-100 text-zinc-700 text-[10px] font-semibold">
                                            {{ $prod->kategori->Nama_kategori ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="py-2.5 px-3">
                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-bold {{ $prod->Stok_produk > 0 ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-rose-50 text-rose-700 border border-rose-200' }}">
                                            {{ $prod->Stok_produk }} Kuota
                                        </span>
                                    </td>
                                    <td class="py-2.5 px-3 text-right space-x-1">
                                        <a href="{{ route('admin.produk.edit', $prod->Id_produk) }}" class="text-brand-600 hover:text-brand-800 font-bold text-xs">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-zinc-400">Belum ada karya jasa terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- RECENT REVIEWS & QUICK ACTIONS (5 COLS) -->
        <div class="lg:col-span-5 space-y-6">
            <!-- Testimoni Card -->
            <div class="bg-white rounded-3xl p-5 sm:p-7 border border-zinc-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] space-y-4">
                <div class="flex items-center justify-between pb-2 border-b border-zinc-100">
                    <div>
                        <h3 class="text-base font-bold text-zinc-900 font-heading">Ulasan &amp; Testimoni</h3>
                        <p class="text-xs text-zinc-400">Bukti ulasan terbaru dari klien</p>
                    </div>
                    <a href="{{ route('admin.testimoni.create') }}" 
                        class="px-3 py-1.5 bg-zinc-100 hover:bg-zinc-200 text-zinc-800 rounded-xl text-xs font-bold transition-colors inline-flex items-center space-x-1 whitespace-nowrap shrink-0">
                        <iconify-icon icon="lucide:plus" class="text-xs"></iconify-icon>
                        <span>Tambah</span>
                    </a>
                </div>

                <div class="space-y-2.5">
                    @forelse ($recentTestimoni as $testi)
                        <div class="p-2.5 rounded-2xl bg-zinc-50 border border-zinc-100 flex items-center space-x-3 text-xs">
                            <img src="{{ $testi->image_url }}" alt="{{ $testi->Judul }}" class="w-10 h-10 rounded-xl object-cover border border-zinc-200 shrink-0">
                            <div class="truncate flex-1 min-w-0">
                                <span class="font-bold text-zinc-900 block truncate" title="{{ $testi->Judul }}">{{ $testi->Judul }}</span>
                                <span class="text-[10px] text-zinc-400 truncate block">{{ $testi->Foto_url }}</span>
                            </div>
                            <a href="{{ route('admin.testimoni.edit', $testi->Id_testimoni) }}" class="text-brand-600 hover:text-brand-800 text-xs font-bold whitespace-nowrap shrink-0">
                                Edit
                            </a>
                        </div>
                    @empty
                        <p class="text-xs text-zinc-400 py-4 text-center">Belum ada foto testimoni terunggah.</p>
                    @endforelse
                </div>
            </div>

            <!-- Quick Studio Hub Card with Brand Gradient -->
            <div class="bg-brand-gradient text-white rounded-3xl p-6 shadow-xl shadow-brand-700/20 flex items-center justify-between">
                <div class="space-y-1 max-w-[240px]">
                    <h4 class="text-sm font-bold font-heading">Pengaturan &amp; Kontak</h4>
                    <p class="text-[11px] text-brand-100 leading-relaxed">Perbarui nomor WhatsApp, tautan marketplace, dan profil studio Anda.</p>
                    <div class="pt-2">
                        <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 bg-white text-brand-700 rounded-xl text-xs font-bold inline-block hover:bg-brand-50 shadow-sm transition-all whitespace-nowrap">
                            Kelola Pengaturan
                        </a>
                    </div>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center text-3xl shrink-0">
                    <iconify-icon icon="lucide:sliders"></iconify-icon>
                </div>
            </div>
        </div>

    </div>

@endsection
