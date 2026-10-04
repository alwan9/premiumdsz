@extends('layouts.admin')

@section('title', 'Kelola Kategori - Admin Premium Design')
@section('page_title', 'Kategori Desain')

@section('content')

    <div class="bg-white rounded-3xl border border-zinc-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] p-5 sm:p-7 space-y-5 max-w-full">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-2 border-b border-zinc-100">
            <div>
                <h2 class="text-base font-bold text-zinc-900 font-heading">Daftar Kategori Spesialisasi</h2>
                <p class="text-xs text-zinc-500">Kelola kelompok kategori untuk filter marketplace dan portofolio</p>
            </div>
            <a href="{{ route('admin.kategori.create') }}" class="inline-flex items-center space-x-2 px-3.5 py-2 bg-brand-gradient hover:brightness-110 text-white rounded-xl text-xs font-bold transition-all shadow-sm shadow-brand-700/20 whitespace-nowrap shrink-0">
                <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                <span>Tambah Kategori</span>
            </a>
        </div>

        <div class="rounded-2xl border border-zinc-200/80 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs whitespace-nowrap">
                    <thead class="bg-zinc-50 text-zinc-500 uppercase tracking-wider border-b border-zinc-200 text-[10px] font-bold">
                        <tr>
                            <th class="py-2.5 px-3">No</th>
                            <th class="py-2.5 px-3">Nama Kategori</th>
                            <th class="py-2.5 px-3">Deskripsi</th>
                            <th class="py-2.5 px-3">Total Jasa</th>
                            <th class="py-2.5 px-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        @forelse ($kategoris as $kat)
                            <tr class="hover:bg-zinc-50/80 transition-colors">
                                <td class="py-2.5 px-3 font-semibold text-zinc-400 text-xs">{{ ($kategoris->currentPage() - 1) * $kategoris->perPage() + $loop->iteration }}</td>
                                <td class="py-2.5 px-3 font-bold text-zinc-900">{{ $kat->Nama_kategori }}</td>
                                <td class="py-2.5 px-3 text-zinc-600 max-w-xs truncate">{{ $kat->Des_kategori ?? '-' }}</td>
                                <td class="py-2.5 px-3">
                                    <span class="px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-brand-50 text-brand-700">
                                        {{ $kat->produk_digital_count }} Jasa
                                    </span>
                                </td>
                                <td class="py-2.5 px-3 text-right space-x-1.5">
                                    <a href="{{ route('admin.kategori.edit', $kat->Id_kategori) }}" class="px-2.5 py-1 bg-zinc-100 hover:bg-zinc-200 text-zinc-700 rounded-lg font-bold inline-block">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.kategori.destroy', $kat->Id_kategori) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1 bg-rose-50 hover:bg-rose-500 text-rose-600 hover:text-white rounded-lg font-bold transition-colors">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-8 text-zinc-400">Belum ada kategori yang dibuat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pt-2">
            {{ $kategoris->links() }}
        </div>
    </div>

@endsection
