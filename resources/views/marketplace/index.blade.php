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
        class="bg-gradient-to-b from-brand-50/60 via-zinc-50/40 to-white py-12 sm:py-16 border-b border-zinc-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-down" class="max-w-3xl space-y-2">
                <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Katalog Desain & Jasa</span>
                <h1 class="text-2xl sm:text-4xl font-extrabold font-heading text-zinc-900">Marketplace Karya & Layanan
                    Desain</h1>
                <p class="text-xs sm:text-sm text-zinc-600 leading-relaxed">
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
            <div data-aos="fade-up" class="bg-zinc-50 border border-zinc-200 rounded-2xl p-4 sm:p-6 mb-10 shadow-sm">
                <form id="marketplaceFilterForm" action="{{ route('marketplace.index') }}" method="GET"
                    class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center" onsubmit="return false;">
                    <!-- Search Input (jQuery Live Search) -->
                    <div class="sm:col-span-6 relative">
                        <iconify-icon icon="lucide:search"
                            class="absolute left-4 top-3 text-zinc-400 text-sm"></iconify-icon>
                        <input type="text" name="q" id="marketplaceSearchInput" value="{{ $search }}"
                            placeholder="Cari nama desain atau kata kunci..."
                            autocomplete="off"
                            class="w-full pl-10 pr-20 py-2.5 bg-white border border-zinc-200 rounded-xl text-xs text-zinc-800 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-brand-500">
                        <div class="absolute right-2 top-2 flex items-center space-x-1">
                            <button type="button" id="marketplaceClearBtn" onclick="clearMarketplaceSearch()"
                                class="p-1 text-zinc-400 hover:text-zinc-600 rounded-lg hover:bg-zinc-100 transition-colors {{ $search ? '' : 'hidden' }}"
                                title="Hapus pencarian">
                                <iconify-icon icon="lucide:x" class="text-sm"></iconify-icon>
                            </button>
                            <div id="marketplaceSearchSpinner" class="hidden text-brand-600 animate-spin">
                                <iconify-icon icon="lucide:loader-2" class="text-base"></iconify-icon>
                            </div>
                        </div>
                    </div>

                    <!-- Category Filter Dropdown (Mobile/Quick) -->
                    <div class="sm:col-span-3">
                        <select name="kategori" id="marketplaceCategorySelect"
                            class="w-full px-3 py-2.5 bg-white border border-zinc-200 rounded-xl text-xs text-zinc-700 focus:outline-none focus:ring-2 focus:ring-brand-500 cursor-pointer">
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
                    <div class="sm:col-span-3">
                        <select name="sort" id="marketplaceSortSelect"
                            class="w-full px-3 py-2.5 bg-white border border-zinc-200 rounded-xl text-xs text-zinc-700 focus:outline-none focus:ring-2 focus:ring-brand-500 cursor-pointer">
                            <option value="latest" {{ $sort === 'latest' ? 'selected' : '' }}>Urutkan: Terbaru</option>
                            <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Urutkan: Terlama</option>
                            <option value="stock_high" {{ $sort === 'stock_high' ? 'selected' : '' }}>Urutkan: Stok Terbanyak</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Sidebar Category List (Desktop) -->
                <aside data-aos="fade-right" data-aos-delay="100" class="hidden lg:block lg:col-span-3 space-y-6">
                    <div class="bg-white border border-zinc-200 rounded-2xl p-5 space-y-3">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-zinc-400">Kategori Desain</h3>
                        <div id="marketplaceSidebarCategories" class="space-y-1">
                            <button type="button" onclick="selectMarketplaceCategory('all')"
                                data-kategori="all"
                                class="marketplace-sidebar-btn w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold cursor-pointer transition-all {{ !$selectedKategori || $selectedKategori === 'all' ? 'bg-brand-50 text-brand-700 font-bold' : 'text-zinc-600 hover:bg-zinc-50' }}">
                                <span class="flex items-center space-x-2">
                                    <iconify-icon icon="lucide:layout-grid" class="text-xs"></iconify-icon>
                                    <span>Semua Kategori</span>
                                </span>
                                <span class="text-[10px] text-zinc-400">{{ $totalSemuaProduk }}</span>
                            </button>
                            @foreach ($kategoris as $k)
                                <button type="button" onclick="selectMarketplaceCategory('{{ $k->Id_kategori }}')"
                                    data-kategori="{{ $k->Id_kategori }}"
                                    class="marketplace-sidebar-btn w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold cursor-pointer transition-all {{ $selectedKategori == $k->Id_kategori ? 'bg-brand-50 text-brand-700 font-bold' : 'text-zinc-600 hover:bg-zinc-50' }}">
                                    <span class="flex items-center space-x-2">
                                        <iconify-icon icon="{{ $k->icon_name }}" class="text-xs"></iconify-icon>
                                        <span>{{ $k->Nama_kategori }}</span>
                                    </span>
                                    <span class="text-[10px] text-zinc-400">{{ $k->produk_digital_count }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Official Channels in Marketplace -->
                    <div class="p-5 rounded-2xl bg-white border border-zinc-200 space-y-3">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-zinc-400">Order via Marketplace</h4>
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
                                class="flex items-center justify-between p-2.5 rounded-xl bg-zinc-50 hover:bg-zinc-100 text-zinc-700 text-xs font-bold transition-colors">
                                <span class="flex items-center space-x-2">
                                    <iconify-icon icon="lucide:link-2" class="text-brand-600 text-xs"></iconify-icon>
                                    <span>Lynk.id Portofolio</span>
                                </span>
                                <iconify-icon icon="lucide:external-link" class="text-xs text-zinc-400"></iconify-icon>
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

                <!-- Product Catalog Grid (Loaded via jQuery AJAX) -->
                <div class="lg:col-span-9 relative">
                    <!-- Loading Overlay -->
                    <div id="marketplaceLoadingOverlay" class="absolute inset-0 bg-white/70 backdrop-blur-[1px] z-30 flex items-center justify-center hidden rounded-2xl">
                        <div class="flex items-center space-x-2 px-4 py-2 rounded-xl bg-zinc-900 text-white text-xs font-semibold shadow-xl">
                            <iconify-icon icon="lucide:loader-2" class="text-base animate-spin text-brand-400"></iconify-icon>
                            <span>Memuat produk...</span>
                        </div>
                    </div>

                    <div id="marketplaceGridContainer" class="transition-opacity duration-200">
                        @include('marketplace._grid')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery AJAX Live Search & Filter Script -->
    <script>
        let marketplaceSearchDebounce = null;
        let activeMarketplaceAjax = null;

        // --- Skeleton Generator for Marketplace Product Grid ---
        function getMarketplaceSkeletonHtml(count = 8) {
            let html = '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">';
            for (let i = 0; i < count; i++) {
                html += `
                    <div class="rounded-2xl border border-zinc-200 bg-white overflow-hidden flex flex-col justify-between shadow-xs">
                        <div>
                            <!-- Image Skeleton -->
                            <div class="aspect-square skeleton-shimmer relative">
                                <div class="absolute top-2.5 left-2.5 w-16 h-4 rounded-lg bg-zinc-300/60"></div>
                                <div class="absolute bottom-2.5 left-2.5 w-12 h-3.5 rounded-md bg-zinc-300/60"></div>
                            </div>
                            <!-- Info Skeleton -->
                            <div class="p-4 space-y-2.5">
                                <div class="h-4 skeleton-shimmer rounded-md w-3/4"></div>
                                <div class="h-3 skeleton-shimmer rounded-md w-full"></div>
                                <div class="h-3 skeleton-shimmer rounded-md w-1/2"></div>
                            </div>
                        </div>
                        <!-- Buttons Skeleton -->
                        <div class="p-4 pt-0 flex items-center space-x-2">
                            <div class="flex-1 h-7 skeleton-shimmer rounded-xl"></div>
                            <div class="flex-1 h-7 skeleton-shimmer rounded-xl"></div>
                        </div>
                    </div>
                `;
            }
            html += '</div>';
            return html;
        }

        function getMarketplaceFilters() {
            return {
                q: $('#marketplaceSearchInput').val().trim(),
                kategori: $('#marketplaceCategorySelect').val(),
                sort: $('#marketplaceSortSelect').val()
            };
        }

        function fetchMarketplaceAjax(customTarget) {
            let requestUrl = "{{ route('marketplace.index') }}";
            let requestData = getMarketplaceFilters();

            if (typeof customTarget === 'string') {
                requestUrl = customTarget;
                requestData = {};
            } else if (typeof customTarget === 'object' && customTarget !== null) {
                requestData = Object.assign({}, requestData, customTarget);
            }

            if (activeMarketplaceAjax && activeMarketplaceAjax.readyState !== 4) {
                activeMarketplaceAjax.abort();
            }

            $('#marketplaceSearchSpinner').removeClass('hidden');

            // Show skeleton product grid immediately
            $('#marketplaceGridContainer').html(getMarketplaceSkeletonHtml(8));

            activeMarketplaceAjax = $.ajax({
                url: requestUrl,
                type: 'GET',
                data: requestData,
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    if (response && response.status === 'success') {
                        $('#marketplaceGridContainer').html(response.html);

                        // Sync inputs
                        if (response.selectedKategori !== undefined) {
                            let katVal = response.selectedKategori || 'all';
                            $('#marketplaceCategorySelect').val(katVal);
                            updateMarketplaceSidebarUI(katVal);
                        }

                        if (response.sort !== undefined) {
                            $('#marketplaceSortSelect').val(response.sort || 'latest');
                        }

                        if (response.search !== undefined) {
                            if ($('#marketplaceSearchInput').val() !== response.search) {
                                $('#marketplaceSearchInput').val(response.search);
                            }
                            if (response.search && response.search.length > 0) {
                                $('#marketplaceClearBtn').removeClass('hidden');
                            } else {
                                $('#marketplaceClearBtn').addClass('hidden');
                            }
                        }

                        // Update browser URL
                        let params = new URLSearchParams();
                        let currentQ = $('#marketplaceSearchInput').val().trim();
                        let currentKat = $('#marketplaceCategorySelect').val();
                        let currentSort = $('#marketplaceSortSelect').val();

                        if (currentQ) params.set('q', currentQ);
                        if (currentKat && currentKat !== 'all') params.set('kategori', currentKat);
                        if (currentSort && currentSort !== 'latest') params.set('sort', currentSort);

                        let newQuery = params.toString();
                        let newUrl = "{{ route('marketplace.index') }}" + (newQuery ? '?' + newQuery : '');
                        window.history.pushState({ path: newUrl }, '', newUrl);

                        // Initialize image skeletons & refresh AOS
                        if (typeof initImageSkeletons === 'function') {
                            initImageSkeletons();
                        }
                        if (window.AOS) {
                            AOS.refreshHard();
                        }
                    }
                },
                error: function(xhr, status, error) {
                    if (status !== 'abort') {
                        console.error('Marketplace AJAX search error:', error);
                    }
                },
                complete: function() {
                    $('#marketplaceSearchSpinner').addClass('hidden');
                }
            });
        }

        function updateMarketplaceSidebarUI(activeKat) {
            $('.marketplace-sidebar-btn').each(function() {
                let kat = $(this).attr('data-kategori') || 'all';
                if ((activeKat === 'all' || !activeKat) && kat === 'all') {
                    $(this).removeClass('text-zinc-600 hover:bg-zinc-50 font-normal')
                           .addClass('bg-brand-50 text-brand-700 font-bold');
                } else if (activeKat === kat) {
                    $(this).removeClass('text-zinc-600 hover:bg-zinc-50 font-normal')
                           .addClass('bg-brand-50 text-brand-700 font-bold');
                } else {
                    $(this).removeClass('bg-brand-50 text-brand-700 font-bold')
                           .addClass('text-zinc-600 hover:bg-zinc-50');
                }
            });
        }

        function selectMarketplaceCategory(katId) {
            $('#marketplaceCategorySelect').val(katId);
            updateMarketplaceSidebarUI(katId);
            fetchMarketplaceAjax();
        }

        function clearMarketplaceSearch() {
            $('#marketplaceSearchInput').val('');
            $('#marketplaceClearBtn').addClass('hidden');
            fetchMarketplaceAjax();
        }

        function resetMarketplaceFilters() {
            $('#marketplaceSearchInput').val('');
            $('#marketplaceCategorySelect').val('all');
            $('#marketplaceSortSelect').val('latest');
            $('#marketplaceClearBtn').addClass('hidden');
            updateMarketplaceSidebarUI('all');
            fetchMarketplaceAjax({ q: '', kategori: 'all', sort: 'latest' });
        }

        $(document).ready(function() {
            // Live Search with Debounce (300ms)
            $('#marketplaceSearchInput').on('input keyup', function() {
                let val = $(this).val().trim();
                if (val.length > 0) {
                    $('#marketplaceClearBtn').removeClass('hidden');
                } else {
                    $('#marketplaceClearBtn').addClass('hidden');
                }

                clearTimeout(marketplaceSearchDebounce);
                marketplaceSearchDebounce = setTimeout(function() {
                    fetchMarketplaceAjax();
                }, 300);
            });

            // Form Submit Prevent
            $('#marketplaceFilterForm').on('submit', function(e) {
                e.preventDefault();
                clearTimeout(marketplaceSearchDebounce);
                fetchMarketplaceAjax();
            });

            // Category & Sort Dropdown change
            $('#marketplaceCategorySelect, #marketplaceSortSelect').on('change', function() {
                let currentKat = $('#marketplaceCategorySelect').val();
                updateMarketplaceSidebarUI(currentKat);
                fetchMarketplaceAjax();
            });

            // Pagination Link Intercept
            $(document).on('click', '.marketplace-pagination a', function(e) {
                e.preventDefault();
                let targetUrl = $(this).attr('href');
                if (targetUrl) {
                    fetchMarketplaceAjax(targetUrl);
                    $('html, body').animate({
                        scrollTop: 0
                    }, 350);
                }
            });

            // Browser Back/Forward navigation support
            window.addEventListener('popstate', function() {
                let urlParams = new URLSearchParams(window.location.search);
                let urlQ = urlParams.get('q') || '';
                let urlKat = urlParams.get('kategori') || 'all';
                let urlSort = urlParams.get('sort') || 'latest';

                $('#marketplaceSearchInput').val(urlQ);
                $('#marketplaceCategorySelect').val(urlKat);
                $('#marketplaceSortSelect').val(urlSort);
                updateMarketplaceSidebarUI(urlKat);
                fetchMarketplaceAjax();
            });
        });
    </script>
@endsection
