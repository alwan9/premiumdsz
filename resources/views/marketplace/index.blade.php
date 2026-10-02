@extends('layouts.app')

@section('title', 'Katalog Jasa Desain Grafis & Marketplace Portofolio - Premium Designz')
@section('meta_description',
    'Jelajahi portofolio dan katalog jasa desain grafis: desain logo, kemasan produk, banner
    wisuda & event UMKM, UI/UX mobile app website, presentasi PPT, dan jersey custom original.')
@section('meta_keywords',
    'katalog jasa desain grafis, marketplace desain, portofolio desain logo, desain banner wisuda,
    desain kemasan produk, figma ui ux, premium designz')

@section('content')

    <!-- Header Banner -->
    <div
        class="bg-gradient-to-b from-brand-50/60 via-slate-50/40 to-white py-12 sm:py-16 border-b border-slate-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-down" class="max-w-3xl space-y-2">
                <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Katalog Desain & Jasa</span>
                <h1 class="text-2xl sm:text-4xl font-extrabold font-heading text-slate-900">Marketplace Karya & Layanan
                    Desain</h1>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Pilih kategori desain yang Anda butuhkan, lihat rincian spesifikasi, dan lakukan pemesanan cepat
                    langsung ke WhatsApp tim desainer kami.
                </p>
            </div>
        </div>
    </div>

    <!-- Main Marketplace Section -->
    <div class="py-12 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search and Filter Bar -->
            <div data-aos="fade-up" class="bg-slate-50 border border-slate-200 rounded-2xl p-4 sm:p-6 mb-10 shadow-sm">
                <form action="{{ route('marketplace.index') }}" method="GET"
                    class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                    <!-- Search Input -->
                    <div class="sm:col-span-6 relative">
                        <iconify-icon icon="lucide:search"
                            class="absolute left-4 top-3 text-slate-400 text-sm"></iconify-icon>
                        <input type="text" name="q" value="{{ request('q') }}"
                            placeholder="Cari nama desain atau kata kunci..."
                            class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>

                    <!-- Category Filter Dropdown (Mobile/Quick) -->
                    <div class="sm:col-span-3">
                        <select name="kategori"
                            class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <option value="all">Semua Kategori ({{ $totalSemuaProduk }})</option>
                            @foreach ($kategoris as $k)
                                <option value="{{ $k->Id_kategori }}"
                                    {{ $selectedKategori == $k->Id_kategori ? 'selected' : '' }}>
                                    {{ $k->Nama_kategori }} ({{ $k->produk_digital_count }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sorting -->
                    <div class="sm:col-span-2">
                        <select name="sort"
                            class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>Terlama</option>
                            <option value="stock_high" {{ request('sort') === 'stock_high' ? 'selected' : '' }}>Stok
                                Terbanyak</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="sm:col-span-1">
                        <button type="submit"
                            class="w-full py-2.5 bg-brand-gradient hover:brightness-110 text-white rounded-xl text-xs font-bold shadow-sm shadow-brand-700/20 transition-all">
                            Filter
                        </button>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Sidebar Category List (Desktop) -->
                <aside data-aos="fade-right" data-aos-delay="100" class="hidden lg:block lg:col-span-3 space-y-6">
                    <div class="bg-white border border-slate-200 rounded-2xl p-5 space-y-3">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Kategori Desain</h3>
                        <div class="space-y-1">
                            <a href="{{ route('marketplace.index') }}"
                                class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold {{ !$selectedKategori || $selectedKategori === 'all' ? 'bg-brand-50 text-brand-700' : 'text-slate-600 hover:bg-slate-50' }}">
                                <span>Semua Kategori</span>
                                <span class="text-[10px] text-slate-400">{{ $totalSemuaProduk }}</span>
                            </a>
                            @foreach ($kategoris as $k)
                                <a href="{{ route('marketplace.index', ['kategori' => $k->Id_kategori]) }}"
                                    class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold {{ $selectedKategori == $k->Id_kategori ? 'bg-brand-50 text-brand-700 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">
                                    <span>{{ $k->Nama_kategori }}</span>
                                    <span class="text-[10px] text-slate-400">{{ $k->produk_digital_count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Official Channels in Marketplace -->
                    <div class="p-5 rounded-2xl bg-white border border-slate-200 space-y-3">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Order via Marketplace</h4>
                        <div class="space-y-2">
                            <a href="https://shopee.co.id/premium_dz" target="_blank"
                                class="flex items-center justify-between p-2.5 rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-900 text-xs font-bold transition-colors">
                                <span class="flex items-center space-x-2">
                                    <iconify-icon icon="simple-icons:shopee" class="text-amber-600 text-xs"></iconify-icon>
                                    <span>Shopee Official</span>
                                </span>
                                <iconify-icon icon="lucide:external-link" class="text-xs text-amber-600"></iconify-icon>
                            </a>
                            <a href="https://www.fiverr.com/premiumdz" target="_blank"
                                class="flex items-center justify-between p-2.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-900 text-xs font-bold transition-colors">
                                <span class="flex items-center space-x-2">
                                    <iconify-icon icon="simple-icons:fiverr"
                                        class="text-emerald-700 text-sm"></iconify-icon>
                                    <span>Fiverr Orders</span>
                                </span>
                                <iconify-icon icon="lucide:external-link" class="text-xs text-emerald-600"></iconify-icon>
                            </a>
                            <a href="https://lynk.id/premiumdsz" target="_blank"
                                class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-bold transition-colors">
                                <span class="flex items-center space-x-2">
                                    <iconify-icon icon="lucide:link-2" class="text-brand-600 text-xs"></iconify-icon>
                                    <span>Lynk.id Portofolio</span>
                                </span>
                                <iconify-icon icon="lucide:external-link" class="text-xs text-slate-400"></iconify-icon>
                            </a>
                        </div>
                    </div>

                    <!-- Need Custom Design Help Box -->
                    <div class="p-5 rounded-2xl bg-brand-gradient text-white space-y-3 shadow-lg shadow-brand-700/20">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-white">Punya Konsep Khusus?</h4>
                        <p class="text-xs text-brand-100 leading-relaxed">
                            Butuh desain kombinasi atau proyek multi-materi? Konsultasikan langsung dengan desainer kami.
                        </p>
                        <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya butuh penawaran custom project desain.') }}"
                            target="_blank"
                            class="inline-flex items-center justify-center space-x-1.5 w-full py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white text-xs font-bold shadow-md shadow-brand-700/30 transition-all">
                            <iconify-icon icon="simple-icons:whatsapp" class="text-sm"></iconify-icon>
                            <span>Chat Desainer</span>
                        </a>
                    </div>
                </aside>

                <!-- Product Catalog Grid -->
                <div class="lg:col-span-9">
                    <!-- Filter Status Indicator -->
                    <div data-aos="fade-up" class="flex items-center justify-between mb-6">
                        <p class="text-xs text-slate-500">
                            Menampilkan <span class="font-bold text-slate-800">{{ $produks->total() }}</span> produk/jasa
                            desain
                        </p>
                        @if ($selectedKategori || request('q'))
                            <a href="{{ route('marketplace.index') }}"
                                class="text-xs font-bold text-brand-600 hover:text-brand-800">
                                Reset Filter & Pencarian
                            </a>
                        @endif
                    </div>

                    @if ($produks->isEmpty())
                        <div data-aos="fade-up"
                            class="text-center py-16 bg-slate-50 rounded-2xl border border-slate-200 p-8">
                            <div
                                class="w-12 h-12 rounded-full bg-slate-200 text-slate-400 flex items-center justify-center text-xl mx-auto mb-3">
                                <iconify-icon icon="lucide:folder-open" class="text-2xl"></iconify-icon>
                            </div>
                            <h4 class="text-sm font-bold text-slate-800">Tidak ada produk ditemukan</h4>
                            <p class="text-xs text-slate-500 mt-1">Coba sesuaikan kata kunci pencarian atau pilih kategori
                                lainnya.</p>
                            <a href="{{ route('marketplace.index') }}"
                                class="inline-block mt-4 px-4 py-2 rounded-xl bg-brand-600 text-white text-xs font-bold">
                                Tampilkan Semua Produk
                            </a>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
                            @foreach ($produks as $prod)
                                <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 80 }}"
                                    class="relative rounded-2xl border border-slate-200 bg-white overflow-hidden hover:border-brand-400 hover:shadow-2xl hover:scale-150 hover:z-20 transition-transform  duration-500 ease-out flex flex-col justify-between group">
                                    <div>
                                        <!-- Card Image & Overlay -->
                                        <div class="h-44 bg-slate-100 relative overflow-hidden">
                                            <img src="{{ $prod->image_url }}" alt="{{ $prod->Nama_produk }}"
                                                class="w-full h-full object-cover">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-black/20">
                                            </div>

                                            <div class="absolute top-2.5 left-2.5 z-10">
                                                <span
                                                    class="px-2 py-0.5 rounded-lg bg-slate-900/80 backdrop-blur-md text-white text-[9px] font-bold uppercase tracking-wider border border-white/10">
                                                    {{ $prod->kategori->Nama_kategori ?? 'Desain' }}
                                                </span>
                                            </div>

                                            <div
                                                class="absolute bottom-2.5 left-2.5 right-2.5 flex items-center justify-between text-[10px] text-white/90 z-10">
                                                <span
                                                    class="text-amber-400 font-bold flex items-center space-x-1 drop-shadow">
                                                    <iconify-icon icon="material-symbols:star-rounded"
                                                        class="text-amber-400 text-sm"></iconify-icon>
                                                    <span>{{ number_format($prod->average_rating, 1) }}</span>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Card Info -->
                                        <div class="p-4">
                                            <h3
                                                class="text-xs sm:text-sm font-bold text-slate-900 line-clamp-1 group-hover:text-brand-600 transition-colors">
                                                <a href="{{ route('products.show', $prod->Id_produk) }}">
                                                    {{ $prod->Nama_produk }}
                                                </a>
                                            </h3>
                                            <p class="text-[11px] text-slate-500 mt-1 line-clamp-2 leading-relaxed">
                                                {{ $prod->Des_produk }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="p-4 pt-0 flex items-center space-x-2">
                                        <a href="{{ route('products.show', $prod->Id_produk) }}"
                                            class="flex-1 py-1.5 text-center text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors">
                                            Detail
                                        </a>
                                        <a href="{{ $prod->whatsapp_link }}" target="_blank"
                                            class="flex-1 inline-flex items-center justify-center space-x-1 py-1.5 text-center text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-xl shadow-sm transition-all">
                                            <iconify-icon icon="simple-icons:whatsapp" class="text-xs"></iconify-icon>
                                            <span>Pesan</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div data-aos="fade-up" class="mt-10">
                            {{ $produks->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
