@extends('layouts.admin')

@section('title', 'Kelola Testimoni - Admin Premium Design')
@section('page_title', 'Testimoni & Review Klien')

@section('content')

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-slate-900">Daftar Foto Bukti Testimoni</h2>
                <p class="text-xs text-slate-500">Kelola gambar screenshot review & kepuasan klien</p>
            </div>
            <a href="{{ route('admin.testimoni.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold transition-colors">
                <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                <span>Tambah Foto Testimoni</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider border-y border-slate-200">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Foto Bukti</th>
                        <th class="py-3 px-4">Judul Testimoni</th>
                        <th class="py-3 px-4">File / URL</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($testimonis as $testi)
                        <tr class="hover:bg-slate-50">
                            <td class="py-3 px-4 font-bold text-slate-400">#{{ $testi->Id_testimoni }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ $testi->image_url }}" target="_blank" class="block w-16 h-16 rounded-xl overflow-hidden border border-slate-200 bg-slate-100 hover:opacity-80 transition-opacity shadow-sm">
                                    <img src="{{ $testi->image_url }}" alt="{{ $testi->display_title }}" class="w-full h-full object-cover">
                                </a>
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-bold text-slate-900 text-xs">{{ $testi->Judul }}</div>
                            </td>
                            <td class="py-3 px-4 text-slate-500 max-w-xs truncate font-mono text-[11px]">
                                {{ $testi->Foto_url }}
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('admin.testimoni.edit', $testi->Id_testimoni) }}" class="px-2.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg font-bold">
                                    Edit
                                </a>
                                <form action="{{ route('admin.testimoni.destroy', $testi->Id_testimoni) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus testimoni ini?')">
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
                            <td colspan="5" class="text-center py-8 text-slate-400">Belum ada foto testimoni.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pt-4">
            {{ $testimonis->links() }}
        </div>
    </div>

@endsection
