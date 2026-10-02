@extends('layouts.app')

@section('title', 'Portofolio Desain Grafis & Galeri Karya Visual - Premium Designz')
@section('meta_description',
    'Jelajahi galeri portofolio desain grafis terlengkap: logo brand identity, kemasan
    packaging box, banner promosi, UI/UX website, poster, dan jersey custom.')

    @push('schema')
        <script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "CollectionPage",
    "name": "Galeri Portofolio Desain Grafis - Premium Designz",
    "description": "Koleksi hasil karya desain grafis profesional untuk branding bisnis, UMKM, packaging, UI/UX, dan media promosi.",
    "url": "{{ route('portofolio.index') }}"
}
</script>
    @endpush

@section('content')

    <!-- Hero Showcase Section -->
    <section class="relative bg-slate-900 text-white overflow-hidden py-16 sm:py-24 border-b border-slate-800">
        <!-- Glow Decorative Background -->
        <div class="absolute inset-0 bg-brand-gradient opacity-90"></div>
        <div class="absolute inset-0 hero-grid-pattern opacity-15"></div>
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-brand-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center space-y-6">


                <!-- Main Heading -->
                <h1 data-aos="fade-up" data-aos-delay="100"
                    class="text-3xl sm:text-5xl lg:text-6xl font-extrabold font-heading text-white tracking-tight leading-tight">
                    Eksplorasi Karya <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-white to-sky-200">Desain
                        Visual</span> Kami
                </h1>

                <!-- Subtitle -->
                <p data-aos="fade-up" data-aos-delay="150"
                    class="text-sm sm:text-base text-brand-100/90 max-w-2xl mx-auto leading-relaxed">
                    Lebih dari {{ $totalCount }}+ proyek desain grafis telah dipercaya oleh berbagai brand, UMKM,
                    korporat, dan kreator di seluruh Indonesia.
                </p>

                <!-- Search Bar -->
                <div data-aos="fade-up" data-aos-delay="200" class="pt-4 max-w-xl mx-auto">
                    <form action="{{ route('portofolio.index') }}" method="GET" class="relative flex items-center">
                        @if ($selectedKategori && $selectedKategori !== 'all')
                            <input type="hidden" name="kategori" value="{{ $selectedKategori }}">
                        @endif
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <iconify-icon icon="lucide:search" class="text-lg"></iconify-icon>
                        </div>
                        <input type="text" name="search" value="{{ $search }}"
                            placeholder="Cari karya desain (contoh: Logo, Box, Jersey, UI, Menu)..."
                            class="w-full pl-11 pr-28 py-3.5 bg-white/95 backdrop-blur-md text-slate-900 placeholder-slate-400 rounded-2xl text-xs sm:text-sm font-medium border border-white/20 shadow-xl focus:outline-none focus:ring-2 focus:ring-brand-400 transition-all">
                        <div class="absolute right-1.5 flex items-center space-x-1">
                            @if ($search)
                                <a href="{{ route('portofolio.index', ['kategori' => $selectedKategori]) }}"
                                    class="p-2 text-slate-400 hover:text-slate-600 rounded-xl hover:bg-slate-100 transition-colors"
                                    title="Reset Pencarian">
                                    <iconify-icon icon="lucide:x" class="text-base"></iconify-icon>
                                </a>
                            @endif
                            <button type="submit"
                                class="px-4 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold transition-colors shadow-sm">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </section>

    <!-- Simple Representative Category Filter Bar -->
    <section class="sticky top-20 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-start md:justify-center space-x-1.5 sm:space-x-2 overflow-x-auto no-scrollbar py-0.5 text-xs sm:text-sm font-semibold">
                <!-- All Categories -->
                <a href="{{ route('portofolio.index', ['search' => $search]) }}"
                    class="shrink-0 px-4 py-2 rounded-full transition-all duration-200 {{ empty($selectedKategori) || $selectedKategori === 'all' ? 'bg-slate-900 text-white shadow-sm font-bold' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-slate-900' }}">
                    Semua
                </a>

                @foreach ($kategoriCounts as $katName => $count)
                    <a href="{{ route('portofolio.index', ['kategori' => $katName, 'search' => $search]) }}"
                        class="shrink-0 px-4 py-2 rounded-full transition-all duration-200 {{ $selectedKategori === $katName ? 'bg-slate-900 text-white shadow-sm font-bold' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-slate-900' }}">
                        {{ $katName }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Main Portfolio Grid Section -->
    <section class="py-14 bg-white min-h-[500px]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Search / Filter State Header -->
            @if ($search || ($selectedKategori && $selectedKategori !== 'all'))
                <div
                    class="mb-8 p-4 rounded-2xl bg-slate-50 border border-slate-200/80 shadow-xs flex flex-wrap items-center justify-between gap-3">
                    <div class="flex items-center space-x-2 text-xs sm:text-sm text-slate-700">
                        <iconify-icon icon="lucide:filter" class="text-brand-600 text-lg"></iconify-icon>
                        <span>
                            Hasil filter:
                            @if ($selectedKategori && $selectedKategori !== 'all')
                                <strong class="text-brand-700">Kategori "{{ $selectedKategori }}"</strong>
                            @endif
                            @if ($search)
                                <span class="text-slate-400">|</span> Kata kunci: <strong
                                    class="text-brand-700">"{{ $search }}"</strong>
                            @endif
                            <span class="text-slate-500">({{ $portofolios->total() }} hasil ditemukan)</span>
                        </span>
                    </div>
                    <a href="{{ route('portofolio.index') }}"
                        class="text-xs font-bold text-rose-600 hover:text-rose-700 flex items-center space-x-1">
                        <iconify-icon icon="lucide:rotate-ccw"></iconify-icon>
                        <span>Reset Filter</span>
                    </a>
                </div>
            @endif

            @if ($portofolios->count() > 0)
                <!-- Pure Image Grid (5 Columns, Original Natural Aspect Ratio, Frameless, Hover Scale 1.15 & Zoom) -->
                <div class="columns-2 sm:columns-3 md:columns-4 lg:columns-5 gap-3 sm:gap-4 [column-fill:_balance] py-2">
                    @foreach ($portofolios as $index => $item)
                        <div data-aos="fade-up" data-aos-delay="{{ ($index % 5) * 35 }}"
                            class="break-inside-avoid mb-3 sm:mb-4 group relative rounded-2xl overflow-hidden bg-slate-900 cursor-zoom-in shadow-xs hover:shadow-2xl transform hover:scale-[1.15] hover:z-20 transition-all duration-200 ease-out"
                            onclick="openPortfolioZoom({{ $index }})">

                            <img src="{{ $item->image_url }}" alt="{{ $item->nama }}" loading="lazy"
                                class="w-full h-auto block transition-all duration-200 ease-out group-hover:brightness-90">

                            <!-- Subtle Darkening & Zoom Overlay Icon -->
                            <div
                                class="absolute inset-0 bg-slate-950/30 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center pointer-events-none">
                                <div
                                    class="w-10 h-10 rounded-full bg-white/95 backdrop-blur-sm text-slate-900 flex items-center justify-center shadow-lg transform scale-75 group-hover:scale-100 transition-transform duration-200">
                                    <iconify-icon icon="lucide:zoom-in" class="text-lg text-brand-600"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex items-center justify-center">
                    {{ $portofolios->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div data-aos="fade-up" class="max-w-md mx-auto text-center py-16 px-4 space-y-4">
                    <div
                        class="w-16 h-16 rounded-3xl bg-brand-50 text-brand-600 mx-auto flex items-center justify-center text-3xl">
                        <iconify-icon icon="lucide:image-off"></iconify-icon>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-base font-bold text-slate-900">Tidak ada karya yang cocok</h3>
                        <p class="text-xs text-slate-500">
                            Coba ubah kata kunci pencarian atau pilih kategori lain.
                        </p>
                    </div>
                    <a href="{{ route('portofolio.index') }}"
                        class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-brand-600 text-white text-xs font-bold hover:bg-brand-700 transition-colors shadow-sm">
                        <iconify-icon icon="lucide:refresh-cw"></iconify-icon>
                        <span>Tampilkan Semua Portofolio</span>
                    </a>
                </div>
            @endif

        </div>
    </section>

    <!-- Creative CTA Section -->
    <section class="py-16 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up"
                class="relative rounded-3xl bg-brand-gradient text-white p-8 sm:p-12 overflow-hidden shadow-2xl shadow-brand-700/20">
                <!-- Background Circles -->
                <div
                    class="absolute top-0 right-0 -mt-12 -mr-12 w-80 h-80 rounded-full bg-white/10 blur-2xl pointer-events-none">
                </div>
                <div
                    class="absolute bottom-0 left-0 -mb-12 -ml-12 w-80 h-80 rounded-full bg-indigo-900/30 blur-2xl pointer-events-none">
                </div>

                <div class="relative grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-8 space-y-4">
                        <span
                            class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full bg-white/15 text-[11px] font-bold tracking-wider uppercase text-brand-100">
                            <iconify-icon icon="lucide:sparkles" class="text-amber-300"></iconify-icon>
                            <span>Solusi Desain Kustom</span>
                        </span>
                        <h2 class="text-2xl sm:text-4xl font-extrabold font-heading text-white leading-tight">
                            Punya Konsep Desain Sendiri untuk Brand Anda?
                        </h2>
                        <p class="text-xs sm:text-sm text-brand-100/90 leading-relaxed max-w-2xl">
                            Konsultasikan kebutuhan logo, kemasan produk, banner promosi, UI/UX, maupun jersey custom
                            bersama tim desainer profesional kami. Revisi fleksibel, pengerjaan cepat, dan file master
                            lengkap siap cetak.
                        </p>
                    </div>

                    <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center lg:items-end">
                        <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya melihat galeri portofolio di website dan ingin konsultasi kebutuhan desain baru.') }}"
                            target="_blank"
                            class="w-full sm:w-auto lg:w-full inline-flex items-center justify-center space-x-2 px-6 py-3.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white text-xs sm:text-sm font-bold shadow-lg shadow-brand-700/30 transition-all">
                            <iconify-icon icon="simple-icons:whatsapp" class="text-lg"></iconify-icon>
                            <span>Konsultasi Gratis di WhatsApp</span>
                        </a>

                        <a href="{{ route('marketplace.index') }}"
                            class="w-full sm:w-auto lg:w-full inline-flex items-center justify-center space-x-2 px-6 py-3.5 rounded-xl bg-white/15 hover:bg-white/25 text-white border border-white/20 text-xs sm:text-sm font-bold transition-all">
                            <iconify-icon icon="lucide:shopping-bag" class="text-lg"></iconify-icon>
                            <span>Lihat Katalog Marketplace</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ultra-Clean Fullscreen Zoom Lightbox Modal -->
    <div id="portfolio-zoom-modal"
        class="fixed inset-0 z-50 hidden bg-slate-950/95 backdrop-blur-xl flex flex-col items-center justify-center transition-all duration-300 opacity-0">

        <!-- Top Toolbar Controls -->
        <div class="absolute top-0 inset-x-0 p-4 sm:p-6 flex items-center justify-between z-20 pointer-events-none">
            <!-- Image Counter -->
            <div
                class="pointer-events-auto px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-white text-xs font-semibold">
                <span id="zoom-index-counter">1</span> / <span>{{ $portofolios->count() }}</span>
            </div>

            <!-- Action Controls (Zoom in, Zoom out, Reset, WhatsApp Order, Close) -->
            <div class="pointer-events-auto flex items-center space-x-2">
                <button type="button" onclick="zoomInModal()" title="Zoom In (+)"
                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/25 backdrop-blur-md border border-white/15 text-white flex items-center justify-center transition-all active:scale-90">
                    <iconify-icon icon="lucide:zoom-in" class="text-lg"></iconify-icon>
                </button>
                <button type="button" onclick="zoomOutModal()" title="Zoom Out (-)"
                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/25 backdrop-blur-md border border-white/15 text-white flex items-center justify-center transition-all active:scale-90">
                    <iconify-icon icon="lucide:zoom-out" class="text-lg"></iconify-icon>
                </button>
                <button type="button" onclick="resetZoomModal()" title="Reset Zoom (100%)"
                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/25 backdrop-blur-md border border-white/15 text-white flex items-center justify-center transition-all active:scale-90">
                    <iconify-icon icon="lucide:maximize" class="text-base"></iconify-icon>
                </button>
                <a id="zoom-wa-link" href="#" target="_blank" title="Pesan Desain Ini di WhatsApp"
                    class="h-10 px-4 rounded-full bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs flex items-center space-x-1.5 shadow-lg shadow-brand-700/30 transition-all">
                    <iconify-icon icon="simple-icons:whatsapp" class="text-sm"></iconify-icon>
                    <span class="hidden sm:inline">Pesan Desain</span>
                </a>
                <button type="button" onclick="closePortfolioZoom()" title="Tutup (Esc)"
                    class="w-10 h-10 rounded-full bg-white/20 hover:bg-rose-600 backdrop-blur-md border border-white/20 text-white flex items-center justify-center transition-all active:scale-90">
                    <iconify-icon icon="lucide:x" class="text-xl"></iconify-icon>
                </button>
            </div>
        </div>

        <!-- Navigation Left Arrow Button -->
        <button type="button" onclick="navigatePortfolioZoom(-1)"
            class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/10 hover:bg-white/25 backdrop-blur-md border border-white/15 text-white flex items-center justify-center transition-all shadow-xl active:scale-95"
            aria-label="Sebelumnya">
            <iconify-icon icon="lucide:chevron-left" class="text-2xl"></iconify-icon>
        </button>

        <!-- Navigation Right Arrow Button -->
        <button type="button" onclick="navigatePortfolioZoom(1)"
            class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/10 hover:bg-white/25 backdrop-blur-md border border-white/15 text-white flex items-center justify-center transition-all shadow-xl active:scale-95"
            aria-label="Berikutnya">
            <iconify-icon icon="lucide:chevron-right" class="text-2xl"></iconify-icon>
        </button>

        <!-- Main Image Container with Interactive Zoom -->
        <div id="zoom-container"
            class="relative w-full h-full flex items-center justify-center overflow-hidden p-4 sm:p-12 select-none"
            onclick="handleBackdropClick(event)">
            <img id="zoom-modal-img" src="" alt="Portfolio Full Resolution"
                class="max-h-[85vh] max-w-[90vw] object-contain rounded-xl shadow-2xl transition-transform duration-300 ease-out cursor-zoom-in"
                onclick="toggleImageZoom(event)">
        </div>

        <!-- Bottom Zoom Hint -->
        <div class="absolute bottom-4 inset-x-0 flex items-center justify-center pointer-events-none z-20">
            <div
                class="px-4 py-1.5 rounded-full bg-slate-900/80 backdrop-blur-md border border-white/10 text-slate-300 text-[11px] flex items-center space-x-2">
                <iconify-icon icon="lucide:mouse-pointer-click" class="text-brand-400"></iconify-icon>
                <span>Klik gambar untuk zoom in / zoom out (atau gunakan tombol di atas)</span>
            </div>
        </div>

    </div>

    <!-- JavaScript for Seamless Lightbox and Interactive Zoom -->
    <script>
        const portfolioItems = @json($portofolios->items());
        let currentZoomIndex = 0;
        let currentScale = 1;

        function openPortfolioZoom(index) {
            currentZoomIndex = index;
            currentScale = 1;
            renderZoomModal();

            const modal = document.getElementById('portfolio-zoom-modal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function renderZoomModal() {
            if (!portfolioItems || portfolioItems.length === 0) return;
            const item = portfolioItems[currentZoomIndex];
            const img = document.getElementById('zoom-modal-img');
            const counter = document.getElementById('zoom-index-counter');
            const waLink = document.getElementById('zoom-wa-link');

            img.src = item.image_url;
            counter.textContent = (currentZoomIndex + 1);

            const waText = encodeURIComponent(
                `Halo Premium Design, saya melihat portofolio "${item.nama}" (${item.kategori}) di website. Boleh info harga dan detail pemesanan serupa?`
            );
            waLink.href = `https://api.whatsapp.com/send/?phone=6285168174679&text=${waText}`;

            applyScale();
        }

        function toggleImageZoom(event) {
            event.stopPropagation();
            if (currentScale === 1) {
                currentScale = 1.8;
            } else if (currentScale === 1.8) {
                currentScale = 2.5;
            } else {
                currentScale = 1;
            }
            applyScale();
        }

        function zoomInModal() {
            if (currentScale < 3) {
                currentScale = Math.min(3, +(currentScale + 0.4).toFixed(1));
                applyScale();
            }
        }

        function zoomOutModal() {
            if (currentScale > 1) {
                currentScale = Math.max(1, +(currentScale - 0.4).toFixed(1));
                applyScale();
            }
        }

        function resetZoomModal() {
            currentScale = 1;
            applyScale();
        }

        function applyScale() {
            const img = document.getElementById('zoom-modal-img');
            if (!img) return;
            img.style.transform = `scale(${currentScale})`;
            if (currentScale > 1) {
                img.classList.remove('cursor-zoom-in');
                img.classList.add('cursor-zoom-out');
            } else {
                img.classList.remove('cursor-zoom-out');
                img.classList.add('cursor-zoom-in');
            }
        }

        function navigatePortfolioZoom(direction) {
            currentScale = 1;
            currentZoomIndex = (currentZoomIndex + direction + portfolioItems.length) % portfolioItems.length;
            renderZoomModal();
        }

        function closePortfolioZoom() {
            const modal = document.getElementById('portfolio-zoom-modal');
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                currentScale = 1;
                applyScale();
                document.body.style.overflow = '';
            }, 250);
        }

        function handleBackdropClick(event) {
            if (event.target.id === 'zoom-container') {
                closePortfolioZoom();
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('portfolio-zoom-modal');
            if (modal && !modal.classList.contains('hidden')) {
                if (e.key === 'Escape') {
                    closePortfolioZoom();
                } else if (e.key === 'ArrowLeft') {
                    navigatePortfolioZoom(-1);
                } else if (e.key === 'ArrowRight') {
                    navigatePortfolioZoom(1);
                } else if (e.key === '+' || e.key === '=') {
                    zoomInModal();
                } else if (e.key === '-') {
                    zoomOutModal();
                } else if (e.key === '0') {
                    resetZoomModal();
                }
            }
        });
    </script>

@endsection
