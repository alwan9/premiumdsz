@extends('layouts.app')

@section('title', $produk->Nama_produk . ' - Jasa Desain Grafis Profesional | Premium Designz')
@section('meta_description', Str::limit(strip_tags($produk->Des_produk), 160))
@section('meta_keywords', 'jasa desain ' . strtolower($produk->kategori->Nama_kategori ?? 'grafis') . ', ' . strtolower($produk->Nama_produk) . ', pesan jasa desain, jasa desain grafis murah profesional, premium designz')
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
                <a href="{{ route('marketplace.index', ['kategori' => $produk->Id_kategori]) }}" class="hover:text-brand-600 transition-colors">{{ $produk->kategori->Nama_kategori ?? 'Kategori' }}</a>
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
                    <div data-aos="fade-up" class="rounded-2xl bg-white border border-slate-200 overflow-hidden shadow-sm p-3 sm:p-4 space-y-3" id="productSliderContainer">
                        <!-- Main Image View (Jelas, Terang, Format 3:4 Portrait Cover) -->
                        <div class="relative bg-slate-100 rounded-xl aspect-[3/4] max-h-[640px] w-full overflow-hidden flex items-center justify-center group cursor-pointer border border-slate-200/60" onclick="openProductLightbox()" title="Klik untuk memperbesar tampilan desain">
                            <!-- Main Image Slider -->
                            <img id="main-product-image" 
                                src="{{ $produk->gallery_urls[0] ?? $produk->image_url }}" 
                                alt="{{ $produk->Nama_produk }}" 
                                class="w-full h-full object-cover transition-all duration-500 ease-in-out">

                            <!-- Top Badges & Controls (Brand Gradient Badge) -->
                            <div class="absolute top-3 left-3 z-10 flex items-center space-x-2">
                                <span class="px-3 py-1 rounded-lg bg-brand-gradient text-white text-xs font-bold uppercase tracking-wider shadow-md">
                                    {{ $produk->kategori->Nama_kategori ?? 'Desain' }}
                                </span>
                            </div>

                            <div class="absolute top-3 right-3 z-10 flex items-center space-x-2">
                                <button type="button" onclick="event.stopPropagation(); openProductLightbox();" class="p-2 rounded-lg bg-white/90 hover:bg-white text-slate-800 backdrop-blur-md border border-slate-200/80 transition-colors shadow-md" title="Perbesar Tampilan">
                                    <iconify-icon icon="lucide:maximize-2" class="text-sm"></iconify-icon>
                                </button>
                            </div>

                            <!-- Left / Right Navigation Arrows -->
                            @if (count($produk->gallery_urls) > 1)
                                <button type="button" id="sliderPrevBtn" onclick="event.stopPropagation(); prevProductSlide();" class="absolute left-3 top-1/2 -translate-y-1/2 z-20 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-800 backdrop-blur-md border border-slate-200/80 flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 shadow-lg">
                                    <iconify-icon icon="lucide:chevron-left" class="text-base"></iconify-icon>
                                </button>
                                <button type="button" id="sliderNextBtn" onclick="event.stopPropagation(); nextProductSlide();" class="absolute right-3 top-1/2 -translate-y-1/2 z-20 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-800 backdrop-blur-md border border-slate-200/80 flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 shadow-lg">
                                    <iconify-icon icon="lucide:chevron-right" class="text-base"></iconify-icon>
                                </button>
                            @endif

                            <!-- Bottom Counter Pill & Format Info -->
                            <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between pointer-events-none z-10">
                                <span id="slideCounterBadge" class="text-[11px] font-bold text-slate-800 bg-white/90 px-2.5 py-1 rounded-lg backdrop-blur-sm border border-slate-200/80 shadow-sm">
                                    1 / {{ count($produk->gallery_urls) }}
                                </span>
                                <span class="text-emerald-600 text-[11px] font-bold bg-white/90 px-2.5 py-1 rounded-lg backdrop-blur-sm border border-slate-200/80 shadow-sm flex items-center space-x-1">
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
                                            <button type="button" onclick="setProductSlide({{ $idx }})" class="slider-dot w-2 h-2 rounded-full transition-all {{ $idx === 0 ? 'bg-brand-600 w-5' : 'bg-slate-300 hover:bg-slate-400' }}" title="Slide {{ $idx + 1 }}"></button>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="grid grid-cols-4 sm:grid-cols-6 gap-2">
                                    @foreach ($produk->gallery_urls as $idx => $gUrl)
                                        <button type="button" onclick="setProductSlide({{ $idx }})" class="gallery-thumb-btn aspect-square rounded-xl overflow-hidden border-2 transition-all group {{ $idx === 0 ? 'border-brand-600 ring-2 ring-brand-500/20 shadow-sm' : 'border-slate-200 hover:border-brand-400 opacity-70 hover:opacity-100' }}" data-index="{{ $idx }}">
                                            <img src="{{ $gUrl }}" alt="Preview {{ $idx + 1 }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Description Box -->
                    <div data-aos="fade-up" data-aos-delay="100" class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 space-y-3">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400">Deskripsi & Ruang Lingkup Karya</h3>
                        <p class="text-xs sm:text-sm text-slate-700 leading-relaxed whitespace-pre-line">
                            {{ $produk->Des_produk ?? 'Paket pengerjaan desain grafis profesional siap disesuaikan dengan identitas dan kebutuhan usaha Anda.' }}
                        </p>
                    </div>

                    <!-- Jaminan Kualitas & Keaslian Desain -->
                    <div data-aos="fade-up" data-aos-delay="150" class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Jaminan Kualitas Studio</h3>
                            <span class="text-xs font-bold text-slate-700 flex items-center space-x-1">
                                <iconify-icon icon="material-symbols:star-rounded" class="text-amber-400 text-base"></iconify-icon>
                                <span>Rating 5.0 / 5.0</span>
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100 flex items-start space-x-2.5">
                                <iconify-icon icon="lucide:check-circle-2" class="text-brand-600 text-base shrink-0 mt-0.5"></iconify-icon>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Original Artwork</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5">Dikerjakan custom tanpa template tiruan.</p>
                                </div>
                            </div>
                            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100 flex items-start space-x-2.5">
                                <iconify-icon icon="lucide:sparkles" class="text-brand-600 text-base shrink-0 mt-0.5"></iconify-icon>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">File Master Siap Cetak</h4>
                                    <p class="text-[11px] text-slate-500 mt-0.5">Format vektor tajam resolusi tak terbatas.</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2 flex items-center justify-between text-xs border-t border-slate-100">
                            <span class="text-slate-500">Ingin melihat bukti kepuasan klien lain?</span>
                            <a href="{{ route('home') }}#testimoni" class="font-bold text-brand-600 hover:text-brand-700 flex items-center space-x-1">
                                <span>Lihat Foto Testimoni</span>
                                <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Order Action & Service Package Box -->
                <div data-aos="fade-left" data-aos-delay="100" class="lg:col-span-5 space-y-6">
                    <div class="bg-slate-50 rounded-2xl p-6 sm:p-8 border border-slate-200 space-y-6 sticky top-28 shadow-sm">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-600">Pemesanan Langsung</span>
                            <h1 class="text-xl sm:text-2xl font-bold text-slate-900 mt-1 font-heading">
                                {{ $produk->Nama_produk }}
                            </h1>
                        </div>

                        <!-- Linked Service Package Benefits from DB -->
                        @if ($produk->layanan)
                            <div class="p-4 rounded-xl bg-white border border-slate-200 space-y-2.5">
                                <div class="flex items-center space-x-2 text-brand-700">
                                    <iconify-icon icon="lucide:gem" class="text-xs"></iconify-icon>
                                    <span class="text-xs font-bold uppercase tracking-wider">Paket: {{ $produk->layanan->Nama_layanan }}</span>
                                </div>
                                <div class="text-xs text-slate-700 whitespace-pre-line leading-relaxed">
                                    {{ $produk->layanan->Benefit }}
                                </div>
                            </div>
                        @endif

                        <!-- Key Specifications -->
                        <div class="space-y-2 text-xs text-slate-600">
                            <div class="flex items-center justify-between py-1.5 border-b border-slate-200/60">
                                <span class="text-slate-400">Kategori</span>
                                <span class="font-semibold text-slate-800">{{ $produk->kategori->Nama_kategori ?? '-' }}</span>
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
                            <a href="{{ $produk->whatsapp_link }}" target="_blank" class="w-full inline-flex items-center justify-center space-x-2 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold uppercase tracking-wider shadow-sm transition-all">
                                <iconify-icon icon="simple-icons:whatsapp" class="text-base"></iconify-icon>
                                <span>Pesan Sekarang via WhatsApp</span>
                            </a>

                            <div class="grid grid-cols-2 gap-2 pt-1">
                                <a href="https://shopee.co.id/premium_dz" target="_blank" class="py-2.5 px-3 rounded-xl bg-amber-50 hover:bg-amber-100 border border-amber-200 text-amber-900 text-xs font-bold text-center flex items-center justify-center space-x-1.5 transition-colors">
                                    <iconify-icon icon="simple-icons:shopee" class="text-amber-600 text-xs"></iconify-icon>
                                    <span>Toko Shopee</span>
                                </a>
                                <a href="https://www.fiverr.com/premiumdz" target="_blank" class="py-2.5 px-3 rounded-xl bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 text-emerald-900 text-xs font-bold text-center flex items-center justify-center space-x-1.5 transition-colors">
                                    <iconify-icon icon="simple-icons:fiverr" class="text-emerald-700 text-sm"></iconify-icon>
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

            <!-- Related Products -->
            @if ($relatedProducts->isNotEmpty())
                <div class="mt-16 pt-10 border-t border-slate-100">
                    <div data-aos="fade-up" class="mb-6">
                        <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Koleksi Terkait</span>
                        <h3 class="text-xl font-bold text-slate-900 mt-1 font-heading">Karya Serupa di Kategori Ini</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                        @foreach ($relatedProducts as $rel)
                            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="relative rounded-2xl border border-slate-200 bg-white p-5 flex flex-col justify-between hover:border-brand-400 hover:shadow-2xl hover:scale-[1.15] hover:z-20 transition-transform duration-200 ease-out">
                                <div>
                                    <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded bg-brand-50 text-brand-700">
                                        {{ $rel->kategori->Nama_kategori ?? 'Desain' }}
                                    </span>
                                    <h4 class="text-xs sm:text-sm font-bold text-slate-900 mt-2 line-clamp-1">
                                        <a href="{{ route('products.show', $rel->Id_produk) }}" class="hover:text-brand-600">
                                            {{ $rel->Nama_produk }}
                                        </a>
                                    </h4>
                                    <p class="text-[11px] text-slate-500 mt-1 line-clamp-2">
                                        {{ $rel->Des_produk }}
                                    </p>
                                </div>
                                <div class="mt-4 pt-3 border-t border-slate-100">
                                    <a href="{{ route('products.show', $rel->Id_produk) }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 flex items-center space-x-1">
                                        <span>Lihat Detail</span>
                                        <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
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
    <div id="productLightboxModal" class="fixed inset-0 z-50 bg-black/95 backdrop-blur-md hidden items-center justify-center p-4 transition-all">
        <div class="relative max-w-5xl w-full max-h-[92vh] flex flex-col items-center justify-center">
            <!-- Top Controls -->
            <div class="w-full flex items-center justify-between text-white pb-3 border-b border-white/10">
                <div class="flex items-center space-x-2">
                    <span class="px-2.5 py-0.5 rounded bg-brand-600 text-[11px] font-bold uppercase tracking-wider">Preview HD</span>
                    <h4 class="text-xs sm:text-sm font-bold text-white truncate max-w-md">{{ $produk->Nama_produk }}</h4>
                </div>
                <button type="button" onclick="closeProductLightbox()" class="p-2 rounded-xl bg-white/10 hover:bg-white/20 text-white transition-colors">
                    <iconify-icon icon="lucide:x" class="text-xl"></iconify-icon>
                </button>
            </div>

            <!-- Lightbox Image View -->
            <div class="relative w-full max-h-[78vh] flex items-center justify-center py-4 overflow-hidden">
                <img id="productLightboxImg" src="{{ $produk->gallery_urls[0] ?? $produk->image_url }}" alt="{{ $produk->Nama_produk }}" class="max-w-full max-h-[75vh] object-contain rounded-lg shadow-2xl transition-all duration-300">

                @if (count($produk->gallery_urls) > 1)
                    <button type="button" onclick="prevProductSlide(); syncLightboxImage();" class="absolute left-2 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/60 hover:bg-brand-600 text-white flex items-center justify-center transition-all border border-white/10">
                        <iconify-icon icon="lucide:chevron-left" class="text-xl"></iconify-icon>
                    </button>
                    <button type="button" onclick="nextProductSlide(); syncLightboxImage();" class="absolute right-2 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/60 hover:bg-brand-600 text-white flex items-center justify-center transition-all border border-white/10">
                        <iconify-icon icon="lucide:chevron-right" class="text-xl"></iconify-icon>
                    </button>
                @endif
            </div>

            <!-- Lightbox Thumbnails -->
            @if (count($produk->gallery_urls) > 1)
                <div class="flex items-center space-x-2 pt-2 max-w-full overflow-x-auto pb-1">
                    @foreach ($produk->gallery_urls as $idx => $gUrl)
                        <button type="button" onclick="setProductSlide({{ $idx }}); syncLightboxImage();" class="lightbox-thumb-btn w-12 h-12 rounded-lg overflow-hidden border-2 transition-all shrink-0 {{ $idx === 0 ? 'border-brand-500 ring-2 ring-brand-400' : 'border-white/20 opacity-50 hover:opacity-100' }}" data-index="{{ $idx }}">
                            <img src="{{ $gUrl }}" alt="Thumb {{ $idx + 1 }}" class="w-full h-full object-cover">
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
                    btn.className = 'gallery-thumb-btn aspect-square rounded-xl overflow-hidden border-2 border-brand-600 ring-2 ring-brand-500/20 shadow-sm transition-all group opacity-100';
                } else {
                    btn.className = 'gallery-thumb-btn aspect-square rounded-xl overflow-hidden border-2 border-slate-200 hover:border-brand-400 opacity-70 hover:opacity-100 transition-all group';
                }
            });

            // Update dots
            document.querySelectorAll('.slider-dot').forEach((dot, idx) => {
                if (idx === currentSlideIdx) {
                    dot.className = 'slider-dot w-5 h-2 rounded-full bg-brand-600 transition-all';
                } else {
                    dot.className = 'slider-dot w-2 h-2 rounded-full bg-slate-300 hover:bg-slate-400 transition-all';
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
                    btn.className = 'lightbox-thumb-btn w-12 h-12 rounded-lg overflow-hidden border-2 border-brand-500 ring-2 ring-brand-400 transition-all shrink-0 opacity-100';
                } else {
                    btn.className = 'lightbox-thumb-btn w-12 h-12 rounded-lg overflow-hidden border-2 border-white/20 opacity-50 hover:opacity-100 transition-all shrink-0';
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

        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('productSliderContainer');
            if (container) {
                startProductAutoSlide();
                container.addEventListener('mouseenter', stopProductAutoSlide);
                container.addEventListener('mouseleave', startProductAutoSlide);
                container.addEventListener('touchstart', stopProductAutoSlide, { passive: true });
                container.addEventListener('touchend', () => {
                    setTimeout(startProductAutoSlide, 2500);
                }, { passive: true });
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
