@extends('layouts.app')

@section('title', $produk->Nama_produk . ' - Jasa Desain Grafis Profesional | Premium Designz')
@section('meta_description', Str::limit(strip_tags($produk->Des_produk), 160))
@section('meta_keywords', 'jasa desain ' . strtolower($produk->kategori->Nama_kategori ?? 'grafis') . ', ' .
    strtolower($produk->Nama_produk) . ', pesan jasa desain, jasa desain grafis murah profesional, premium designz')
@section('og_image', $produk->image_url)

@push('schema')
    <script type="application/ld+json">
{
    "@@context": "https://schema.org/",
    "@@type": "Product",
    "name": "{{ $produk->Nama_produk }}",
    "image": [
        "{{ $produk->image_url }}"
    ],
    "description": "{{ Str::limit(strip_tags($produk->Des_produk), 250) }}",
    "sku": "PD-{{ $produk->Id_produk }}",
    "brand": {
        "@@type": "Brand",
        "name": "Premium Designz"
    },
    "offers": {
        "@@type": "Offer",
        "url": "{{ url()->current() }}",
        "priceCurrency": "IDR",
        "price": "{{ $produk->Harga ?? '50000' }}",
        "priceValidUntil": "2028-12-31",
        "itemCondition": "https://schema.org/NewCondition",
        "availability": "https://schema.org/InStock",
        "seller": {
            "@@type": "Organization",
            "name": "Premium Designz"
        }
    },
    "aggregateRating": {
        "@@type": "AggregateRating",
        "ratingValue": "{{ $produk->rating ?? '5.0' }}",
        "reviewCount": "24"
    }
}
</script>
@endpush

@section('content')

    <!-- Breadcrumb Header -->
    <div class="bg-slate-50 py-5 border-b border-slate-200/80 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav data-aos="fade-down" class="flex text-xs space-x-2 text-slate-500">
                <a href="{{ route('home') }}" class="hover:text-brand-600 transition-colors">Home</a>
                <span class="text-slate-300">/</span>
                <a href="{{ route('marketplace.index') }}" class="hover:text-brand-600 transition-colors">Marketplace</a>
                <span class="text-slate-300">/</span>
                <a href="{{ route('marketplace.index', ['kategori' => $produk->Id_kategori]) }}"
                    class="hover:text-brand-600 transition-colors">{{ $produk->kategori->Nama_kategori ?? 'Kategori' }}</a>
                <span class="text-slate-300">/</span>
                <span class="text-slate-900 font-semibold truncate max-w-xs">{{ $produk->Nama_produk }}</span>
            </nav>
        </div>
    </div>

    <!-- Main Detail Section -->
    <div class="py-12 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <!-- Left Column: Graphic Mockup Preview & Description -->
                <div class="lg:col-span-7 space-y-6">
                    <!-- Preview Showcase Card with Crystal Clear Auto-Slider -->
                    <div data-aos="fade-up"
                        class="rounded-2xl bg-white border border-slate-200 overflow-hidden shadow-sm p-3 sm:p-4 space-y-3"
                        id="productSliderContainer">
                        <!-- Main Image View (Jelas, Terang, Format 3:4 Portrait Cover) -->
                        <div class="relative bg-slate-100 rounded-xl aspect-[3/4] max-h-[640px] w-full overflow-hidden flex items-center justify-center group cursor-pointer border border-slate-200/60"
                            onclick="openProductLightbox()" title="Klik untuk memperbesar tampilan desain">
                            <!-- Main Image Slider -->
                            <img id="main-product-image" src="{{ $produk->gallery_urls[0] ?? $produk->image_url }}"
                                alt="{{ $produk->Nama_produk }}"
                                class="w-full h-full object-cover transition-all duration-500 ease-in-out">

                            <!-- Top Badges & Controls (Brand Gradient Badge) -->
                            <div class="absolute top-3 left-3 z-10 flex items-center space-x-2">
                                <span
                                    class="px-3 py-1 rounded-lg bg-brand-gradient text-white text-xs font-bold uppercase tracking-wider shadow-md">
                                    {{ $produk->kategori->Nama_kategori ?? 'Desain' }}
                                </span>
                            </div>

                            <div class="absolute top-3 right-3 z-10 flex items-center space-x-2">
                                <button type="button" onclick="event.stopPropagation(); openProductLightbox();"
                                    class="p-2 rounded-lg bg-white/90 hover:bg-white text-slate-800 backdrop-blur-md border border-slate-200/80 transition-colors shadow-md"
                                    title="Perbesar Tampilan">
                                    <iconify-icon icon="lucide:maximize-2" class="text-sm"></iconify-icon>
                                </button>
                            </div>

                            <!-- Left / Right Navigation Arrows -->
                            @if (count($produk->gallery_urls) > 1)
                                <button type="button" id="sliderPrevBtn"
                                    onclick="event.stopPropagation(); prevProductSlide();"
                                    class="absolute left-3 top-1/2 -translate-y-1/2 z-20 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-800 backdrop-blur-md border border-slate-200/80 flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 shadow-lg">
                                    <iconify-icon icon="lucide:chevron-left" class="text-base"></iconify-icon>
                                </button>
                                <button type="button" id="sliderNextBtn"
                                    onclick="event.stopPropagation(); nextProductSlide();"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 z-20 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-800 backdrop-blur-md border border-slate-200/80 flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 shadow-lg">
                                    <iconify-icon icon="lucide:chevron-right" class="text-base"></iconify-icon>
                                </button>
                            @endif

                            <!-- Bottom Counter Pill & Format Info -->
                            <div
                                class="absolute bottom-3 left-3 right-3 flex items-center justify-between pointer-events-none z-10">
                                <span id="slideCounterBadge"
                                    class="text-[11px] font-bold text-slate-800 bg-white/90 px-2.5 py-1 rounded-lg backdrop-blur-sm border border-slate-200/80 shadow-sm">
                                    1 / {{ count($produk->gallery_urls) }}
                                </span>
                                <span
                                    class="text-emerald-600 text-[11px] font-bold bg-white/90 px-2.5 py-1 rounded-lg backdrop-blur-sm border border-slate-200/80 shadow-sm flex items-center space-x-1">
                                    <iconify-icon icon="lucide:sparkles" class="text-xs"></iconify-icon>
                                    <span>High-Res Master</span>
                                </span>
                            </div>
                        </div>

                        <!-- Gallery Thumbnails Strip & Dot Indicators -->
                        @if (count($produk->gallery_urls) > 1)
                            <div class="space-y-2 pt-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">
                                        Pratinjau Variasi & Karya (Auto Slide)
                                    </p>
                                    <div class="flex items-center space-x-1" id="sliderDotsContainer">
                                        @foreach ($produk->gallery_urls as $idx => $gUrl)
                                            <button type="button" onclick="setProductSlide({{ $idx }})"
                                                class="slider-dot w-2 h-2 rounded-full transition-all {{ $idx === 0 ? 'bg-brand-600 w-5' : 'bg-slate-300 hover:bg-slate-400' }}"
                                                title="Slide {{ $idx + 1 }}"></button>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="grid grid-cols-4 sm:grid-cols-6 gap-2">
                                    @foreach ($produk->gallery_urls as $idx => $gUrl)
                                        <button type="button" onclick="setProductSlide({{ $idx }})"
                                            class="gallery-thumb-btn aspect-square rounded-xl overflow-hidden border-2 transition-all group {{ $idx === 0 ? 'border-brand-600 ring-2 ring-brand-500/20 shadow-sm' : 'border-slate-200 hover:border-brand-400 opacity-70 hover:opacity-100' }}"
                                            data-index="{{ $idx }}">
                                            <img src="{{ $gUrl }}" alt="Preview {{ $idx + 1 }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Description Box (Collapsible, Default: Terbuka) -->
                    <div data-aos="fade-up" data-aos-delay="100"
                        class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm transition-all">
                        <button type="button" onclick="toggleProductDescription()"
                            class="w-full p-5 sm:p-6 flex items-center justify-between text-left hover:bg-slate-50/80 transition-colors focus:outline-none">
                            <div class="flex items-center space-x-2.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-brand-600"></span>
                                <h3
                                    class="text-xs sm:text-sm font-bold uppercase tracking-wider text-slate-800 font-heading">
                                    Deskripsi & Ruang Lingkup Karya
                                </h3>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span id="descToggleStatus"
                                    class="text-[11px] font-semibold text-slate-400 hidden sm:inline-block">Tutup</span>
                                <div
                                    class="w-8 h-8 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-slate-200 transition-colors">
                                    <iconify-icon id="descChevronIcon" icon="lucide:chevron-up"
                                        class="text-base transition-transform duration-300"></iconify-icon>
                                </div>
                            </div>
                        </button>
                        <div id="productDescriptionContent"
                            class="px-5 sm:px-6 pb-6 pt-1 border-t border-slate-100 transition-all duration-300">
                            <p class="text-xs sm:text-sm text-slate-700 leading-relaxed whitespace-pre-line">
                                {{ $produk->Des_produk ?? 'Paket pengerjaan desain grafis profesional siap disesuaikan dengan identitas dan kebutuhan usaha Anda.' }}
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Order Action & Service Package Box -->
                <div data-aos="fade-left" data-aos-delay="100" class="lg:col-span-5 space-y-6">
                    <div
                        class="bg-slate-50 rounded-2xl p-6 sm:p-8 border border-slate-200 space-y-6 sticky top-28 shadow-sm">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-600">Pemesanan
                                Langsung</span>
                            <h1 class="text-xl sm:text-2xl font-bold text-slate-900 mt-1 font-heading">
                                {{ $produk->Nama_produk }}
                            </h1>
                        </div>

                        <!-- Linked Service Package Benefits from DB -->
                        @if ($produk->layanan)
                            <div class="p-4 rounded-xl bg-white border border-slate-200 space-y-2.5">
                                <div class="flex items-center space-x-2 text-brand-700">
                                    <iconify-icon icon="lucide:gem" class="text-xs"></iconify-icon>
                                    <span class="text-xs font-bold uppercase tracking-wider">Paket:
                                        {{ $produk->layanan->Nama_layanan }}</span>
                                </div>
                                <div class="text-xs text-slate-700 whitespace-pre-line leading-relaxed">
                                    {{ $produk->layanan->Benefit }}
                                </div>
                            </div>
                        @endif

                        <!-- Software & Tools yang Digunakan -->
                        @if ($produk->software->isNotEmpty())
                            <div class="p-4 rounded-xl bg-white border border-slate-200 space-y-2.5">
                                <div class="flex items-center justify-between text-slate-700">
                                    <div class="flex items-center space-x-1.5 text-brand-700">
                                        <iconify-icon icon="lucide:monitor" class="text-xs"></iconify-icon>
                                        <span class="text-xs font-bold uppercase tracking-wider">Software yang
                                            Digunakan</span>
                                    </div>
                                    <span
                                        class="text-[10px] font-semibold text-slate-400">{{ $produk->software->count() }}
                                        Tools</span>
                                </div>
                                <div class="flex flex-wrap gap-2 pt-0.5">
                                    @foreach ($produk->software as $soft)
                                        <div class="inline-flex items-center space-x-1.5 px-2.5 py-1.5 rounded-lg bg-slate-50 border border-slate-200/80 shadow-2xs hover:border-brand-400 hover:bg-brand-50/50 transition-colors"
                                            title="{{ $soft->Nama_software }}">
                                            <div
                                                class="w-4 h-4 rounded bg-white p-0.5 flex items-center justify-center shrink-0 overflow-hidden">
                                                <img src="{{ $soft->logo_full_url }}" alt="{{ $soft->Nama_software }}"
                                                    class="max-w-full max-h-full object-contain">
                                            </div>
                                            <span
                                                class="text-[11px] font-bold text-slate-800">{{ $soft->Nama_software }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Key Specifications -->
                        <div class="space-y-2 text-xs text-slate-600">
                            <div class="flex items-center justify-between py-1.5 border-b border-slate-200/60">
                                <span class="text-slate-400">Kategori</span>
                                <span
                                    class="font-semibold text-slate-800">{{ $produk->kategori->Nama_kategori ?? '-' }}</span>
                            </div>
                            <div class="flex items-center justify-between py-1.5 border-b border-slate-200/60">
                                <span class="text-slate-400">Estimasi Pengerjaan</span>
                                <span class="font-semibold text-brand-700 flex items-center space-x-1">
                                    <iconify-icon icon="lucide:clock" class="text-xs text-brand-600"></iconify-icon>
                                    <span>{{ $produk->Estimasi ?? '1-2 Hari' }}</span>
                                </span>
                            </div>
                            <div class="flex items-center justify-between py-1.5 border-b border-slate-200/60">
                                <span class="text-slate-400">Status Layanan</span>
                                <span class="font-semibold text-emerald-600">Tersedia & Siap Order</span>
                            </div>
                            <div class="flex items-center justify-between py-1.5 border-b border-slate-200/60">
                                <span class="text-slate-400">Format Output</span>
                                <span class="font-semibold text-slate-800">AI / SVG / PDF / PNG 300 DPI</span>
                            </div>
                            <div class="flex items-center justify-between py-1.5">
                                <span class="text-slate-400">Metode Pemesanan</span>
                                <span class="font-semibold text-slate-800">Direct Chat WhatsApp</span>
                            </div>
                        </div>

                        <!-- Direct WhatsApp Order Button -->
                        <div class="pt-2 space-y-2">
                            <a href="{{ $produk->whatsapp_link }}" target="_blank"
                                class="w-full inline-flex items-center justify-center space-x-2 py-3.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold uppercase tracking-wider shadow-md shadow-brand-700/20 transition-all">
                                <iconify-icon icon="simple-icons:whatsapp" class="text-base"></iconify-icon>
                                <span>Pesan Sekarang via WhatsApp</span>
                            </a>

                            <div class="grid grid-cols-2 gap-2 pt-1">
                                <a href="https://shopee.co.id/premium_dz" target="_blank"
                                    class="py-2.5 px-3 rounded-xl bg-amber-50 hover:bg-amber-100 border border-amber-200 text-amber-900 text-xs font-bold text-center flex items-center justify-center space-x-1.5 transition-colors">
                                    <iconify-icon icon="simple-icons:shopee"
                                        class="text-amber-600 text-xs"></iconify-icon>
                                    <span>Toko Shopee</span>
                                </a>
                                <a href="https://www.fiverr.com/premiumdz" target="_blank"
                                    class="py-2.5 px-3 rounded-xl bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 text-emerald-900 text-xs font-bold text-center flex items-center justify-center space-x-1.5 transition-colors">
                                    <iconify-icon icon="simple-icons:fiverr"
                                        class="text-emerald-700 text-sm"></iconify-icon>
                                    <span>Fiverr Gig</span>
                                </a>
                            </div>

                            <p class="text-[10px] text-center text-slate-400 mt-1.5">
                                Pembayaran aman via WhatsApp, Shopee, atau Fiverr.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rekomendasi Jasa & Karya Relevan (Berada di Bawah Pemesanan Langsung - Full Width 6 Kolom) -->
            @if ($relatedProducts->isNotEmpty())
                <div data-aos="fade-up" data-aos-delay="150"
                    class="mt-10 bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 space-y-5 shadow-sm relative overflow-hidden">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-600">Rekomendasi
                                Terkait</span>
                            <h3 class="text-sm sm:text-base font-bold text-slate-900 font-heading">
                                Karya & Jasa Serupa di Kategori {{ $produk->kategori->Nama_kategori ?? 'Ini' }}
                            </h3>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button type="button" onclick="scrollRelated('left')"
                                class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-slate-100 hover:bg-brand-600 hover:text-white text-slate-600 flex items-center justify-center transition-all text-sm shadow-sm"
                                title="Geser Kiri">
                                <iconify-icon icon="lucide:chevron-left"></iconify-icon>
                            </button>
                            <button type="button" onclick="scrollRelated('right')"
                                class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-slate-100 hover:bg-brand-600 hover:text-white text-slate-600 flex items-center justify-center transition-all text-sm shadow-sm"
                                title="Geser Kanan">
                                <iconify-icon icon="lucide:chevron-right"></iconify-icon>
                            </button>
                            <a href="{{ route('marketplace.index', ['kategori' => $produk->Id_kategori]) }}"
                                class="text-xs font-bold text-brand-600 hover:text-brand-800 ml-2 flex items-center space-x-0.5">
                                <span>Lihat Semua</span>
                                <iconify-icon icon="lucide:chevron-right" class="text-xs"></iconify-icon>
                            </a>
                        </div>
                    </div>

                    <!-- Horizontal Scrolling Track (Auto scroll + 6 Columns) -->
                    <div id="relatedScrollTrack"
                        class="flex space-x-3 sm:space-x-4 overflow-x-auto scroll-smooth scrollbar-none py-3 px-2 select-none"
                        style="scrollbar-width: none; -ms-overflow-style: none;">
                        @foreach ($relatedProducts as $rel)
                            <div
                                class="flex-none w-[160px] sm:w-[180px] md:w-[200px] lg:w-[calc((100%-5*16px)/6)] min-w-[150px] rounded-2xl border border-slate-200/80 bg-white overflow-hidden hover:border-brand-400 hover:shadow-2xl transform hover:scale-[1.15] hover:z-20 transition-all duration-200 ease-out flex flex-col justify-between group">
                                <a href="{{ route('products.show', $rel->Id_produk) }}" class="block group">
                                    <!-- Thumbnail Image (Click leads to product/service) -->
                                    <div class="h-32 sm:h-36 bg-slate-900 relative overflow-hidden cursor-pointer">
                                        <img src="{{ $rel->image_url }}" alt="{{ $rel->Nama_produk }}" loading="lazy"
                                            class="w-full h-full object-cover transition-transform duration-200 ease-out group-hover:brightness-90">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent">
                                        </div>
                                        <!-- Darkening overlay on hover -->
                                        <div
                                            class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-200 pointer-events-none">
                                        </div>

                                        <div class="absolute top-2 left-2 z-10">
                                            <span
                                                class="px-2 py-0.5 rounded-md bg-slate-900/80 backdrop-blur-md text-white text-[9px] font-bold uppercase tracking-wider border border-white/10">
                                                {{ $rel->kategori->Nama_kategori ?? 'Desain' }}
                                            </span>
                                        </div>

                                        <div
                                            class="absolute bottom-2 left-2 right-2 flex items-center justify-between text-[10px] text-white/90 z-10">
                                            <span
                                                class="text-amber-400 font-bold flex items-center space-x-0.5 drop-shadow">
                                                <iconify-icon icon="material-symbols:star-rounded"
                                                    class="text-amber-400 text-xs"></iconify-icon>
                                                <span>{{ number_format($rel->average_rating, 1) }}</span>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Content (Click text leads directly to product/service) -->
                                    <div class="p-3 space-y-1 group-hover:bg-slate-50 transition-colors duration-200">
                                        <h4
                                            class="text-xs sm:text-sm font-bold text-slate-900 line-clamp-1 group-hover:text-brand-600 transition-colors">
                                            {{ $rel->Nama_produk }}
                                        </h4>
                                        <p class="text-[11px] text-slate-500 line-clamp-2 leading-relaxed">
                                            {{ $rel->Des_produk }}
                                        </p>
                                    </div>
                                </a>

                                <!-- Actions -->
                                <div
                                    class="p-3 pt-0 flex items-center space-x-1.5 group-hover:bg-slate-50 transition-colors duration-200">
                                    <a href="{{ route('products.show', $rel->Id_produk) }}"
                                        class="flex-1 py-1.5 text-center text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors">
                                        Detail
                                    </a>
                                    <a href="{{ $rel->whatsapp_link }}" target="_blank"
                                        class="flex-1 inline-flex items-center justify-center space-x-1 py-1.5 text-center text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-xl shadow-sm transition-all">
                                        <iconify-icon icon="simple-icons:whatsapp" class="text-xs"></iconify-icon>
                                        <span>Pesan</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Lightbox Zoom Modal for HD Artwork Inspection -->
    <div id="productLightboxModal"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-md hidden items-center justify-center p-4 transition-all">
        <div class="relative max-w-5xl w-full max-h-[92vh] flex flex-col items-center justify-center">
            <!-- Top Controls -->
            <div class="w-full flex items-center justify-between text-white pb-3 border-b border-white/10">
                <div class="flex items-center space-x-2">
                    <span class="px-2.5 py-0.5 rounded bg-brand-600 text-[11px] font-bold uppercase tracking-wider">Preview
                        HD</span>
                    <h4 class="text-xs sm:text-sm font-bold text-white truncate max-w-md">{{ $produk->Nama_produk }}</h4>
                </div>
                <button type="button" onclick="closeProductLightbox()"
                    class="p-2 rounded-xl bg-white/10 hover:bg-white/20 text-white transition-colors">
                    <iconify-icon icon="lucide:x" class="text-xl"></iconify-icon>
                </button>
            </div>

            <!-- Lightbox Image View -->
            <div class="relative w-full max-h-[78vh] flex items-center justify-center py-4 overflow-hidden">
                <img id="productLightboxImg" src="{{ $produk->gallery_urls[0] ?? $produk->image_url }}"
                    alt="{{ $produk->Nama_produk }}"
                    class="max-w-full max-h-[75vh] object-contain rounded-lg shadow-2xl transition-all duration-300">

                @if (count($produk->gallery_urls) > 1)
                    <button type="button" onclick="prevProductSlide(); syncLightboxImage();"
                        class="absolute left-2 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/60 hover:bg-brand-600 text-white flex items-center justify-center transition-all border border-white/10">
                        <iconify-icon icon="lucide:chevron-left" class="text-xl"></iconify-icon>
                    </button>
                    <button type="button" onclick="nextProductSlide(); syncLightboxImage();"
                        class="absolute right-2 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/60 hover:bg-brand-600 text-white flex items-center justify-center transition-all border border-white/10">
                        <iconify-icon icon="lucide:chevron-right" class="text-xl"></iconify-icon>
                    </button>
                @endif
            </div>

            <!-- Lightbox Thumbnails -->
            @if (count($produk->gallery_urls) > 1)
                <div class="flex items-center space-x-2 pt-2 max-w-full overflow-x-auto pb-1">
                    @foreach ($produk->gallery_urls as $idx => $gUrl)
                        <button type="button" onclick="setProductSlide({{ $idx }}); syncLightboxImage();"
                            class="lightbox-thumb-btn w-12 h-12 rounded-lg overflow-hidden border-2 transition-all shrink-0 {{ $idx === 0 ? 'border-brand-500 ring-2 ring-brand-400' : 'border-white/20 opacity-50 hover:opacity-100' }}"
                            data-index="{{ $idx }}">
                            <img src="{{ $gUrl }}" alt="Thumb {{ $idx + 1 }}"
                                class="w-full h-full object-cover">
                        </button>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Product Auto-Slider & Lightbox Scripts -->
    <script>
        const productSlides = @json($produk->gallery_urls);
        let currentSlideIdx = 0;
        let slideTimer = null;
        const autoSlideDuration = 3500; // 3.5 detik per slide

        function setProductSlide(index) {
            if (!productSlides || productSlides.length === 0) return;
            currentSlideIdx = (index + productSlides.length) % productSlides.length;

            const mainImg = document.getElementById('main-product-image');
            const counterBadge = document.getElementById('slideCounterBadge');

            if (mainImg) {
                mainImg.style.opacity = '0.3';
                setTimeout(() => {
                    mainImg.src = productSlides[currentSlideIdx];
                    mainImg.style.opacity = '1';
                }, 120);
            }

            if (counterBadge) {
                counterBadge.textContent = `${currentSlideIdx + 1} / ${productSlides.length}`;
            }

            // Update main thumbnail borders
            document.querySelectorAll('.gallery-thumb-btn').forEach((btn) => {
                const btnIdx = parseInt(btn.getAttribute('data-index'), 10);
                if (btnIdx === currentSlideIdx) {
                    btn.className =
                        'gallery-thumb-btn aspect-square rounded-xl overflow-hidden border-2 border-brand-600 ring-2 ring-brand-500/20 shadow-sm transition-all group opacity-100';
                } else {
                    btn.className =
                        'gallery-thumb-btn aspect-square rounded-xl overflow-hidden border-2 border-slate-200 hover:border-brand-400 opacity-70 hover:opacity-100 transition-all group';
                }
            });

            // Update dots
            document.querySelectorAll('.slider-dot').forEach((dot, idx) => {
                if (idx === currentSlideIdx) {
                    dot.className = 'slider-dot w-5 h-2 rounded-full bg-brand-600 transition-all';
                } else {
                    dot.className =
                        'slider-dot w-2 h-2 rounded-full bg-slate-300 hover:bg-slate-400 transition-all';
                }
            });

            // Update lightbox thumbnails if open
            updateLightboxThumbs();
        }

        function nextProductSlide() {
            setProductSlide(currentSlideIdx + 1);
        }

        function prevProductSlide() {
            setProductSlide(currentSlideIdx - 1);
        }

        function startProductAutoSlide() {
            if (productSlides.length <= 1) return;
            stopProductAutoSlide();
            slideTimer = setInterval(() => {
                nextProductSlide();
            }, autoSlideDuration);
        }

        function stopProductAutoSlide() {
            if (slideTimer) {
                clearInterval(slideTimer);
                slideTimer = null;
            }
        }

        function syncLightboxImage() {
            const lbImg = document.getElementById('productLightboxImg');
            if (lbImg && productSlides[currentSlideIdx]) {
                lbImg.src = productSlides[currentSlideIdx];
            }
        }

        function updateLightboxThumbs() {
            document.querySelectorAll('.lightbox-thumb-btn').forEach((btn) => {
                const btnIdx = parseInt(btn.getAttribute('data-index'), 10);
                if (btnIdx === currentSlideIdx) {
                    btn.className =
                        'lightbox-thumb-btn w-12 h-12 rounded-lg overflow-hidden border-2 border-brand-500 ring-2 ring-brand-400 transition-all shrink-0 opacity-100';
                } else {
                    btn.className =
                        'lightbox-thumb-btn w-12 h-12 rounded-lg overflow-hidden border-2 border-white/20 opacity-50 hover:opacity-100 transition-all shrink-0';
                }
            });
        }

        function openProductLightbox() {
            stopProductAutoSlide();
            const modal = document.getElementById('productLightboxModal');
            syncLightboxImage();
            updateLightboxThumbs();
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeProductLightbox() {
            const modal = document.getElementById('productLightboxModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
                startProductAutoSlide();
            }
        }

        // Description Collapsible Accordion Logic (Default: Terbuka)
        let isDescriptionOpen = true;

        function toggleProductDescription() {
            isDescriptionOpen = !isDescriptionOpen;
            const content = document.getElementById('productDescriptionContent');
            const chevron = document.getElementById('descChevronIcon');
            const statusText = document.getElementById('descToggleStatus');

            if (content) {
                if (isDescriptionOpen) {
                    content.classList.remove('hidden');
                    if (chevron) chevron.style.transform = 'rotate(0deg)';
                    if (statusText) statusText.textContent = 'Tutup';
                } else {
                    content.classList.add('hidden');
                    if (chevron) chevron.style.transform = 'rotate(180deg)';
                    if (statusText) statusText.textContent = 'Buka';
                }
            }
        }

        // Related Products Auto-Scroll & Scroll Controls (Right-to-Left / Left-to-Right)
        let relatedAutoTimer = null;
        const relatedInterval = 3500; // 3.5s interval

        function scrollRelated(direction) {
            const track = document.getElementById('relatedScrollTrack');
            if (!track) return;
            const firstCard = track.querySelector('div');
            const cardWidth = firstCard ? firstCard.offsetWidth + 14 : 200;
            const scrollStep = cardWidth * 2; // Geser 2 kolom per click/tick

            if (direction === 'right') {
                const maxScroll = track.scrollWidth - track.clientWidth;
                if (track.scrollLeft >= maxScroll - 15) {
                    track.scrollTo({
                        left: 0,
                        behavior: 'smooth'
                    });
                } else {
                    track.scrollBy({
                        left: scrollStep,
                        behavior: 'smooth'
                    });
                }
            } else {
                if (track.scrollLeft <= 15) {
                    track.scrollTo({
                        left: track.scrollWidth,
                        behavior: 'smooth'
                    });
                } else {
                    track.scrollBy({
                        left: -scrollStep,
                        behavior: 'smooth'
                    });
                }
            }
        }

        function startRelatedAutoScroll() {
            stopRelatedAutoScroll();
            const track = document.getElementById('relatedScrollTrack');
            if (!track) return;
            relatedAutoTimer = setInterval(() => {
                scrollRelated('right');
            }, relatedInterval);
        }

        function stopRelatedAutoScroll() {
            if (relatedAutoTimer) {
                clearInterval(relatedAutoTimer);
                relatedAutoTimer = null;
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('productSliderContainer');
            if (container) {
                startProductAutoSlide();
                container.addEventListener('mouseenter', stopProductAutoSlide);
                container.addEventListener('mouseleave', startProductAutoSlide);
                container.addEventListener('touchstart', stopProductAutoSlide, {
                    passive: true
                });
                container.addEventListener('touchend', () => {
                    setTimeout(startProductAutoSlide, 2500);
                }, {
                    passive: true
                });
            }

            const relatedTrack = document.getElementById('relatedScrollTrack');
            if (relatedTrack) {
                startRelatedAutoScroll();
                relatedTrack.addEventListener('mouseenter', stopRelatedAutoScroll);
                relatedTrack.addEventListener('mouseleave', startRelatedAutoScroll);
                relatedTrack.addEventListener('touchstart', stopRelatedAutoScroll, {
                    passive: true
                });
                relatedTrack.addEventListener('touchend', () => {
                    setTimeout(startRelatedAutoScroll, 3000);
                }, {
                    passive: true
                });

                // Mouse drag scroll support
                let isDown = false;
                let startX;
                let scrollLeft;
                relatedTrack.addEventListener('mousedown', (e) => {
                    isDown = true;
                    stopRelatedAutoScroll();
                    startX = e.pageX - relatedTrack.offsetLeft;
                    scrollLeft = relatedTrack.scrollLeft;
                });
                relatedTrack.addEventListener('mouseleave', () => {
                    isDown = false;
                });
                relatedTrack.addEventListener('mouseup', () => {
                    isDown = false;
                    setTimeout(startRelatedAutoScroll, 2500);
                });
                relatedTrack.addEventListener('mousemove', (e) => {
                    if (!isDown) return;
                    e.preventDefault();
                    const x = e.pageX - relatedTrack.offsetLeft;
                    const walk = (x - startX) * 1.5;
                    relatedTrack.scrollLeft = scrollLeft - walk;
                });
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeProductLightbox();
            if (e.key === 'ArrowRight') {
                nextProductSlide();
                syncLightboxImage();
            }
            if (e.key === 'ArrowLeft') {
                prevProductSlide();
                syncLightboxImage();
            }
        });
    </script>

@endsection
