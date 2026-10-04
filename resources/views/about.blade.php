@extends('layouts.app')

@section('title', 'Tentang Premium Design - Studio Desain Grafis & Marketplace')
@section('meta_description',
    'Mengenal filosofi kerja, standar kualitas, dan layanan desain profesional dari studio
    Premium Design.')

@section('content')

    <!-- Header Banner -->
    <div
        class="bg-gradient-to-b from-brand-50/60 via-zinc-50/40 to-white py-16 sm:py-20 border-b border-zinc-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-down" class="max-w-3xl space-y-3">
                <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Profil & Standar Kualitas</span>
                <h1 class="text-3xl sm:text-5xl font-extrabold font-heading text-zinc-900">Tentang Premium Design</h1>
                <p class="text-xs sm:text-base text-zinc-600 leading-relaxed">
                    Studio desain grafis dan marketplace penyedia solusi identitas visual yang memadukan kejelasan fungsi,
                    estetika kontemporer, dan komitmen profesional.
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <!-- Story & Philosophy Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div data-aos="fade-right" class="lg:col-span-6 space-y-5">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Visi Kerja Studio</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-zinc-900 font-heading leading-tight">
                        Membangun Citra Merek yang Kuat dan Kredibel Melalui Desain Tepat Sasaran
                    </h2>
                    <p class="text-xs sm:text-sm text-zinc-600 leading-relaxed">
                        Premium Design hadir untuk menjawab kebutuhan para pelaku usaha, kreator, dan organisasi yang
                        menginginkan materi visual berkualitas tinggi tanpa proses yang rumit.
                    </p>
                    <p class="text-xs sm:text-sm text-zinc-600 leading-relaxed">
                        Kami meyakini bahwa desain yang baik bukan sekadar hiasan visual, melainkan alat komunikasi
                        strategis yang mampu menumbuhkan kepercayaan konsumen dan memperkuat posisi brand di pasar.
                    </p>
                </div>

                <div data-aos="fade-left" data-aos-delay="150" class="lg:col-span-6">
                    <div
                        class="bg-brand-gradient text-white rounded-3xl p-8 sm:p-10 space-y-6 shadow-xl shadow-brand-700/20">
                        <h3 class="text-lg font-bold font-heading text-white">Ringkasan Statistik Studio</h3>
                        <div class="grid grid-cols-2 gap-4 sm:gap-6 pt-2">
                            <div class="p-4 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/15">
                                <p class="text-3xl font-extrabold text-white font-heading">{{ $totalProduk }}+</p>
                                <p class="text-xs text-brand-100 mt-1">Katalog Portofolio</p>
                            </div>
                            <div class="p-4 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/15">
                                <p class="text-3xl font-extrabold text-white font-heading">{{ $totalKategori }}</p>
                                <p class="text-xs text-brand-100 mt-1">Spesialisasi Kategori</p>
                            </div>
                            <div class="p-4 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/15">
                                <p class="text-3xl font-extrabold text-white font-heading">{{ $totalLayanan }}</p>
                                <p class="text-xs text-brand-100 mt-1">Paket Layanan Siap Pakai</p>
                            </div>
                            <div class="p-4 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/15">
                                <p class="text-3xl font-extrabold text-amber-300 font-heading flex items-center gap-1.5">
                                    {{ number_format($avgRating, 1) }} <iconify-icon icon="material-symbols:star-rounded"
                                        class="text-amber-300 text-2xl"></iconify-icon></p>
                                <p class="text-xs text-brand-100 mt-1">Kepuasan Klien</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Principles -->
            <div class="pt-10 border-t border-zinc-100">
                <div data-aos="fade-up" class="max-w-2xl mb-10">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Prinsip Kerja</span>
                    <h2 class="text-2xl font-bold text-zinc-900 mt-1 font-heading">Standar yang Kami Terapkan di Setiap
                        Proyek</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div data-aos="fade-up" data-aos-delay="100"
                        class="p-6 rounded-2xl bg-zinc-50 border border-zinc-100 space-y-2 hover:border-brand-200 transition-colors">
                        <div
                            class="w-8 h-8 rounded-lg bg-brand-100 text-brand-700 flex items-center justify-center text-sm font-bold">
                            1</div>
                        <h4 class="text-sm font-bold text-zinc-900">Konseptual dan Terarah</h4>
                        <p class="text-xs text-zinc-500 leading-relaxed">
                            Setiap elemen desain memiliki alasan yang jelas, disesuaikan dengan target audiens dan nilai
                            merek klien.
                        </p>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="200"
                        class="p-6 rounded-2xl bg-zinc-50 border border-zinc-100 space-y-2 hover:border-brand-200 transition-colors">
                        <div
                            class="w-8 h-8 rounded-lg bg-brand-100 text-brand-700 flex items-center justify-center text-sm font-bold">
                            2</div>
                        <h4 class="text-sm font-bold text-zinc-900">Kesiapan Cetak & Digital</h4>
                        <p class="text-xs text-zinc-500 leading-relaxed">
                            Penataan warna CMYK/RGB, resolusi 300 DPI, dan format file master yang terstruktur rapi untuk
                            vendor percetakan.
                        </p>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="300"
                        class="p-6 rounded-2xl bg-zinc-50 border border-zinc-100 space-y-2 hover:border-brand-200 transition-colors">
                        <div
                            class="w-8 h-8 rounded-lg bg-brand-100 text-brand-700 flex items-center justify-center text-sm font-bold">
                            3</div>
                        <h4 class="text-sm font-bold text-zinc-900">Transparansi dan Ketepatan</h4>
                        <p class="text-xs text-zinc-500 leading-relaxed">
                            Rincian paket jelas tanpa biaya tersembunyi, disertai jadwal penyelesaian proyek yang dapat
                            diandalkan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Visual Portfolio Snapshot -->
            <div class="pt-10 border-t border-zinc-100">
                <div data-aos="fade-up" class="flex flex-col sm:flex-row sm:items-end justify-between mb-8">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Dokumentasi Karya</span>
                        <h2 class="text-2xl font-bold text-zinc-900 mt-1 font-heading">Portofolio & Hasil Cetak</h2>
                        <p class="text-xs text-zinc-500 mt-1">Beragam hasil implementasi desain kemasan, banner, label,
                            logo, dan antarmuka web.</p>
                    </div>
                    <a href="{{ route('marketplace.index') }}"
                        class="mt-3 sm:mt-0 text-xs font-bold text-brand-600 hover:text-brand-800 flex items-center space-x-1">
                        <span>Buka Semua Karya di Marketplace</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                    </a>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
                    <div data-aos="zoom-in" data-aos-delay="50"
                        class="aspect-square rounded-2xl overflow-hidden border border-zinc-200 group">
                        <img src="{{ asset('assets/kemasan1.jpg') }}" alt="Packaging Pouch Kopi"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div data-aos="zoom-in" data-aos-delay="100"
                        class="aspect-square rounded-2xl overflow-hidden border border-zinc-200 group">
                        <img src="{{ asset('assets/box1.jpg') }}" alt="Hardbox Hampers"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div data-aos="zoom-in" data-aos-delay="150"
                        class="aspect-square rounded-2xl overflow-hidden border border-zinc-200 group">
                        <img src="{{ asset('assets/bannerumkm1.jpg') }}" alt="Banner Spanduk UMKM"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div data-aos="zoom-in" data-aos-delay="200"
                        class="aspect-square rounded-2xl overflow-hidden border border-zinc-200 group">
                        <img src="{{ asset('assets/jasappt1.jpg') }}" alt="Desain Presentasi PPT"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div data-aos="zoom-in" data-aos-delay="250"
                        class="aspect-square rounded-2xl overflow-hidden border border-zinc-200 group">
                        <img src="{{ asset('assets/repairfoto1.jpg') }}" alt="Redesain & Repair Grafis"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div data-aos="zoom-in" data-aos-delay="300"
                        class="aspect-square rounded-2xl overflow-hidden border border-zinc-200 group">
                        <img src="{{ asset('assets/labelumkm1.jpg') }}" alt="Label Stiker Botol"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                </div>
            </div>



        </div>
    </div>

@endsection
