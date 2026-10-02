@extends('layouts.app')

@section('title', 'Jasa Desain Grafis Profesional & Marketplace Desain Custom - Premium Designz')
@section('meta_description', 'Penyedia jasa desain grafis profesional & marketplace visual terpercaya: jasa desain logo brand, kemasan box, standing pouch snack, banner wisuda & promosi UMKM, UI/UX Figma, slide PPT presentasi, CV lamaran, dan apparel jersey custom.')
@section('meta_keywords', 'jasa desain grafis, jasa desain logo, jasa desain kemasan, jasa desain banner, jasa desain banner wisuda, jasa desain banner umkm, jasa desain cv, jasa desain ppt, jasa desain ui ux, jasa desain jersey, jasa desain label, premium designz')

@section('content')

    <!-- HERO SECTION -->
    <section
        class="relative bg-gradient-to-b from-brand-50/50 via-white to-white pt-16 pb-20 md:pt-24 md:pb-28 border-b border-slate-100 overflow-hidden">
        <!-- Grid Pattern Overlay -->
        <div class="hero-grid-pattern absolute inset-0 pointer-events-none z-0"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl mx-auto text-center space-y-6">
                <!-- Label Pill -->

                <!-- Main Title -->
                <h1 data-aos="fade-up" data-aos-delay="100"
                    class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight font-heading leading-tight">
                    {{ $setting->Judul ?? 'Solusi Desain Visual Profesional untuk Meningkatkan Kredibilitas Brand' }}
                </h1>

                <!-- Subtitle -->
                <p data-aos="fade-up" data-aos-delay="200"
                    class="text-sm sm:text-base text-slate-600 leading-relaxed max-w-2xl mx-auto">
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
                        class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-7 py-3.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold uppercase tracking-wider transition-all">
                        <span>Katalog Jasa</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                    </a>
                    <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin konsultasi kebutuhan desain.') }}"
                        target="_blank"
                        class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 px-7 py-3.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold uppercase tracking-wider transition-all">
                        <iconify-icon icon="simple-icons:whatsapp" class="text-brand-600 text-base"></iconify-icon>
                        <span>WhatsApp</span>
                    </a>
                </div>

                <!-- Trust Stats Summary -->
                <div data-aos="fade-up" data-aos-delay="400"
                    class="pt-10 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-2xl mx-auto text-center border-t border-slate-100">
                    <div>
                        <p class="text-2xl font-bold text-slate-900 font-heading">{{ $produks->count() }}+</p>
                        <p class="text-xs text-slate-500 mt-0.5">Karya & Produk</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-slate-900 font-heading">{{ $kategoris->count() }}</p>
                        <p class="text-xs text-slate-500 mt-0.5">Kategori Jasa</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-slate-900 font-heading flex items-center justify-center gap-1">
                            {{ number_format($averageRating, 1) }} <iconify-icon icon="material-symbols:star-rounded"
                                class="text-amber-400 text-2xl"></iconify-icon></p>
                        <p class="text-xs text-slate-500 mt-0.5">Rating Klien</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-emerald-600 font-heading">100%</p>
                        <p class="text-xs text-slate-500 mt-0.5">Garansi File Master</p>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- SECTION: KEUNGGULAN PREMIUM DESIGN -->
    <section class="py-16 bg-white border-b border-slate-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Nilai & Komitmen</span>
                <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 mt-1 font-heading">Keunggulan Layanan Kami</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Point 1 -->
                <div data-aos="fade-up" data-aos-delay="100"
                    class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-brand-200 transition-colors">
                    <div
                        class="w-10 h-10 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center text-lg mb-4">
                        <iconify-icon icon="lucide:pen-tool"></iconify-icon>
                    </div>
                    <h3 class="text-sm font-bold text-slate-900">Desain Orisinal & Eksklusif</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Setiap karya dibuat khusus sesuai visi brand tanpa template daur ulang untuk memastikan identitas
                        unik.
                    </p>
                </div>

                <!-- Point 2 -->
                <div data-aos="fade-up" data-aos-delay="200"
                    class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-brand-200 transition-colors">
                    <div
                        class="w-10 h-10 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center text-lg mb-4">
                        <iconify-icon icon="lucide:file-check-2"></iconify-icon>
                    </div>
                    <h3 class="text-sm font-bold text-slate-900">File Master Lengkap</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Mendapatkan seluruh format file siap cetak dan web seperti AI, SVG, EPS, PDF vektor, dan PNG
                        beresolusi tinggi.
                    </p>
                </div>

                <!-- Point 3 -->
                <div data-aos="fade-up" data-aos-delay="300"
                    class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-brand-200 transition-colors">
                    <div
                        class="w-10 h-10 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center text-lg mb-4">
                        <iconify-icon icon="lucide:clock"></iconify-icon>
                    </div>
                    <h3 class="text-sm font-bold text-slate-900">Pengerjaan Tepat Waktu</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Alur pengerjaan terencana dengan komitmen batas waktu pengiriman konsep dan revisi yang transparan.
                    </p>
                </div>

                <!-- Point 4 -->
                <div data-aos="fade-up" data-aos-delay="400"
                    class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-brand-200 transition-colors">
                    <div
                        class="w-10 h-10 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center text-lg mb-4">
                        <iconify-icon icon="lucide:message-square"></iconify-icon>
                    </div>
                    <h3 class="text-sm font-bold text-slate-900">Komunikasi WhatsApp Cepat</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Konsultasi dan koordinasi langsung terhubung dengan desainer via WhatsApp tanpa perantara berbelit.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: PREVIEW KATEGORI DESAIN (Dynamic from Database) -->
    <section class="py-16 bg-slate-50 border-b border-slate-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="flex flex-col sm:flex-row sm:items-end justify-between mb-10">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Eksplorasi Jasa</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 mt-1 font-heading">Kategori Desain Pilihan</h2>
                </div>
                <div class="mt-3 sm:mt-0">
                    <a href="{{ route('marketplace.index') }}"
                        class="text-xs font-bold text-brand-600 hover:text-brand-800 transition-colors">
                        Lihat Semua Kategori &rarr;
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach ($kategoris as $kat)
                    <a data-aos="fade-up" data-aos-delay="{{ ($loop->index % 5) * 100 }}"
                        href="{{ route('marketplace.index', ['kategori' => $kat->Id_kategori]) }}"
                        class="p-5 rounded-2xl bg-white border border-slate-200/80 hover:border-brand-500 hover:shadow-sm transition-all group flex flex-col justify-between">
                        <div>
                            <div
                                class="w-8 h-8 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center text-sm mb-3 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                                <iconify-icon icon="lucide:layers"></iconify-icon>
                            </div>
                            <h3
                                class="text-xs sm:text-sm font-bold text-slate-800 group-hover:text-brand-600 transition-colors">
                                {{ $kat->Nama_kategori }}
                            </h3>
                            <p class="text-[11px] text-slate-400 mt-1 line-clamp-2">
                                {{ $kat->Des_kategori ?? 'Layanan desain profesional.' }}
                            </p>
                        </div>
                        <div
                            class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                            <span>{{ $kat->produk_digital_count }} Karya</span>
                            <iconify-icon icon="lucide:chevron-right"
                                class="text-[11px] text-slate-300 group-hover:text-brand-600 group-hover:translate-x-1 transition-all"></iconify-icon>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION: PREVIEW PORTOFOLIO & MARKETPLACE (Dynamic from Database) -->
    <section class="py-20 bg-white border-b border-slate-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="flex flex-col sm:flex-row sm:items-end justify-between mb-12">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Portofolio & Marketplace</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 mt-1 font-heading">Katalog Karya Desain Pilihan
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Koleksi proyek desain terbaru yang siap dipesan atau
                        dikustomisasi.</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('marketplace.index') }}"
                        class="inline-flex items-center space-x-1.5 px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition-colors">
                        <span>Buka Semua Produk</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Product Cards Grid (4 Columns Desktop, Scale 115% Duration 200 on Hover) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($produks->take(8) as $prod)
                    <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 100 }}"
                        class="relative rounded-2xl border border-slate-200 bg-white overflow-hidden hover:border-brand-400 hover:shadow-2xl transform hover:scale-[1.15] hover:z-20 transition-all duration-200 ease-out flex flex-col justify-between group">
                        <div>
                            <!-- Product Thumbnail Image & Badge Overlay -->
                            <div class="h-48 bg-slate-900 relative overflow-hidden">
                                <img src="{{ $prod->image_url }}" alt="{{ $prod->Nama_produk }}"
                                    class="w-full h-full object-cover transition-all duration-200 ease-out group-hover:brightness-90">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-black/20">
                                </div>
                                <!-- Subtle darkening overlay on hover -->
                                <div
                                    class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-200 pointer-events-none">
                                </div>

                                <div class="absolute top-3 left-3 z-10">
                                    <span
                                        class="px-2.5 py-1 rounded-lg bg-slate-900/80 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider border border-white/10">
                                        {{ $prod->kategori->Nama_kategori ?? 'Desain' }}
                                    </span>
                                </div>

                                <div
                                    class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-[11px] text-white/90 z-10">
                                    <span class="text-amber-400 font-bold flex items-center space-x-1 drop-shadow">
                                        <iconify-icon icon="material-symbols:star-rounded" class="text-amber-400 text-sm"></iconify-icon>
                                        <span>{{ number_format($prod->average_rating, 1) }}</span>
                                        <span class="text-slate-300 text-[10px]">(Verified)</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Content Info -->
                            <div class="p-5 group-hover:bg-slate-50 transition-colors duration-200">
                                <h3
                                    class="text-xs sm:text-sm font-bold text-slate-900 line-clamp-1 group-hover:text-brand-600 transition-colors">
                                    <a href="{{ route('products.show', $prod->Id_produk) }}">
                                        {{ $prod->Nama_produk }}
                                    </a>
                                </h3>
                                <p class="text-[11px] text-slate-500 mt-1.5 line-clamp-2 leading-relaxed">
                                    {{ $prod->Des_produk }}
                                </p>
                            </div>
                        </div>

                        <!-- Card Actions -->
                        <div class="p-5 pt-0 flex items-center space-x-2 group-hover:bg-slate-50 transition-colors duration-200">
                            <a href="{{ route('products.show', $prod->Id_produk) }}"
                                class="flex-1 py-2 text-center text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors">
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
    <section class="py-20 bg-slate-50 border-b border-slate-100 overflow-hidden" id="testimoni">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section with Prev/Next Controls -->
            <div data-aos="fade-up" class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Bukti Screenshot & Kepuasan
                        Klien</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 mt-1 font-heading">Testimoni Nyata Portofolio
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Geser untuk melihat bukti screenshot review chat &
                        kepuasan hasil desain klien.</p>
                </div>

                <div class="flex items-center justify-between md:justify-end space-x-4">
                    <!-- Rating summary pill with 5 Full Golden Stars -->
                    <div
                        class="flex items-center space-x-3 py-2 px-3.5 bg-white rounded-2xl border border-slate-200 shadow-sm shrink-0">
                        <span class="text-xl font-black text-slate-900 font-heading">5.0</span>
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
                        <span class="text-[11px] text-slate-400 font-medium">({{ $totalReviews }} Review)</span>
                    </div>

                    <!-- Slider Arrow Buttons -->
                    <div class="flex items-center space-x-2">
                        <button type="button" onclick="slideTesti('prev')" aria-label="Previous Slide"
                            class="w-10 h-10 rounded-xl bg-white hover:bg-brand-600 border border-slate-200 hover:border-brand-600 text-slate-700 hover:text-white shadow-sm flex items-center justify-center transition-all">
                            <iconify-icon icon="lucide:chevron-left" class="text-lg"></iconify-icon>
                        </button>
                        <button type="button" onclick="slideTesti('next')" aria-label="Next Slide"
                            class="w-10 h-10 rounded-xl bg-white hover:bg-brand-600 border border-slate-200 hover:border-brand-600 text-slate-700 hover:text-white shadow-sm flex items-center justify-center transition-all">
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
                                class="bg-white rounded-2xl border border-slate-200 hover:border-brand-300 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                                <!-- Portrait Aspect Image Container (Rasio Potret Vertikal Screenshot) -->
                                <div class="relative aspect-[9/14] sm:aspect-[9/15] bg-slate-100 overflow-hidden cursor-pointer"
                                    onclick="openTestiLightbox('{{ $testi->image_url }}', '{{ addslashes($testi->display_title) }}')">
                                    <img src="{{ $testi->image_url }}" alt="{{ $testi->display_title }}"
                                        class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">

                                    <!-- Hover Overlay with Zoom Icon -->
                                    <div
                                        class="absolute inset-0 bg-slate-950/25 group-hover:bg-slate-950/45 transition-colors flex items-center justify-center opacity-0 group-hover:opacity-100 backdrop-blur-[1px]">
                                        <span
                                            class="px-3.5 py-2 bg-white/95 backdrop-blur text-slate-900 rounded-xl text-xs font-bold shadow-xl flex items-center space-x-1.5 transform translate-y-2 group-hover:translate-y-0 transition-all">
                                            <iconify-icon icon="lucide:zoom-in"
                                                class="text-base text-brand-600"></iconify-icon>
                                            <span>Buka Foto Penuh</span>
                                        </span>
                                    </div>

                                    <!-- Top Right 5 Full Stars Solid Gold Badge -->

                                </div>

                                <!-- Card Bottom Info with Verified Badge & 5 Stars -->
                                <div class="p-3.5 bg-white border-t border-slate-100 space-y-1.5">
                                    <div class="flex items-center justify-between">
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
                                        <span
                                            class="inline-flex items-center space-x-1 text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full shrink-0">
                                            <iconify-icon icon="lucide:check-circle-2" class="text-xs"></iconify-icon>
                                            <span>Verified</span>
                                        </span>
                                    </div>

                                    <h3 class="text-xs font-bold text-slate-900 truncate font-heading"
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
            <div class="mt-6 flex items-center justify-center space-x-2 text-xs text-slate-400 sm:hidden">
                <iconify-icon icon="lucide:move-horizontal" class="text-sm"></iconify-icon>
                <span>Geser ke samping untuk melihat lainnya</span>
            </div>
        </div>
    </section>

    <!-- Testimoni Image Lightbox Modal -->
    <div id="testiLightboxModal"
        class="fixed inset-0 z-50 bg-slate-950/85 backdrop-blur-sm hidden items-center justify-center p-3 sm:p-6 transition-opacity"
        onclick="closeTestiLightbox()">
        <div class="relative max-w-xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl animate-in fade-in zoom-in duration-200"
            onclick="event.stopPropagation()">
            <div class="p-4 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                <h3 id="testiLightboxTitle"
                    class="text-xs sm:text-sm font-bold text-slate-900 font-heading truncate pr-4">Bukti Testimoni Klien
                </h3>
                <button type="button" onclick="closeTestiLightbox()"
                    class="w-8 h-8 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-700 flex items-center justify-center transition-colors">
                    <iconify-icon icon="lucide:x" class="text-base"></iconify-icon>
                </button>
            </div>
            <div class="p-3 sm:p-4 bg-slate-950 flex items-center justify-center max-h-[82vh] overflow-y-auto">
                <img id="testiLightboxImg" src="" alt="Bukti Testimoni"
                    class="max-h-[76vh] max-w-full rounded-lg object-contain shadow-lg">
            </div>
        </div>
    </div>

    <script>
        let autoSlideInterval = null;

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

@endsection
