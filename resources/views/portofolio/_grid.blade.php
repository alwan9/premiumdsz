<!-- Search / Filter State Header -->
@if ($search || ($selectedKategori && $selectedKategori !== 'all'))
    <div
        class="mb-8 p-4 rounded-2xl bg-slate-50 border border-slate-200/80 shadow-xs flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center space-x-2 text-xs sm:text-sm text-slate-700">
            <iconify-icon icon="lucide:filter" class="text-brand-600 text-lg"></iconify-icon>
            <span>
                Hasil filter:
                @if ($selectedKategori && $selectedKategori !== 'all')
                    <strong class="text-brand-700">Kategori "{{ $selectedKategori }}"</strong>
                @endif
                @if ($search)
                    <span class="text-slate-400">|</span> Kata kunci: <strong
                        class="text-brand-700">"{{ $search }}"</strong>
                @endif
                <span class="text-slate-500">({{ $portofolios->total() }} hasil ditemukan)</span>
            </span>
        </div>
        <button type="button" onclick="resetPortfolioFilters()"
            class="text-xs font-bold text-rose-600 hover:text-rose-700 flex items-center space-x-1 cursor-pointer">
            <iconify-icon icon="lucide:rotate-ccw"></iconify-icon>
            <span>Reset Filter</span>
        </button>
    </div>
@endif

@if ($portofolios->count() > 0)
    <!-- Pure Image Grid (5 Columns, Original Natural Aspect Ratio, Frameless, Hover Scale 1.15 & Zoom) -->
    <div class="columns-2 sm:columns-3 md:columns-4 lg:columns-5 gap-3 sm:gap-4 [column-fill:_balance] py-2">
        @foreach ($portofolios as $index => $item)
            <div data-aos="fade-up" data-aos-delay="{{ ($index % 5) * 35 }}"
                class="break-inside-avoid mb-3 sm:mb-4 group relative rounded-2xl overflow-hidden bg-slate-900 cursor-zoom-in shadow-xs hover:shadow-2xl transform hover:scale-[1.15] hover:z-20 transition-all duration-200 ease-out"
                onclick="openPortfolioZoom({{ $index }})">

                <img src="{{ $item->image_url }}" alt="{{ $item->nama }}" loading="lazy"
                    class="w-full h-auto block transition-all duration-200 ease-out group-hover:brightness-90">

                <!-- Subtle Darkening & Zoom Overlay Icon -->
                <div
                    class="absolute inset-0 bg-slate-950/30 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center pointer-events-none">
                    <div
                        class="w-10 h-10 rounded-full bg-white/95 backdrop-blur-sm text-slate-900 flex items-center justify-center shadow-lg transform scale-75 group-hover:scale-100 transition-transform duration-200">
                        <iconify-icon icon="lucide:zoom-in" class="text-lg text-brand-600"></iconify-icon>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex items-center justify-center portfolio-pagination">
        {{ $portofolios->links() }}
    </div>
@else
    <!-- Empty State -->
    <div data-aos="fade-up" class="max-w-md mx-auto text-center py-16 px-4 space-y-4">
        <div
            class="w-16 h-16 rounded-3xl bg-brand-50 text-brand-600 mx-auto flex items-center justify-center text-3xl">
            <iconify-icon icon="lucide:image-off"></iconify-icon>
        </div>
        <div class="space-y-1">
            <h3 class="text-base font-bold text-slate-900">Tidak ada karya yang cocok</h3>
            <p class="text-xs text-slate-500">
                Coba ubah kata kunci pencarian atau pilih kategori lain.
            </p>
        </div>
        <button type="button" onclick="resetPortfolioFilters()"
            class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-brand-600 text-white text-xs font-bold hover:bg-brand-700 transition-colors shadow-sm cursor-pointer">
            <iconify-icon icon="lucide:refresh-cw"></iconify-icon>
            <span>Tampilkan Semua Portofolio</span>
        </button>
    </div>
@endif
