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
    <section class="relative bg-zinc-900 text-white overflow-hidden py-16 sm:py-24 border-b border-zinc-800">
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

                <!-- Search Bar (Live jQuery AJAX Search) -->
                <div data-aos="fade-up" data-aos-delay="200" class="pt-4 max-w-xl mx-auto">
                    <form id="portfolioSearchForm" action="{{ route('portofolio.index') }}" method="GET"
                        class="relative flex items-center" onsubmit="return false;">
                        <input type="hidden" name="kategori" id="selectedCategoryInput"
                            value="{{ $selectedKategori ?? '' }}">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-zinc-400">
                            <iconify-icon icon="lucide:search" class="text-lg"></iconify-icon>
                        </div>
                        <input type="text" name="search" id="portfolioSearchInput" value="{{ $search }}"
                            placeholder="Cari karya desain (contoh: Logo, Box, Jersey, UI, Menu)..." autocomplete="off"
                            class="w-full pl-11 pr-24 py-3.5 bg-white/95 backdrop-blur-md text-zinc-900 placeholder-zinc-400 rounded-2xl text-xs sm:text-sm font-medium border border-white/20 shadow-xl focus:outline-none focus:ring-2 focus:ring-brand-400 transition-all">
                        <div class="absolute right-1.5 flex items-center space-x-1">
                            <button type="button" id="portfolioSearchClearBtn" onclick="clearPortfolioSearch()"
                                class="p-2 text-zinc-400 hover:text-zinc-600 rounded-xl hover:bg-zinc-100 transition-colors {{ $search ? '' : 'hidden' }}"
                                title="Reset Pencarian">
                                <iconify-icon icon="lucide:x" class="text-base"></iconify-icon>
                            </button>
                            <div id="portfolioSearchSpinner" class="hidden px-2 text-brand-600 animate-spin">
                                <iconify-icon icon="lucide:loader-2" class="text-lg"></iconify-icon>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </section>

    <!-- Simple Representative Category Filter Bar -->
    <section class="sticky top-20 z-40 bg-white/95 backdrop-blur-md border-b border-zinc-200/80 shadow-xs py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="portfolioCategoryPills"
                class="flex items-center justify-start md:justify-center space-x-1.5 sm:space-x-2 overflow-x-auto no-scrollbar py-0.5 text-xs sm:text-sm font-semibold">
                <!-- All Categories -->
                <button type="button" onclick="selectPortfolioCategory('')" data-kategori=""
                    class="category-pill shrink-0 px-4 py-2 rounded-full transition-all duration-200 cursor-pointer {{ empty($selectedKategori) || $selectedKategori === 'all' ? 'bg-zinc-900 text-white shadow-sm font-bold' : 'bg-zinc-100 text-zinc-600 hover:bg-zinc-200 hover:text-zinc-900' }}">
                    Semua
                </button>

                @foreach ($kategoriCounts as $katName => $count)
                    <button type="button" onclick="selectPortfolioCategory('{{ $katName }}')"
                        data-kategori="{{ $katName }}"
                        class="category-pill shrink-0 px-4 py-2 rounded-full transition-all duration-200 cursor-pointer {{ $selectedKategori === $katName ? 'bg-zinc-900 text-white shadow-sm font-bold' : 'bg-zinc-100 text-zinc-600 hover:bg-zinc-200 hover:text-zinc-900' }}">
                        {{ $katName }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Main Portfolio Grid Section (Dynamically Loaded via jQuery) -->
    <section class="py-14 bg-white min-h-[500px]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <!-- Loading Overlay -->
            <div id="portfolioLoadingOverlay"
                class="absolute inset-0 bg-white/70 backdrop-blur-[1px] z-30 flex items-center justify-center hidden rounded-2xl">
                <div
                    class="flex items-center space-x-2 px-4 py-2 rounded-xl bg-zinc-900 text-white text-xs font-semibold shadow-xl">
                    <iconify-icon icon="lucide:loader-2" class="text-base animate-spin text-brand-400"></iconify-icon>
                    <span>Memuat karya...</span>
                </div>
            </div>

            <!-- Grid Container for Partial Rendering -->
            <div id="portfolioGridContainer" class="transition-opacity duration-200">
                @include('portofolio._grid')
            </div>
        </div>
    </section>

    <!-- Creative CTA Section -->
    <section class="py-16 bg-white border-t border-zinc-200">
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
        class="fixed inset-0 z-50 hidden bg-zinc-950/95 backdrop-blur-xl flex flex-col items-center justify-center transition-all duration-300 opacity-0">

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
                class="px-4 py-1.5 rounded-full bg-zinc-900/80 backdrop-blur-md border border-white/10 text-zinc-300 text-[11px] flex items-center space-x-2">
                <iconify-icon icon="lucide:mouse-pointer-click" class="text-brand-400"></iconify-icon>
                <span>Klik gambar untuk zoom in / zoom out (atau gunakan tombol di atas)</span>
            </div>
        </div>

    </div>

    <!-- JavaScript for Seamless Lightbox, Interactive Zoom & jQuery AJAX Live Search -->
    <script>
        let portfolioItems = @json($portofolios->items());
        let currentZoomIndex = 0;
        let currentScale = 1;
        let searchDebounceTimer = null;
        let activePortfolioAjax = null;

        // --- jQuery AJAX Live Search & Filter Functions ---
        function getPortfolioFilters() {
            return {
                search: $('#portfolioSearchInput').val().trim(),
                kategori: $('#selectedCategoryInput').val().trim()
            };
        }

        function fetchPortfolioAjax(customTarget) {
            let requestUrl = "{{ route('portofolio.index') }}";
            let requestData = getPortfolioFilters();

            if (typeof customTarget === 'string') {
                requestUrl = customTarget;
                requestData = {}; // URL already contains query parameters
            } else if (typeof customTarget === 'object' && customTarget !== null) {
                requestData = Object.assign({}, requestData, customTarget);
            }

            // Abort previous in-flight AJAX request
            if (activePortfolioAjax && activePortfolioAjax.readyState !== 4) {
                activePortfolioAjax.abort();
            }

            $('#portfolioSearchSpinner').removeClass('hidden');
            $('#portfolioLoadingOverlay').removeClass('hidden');
            $('#portfolioGridContainer').addClass('opacity-60 pointer-events-none');

            activePortfolioAjax = $.ajax({
                url: requestUrl,
                type: 'GET',
                data: requestData,
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response && response.status === 'success') {
                        // Update Grid HTML
                        $('#portfolioGridContainer').html(response.html);

                        // Sync portfolioItems for Lightbox
                        portfolioItems = response.items || [];

                        // Sync category input & active styles
                        if (response.selectedKategori !== undefined) {
                            $('#selectedCategoryInput').val(response.selectedKategori || '');
                            updateCategoryPillUI(response.selectedKategori || '');
                        }

                        // Sync search input
                        if (response.search !== undefined) {
                            if ($('#portfolioSearchInput').val() !== response.search) {
                                $('#portfolioSearchInput').val(response.search);
                            }
                            if (response.search && response.search.length > 0) {
                                $('#portfolioSearchClearBtn').removeClass('hidden');
                            } else {
                                $('#portfolioSearchClearBtn').addClass('hidden');
                            }
                        }

                        // Update browser URL without reload
                        let params = new URLSearchParams();
                        let currentKategori = $('#selectedCategoryInput').val();
                        let currentSearch = $('#portfolioSearchInput').val().trim();
                        if (currentKategori) params.set('kategori', currentKategori);
                        if (currentSearch) params.set('search', currentSearch);
                        let newQuery = params.toString();
                        let newUrl = "{{ route('portofolio.index') }}" + (newQuery ? '?' + newQuery : '');
                        window.history.pushState({
                            path: newUrl
                        }, '', newUrl);

                        // Refresh AOS animations if available
                        if (window.AOS) {
                            AOS.refreshHard();
                        }
                    }
                },
                error: function(xhr, status, error) {
                    if (status !== 'abort') {
                        console.error('Portfolio AJAX search error:', error);
                    }
                },
                complete: function() {
                    $('#portfolioSearchSpinner').addClass('hidden');
                    $('#portfolioLoadingOverlay').addClass('hidden');
                    $('#portfolioGridContainer').removeClass('opacity-60 pointer-events-none');
                }
            });
        }

        function updateCategoryPillUI(activeKategori) {
            $('.category-pill').each(function() {
                let kat = $(this).attr('data-kategori') || '';
                if ((!activeKategori && kat === '') || activeKategori === kat) {
                    $(this).removeClass('bg-zinc-100 text-zinc-600 hover:bg-zinc-200 hover:text-zinc-900')
                        .addClass('bg-zinc-900 text-white shadow-sm font-bold');
                } else {
                    $(this).removeClass('bg-zinc-900 text-white shadow-sm font-bold')
                        .addClass('bg-zinc-100 text-zinc-600 hover:bg-zinc-200 hover:text-zinc-900');
                }
            });
        }

        function selectPortfolioCategory(kategori) {
            $('#selectedCategoryInput').val(kategori);
            updateCategoryPillUI(kategori);
            fetchPortfolioAjax();
        }

        function clearPortfolioSearch() {
            $('#portfolioSearchInput').val('');
            $('#portfolioSearchClearBtn').addClass('hidden');
            fetchPortfolioAjax();
        }

        function resetPortfolioFilters() {
            $('#portfolioSearchInput').val('');
            $('#selectedCategoryInput').val('');
            $('#portfolioSearchClearBtn').addClass('hidden');
            updateCategoryPillUI('');
            fetchPortfolioAjax({
                search: '',
                kategori: ''
            });
        }

        // DOM Ready: Event Listeners for jQuery Live Search
        $(document).ready(function() {
            // Live Search Input with Debounce (300ms)
            $('#portfolioSearchInput').on('input keyup', function(e) {
                let val = $(this).val().trim();
                if (val.length > 0) {
                    $('#portfolioSearchClearBtn').removeClass('hidden');
                } else {
                    $('#portfolioSearchClearBtn').addClass('hidden');
                }

                clearTimeout(searchDebounceTimer);
                searchDebounceTimer = setTimeout(function() {
                    fetchPortfolioAjax();
                }, 300);
            });

            // Prevent form submit reload
            $('#portfolioSearchForm').on('submit', function(e) {
                e.preventDefault();
                clearTimeout(searchDebounceTimer);
                fetchPortfolioAjax();
            });

            // Intercept Pagination Clicks (No reload)
            $(document).on('click', '.portfolio-pagination a', function(e) {
                e.preventDefault();
                let targetUrl = $(this).attr('href');
                if (targetUrl) {
                    fetchPortfolioAjax(targetUrl);
                    $('html, body').animate({
                        scrollTop: $('#portfolioGridContainer').offset().top - 120
                    }, 300);
                }
            });

            // Browser Back/Forward navigation support
            window.addEventListener('popstate', function() {
                let urlParams = new URLSearchParams(window.location.search);
                let urlSearch = urlParams.get('search') || '';
                let urlKategori = urlParams.get('kategori') || '';
                $('#portfolioSearchInput').val(urlSearch);
                $('#selectedCategoryInput').val(urlKategori);
                updateCategoryPillUI(urlKategori);
                fetchPortfolioAjax();
            });
        });

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
