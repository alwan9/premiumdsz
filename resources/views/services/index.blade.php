@extends('layouts.app')

@section('title', 'Paket Layanan & Price List Jasa Desain - Premium Design')
@section('meta_description', 'Daftar paket jasa desain grafis, UI/UX, branding, dan 3D assets dengan rincian benefit lengkap.')

@section('content')

    <!-- Header Banner -->
    <div class="bg-gradient-to-b from-brand-50/60 via-slate-50/40 to-white py-20 border-b border-slate-100 text-center relative overflow-hidden">
        <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[400px] bg-brand-500/10 rounded-full blur-[120px] pointer-events-none"></div>

        <div data-aos="fade-down" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
            <span class="inline-block px-4 py-1.5 rounded-full bg-brand-50 border border-brand-200 text-brand-700 text-xs font-semibold tracking-wide">
                TRANSPARAN & KOMPREHENSIF
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight font-heading text-slate-900">
                Paket Layanan & Price List Desain
            </h1>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl mx-auto">
                Pilih paket pengerjaan desain yang paling sesuai dengan skala dan target bisnis Anda. Semua paket mencakup file master siap pakai dan revisi prioritas.
            </p>
        </div>
    </div>

    <!-- Pricing Grid -->
    <div class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($layanans as $layanan)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 120 }}" class="bg-white rounded-3xl p-8 border border-slate-200/80 shadow-sm hover:shadow-xl hover:border-brand-500/40 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 rounded-2xl bg-brand-100 text-brand-700 flex items-center justify-center text-2xl group-hover:bg-brand-600 group-hover:text-white transition-colors">
                                    <iconify-icon icon="lucide:gem" class="text-2xl"></iconify-icon>
                                </div>
                                <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-[11px] font-semibold">
                                    Paket Jasa
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-brand-600 transition-colors">
                                {{ $layanan->Nama_layanan }}
                            </h3>

                            <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                                {{ $layanan->Des_layanan ?? 'Solusi desain profesional dengan kualitas visual standar industri.' }}
                            </p>

                            <!-- Linked Showcase Product if any -->
                            @if ($layanan->produk)
                                <div class="mt-4 p-3 rounded-2xl bg-slate-50 border border-slate-100 flex items-center space-x-3 text-xs">
                                    <img src="{{ $layanan->produk->image_url }}" alt="{{ $layanan->produk->Nama_produk }}" class="w-10 h-10 rounded-lg object-cover border border-slate-200 shrink-0">
                                    <div class="truncate">
                                        <p class="text-[10px] text-slate-400 uppercase font-semibold">Contoh Implementasi</p>
                                        <a href="{{ route('products.show', $layanan->produk->Id_produk) }}" class="font-bold text-brand-600 hover:underline truncate block">{{ $layanan->produk->Nama_produk }}</a>
                                    </div>
                                </div>
                            @endif

                            <!-- Benefit Checklist with Iconify -->
                            <div class="mt-6 pt-6 border-t border-slate-100">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-4">Cakupan Benefit:</h4>
                                <div class="text-xs text-slate-700 space-y-2.5 leading-relaxed">
                                    @php
                                        $benefitLines = explode("\n", $layanan->Benefit ?? "• Garansi Revisi\n• Master Files Vektor & Siap Pakai\n• Konsultasi Strategis");
                                    @endphp
                                    @foreach($benefitLines as $bLine)
                                        @if(trim($bLine))
                                            <div class="flex items-start space-x-2">
                                                <iconify-icon icon="lucide:check-circle-2" class="text-emerald-600 text-sm mt-0.5 shrink-0"></iconify-icon>
                                                <span>{{ ltrim(trim($bLine), '•- ') }}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- CTA Order via WhatsApp -->
                        <div class="mt-8 pt-4">
                            <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin konsultasi dan memesan: ' . $layanan->Nama_layanan) }}" target="_blank" class="w-full inline-flex items-center justify-center space-x-2 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold shadow-md shadow-emerald-600/20 transition-all">
                                <iconify-icon icon="simple-icons:whatsapp" class="text-sm"></iconify-icon>
                                <span>Pesan Paket via WhatsApp</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Custom Project Consultation Box -->
            <div data-aos="zoom-in" data-aos-duration="600" class="mt-16 bg-brand-gradient rounded-3xl p-8 sm:p-12 text-white flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl shadow-brand-700/20">
                <div class="space-y-2 text-center md:text-left">
                    <h3 class="text-2xl font-bold font-heading">Butuh Paket Khusus atau Penawaran Custom?</h3>
                    <p class="text-xs sm:text-sm text-brand-100 max-w-xl">
                        Kami juga melayani kebutuhan desain perusahaan skala besar, desain kemasan, 3D animasi, dan retainer bulanan.
                    </p>
                </div>
                <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin mengajukan penawaran custom project desain.') }}" target="_blank" class="shrink-0 inline-flex items-center space-x-2 px-6 py-3.5 rounded-2xl bg-white text-brand-700 hover:bg-brand-50 text-xs font-bold uppercase tracking-wider transition-all shadow-lg">
                    <iconify-icon icon="simple-icons:whatsapp" class="text-emerald-600 text-base"></iconify-icon>
                    <span>Diskusikan Custom Project</span>
                </a>
            </div>
        </div>
    </div>

@endsection
