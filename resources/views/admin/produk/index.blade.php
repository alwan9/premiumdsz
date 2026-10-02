@extends('layouts.admin')

@section('title', 'Kelola Produk Digital - Admin Premium Design')
@section('page_title', 'Produk Digital & Portofolio')

@section('content')

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-6">
        <!-- Top Action Bar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-base font-bold text-slate-900 font-heading">Katalog Produk & Portofolio</h2>
                <p class="text-xs text-slate-500">Kelola item marketplace, status produk, dan nomor kontak WhatsApp</p>
            </div>
            <a href="{{ route('admin.produk.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold transition-colors">
                <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                <span>Tambah Produk Baru</span>
            </a>
        </div>

        <!-- Search & Filter Form -->
        <form action="{{ route('admin.produk.index') }}" method="GET" class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            <div class="sm:col-span-6 relative">
                <iconify-icon icon="lucide:search" class="absolute left-3.5 top-3 text-slate-400 text-xs"></iconify-icon>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama produk atau deskripsi..." class="w-full pl-9 pr-3 py-2 bg-white border border-slate-200 rounded-lg text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>

            <div class="sm:col-span-4">
                <select name="kategori" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="">-- Semua Kategori --</option>
                    @foreach ($kategoris as $k)
                        <option value="{{ $k->Id_kategori }}" {{ request('kategori') == $k->Id_kategori ? 'selected' : '' }}>
                            {{ $k->Nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="sm:col-span-2 flex items-center space-x-2">
                <button type="submit" class="flex-1 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-bold transition-colors">
                    Filter
                </button>
                @if (request('search') || request('kategori'))
                    <a href="{{ route('admin.produk.index') }}" class="p-2 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-lg text-xs transition-colors flex items-center justify-center" title="Reset filter">
                        <iconify-icon icon="lucide:rotate-ccw" class="text-xs"></iconify-icon>
                    </a>
                @endif
            </div>
        </form>

        <!-- Product Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider border-y border-slate-200">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Nama Produk</th>
                        <th class="py-3 px-4">Kategori</th>
                        <th class="py-3 px-4">Paket Layanan</th>
                        <th class="py-3 px-4">No. WhatsApp</th>
                        <th class="py-3 px-4">Stok Item</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($produks as $prod)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3 px-4 font-bold text-slate-400">#{{ $prod->Id_produk }}</td>
                            <td class="py-3 px-4">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ $prod->image_url }}" alt="{{ $prod->Nama_produk }}" class="w-10 h-10 rounded-lg object-cover border border-slate-200 shrink-0">
                                    <a href="{{ route('admin.produk.show', $prod->Id_produk) }}" class="font-bold text-slate-900 hover:text-brand-600 line-clamp-1">
                                        {{ $prod->Nama_produk }}
                                    </a>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-brand-50 text-brand-700">
                                    {{ $prod->kategori->Nama_kategori ?? '-' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-slate-600">{{ $prod->layanan->Nama_layanan ?? '-' }}</td>
                            <td class="py-3 px-4 font-mono text-emerald-700 font-semibold">{{ $prod->No_wa ?? '085168174679' }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-0.5 rounded-full font-bold {{ $prod->Stok_produk > 0 ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }}">
                                    {{ $prod->Stok_produk }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-right space-x-1.5">
                                <a href="{{ route('admin.produk.show', $prod->Id_produk) }}" class="px-2 py-1 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-md font-bold inline-block" title="Lihat Detail">
                                    <iconify-icon icon="lucide:eye" class="text-xs"></iconify-icon>
                                </a>
                                <a href="{{ route('admin.produk.edit', $prod->Id_produk) }}" class="px-2 py-1 bg-brand-50 hover:bg-brand-100 text-brand-700 rounded-md font-bold inline-block" title="Edit">
                                    <iconify-icon icon="lucide:edit-3" class="text-xs"></iconify-icon>
                                </a>
                                <form action="{{ route('admin.produk.destroy', $prod->Id_produk) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 bg-rose-50 hover:bg-rose-500 text-rose-600 hover:text-white rounded-md font-bold transition-colors" title="Hapus">
                                        <iconify-icon icon="lucide:trash-2" class="text-xs"></iconify-icon>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-10 text-slate-400">Tidak ada data produk yang cocok.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pt-4 border-t border-slate-100">
            {{ $produks->links() }}
        </div>
    </div>

@endsection
