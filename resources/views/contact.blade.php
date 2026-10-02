@extends('layouts.app')

@section('title', 'Hubungi Kami - Premium Design Studio')
@section('meta_description', 'Kontak resmi studio Premium Design untuk konsultasi jasa desain grafis, logo, kemasan, dan media promosi.')

@section('content')

    <!-- Header Banner -->
    <div class="bg-gradient-to-b from-brand-50/60 via-slate-50/40 to-white py-14 sm:py-16 border-b border-slate-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-down" class="max-w-2xl space-y-2">
                <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Kontak & Konsultasi</span>
                <h1 class="text-2xl sm:text-4xl font-extrabold font-heading text-slate-900">Hubungi Premium Design</h1>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Kami siap melayani pertanyaan, konsultasi brief desain, dan penawaran kerja sama proyek.
                </p>
            </div>
        </div>
    </div>

    <!-- Main Contact Section -->
    <div class="py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left: Contact Information Cards -->
                <div data-aos="fade-right" class="lg:col-span-5 space-y-6">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Saluran Resmi</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 mt-1 font-heading">Informasi Kontak Studio</h2>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                            Pilih saluran komunikasi yang paling nyaman bagi Anda. Kami menyarankan WhatsApp untuk respon tercepat.
                        </p>
                    </div>

                    <!-- Direct WhatsApp Card -->
                    <div data-aos="zoom-in" data-aos-delay="100" class="p-6 rounded-2xl bg-brand-50 border border-brand-100 space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-brand-600 text-white flex items-center justify-center text-xl shadow-md shadow-brand-700/20">
                                <iconify-icon icon="simple-icons:whatsapp"></iconify-icon>
                            </div>
                            <div>
                                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider">WhatsApp Studio (Rekomendasi)</h3>
                                <p class="text-sm font-extrabold text-brand-700 font-mono">0851-6817-4679</p>
                            </div>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Respon langsung dari desainer pada jam operasional kerja.
                        </p>
                        <a href="https://api.whatsapp.com/send/?phone=6285168174679&text={{ urlencode('Halo Premium Design, saya ingin konsultasi kebutuhan desain.') }}" target="_blank" class="inline-flex items-center space-x-2 px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold transition-colors shadow-sm">
                            <span>Mulai Chat WhatsApp</span>
                            <iconify-icon icon="lucide:external-link" class="text-xs"></iconify-icon>
                        </a>
                    </div>

                    <!-- Email & Operational Hours -->
                    <div data-aos="fade-up" data-aos-delay="150" class="space-y-4 text-xs text-slate-600">
                        <div class="p-4 rounded-xl border border-slate-200 flex items-start space-x-3">
                            <iconify-icon icon="lucide:mail" class="text-brand-600 text-lg mt-0.5"></iconify-icon>
                            <div>
                                <p class="font-bold text-slate-800">Email Resmi</p>
                                <a href="mailto:designzpremium@gmail.com" class="text-brand-600 font-semibold hover:underline mt-0.5 block">designzpremium@gmail.com</a>
                            </div>
                        </div>

                        <div class="p-4 rounded-xl border border-slate-200 flex items-start space-x-3">
                            <iconify-icon icon="lucide:clock" class="text-brand-600 text-lg mt-0.5"></iconify-icon>
                            <div>
                                <p class="font-bold text-slate-800">Jam Operasional</p>
                                <p class="text-slate-500 mt-0.5 font-medium">Setiap Hari: 09.00 - 23.00 WIB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Official Store & Social Channels -->
                    <div data-aos="fade-up" data-aos-delay="200" class="p-5 rounded-2xl bg-brand-gradient text-white space-y-4 shadow-lg shadow-brand-700/20">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-white">Marketplace & Official Channels</h3>
                        <div class="grid grid-cols-2 gap-2.5 text-xs">
                            <a href="https://shopee.co.id/premium_dz" target="_blank" class="p-3 rounded-xl bg-white/10 hover:bg-white/20 border border-white/15 transition-all flex items-center space-x-2 text-white hover:text-amber-300">
                                <iconify-icon icon="simple-icons:shopee" class="text-amber-400 text-sm"></iconify-icon>
                                <span class="font-bold text-[11px] truncate">Shopee Store</span>
                            </a>
                            <a href="https://www.instagram.com/premiumdsz/" target="_blank" class="p-3 rounded-xl bg-white/10 hover:bg-white/20 border border-white/15 transition-all flex items-center space-x-2 text-white hover:text-pink-300">
                                <iconify-icon icon="simple-icons:instagram" class="text-pink-400 text-sm"></iconify-icon>
                                <span class="font-bold text-[11px] truncate">@premiumdsz</span>
                            </a>
                            <a href="https://www.tiktok.com/@premium.designz" target="_blank" class="p-3 rounded-xl bg-white/10 hover:bg-white/20 border border-white/15 transition-all flex items-center space-x-2 text-white hover:text-cyan-300">
                                <iconify-icon icon="simple-icons:tiktok" class="text-cyan-300 text-sm"></iconify-icon>
                                <span class="font-bold text-[11px] truncate">@premium.designz</span>
                            </a>
                            <a href="https://www.fiverr.com/premiumdz" target="_blank" class="p-3 rounded-xl bg-white/10 hover:bg-white/20 border border-white/15 transition-all flex items-center space-x-2 text-white hover:text-emerald-300">
                                <iconify-icon icon="simple-icons:fiverr" class="text-emerald-400 text-base"></iconify-icon>
                                <span class="font-bold text-[11px] truncate">Fiverr Global</span>
                            </a>
                        </div>
                        <a href="https://lynk.id/premiumdsz" target="_blank" class="w-full py-2.5 px-3 rounded-xl bg-white/10 hover:bg-white/20 border border-white/15 text-center text-xs font-bold text-white flex items-center justify-center space-x-2 transition-colors">
                            <iconify-icon icon="lucide:link-2" class="text-xs"></iconify-icon>
                            <span>Buka Lynk.id Link Hub (Semua Tautan)</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Quick Project Inquiry Form -->
                <div data-aos="fade-left" data-aos-delay="100" class="lg:col-span-7">
                    <div class="p-8 sm:p-10 rounded-2xl bg-slate-50 border border-slate-200 space-y-6 shadow-sm">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Formulir Pesan</span>
                            <h3 class="text-xl font-bold text-slate-900 mt-1 font-heading">Kirimkan Rencana Proyek Desain</h3>
                            <p class="text-xs text-slate-500 mt-1">
                                Isi rincian awal berikut, sistem kami akan langsung menyusun pesan otomatis ke WhatsApp desainer kami.
                            </p>
                        </div>

                        <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
                            @csrf

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="space-y-1.5">
                                    <label class="text-xs font-bold text-slate-700">Nama Lengkap <span class="text-rose-500">*</span></label>
                                    <input type="text" name="nama" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Nama Anda">
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-xs font-bold text-slate-700">Alamat Email <span class="text-rose-500">*</span></label>
                                    <input type="email" name="email" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="nama@email.com">
                                </div>
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-slate-700">Kebutuhan Jasa Desain <span class="text-rose-500">*</span></label>
                                <select name="layanan" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500">
                                    <option value="Logo & Brand Identity">Logo & Brand Identity</option>
                                    <option value="Desain Kemasan & Packaging">Desain Kemasan & Packaging</option>
                                    <option value="Materi Promosi, Banner & Poster">Materi Promosi, Banner & Poster</option>
                                    <option value="Brosur, Katalog & Company Profile">Brosur, Katalog & Company Profile</option>
                                    <option value="UI/UX Website & Aplikasi Mobile">UI/UX Website & Aplikasi Mobile</option>
                                    <option value="Jersey & Apparel Desain">Jersey & Apparel Desain</option>
                                    <option value="Repair / Vektorisasi Desain Lama">Repair / Vektorisasi Desain Lama</option>
                                    <option value="Kebutuhan Desain Lainnya">Kebutuhan Desain Lainnya</option>
                                </select>
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-slate-700">Ceritakan Singkat Rencana Proyek <span class="text-rose-500">*</span></label>
                                <textarea name="pesan" rows="4" required class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Jelaskan jenis usaha, target waktu penyelesaian, atau referensi gaya desain yang diinginkan..."></textarea>
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="w-full py-3.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs uppercase tracking-wider shadow-sm transition-all flex items-center justify-center space-x-2">
                                    <iconify-icon icon="simple-icons:whatsapp" class="text-base"></iconify-icon>
                                    <span>Kirimkan ke WhatsApp Studio</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
