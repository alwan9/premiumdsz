@extends('layouts.admin')

@section('title', 'Kelola Kategori - Admin Premium Design')
@section('page_title', 'Kategori Desain')

@section('content')

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-slate-900">Daftar Kategori Spesialisasi</h2>
                <p class="text-xs text-slate-500">Kelola kelompok kategori untuk filter marketplace dan portofolio</p>
            </div>
            <a href="{{ route('admin.kategori.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold transition-colors">
                <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                <span>Tambah Kategori Baru</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider border-y border-slate-200">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Nama Kategori</th>
                        <th class="py-3 px-4">Deskripsi</th>
                        <th class="py-3 px-4">Total Produk</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($kategoris as $kat)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3 px-4 font-bold text-slate-400">#{{ $kat->Id_kategori }}</td>
                            <td class="py-3 px-4 font-bold text-slate-900">{{ $kat->Nama_kategori }}</td>
                            <td class="py-3 px-4 text-slate-600 max-w-xs truncate">{{ $kat->Des_kategori ?? '-' }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-brand-50 text-brand-700">
                                    {{ $kat->produk_digital_count }} Karya
                                </span>
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('admin.kategori.edit', $kat->Id_kategori) }}" class="px-2.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg font-bold">
                                    Edit
                                </a>
                                <form action="{{ route('admin.kategori.destroy', $kat->Id_kategori) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2.5 py-1.5 bg-rose-50 hover:bg-rose-500 text-rose-600 hover:text-white rounded-lg font-bold transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-8 text-slate-400">Belum ada kategori yang dibuat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pt-4">
            {{ $kategoris->links() }}
        </div>
    </div>

@endsection
