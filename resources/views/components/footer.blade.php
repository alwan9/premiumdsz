<!-- Global Footer Component -->
<footer class="bg-zinc-950 text-zinc-300 pt-16 pb-12 border-t border-zinc-800 mt-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div data-aos="fade-up"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-zinc-800">
            <!-- Brand Info -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('assets/other/logo_white.png') }}" alt="Logo Premium Design"
                        class="h-9 sm:h-10 w-auto object-contain">
                </div>
                <p class="text-zinc-400 text-xs sm:text-sm leading-relaxed pr-6">
                    Studio desain grafis dan marketplace penyedia layanan visual profesional. Tersedia pemesanan
                    langsung melalui WhatsApp, Shopee Official, Fiverr Pro, dan katalog Lynk.id.
                </p>
            </div>

            <!-- Navigasi -->
            <div>
                <h4 class="text-white font-semibold text-xs uppercase tracking-wider mb-4">Navigasi Utama</h4>
                <ul class="space-y-2.5 text-xs text-zinc-400">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('portofolio.index') }}"
                            class="hover:text-white transition-colors flex items-center space-x-1.5">
                            <span>Portofolio Desain</span></a></li>
                    <li><a href="{{ route('marketplace.index') }}"
                            class="hover:text-white transition-colors">Marketplace Desain</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Layanan Cepat -->
            <div>
                <h4 class="text-white font-semibold text-xs uppercase tracking-wider mb-4">Pusat Layanan</h4>
                <p class="text-xs text-zinc-400 mb-2">Siap mendiskusikan kebutuhan desain Anda?</p>
                <p class="text-[11px] text-brand-200 mb-3 flex items-center space-x-1.5">
                    <iconify-icon icon="lucide:clock" class="text-brand-300"></iconify-icon>
                    <span>Buka Setiap Hari: 09.00 - 23.00 WIB</span>
                </p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-zinc-500">
            <p>&copy; {{ date('Y') }} Premium Design. Hak cipta dilindungi.</p>
            <div class="flex items-center space-x-4 mt-4 sm:mt-0">
                <a href="{{ route('admin.login') }}" class="hover:text-zinc-400 transition-colors">Portal Admin</a>
            </div>
        </div>
    </div>
</footer>
