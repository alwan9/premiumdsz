@extends('layouts.admin')

@section('title', 'Dashboard Overview - Admin Premium Design')
@section('page_title', 'Dashboard Ringkasan')

@section('content')

    <!-- Metrics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Produk Digital</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-1">{{ $totalProduk }}</h3>
                <span class="text-[11px] text-brand-600 font-medium mt-1 inline-block">Portofolio & Marketplace</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-xl">
                <iconify-icon icon="lucide:layers" class="text-2xl"></iconify-icon>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Kategori Aktif</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-1">{{ $totalKategori }}</h3>
                <span class="text-[11px] text-indigo-600 font-medium mt-1 inline-block">Spesialisasi Desain</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl">
                <iconify-icon icon="lucide:tags" class="text-2xl"></iconify-icon>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Paket Layanan</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-1">{{ $totalLayanan }}</h3>
                <span class="text-[11px] text-emerald-600 font-medium mt-1 inline-block">Price List Dinamis</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                <iconify-icon icon="lucide:gem" class="text-2xl"></iconify-icon>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Testimoni Klien</p>
                <h3 class="text-3xl font-extrabold text-slate-900 mt-1">{{ $totalTestimoni }}</h3>
                <span class="text-[11px] text-amber-600 font-medium mt-1 inline-flex items-center gap-1">Avg Rating {{ number_format($avgRating, 1) }} <iconify-icon icon="material-symbols:star-rounded" class="text-amber-500 text-sm"></iconify-icon></span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
                <iconify-icon icon="material-symbols:star-rounded" class="text-3xl"></iconify-icon>
            </div>
        </div>
    </div>

    <!-- Recent Tables Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Recent Products -->
        <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Produk & Portofolio Terbaru</h3>
                    <p class="text-xs text-slate-500">5 karya desain digital yang baru diinput</p>
                </div>
                <a href="{{ route('admin.produk.create') }}" class="px-3.5 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold transition-colors inline-flex items-center space-x-1">
                    <iconify-icon icon="lucide:plus" class="text-xs"></iconify-icon>
                    <span>Tambah Produk</span>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider border-y border-slate-100">
                        <tr>
                            <th class="py-3 px-3">Nama Produk</th>
                            <th class="py-3 px-3">Kategori</th>
                            <th class="py-3 px-3">Stok</th>
                            <th class="py-3 px-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($recentProduk as $prod)
                            <tr class="hover:bg-slate-50">
                                <td class="py-3 px-3 font-semibold text-slate-800">{{ $prod->Nama_produk }}</td>
                                <td class="py-3 px-3 text-slate-500">{{ $prod->kategori->Nama_kategori ?? '-' }}</td>
                                <td class="py-3 px-3">
                                    <span class="px-2 py-0.5 rounded-full font-bold {{ $prod->Stok_produk > 0 ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }}">
                                        {{ $prod->Stok_produk }}
                                    </span>
                                </td>
                                <td class="py-3 px-3 text-right space-x-2">
                                    <a href="{{ route('admin.produk.edit', $prod->Id_produk) }}" class="text-brand-600 hover:text-brand-800 font-bold">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Reviews -->
        <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Ulasan & Rating Terbaru</h3>
                    <p class="text-xs text-slate-500">Testimoni terbaru dari klien</p>
                </div>
                <a href="{{ route('admin.testimoni.create') }}" class="px-3.5 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold transition-colors inline-flex items-center space-x-1">
                    <iconify-icon icon="lucide:plus" class="text-xs"></iconify-icon>
                    <span>Tambah Foto</span>
                </a>
            </div>

            <div class="space-y-3">
                @foreach ($recentTestimoni as $testi)
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-center space-x-3 text-xs">
                        <img src="{{ $testi->image_url }}" alt="{{ $testi->Judul }}" class="w-12 h-12 rounded-lg object-cover border border-slate-200 shrink-0">
                        <div class="truncate flex-1">
                            <span class="font-bold text-slate-900 block truncate">{{ $testi->Judul }}</span>
                            <span class="text-[11px] text-slate-400 font-mono truncate block">{{ $testi->Foto_url }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
