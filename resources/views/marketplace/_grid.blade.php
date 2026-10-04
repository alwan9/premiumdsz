<!-- Filter Status Indicator -->
<div class="flex items-center justify-between mb-6">
    <p class="text-xs text-zinc-500">
        Menampilkan <span class="font-bold text-zinc-800">{{ $produks->total() }}</span> produk/jasa desain
    </p>
    @if ($selectedKategori || $search)
        <button type="button" onclick="resetMarketplaceFilters()"
            class="text-xs font-bold text-brand-600 hover:text-brand-800 cursor-pointer flex items-center space-x-1">
            <iconify-icon icon="lucide:rotate-ccw"></iconify-icon>
            <span>Reset Filter & Pencarian</span>
        </button>
    @endif
</div>

@if ($produks->isEmpty())
    <div data-aos="fade-up"
        class="text-center py-16 bg-zinc-50 rounded-2xl border border-zinc-200 p-8">
        <div
            class="w-12 h-12 rounded-full bg-zinc-200 text-zinc-400 flex items-center justify-center text-xl mx-auto mb-3">
            <iconify-icon icon="lucide:folder-open" class="text-2xl"></iconify-icon>
        </div>
        <h4 class="text-sm font-bold text-zinc-800">Tidak ada produk ditemukan</h4>
        <p class="text-xs text-zinc-500 mt-1">Coba sesuaikan kata kunci pencarian atau pilih kategori lainnya.</p>
        <button type="button" onclick="resetMarketplaceFilters()"
            class="inline-block mt-4 px-4 py-2 rounded-xl bg-brand-600 text-white text-xs font-bold hover:bg-brand-700 transition-colors cursor-pointer">
            Tampilkan Semua Produk
        </button>
    </div>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
        @foreach ($produks as $prod)
            <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 80 }}"
                class="relative rounded-2xl border border-zinc-200 bg-white overflow-hidden hover:border-brand-400 hover:shadow-2xl transform hover:scale-[1.15] hover:z-20 transition-all duration-300 ease-in-out flex flex-col justify-between group">
                <div>
                    <!-- Card Image & Overlay (Aspect Ratio 1:1) -->
                    <a href="{{ route('products.show', $prod->Id_produk) }}" class="block">
                        <div class="aspect-square bg-zinc-200 skeleton-loader relative overflow-hidden cursor-pointer">
                            <img src="{{ $prod->image_url }}" alt="{{ $prod->Nama_produk }}" loading="lazy"
                                class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:brightness-90">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-zinc-950/80 via-transparent to-black/20">
                            </div>
                            <!-- Subtle darkening overlay on hover -->
                            <div
                                class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 ease-in-out pointer-events-none">
                            </div>

                            <div class="absolute top-2.5 left-2.5 z-10">
                                <span
                                    class="px-2 py-0.5 rounded-lg bg-zinc-900/80 backdrop-blur-md text-white text-[9px] font-bold uppercase tracking-wider border border-white/10">
                                    {{ $prod->kategori->Nama_kategori ?? 'Desain' }}
                                </span>
                            </div>

                            <div
                                class="absolute bottom-2.5 left-2.5 right-2.5 flex items-center justify-between text-[10px] text-white/90 z-10">
                                <span
                                    class="text-amber-400 font-bold flex items-center space-x-1 drop-shadow">
                                    <iconify-icon icon="material-symbols:star-rounded"
                                        class="text-amber-400 text-sm"></iconify-icon>
                                    <span>{{ number_format($prod->average_rating, 1) }}</span>
                                </span>
                            </div>
                        </div>
                    </a>

                    <!-- Card Info -->
                    <div class="p-4 group-hover:bg-zinc-50 transition-colors duration-300 ease-in-out">
                        <h3
                            class="text-xs sm:text-sm font-bold text-zinc-900 line-clamp-1 group-hover:text-brand-600 transition-colors duration-300 ease-in-out">
                            <a href="{{ route('products.show', $prod->Id_produk) }}">
                                {{ $prod->Nama_produk }}
                            </a>
                        </h3>
                        <p class="text-[11px] text-zinc-500 mt-1 line-clamp-2 leading-relaxed">
                            {{ $prod->Des_produk }}
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="p-4 pt-0 flex items-center space-x-2 group-hover:bg-zinc-50 transition-colors duration-300 ease-in-out">
                    <a href="{{ route('products.show', $prod->Id_produk) }}"
                        class="flex-1 py-1.5 text-center text-xs font-bold text-zinc-700 bg-zinc-100 hover:bg-zinc-200 rounded-xl transition-colors">
                        Detail
                    </a>
                    <a href="{{ $prod->whatsapp_link }}" target="_blank"
                        class="flex-1 inline-flex items-center justify-center space-x-1 py-1.5 text-center text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-xl shadow-sm transition-all">
                        <iconify-icon icon="simple-icons:whatsapp" class="text-xs"></iconify-icon>
                        <span>Pesan</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10 marketplace-pagination">
        {{ $produks->links() }}
    </div>
@endif
