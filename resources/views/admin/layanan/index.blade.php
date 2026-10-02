@extends('layouts.admin')

@section('title', 'Kelola Layanan & Price List - Admin Premium Design')
@section('page_title', 'Paket Layanan & Price List')

@section('content')

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-slate-900">Daftar Paket Jasa & Price List</h2>
                <p class="text-xs text-slate-500">Kelola paket jasa desain, benefit yang didapatkan klien, dan produk showcase terkait</p>
            </div>
            <a href="{{ route('admin.layanan.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold transition-colors">
                <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                <span>Tambah Paket Layanan</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider border-y border-slate-200">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Nama Layanan</th>
                        <th class="py-3 px-4">Benefit Paket</th>
                        <th class="py-3 px-4">Produk Utama</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($layanans as $lay)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3 px-4 font-bold text-slate-400">#{{ $lay->Id_Layanan }}</td>
                            <td class="py-3 px-4 font-bold text-slate-900">{{ $lay->Nama_layanan }}</td>
                            <td class="py-3 px-4 text-slate-600 max-w-sm truncate whitespace-pre-line">{{ Str::limit($lay->Benefit, 60) }}</td>
                            <td class="py-3 px-4 text-brand-600 font-semibold">{{ $lay->produk->Nama_produk ?? '-' }}</td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('admin.layanan.edit', $lay->Id_Layanan) }}" class="px-2.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg font-bold">
                                    Edit
                                </a>
                                <form action="{{ route('admin.layanan.destroy', $lay->Id_Layanan) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus paket layanan ini?')">
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
                            <td colspan="5" class="text-center py-8 text-slate-400">Belum ada paket layanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pt-4">
            {{ $layanans->links() }}
        </div>
    </div>

@endsection
