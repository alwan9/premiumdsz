@extends('layouts.admin')

@section('title', 'Kelola Jasa Desain - Admin Premium Design')
@section('page_title', 'Jasa & Portofolio')

@section('content')

    <div class="bg-white rounded-3xl border border-zinc-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] p-5 sm:p-7 space-y-5 max-w-full">
        <!-- Top Action Bar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-2 border-b border-zinc-100">
            <div>
                <h2 class="text-base font-bold text-zinc-900 font-heading">Katalog Jasa &amp; Portofolio</h2>
                <p class="text-xs text-zinc-500">Kelola item portofolio, status jasa desain, dan nomor kontak WhatsApp</p>
            </div>
            <a href="{{ route('admin.produk.create') }}" class="inline-flex items-center space-x-2 px-3.5 py-2 bg-brand-gradient hover:brightness-110 text-white rounded-xl text-xs font-bold transition-all shadow-sm shadow-brand-700/20 whitespace-nowrap shrink-0">
                <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                <span>Tambah Jasa</span>
            </a>
        </div>

        <!-- Search & Filter Form -->
        <form action="{{ route('admin.produk.index') }}" method="GET" class="p-3.5 rounded-2xl bg-zinc-50 border border-zinc-200/80 grid grid-cols-1 sm:grid-cols-12 gap-2.5 items-center">
            <div class="sm:col-span-6 relative">
                <iconify-icon icon="lucide:search" class="absolute left-3 top-2.5 text-zinc-400 text-xs"></iconify-icon>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama jasa..." class="w-full pl-8 pr-3 py-1.5 bg-white border border-zinc-200 rounded-lg text-xs text-zinc-800 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>

            <div class="sm:col-span-4">
                <select name="kategori" class="w-full px-2.5 py-1.5 bg-white border border-zinc-200 rounded-lg text-xs text-zinc-700 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="">-- Semua Kategori --</option>
                    @foreach ($kategoris as $k)
                        <option value="{{ $k->Id_kategori }}" {{ request('kategori') == $k->Id_kategori ? 'selected' : '' }}>
                            {{ $k->Nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="sm:col-span-2 flex items-center space-x-1.5">
                <button type="submit" class="flex-1 py-1.5 bg-zinc-900 hover:bg-zinc-800 text-white rounded-lg text-xs font-bold transition-colors whitespace-nowrap">
                    Filter
                </button>
                @if (request('search') || request('kategori'))
                    <a href="{{ route('admin.produk.index') }}" class="p-1.5 bg-zinc-200 hover:bg-zinc-300 text-zinc-700 rounded-lg text-xs transition-colors flex items-center justify-center shrink-0" title="Reset filter">
                        <iconify-icon icon="lucide:rotate-ccw" class="text-xs"></iconify-icon>
                    </a>
                @endif
            </div>
        </form>

        <!-- Service / Jasa Table Container -->
        <div class="rounded-2xl border border-zinc-200/80 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs whitespace-nowrap">
                    <thead class="bg-zinc-50 text-zinc-500 uppercase tracking-wider border-b border-zinc-200 text-[10px] font-bold">
                        <tr>
                            <th class="py-2.5 px-3">No</th>
                            <th class="py-2.5 px-3">ID Jasa</th>
                            <th class="py-2.5 px-3">Nama Jasa</th>
                            <th class="py-2.5 px-3">Kategori</th>
                            <th class="py-2.5 px-3">Paket Layanan</th>
                            <th class="py-2.5 px-3">Estimasi</th>
                            <th class="py-2.5 px-3">WhatsApp</th>
                            <th class="py-2.5 px-3">Stok Kuota</th>
                            <th class="py-2.5 px-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        @forelse ($produks as $prod)
                            <tr class="hover:bg-zinc-50/80 transition-colors">
                                <td class="py-2.5 px-3 font-semibold text-zinc-400 text-xs">{{ ($produks->currentPage() - 1) * $produks->perPage() + $loop->iteration }}</td>
                                <td class="py-2.5 px-3">
                                    <span class="px-2 py-0.5 rounded-md font-mono font-bold text-[11px] bg-brand-50 text-brand-700 border border-brand-100">
                                        {{ $prod->custom_id }}
                                    </span>
                                </td>
                                <td class="py-2.5 px-3">
                                    <div class="flex items-center space-x-2.5 min-w-0">
                                        <img src="{{ $prod->image_url }}" alt="{{ $prod->Nama_produk }}" class="w-8 h-8 rounded-lg object-cover border border-zinc-200 shrink-0">
                                        <a href="{{ route('admin.produk.show', $prod->Id_produk) }}" class="font-bold text-zinc-800 hover:text-brand-600 truncate max-w-[130px] sm:max-w-[170px] lg:max-w-[200px] block text-xs" title="{{ $prod->Nama_produk }}">
                                            {{ $prod->Nama_produk }}
                                        </a>
                                    </div>
                                </td>
                                <td class="py-2.5 px-3">
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-zinc-100 text-zinc-700">
                                        {{ $prod->kategori->Nama_kategori ?? '-' }}
                                    </span>
                                </td>
                                <td class="py-2.5 px-3 text-zinc-600">
                                    <span class="truncate max-w-[110px] block text-[11px]">{{ $prod->layanan->Nama_layanan ?? '-' }}</span>
                                </td>
                                <td class="py-2.5 px-3">
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-medium bg-zinc-100 text-zinc-700 inline-flex items-center space-x-1">
                                        <iconify-icon icon="lucide:clock" class="text-[10px] text-brand-600"></iconify-icon>
                                        <span>{{ $prod->Estimasi ?? '1-2 Hari' }}</span>
                                    </span>
                                </td>
                                <td class="py-2.5 px-3 font-mono text-emerald-700 font-semibold text-[11px]">{{ $prod->No_wa ?? '085168174679' }}</td>
                                <td class="py-2.5 px-3">
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-bold {{ $prod->Stok_produk > 0 ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-rose-50 text-rose-700 border border-rose-200' }}">
                                        {{ $prod->Stok_produk }} Kuota
                                    </span>
                                </td>
                                <td class="py-2.5 px-3 text-right space-x-1">
                                    <a href="{{ route('admin.produk.show', $prod->Id_produk) }}" class="p-1.5 bg-zinc-100 hover:bg-zinc-200 text-zinc-700 rounded-lg font-bold inline-flex items-center justify-center transition-colors" title="Lihat Detail">
                                        <iconify-icon icon="lucide:eye" class="text-xs"></iconify-icon>
                                    </a>
                                    <a href="{{ route('admin.produk.edit', $prod->Id_produk) }}" class="p-1.5 bg-brand-50 hover:bg-brand-100 text-brand-700 rounded-lg font-bold inline-flex items-center justify-center transition-colors" title="Edit">
                                        <iconify-icon icon="lucide:edit-3" class="text-xs"></iconify-icon>
                                    </a>
                                    <form action="{{ route('admin.produk.destroy', $prod->Id_produk) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus jasa ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 bg-rose-50 hover:bg-rose-500 text-rose-600 hover:text-white rounded-lg font-bold inline-flex items-center justify-center transition-colors" title="Hapus">
                                            <iconify-icon icon="lucide:trash-2" class="text-xs"></iconify-icon>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-8 text-zinc-400">Tidak ada data jasa yang cocok.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pt-2">
            {{ $produks->links() }}
        </div>
    </div>

@endsection
