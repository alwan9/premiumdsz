@extends('layouts.app')

@section('title', 'Jasa Desain Grafis Profesional & Marketplace Desain Custom - Premium Designz')
@section('meta_description',
    'Penyedia jasa desain grafis profesional & marketplace visual terpercaya: jasa desain logo
    brand, kemasan box, standing pouch snack, banner wisuda & promosi UMKM, UI/UX Figma, slide PPT presentasi, CV lamaran,
    dan apparel jersey custom.')
@section('meta_keywords',
    'jasa desain grafis, jasa desain logo, jasa desain kemasan, jasa desain banner, jasa desain
    banner wisuda, jasa desain banner umkm, jasa desain cv, jasa desain ppt, jasa desain ui ux, jasa desain jersey, jasa
    desain label, premium designz')

@section('content')

    <!-- HERO SECTION -->
    <section
        class="relative bg-gradient-to-b from-brand-50/50 via-white to-white pt-16 pb-20 md:pt-24 md:pb-28 border-b border-zinc-100 overflow-hidden">
        <!-- Grid Pattern Overlay -->
        <div class="hero-grid-pattern absolute inset-0 pointer-events-none z-0"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center space-y-6">
                <!-- Label Pill -->

                <!-- Main Title -->
                <h1 data-aos="fade-up" data-aos-delay="100"
                    class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-zinc-900 tracking-tight font-heading leading-tight">
                    {{ $setting->Judul ?? 'Solusi Desain Visual Profesional untuk Meningkatkan Kredibilitas Brand' }}
                </h1>

                <!-- Subtitle -->
                <p data-aos="fade-up" data-aos-delay="200"
                    class="text-sm sm:text-base text-zinc-600 leading-relaxed max-w-2xl mx-auto">
                    {{ $setting->Deskripsi ?? 'Jelajahi katalog karya portofolio, pilih paket desain siap pakai, atau konsultasikan kebutuhan kustom langsung dengan tim desainer kami.' }}
                </p>

                <!-- Action Buttons -->
                <div data-aos="fade-up" data-aos-delay="300"
                    class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="{{ route('portofolio.index') }}"
                        class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-7 py-3.5 rounded-xl bg-brand-gradient hover:brightness-110 text-white text-xs font-bold uppercase tracking-wider shadow-md shadow-brand-700/20 transition-all">
                        <iconify-icon icon="lucide:image" class="text-sm"></iconify-icon>
                        <span>Galeri Portofolio</span>
                    </a>
                    <a href="{{ route('marketplace.index') }}"
                        class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-7 py-3.5 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-bold uppercase tracking-wider transition-all">
                        <span>Katalog Jasa</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                    </a>
                    <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin konsultasi kebutuhan desain.') }}"
                        target="_blank"
                        class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-7 py-3.5 rounded-xl bg-zinc-100 hover:bg-zinc-200 text-zinc-800 text-xs font-bold uppercase tracking-wider transition-all">
                        <iconify-icon icon="simple-icons:whatsapp" class="text-brand-600 text-base"></iconify-icon>
                        <span>WhatsApp</span>
                    </a>
                </div>

                <!-- Trust Stats Summary -->
                <div data-aos="fade-up" data-aos-delay="400"
                    class="pt-10 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-2xl mx-auto text-center border-t border-zinc-100">
                    <div>
                        <p class="text-2xl font-bold text-zinc-900 font-heading">{{ $produks->count() }}+</p>
                        <p class="text-xs text-zinc-500 mt-0.5">Karya & Produk</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-zinc-900 font-heading">{{ $kategoris->count() }}</p>
                        <p class="text-xs text-zinc-500 mt-0.5">Kategori Jasa</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-zinc-900 font-heading flex items-center justify-center gap-1">
                            {{ number_format($averageRating, 1) }} <iconify-icon icon="material-symbols:star-rounded"
                                class="text-amber-400 text-2xl"></iconify-icon></p>
                        <p class="text-xs text-zinc-500 mt-0.5">Rating Klien</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-emerald-600 font-heading">100%</p>
                        <p class="text-xs text-zinc-500 mt-0.5">Garansi File Master</p>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- SECTION: PROMO & PENAWARAN SPESIAL (Dynamic from Database) -->
    @if (isset($promos) && $promos->isNotEmpty())
        <section
            class="py-12 md:py-16 bg-gradient-to-b from-white via-brand-50/20 to-white border-b border-zinc-100 overflow-hidden"
            id="promo-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header with controls -->
                <div data-aos="fade-up" class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
                    <div>

                        <h2 class="text-2xl sm:text-3xl font-extrabold text-zinc-900 font-heading tracking-tight">
                            Promo &amp; Penawaran Eksklusif
                        </h2>
                        <p class="text-xs sm:text-sm text-zinc-500 mt-1">
                            Manfaatkan penawaran khusus dan diskon paket desain pilihan untuk mendongkrak penjualan brand
                            Anda.
                        </p>
                    </div>

                    <!-- Promo Slider Controls -->
                    <div class="flex items-center space-x-2 self-start sm:self-end">
                        <button type="button" onclick="slidePromo('prev')" aria-label="Promo Sebelumnya"
                            class="w-10 h-10 rounded-xl bg-white hover:bg-brand-600 border border-zinc-200 hover:border-brand-600 text-zinc-700 hover:text-white shadow-sm flex items-center justify-center transition-all">
                            <iconify-icon icon="lucide:chevron-left" class="text-lg"></iconify-icon>
                        </button>
                        <button type="button" onclick="slidePromo('next')" aria-label="Promo Berikutnya"
                            class="w-10 h-10 rounded-xl bg-white hover:bg-brand-600 border border-zinc-200 hover:border-brand-600 text-zinc-700 hover:text-white shadow-sm flex items-center justify-center transition-all">
                            <iconify-icon icon="lucide:chevron-right" class="text-lg"></iconify-icon>
                        </button>
                    </div>
                </div>

                <!-- Promo Horizontal Slider Track (Pure Banner Images) -->
                <div data-aos="fade-up" data-aos-delay="100" class="relative">
                    <div id="promoSliderTrack"
                        class="flex space-x-4 sm:space-x-6 overflow-x-auto scroll-smooth snap-x snap-mandatory py-2 px-1 no-scrollbar"
                        style="scrollbar-width: none; -ms-overflow-style: none;">
                        @foreach ($promos as $promo)
                            <div class="snap-start shrink-0 w-[85vw] sm:w-[380px] lg:w-[400px] group">
                                <a href="{{ $promo->target_url }}" target="_blank"
                                    class="block rounded-2xl overflow-hidden border border-zinc-200 bg-zinc-100 hover:border-brand-500 shadow-sm hover:shadow-md transition-all duration-200 aspect-[16/9]">
                                    <img src="{{ $promo->image_url }}" alt="{{ $promo->Judul ?? 'Promo Desain' }}"
                                        class="w-full h-full object-cover">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- SECTION: KEUNGGULAN (2-Column Layout: Left Clean Image asset1.png & Right Structured Text) -->
    <section class="py-16 md:py-24 bg-white border-b border-zinc-100 overflow-hidden" id="keunggulan">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                <!-- SISI KIRI: Clean Image asset1.png (Tanpa shadow, efek, dan tanpa floating badge) -->
                <div data-aos="fade-right" data-aos-duration="600" class="lg:col-span-5 flex items-center justify-center">
                    <img src="{{ asset('assets/other/asset1.png') }}" alt="Keunggulan Layanan Premium Design"
                        class="w-full max-w-[600px] lg:max-w-full h-auto object-contain">
                </div>

                <!-- SISI KANAN: Teks Penjelasan Keunggulan -->
                <div data-aos="fade-left" data-aos-duration="600" class="lg:col-span-7 space-y-6">
                    <div>

                        <h2
                            class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-zinc-900 mt-3 font-heading leading-tight tracking-tight">
                            Standar Desain Visual Profesional untuk Meningkatkan Nilai Brand
                        </h2>
                        <p class="text-xs sm:text-sm text-zinc-600 mt-3 leading-relaxed">
                            Kami menggabungkan kreativitas orisinal, ketelitian teknis, dan pemahaman identitas pasar untuk
                            menghasilkan karya desain yang memikat konsumen serta memperkuat posisi bisnis Anda.
                        </p>
                    </div>

                    <!-- Feature Points List (Icon Centang + Teks Judul) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 pt-2">
                        <!-- Point 1 -->
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-zinc-900">Desain Orisinal &amp;
                                Eksklusif</span>
                        </div>

                        <!-- Point 2 -->
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-zinc-900">File Master Lengkap Siap
                                Pakai</span>
                        </div>

                        <!-- Point 3 -->
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-zinc-900">Pengerjaan Cepat &amp; Tepat
                                Waktu</span>
                        </div>

                        <!-- Point 4 -->
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-zinc-900">Komunikasi WhatsApp Cepat</span>
                        </div>
                    </div>

                    <!-- Bottom CTA Buttons -->
                    <div class="pt-2 flex flex-wrap items-center gap-3">
                        <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin konsultasi kebutuhan desain.') }}"
                            target="_blank"
                            class="inline-flex items-center space-x-2 px-6 py-3.5 rounded-xl bg-brand-gradient hover:brightness-110 text-white text-xs font-bold uppercase tracking-wider shadow-md shadow-brand-700/20 transition-all">
                            <iconify-icon icon="simple-icons:whatsapp" class="text-base"></iconify-icon>
                            <span>Konsultasi Sekarang</span>
                        </a>
                        <a href="{{ route('portofolio.index') }}"
                            class="inline-flex items-center space-x-2 px-6 py-3.5 rounded-xl bg-zinc-100 hover:bg-zinc-200 text-zinc-800 text-xs font-bold uppercase tracking-wider transition-all">
                            <span>Lihat Galeri Portofolio</span>
                            <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: PREVIEW KATEGORI DESAIN (Dynamic Auto-Scroll + Popup Modal) -->
    <section class="py-16 bg-zinc-50 border-b border-zinc-100 overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="flex flex-col sm:flex-row sm:items-end justify-between mb-8">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Eksplorasi Jasa</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-zinc-900 mt-1 font-heading">Kategori Desain Pilihan</h2>
                </div>
                <div class="mt-3 sm:mt-0 flex items-center gap-3">
                    <button type="button" onclick="openCategoryModal()"
                        class="inline-flex items-center space-x-1.5 px-4 py-2 rounded-xl bg-white border border-zinc-200/80 hover:border-brand-500 text-xs font-bold text-brand-600 hover:text-brand-800 shadow-sm hover:shadow transition-all group">
                        <iconify-icon icon="lucide:layout-grid" class="text-sm text-brand-500 group-hover:scale-110 transition-transform"></iconify-icon>
                        <span>Lihat Semua Kategori</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Marquee Carousel Track Container -->
        <div class="relative w-full overflow-hidden py-2" data-aos="fade-up" data-aos-delay="100">
            <!-- Left & Right Gradient Shadows for seamless look -->
            <div class="pointer-events-none absolute left-0 top-0 bottom-0 w-12 sm:w-24 bg-gradient-to-r from-zinc-50 via-zinc-50/80 to-transparent z-10"></div>
            <div class="pointer-events-none absolute right-0 top-0 bottom-0 w-12 sm:w-24 bg-gradient-to-l from-zinc-50 via-zinc-50/80 to-transparent z-10"></div>

            <div class="category-marquee-track flex gap-4 w-max">
                {{-- Loop Set 1 --}}
                @foreach ($kategoris as $kat)
                    <a href="{{ route('marketplace.index', ['kategori' => $kat->Id_kategori]) }}"
                        class="w-48 sm:w-56 shrink-0 p-3.5 sm:p-4 rounded-2xl bg-white border border-zinc-200/80 hover:border-brand-500 hover:shadow-md transition-all group flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-lg shrink-0 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                            <iconify-icon icon="{{ $kat->icon_name }}"></iconify-icon>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3
                                class="text-xs sm:text-sm font-bold text-zinc-800 group-hover:text-brand-600 transition-colors truncate">
                                {{ $kat->Nama_kategori }}
                            </h3>
                        </div>
                        <iconify-icon icon="lucide:arrow-right"
                            class="text-xs text-zinc-300 group-hover:text-brand-600 group-hover:translate-x-1 transition-all shrink-0"></iconify-icon>
                    </a>
                @endforeach

                {{-- Loop Set 2 (for seamless loop) --}}
                @foreach ($kategoris as $kat)
                    <a href="{{ route('marketplace.index', ['kategori' => $kat->Id_kategori]) }}"
                        aria-hidden="true"
                        class="w-48 sm:w-56 shrink-0 p-3.5 sm:p-4 rounded-2xl bg-white border border-zinc-200/80 hover:border-brand-500 hover:shadow-md transition-all group flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-lg shrink-0 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                            <iconify-icon icon="{{ $kat->icon_name }}"></iconify-icon>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3
                                class="text-xs sm:text-sm font-bold text-zinc-800 group-hover:text-brand-600 transition-colors truncate">
                                {{ $kat->Nama_kategori }}
                            </h3>
                        </div>
                        <iconify-icon icon="lucide:arrow-right"
                            class="text-xs text-zinc-300 group-hover:text-brand-600 group-hover:translate-x-1 transition-all shrink-0"></iconify-icon>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- POPUP MODAL: SEMUA KATEGORI -->
    <div id="categoryModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 transition-all duration-300" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div onclick="closeCategoryModal()" class="fixed inset-0 bg-zinc-950/60 backdrop-blur-sm transition-opacity"></div>

        <!-- Modal Card -->
        <div id="categoryModalCard"
            class="relative bg-white rounded-3xl max-w-4xl w-full max-h-[85vh] flex flex-col shadow-2xl border border-zinc-100 overflow-hidden z-10 transform scale-95 opacity-0 transition-all duration-200">
            <!-- Header -->
            <div class="p-6 pb-4 border-b border-zinc-100 flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Daftar Lengkap</span>
                    <h3 id="modal-title" class="text-xl sm:text-2xl font-bold text-zinc-900 font-heading">Semua Kategori Desain</h3>
                    <p class="text-xs text-zinc-500 mt-0.5">Pilih kategori untuk melihat semua karya dan layanan terkait</p>
                </div>
                <button type="button" onclick="closeCategoryModal()"
                    class="w-9 h-9 rounded-full bg-zinc-100 hover:bg-zinc-200 text-zinc-600 flex items-center justify-center transition-colors">
                    <iconify-icon icon="lucide:x" class="text-lg"></iconify-icon>
                </button>
            </div>

            <!-- Search Bar inside Modal -->
            <div class="px-6 pt-4 pb-2">
                <div class="relative">
                    <iconify-icon icon="lucide:search" class="absolute left-3.5 top-1/2 -translate-y-1/2 text-zinc-400 text-base"></iconify-icon>
                    <input type="text" id="modalCategorySearch" placeholder="Cari kategori desain..." oninput="filterModalCategories(this.value)"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-zinc-50 border border-zinc-200 text-xs sm:text-sm text-zinc-800 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                </div>
            </div>

            <!-- Grid Content -->
            <div class="p-6 overflow-y-auto flex-1">
                <div id="modalCategoryGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                    @foreach ($kategoris as $kat)
                        <a href="{{ route('marketplace.index', ['kategori' => $kat->Id_kategori]) }}"
                            data-catname="{{ strtolower($kat->Nama_kategori) }}"
                            class="modal-cat-card p-3.5 rounded-2xl bg-zinc-50 hover:bg-white border border-zinc-200/80 hover:border-brand-500 hover:shadow-md transition-all group flex items-center gap-3">
                            <div
                                class="w-9 h-9 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-base shrink-0 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                                <iconify-icon icon="{{ $kat->icon_name }}"></iconify-icon>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-xs sm:text-sm font-bold text-zinc-800 group-hover:text-brand-600 transition-colors truncate">
                                    {{ $kat->Nama_kategori }}
                                </h4>
                            </div>
                            <iconify-icon icon="lucide:arrow-right" class="text-xs text-zinc-300 group-hover:text-brand-600 group-hover:translate-x-0.5 transition-all shrink-0"></iconify-icon>
                        </a>
                    @endforeach
                </div>

                <div id="modalCategoryEmpty" class="hidden text-center py-12 text-zinc-400">
                    <iconify-icon icon="lucide:folder-search" class="text-4xl text-zinc-300 mb-2"></iconify-icon>
                    <p class="text-xs sm:text-sm">Kategori yang Anda cari tidak ditemukan.</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-4 px-6 bg-zinc-50 border-t border-zinc-100 flex items-center justify-between">
                <span class="text-xs text-zinc-500">Total <strong>{{ $kategoris->count() }}</strong> Kategori</span>
                <a href="{{ route('marketplace.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-800 flex items-center gap-1">
                    <span>Buka Marketplace</span>
                    <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                </a>
            </div>
        </div>
    </div>

    <!-- Marquee & Modal Scripts & Styles -->
    <style>
        @keyframes categoryScrollLeft {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        .category-marquee-track {
            animation: categoryScrollLeft 35s linear infinite;
        }

        .category-marquee-track:hover {
            animation-play-state: paused;
        }
    </style>

    <script>
        function openCategoryModal() {
            const modal = document.getElementById('categoryModal');
            const card = document.getElementById('categoryModalCard');
            const searchInput = document.getElementById('modalCategorySearch');
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            
            setTimeout(() => {
                card.classList.remove('scale-95', 'opacity-0');
                card.classList.add('scale-100', 'opacity-100');
                if (searchInput) searchInput.focus();
            }, 20);
        }

        function closeCategoryModal() {
            const modal = document.getElementById('categoryModal');
            const card = document.getElementById('categoryModalCard');
            
            card.classList.remove('scale-100', 'opacity-100');
            card.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 200);
        }

        function filterModalCategories(query) {
            const term = query.toLowerCase().trim();
            const cards = document.querySelectorAll('.modal-cat-card');
            const emptyState = document.getElementById('modalCategoryEmpty');
            let visibleCount = 0;

            cards.forEach(card => {
                const name = card.getAttribute('data-catname') || '';
                if (name.includes(term)) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }

        // Close modal on Escape key press
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('categoryModal');
                if (modal && !modal.classList.contains('hidden')) {
                    closeCategoryModal();
                }
            }
        });
    </script>

    <!-- SECTION: PREVIEW PORTOFOLIO & MARKETPLACE (Dynamic from Database) -->
    <section class="py-20 bg-white border-b border-zinc-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="flex flex-col sm:flex-row sm:items-end justify-between mb-12">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Portofolio & Marketplace</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-zinc-900 mt-1 font-heading">Katalog Karya Desain Pilihan
                    </h2>
                    <p class="text-xs sm:text-sm text-zinc-500 mt-1">Koleksi proyek desain terbaru yang siap dipesan atau
                        dikustomisasi.</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('marketplace.index') }}"
                        class="inline-flex items-center space-x-1.5 px-4 py-2 rounded-xl bg-zinc-100 hover:bg-zinc-200 text-zinc-700 text-xs font-bold transition-colors">
                        <span>Buka Semua Produk</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Product Cards Grid (4 Columns Desktop, Scale 115% Duration 200 on Hover) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($produks->take(8) as $prod)
                    <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 100 }}"
                        class="relative rounded-2xl border border-zinc-200 bg-white overflow-hidden hover:border-brand-400 hover:shadow-2xl transform hover:scale-[1.15] hover:z-20 transition-all duration-200 ease-out flex flex-col justify-between group">
                        <div>
                            <!-- Product Thumbnail Image & Badge Overlay (Aspect Ratio 1:1) -->
                            <div class="aspect-square bg-zinc-900 relative overflow-hidden">
                                <img src="{{ $prod->image_url }}" alt="{{ $prod->Nama_produk }}"
                                    class="w-full h-full object-cover transition-all duration-200 ease-out group-hover:brightness-90">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-zinc-950/80 via-transparent to-black/20">
                                </div>
                                <!-- Subtle darkening overlay on hover -->
                                <div
                                    class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-200 pointer-events-none">
                                </div>

                                <div class="absolute top-3 left-3 z-10">
                                    <span
                                        class="px-2.5 py-1 rounded-lg bg-zinc-900/80 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider border border-white/10">
                                        {{ $prod->kategori->Nama_kategori ?? 'Desain' }}
                                    </span>
                                </div>

                                <div
                                    class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-[11px] text-white/90 z-10">
                                    <span class="text-amber-400 font-bold flex items-center space-x-1 drop-shadow">
                                        <iconify-icon icon="material-symbols:star-rounded"
                                            class="text-amber-400 text-sm"></iconify-icon>
                                        <span>{{ number_format($prod->average_rating, 1) }}</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Content Info -->
                            <div class="p-5 group-hover:bg-zinc-50 transition-colors duration-200">
                                <h3
                                    class="text-xs sm:text-sm font-bold text-zinc-900 line-clamp-1 group-hover:text-brand-600 transition-colors">
                                    <a href="{{ route('products.show', $prod->Id_produk) }}">
                                        {{ $prod->Nama_produk }}
                                    </a>
                                </h3>
                                <p class="text-[11px] text-zinc-500 mt-1.5 line-clamp-2 leading-relaxed">
                                    {{ $prod->Des_produk }}
                                </p>
                            </div>
                        </div>

                        <!-- Card Actions -->
                        <div
                            class="p-5 pt-0 flex items-center space-x-2 group-hover:bg-zinc-50 transition-colors duration-200">
                            <a href="{{ route('products.show', $prod->Id_produk) }}"
                                class="flex-1 py-2 text-center text-xs font-bold text-zinc-700 bg-zinc-100 hover:bg-zinc-200 rounded-xl transition-colors">
                                Detail
                            </a>
                            <a href="{{ $prod->whatsapp_link }}" target="_blank"
                                class="flex-1 inline-flex items-center justify-center space-x-1.5 py-2 text-center text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-xl shadow-sm transition-all">
                                <iconify-icon icon="simple-icons:whatsapp" class="text-sm"></iconify-icon>
                                <span>Pesan</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION: RATING & TESTIMONIALS (Clean Reviews) -->
    <!-- SECTION: RATING & TESTIMONIALS (Dynamic Portrait Sliders & Bukti Klien) -->
    <section class="py-20 bg-zinc-50 border-b border-zinc-100 overflow-hidden" id="testimoni">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section with Prev/Next Controls -->
            <div data-aos="fade-up" class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Bukti Screenshot & Kepuasan
                        Klien</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-zinc-900 mt-1 font-heading">Testimoni Nyata Portofolio
                    </h2>
                    <p class="text-xs sm:text-sm text-zinc-500 mt-1">Geser untuk melihat bukti screenshot review chat &
                        kepuasan hasil desain klien.</p>
                </div>

                <div class="flex items-center justify-between md:justify-end space-x-4">
                    <!-- Rating summary pill with 5 Full Golden Stars -->
                    <div
                        class="flex items-center space-x-3 py-2 px-3.5 bg-white rounded-2xl border border-zinc-200 shadow-sm shrink-0">
                        <span class="text-xl font-black text-zinc-900 font-heading">5.0</span>
                        <div class="flex text-amber-400 space-x-0.5 text-xs">
                            <iconify-icon icon="material-symbols:star-rounded"
                                class="text-amber-400 text-sm"></iconify-icon>
                            <iconify-icon icon="material-symbols:star-rounded"
                                class="text-amber-400 text-sm"></iconify-icon>
                            <iconify-icon icon="material-symbols:star-rounded"
                                class="text-amber-400 text-sm"></iconify-icon>
                            <iconify-icon icon="material-symbols:star-rounded"
                                class="text-amber-400 text-sm"></iconify-icon>
                            <iconify-icon icon="material-symbols:star-rounded"
                                class="text-amber-400 text-sm"></iconify-icon>
                        </div>
                        <span class="text-[11px] text-zinc-400 font-medium">({{ $totalReviews }} Review)</span>
                    </div>

                    <!-- Slider Arrow Buttons -->
                    <div class="flex items-center space-x-2">
                        <button type="button" onclick="slideTesti('prev')" aria-label="Previous Slide"
                            class="w-10 h-10 rounded-xl bg-white hover:bg-brand-600 border border-zinc-200 hover:border-brand-600 text-zinc-700 hover:text-white shadow-sm flex items-center justify-center transition-all">
                            <iconify-icon icon="lucide:chevron-left" class="text-lg"></iconify-icon>
                        </button>
                        <button type="button" onclick="slideTesti('next')" aria-label="Next Slide"
                            class="w-10 h-10 rounded-xl bg-white hover:bg-brand-600 border border-zinc-200 hover:border-brand-600 text-zinc-700 hover:text-white shadow-sm flex items-center justify-center transition-all">
                            <iconify-icon icon="lucide:chevron-right" class="text-lg"></iconify-icon>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Dynamic Portrait Slider Track with Auto Slide -->
            <div data-aos="fade-up" data-aos-delay="150" class="relative">
                <div id="testiSliderTrack"
                    class="flex space-x-4 sm:space-x-6 overflow-x-auto scroll-smooth snap-x snap-mandatory py-3 px-1 no-scrollbar"
                    style="scrollbar-width: none; -ms-overflow-style: none;">
                    @foreach ($testimonis as $testi)
                        <div class="snap-start shrink-0 w-[80vw] sm:w-[42vw] md:w-[30vw] lg:w-[22vw] max-w-[320px] group">
                            <div
                                class="bg-white rounded-2xl border border-zinc-200 hover:border-brand-300 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                                <!-- Portrait Aspect Image Container (Rasio Potret Vertikal Screenshot) -->
                                <div class="relative aspect-[9/14] sm:aspect-[9/15] bg-zinc-100 overflow-hidden cursor-pointer"
                                    onclick="openTestiLightbox('{{ $testi->image_url }}', '{{ addslashes($testi->display_title) }}')">
                                    <img src="{{ $testi->image_url }}" alt="{{ $testi->display_title }}"
                                        class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">

                                    <!-- Hover Overlay with Zoom Icon -->
                                    <div
                                        class="absolute inset-0 bg-zinc-950/25 group-hover:bg-zinc-950/45 transition-colors flex items-center justify-center opacity-0 group-hover:opacity-100 backdrop-blur-[1px]">
                                        <span
                                            class="px-3.5 py-2 bg-white/95 backdrop-blur text-zinc-900 rounded-xl text-xs font-bold shadow-xl flex items-center space-x-1.5 transform translate-y-2 group-hover:translate-y-0 transition-all">
                                            <iconify-icon icon="lucide:zoom-in"
                                                class="text-base text-brand-600"></iconify-icon>
                                            <span>Buka Foto Penuh</span>
                                        </span>
                                    </div>

                                    <!-- Top Right 5 Full Stars Solid Gold Badge -->

                                </div>

                                <!-- Card Bottom Info with 5 Stars -->
                                <div class="p-3.5 bg-white border-t border-zinc-100 space-y-1.5">
                                    <div class="flex items-center">
                                        <div class="flex text-amber-400 space-x-0.5">
                                            <iconify-icon icon="material-symbols:star-rounded"
                                                class="text-amber-400 text-xs"></iconify-icon>
                                            <iconify-icon icon="material-symbols:star-rounded"
                                                class="text-amber-400 text-xs"></iconify-icon>
                                            <iconify-icon icon="material-symbols:star-rounded"
                                                class="text-amber-400 text-xs"></iconify-icon>
                                            <iconify-icon icon="material-symbols:star-rounded"
                                                class="text-amber-400 text-xs"></iconify-icon>
                                            <iconify-icon icon="material-symbols:star-rounded"
                                                class="text-amber-400 text-xs"></iconify-icon>
                                        </div>
                                    </div>

                                    <h3 class="text-xs font-bold text-zinc-900 truncate font-heading"
                                        title="{{ $testi->display_title }}">
                                        {{ $testi->display_title }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Mobile Swipe Hint / Indicator -->
            <div class="mt-6 flex items-center justify-center space-x-2 text-xs text-zinc-400 sm:hidden">
                <iconify-icon icon="lucide:move-horizontal" class="text-sm"></iconify-icon>
                <span>Geser ke samping untuk melihat lainnya</span>
            </div>
        </div>
    </section>

    <!-- Testimoni Image Lightbox Modal -->
    <div id="testiLightboxModal"
        class="fixed inset-0 z-50 bg-zinc-950/85 backdrop-blur-sm hidden items-center justify-center p-3 sm:p-6 transition-opacity"
        onclick="closeTestiLightbox()">
        <div class="relative max-w-xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl animate-in fade-in zoom-in duration-200"
            onclick="event.stopPropagation()">
            <div class="p-4 border-b border-zinc-100 flex items-center justify-between bg-zinc-50">
                <h3 id="testiLightboxTitle" class="text-xs sm:text-sm font-bold text-zinc-900 font-heading truncate pr-4">
                    Bukti Testimoni Klien
                </h3>
                <button type="button" onclick="closeTestiLightbox()"
                    class="w-8 h-8 rounded-lg bg-zinc-200 hover:bg-zinc-300 text-zinc-700 flex items-center justify-center transition-colors">
                    <iconify-icon icon="lucide:x" class="text-base"></iconify-icon>
                </button>
            </div>
            <div class="p-3 sm:p-4 bg-zinc-950 flex items-center justify-center max-h-[82vh] overflow-y-auto">
                <img id="testiLightboxImg" src="" alt="Bukti Testimoni"
                    class="max-h-[76vh] max-w-full rounded-lg object-contain shadow-lg">
            </div>
        </div>
    </div>

    <script>
        let autoSlideInterval = null;
        let promoAutoSlideInterval = null;

        // Promo Slider Functions
        function slidePromo(direction) {
            const track = document.getElementById('promoSliderTrack');
            if (!track) return;
            const cardWidth = track.querySelector('.snap-start')?.offsetWidth || 340;
            const scrollAmount = (cardWidth + 20) * (direction === 'next' ? 1 : -1);

            if (direction === 'next' && track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
                track.scrollTo({
                    left: 0,
                    behavior: 'smooth'
                });
            } else if (direction === 'prev' && track.scrollLeft <= 5) {
                track.scrollTo({
                    left: track.scrollWidth,
                    behavior: 'smooth'
                });
            } else {
                track.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        }

        function startPromoAutoSlide() {
            if (promoAutoSlideInterval) clearInterval(promoAutoSlideInterval);
            promoAutoSlideInterval = setInterval(function() {
                slidePromo('next');
            }, 4000);
        }

        function stopPromoAutoSlide() {
            if (promoAutoSlideInterval) {
                clearInterval(promoAutoSlideInterval);
                promoAutoSlideInterval = null;
            }
        }

        // Testimoni Slider Functions
        function slideTesti(direction) {
            const track = document.getElementById('testiSliderTrack');
            if (!track) return;
            const cardWidth = track.querySelector('.snap-start')?.offsetWidth || 280;
            const scrollAmount = (cardWidth + 24) * (direction === 'next' ? 1 : -1);

            // If at the end and sliding next, smoothly loop back to beginning
            if (direction === 'next' && track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
                track.scrollTo({
                    left: 0,
                    behavior: 'smooth'
                });
            } else if (direction === 'prev' && track.scrollLeft <= 5) {
                track.scrollTo({
                    left: track.scrollWidth,
                    behavior: 'smooth'
                });
            } else {
                track.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        }

        function startAutoSlide() {
            if (autoSlideInterval) clearInterval(autoSlideInterval);
            autoSlideInterval = setInterval(function() {
                slideTesti('next');
            }, 3200); // Geser perlahan dan halus setiap 3.2 detik
        }

        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
                autoSlideInterval = null;
            }
        }

        // Initialize slider & pause on user hover / touch
        document.addEventListener('DOMContentLoaded', function() {
            // Testimoni slider listener
            const track = document.getElementById('testiSliderTrack');
            if (track) {
                startAutoSlide();
                track.addEventListener('mouseenter', stopAutoSlide);
                track.addEventListener('mouseleave', startAutoSlide);
                track.addEventListener('touchstart', stopAutoSlide, {
                    passive: true
                });
                track.addEventListener('touchend', function() {
                    setTimeout(startAutoSlide, 2000);
                }, {
                    passive: true
                });
            }

            // Promo slider listener
            const promoTrack = document.getElementById('promoSliderTrack');
            if (promoTrack) {
                startPromoAutoSlide();
                promoTrack.addEventListener('mouseenter', stopPromoAutoSlide);
                promoTrack.addEventListener('mouseleave', startPromoAutoSlide);
                promoTrack.addEventListener('touchstart', stopPromoAutoSlide, {
                    passive: true
                });
                promoTrack.addEventListener('touchend', function() {
                    setTimeout(startPromoAutoSlide, 2000);
                }, {
                    passive: true
                });
            }
        });

        function openTestiLightbox(url, title) {
            stopAutoSlide();
            const modal = document.getElementById('testiLightboxModal');
            const img = document.getElementById('testiLightboxImg');
            const titleEl = document.getElementById('testiLightboxTitle');
            if (modal && img) {
                img.src = url;
                if (titleEl) titleEl.textContent = title || 'Bukti Testimoni Klien';
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeTestiLightbox() {
            const modal = document.getElementById('testiLightboxModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
                startAutoSlide();
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeTestiLightbox();
        });
    </script>

    <!-- SECTION: CALL TO ACTION BANNER (Vibrant Brand Gradient) -->
    <section class="py-16 bg-brand-gradient text-white overflow-hidden shadow-xl">
        <div data-aos="zoom-in" data-aos-duration="600"
            class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <h2 class="text-2xl sm:text-4xl font-bold font-heading">
                Siap Memulai Proyek Desain Anda Bersama Kami?
            </h2>
            <p class="text-xs sm:text-sm text-brand-100 max-w-xl mx-auto leading-relaxed">
                Diskusikan konsep merek, kebutuhan media promosi, atau desain kemasan Anda. Tim kami siap merespons dengan
                cepat melalui WhatsApp.
            </p>
            <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin konsultasi kebutuhan desain.') }}"
                    target="_blank"
                    class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-8 py-3.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-md shadow-brand-700/30">
                    <iconify-icon icon="simple-icons:whatsapp" class="text-base"></iconify-icon>
                    <span>Hubungi via WhatsApp</span>
                </a>
                <a href="{{ route('marketplace.index') }}"
                    class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-8 py-3.5 rounded-xl bg-white text-brand-700 hover:bg-brand-50 font-bold text-xs uppercase tracking-wider transition-all shadow-md">
                    <span>Eksplor Katalog Marketplace</span>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION: LANGKAH PEMESANAN (Left Order Steps & Right Image Asset 2) -->
    <section class="py-16 md:py-24 bg-zinc-50 border-t border-zinc-200/80 overflow-hidden" id="langkah-pemesanan">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                <!-- SISI KIRI: Materi Langkah Pemesanan -->
                <div data-aos="fade-right" data-aos-duration="600" class="lg:col-span-7 space-y-6">
                    <div>
                        <span
                            class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full   text-brand-700 text-xs font-bold uppercase tracking-wider">
                            <span>Langkah Pemesanan</span>
                        </span>
                        <h2
                            class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-zinc-900 mt-3 font-heading leading-tight tracking-tight">
                            Cara Mudah Pesan Desain
                        </h2>
                        <p class="text-xs sm:text-sm text-zinc-600 mt-2 leading-relaxed">
                            Proses pemesanan cepat dan anti ribet melalui 5 langkah simpel:
                        </p>
                    </div>

                    <!-- Steps Timeline / List -->
                    <div class="space-y-3.5 pt-1">
                        <!-- Step 1 -->
                        <div class="flex items-start space-x-3.5">
                            <div
                                class="w-7 h-7 rounded-xl bg-brand-600 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                                1
                            </div>
                            <div>
                                <h4 class="text-xs sm:text-sm font-bold text-zinc-900">Pilih Jenis Desain</h4>
                                <p class="text-[11px] text-zinc-500 mt-0.5">Pilih desain yang Anda butuhkan dari katalog
                                    produk kami.</p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex items-start space-x-3.5">
                            <div
                                class="w-7 h-7 rounded-xl bg-brand-600 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                                2
                            </div>
                            <div>
                                <h4 class="text-xs sm:text-sm font-bold text-zinc-900">Konsultasi via WhatsApp</h4>
                                <p class="text-[11px] text-zinc-500 mt-0.5">Kirimkan konsep, referensi gambar, atau teks
                                    yang ingin dibuat.</p>
                            </div>
                        </div>

                        <!-- Step 3: DP Awal -->
                        <div class="flex items-start space-x-3.5">
                            <div
                                class="w-7 h-7 rounded-xl bg-brand-600 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                                3
                            </div>
                            <div>
                                <h4 class="text-xs sm:text-sm font-bold text-zinc-900">Bayar DP Awal</h4>
                                <p class="text-[11px] text-zinc-500 mt-0.5">Lakukan pembayaran DP untuk langsung memulai
                                    antrean pengerjaan.</p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="flex items-start space-x-3.5">
                            <div
                                class="w-7 h-7 rounded-xl bg-brand-600 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                                4
                            </div>
                            <div>
                                <h4 class="text-xs sm:text-sm font-bold text-zinc-900">Pengerjaan &amp; Revisi</h4>
                                <p class="text-[11px] text-zinc-500 mt-0.5">Desain kami buat dan sesuaikan sampai hasilnya
                                    pas dengan keinginan Anda.</p>
                            </div>
                        </div>

                        <!-- Step 5 -->
                        <div class="flex items-start space-x-3.5">
                            <div
                                class="w-7 h-7 rounded-xl bg-brand-600 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                                5
                            </div>
                            <div>
                                <h4 class="text-xs sm:text-sm font-bold text-zinc-900">Pelunasan &amp; Terima File</h4>
                                <p class="text-[11px] text-zinc-500 mt-0.5">Lakukan pelunasan dan terima seluruh file
                                    master siap pakai (AI, PDF, PNG, dll).</p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="pt-3 flex flex-wrap items-center gap-3">
                        <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin mulai memesan jasa desain.') }}"
                            target="_blank"
                            class="inline-flex items-center space-x-2 px-6 py-3.5 rounded-xl bg-brand-gradient hover:brightness-110 text-white text-xs font-bold uppercase tracking-wider shadow-md shadow-brand-700/20 transition-all">
                            <iconify-icon icon="simple-icons:whatsapp" class="text-base"></iconify-icon>
                            <span>Pesan Sekarang via WhatsApp</span>
                        </a>
                        <a href="{{ route('marketplace.index') }}"
                            class="inline-flex items-center space-x-2 px-6 py-3.5 rounded-xl bg-white border border-zinc-200 hover:bg-zinc-100 text-zinc-800 text-xs font-bold uppercase tracking-wider transition-all">
                            <span>Katalog Layanan</span>
                            <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                        </a>
                    </div>
                </div>

                <!-- SISI KANAN: Image Asset 2 -->
                <div data-aos="fade-left" data-aos-duration="600" class="lg:col-span-5 flex items-center justify-center">
                    <img src="{{ asset('assets/other/asset2.jpg') }}" alt="Langkah Pemesanan Desain di Premium Design"
                        class="w-full max-w-[500px] lg:max-w-full h-auto object-contain rounded-2xl border border-zinc-200/80 shadow-sm">
                </div>
            </div>
        </div>
    </section>

@endsection
