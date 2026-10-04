@extends('layouts.admin')

@section('title', 'Kelola Testimoni - Admin Premium Design')
@section('page_title', 'Testimoni & Review Klien')

@section('content')

    <div class="bg-white rounded-3xl border border-zinc-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] p-5 sm:p-7 space-y-5 max-w-full">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-2 border-b border-zinc-100">
            <div>
                <h2 class="text-base font-bold text-zinc-900 font-heading">Daftar Foto Bukti Testimoni</h2>
                <p class="text-xs text-zinc-500">Kelola gambar screenshot review &amp; kepuasan klien</p>
            </div>
            <a href="{{ route('admin.testimoni.create') }}" class="inline-flex items-center space-x-2 px-3.5 py-2 bg-brand-gradient hover:brightness-110 text-white rounded-xl text-xs font-bold shadow-sm shadow-brand-700/20 transition-all whitespace-nowrap shrink-0">
                <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                <span>Tambah Testimoni</span>
            </a>
        </div>

        <div class="rounded-2xl border border-zinc-200/80 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs whitespace-nowrap">
                    <thead class="bg-zinc-50 text-zinc-500 uppercase tracking-wider border-b border-zinc-200 text-[10px] font-bold">
                        <tr>
                            <th class="py-2.5 px-3">No</th>
                            <th class="py-2.5 px-3">Foto Bukti</th>
                            <th class="py-2.5 px-3">Judul Testimoni</th>
                            <th class="py-2.5 px-3">File / URL</th>
                            <th class="py-2.5 px-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        @forelse ($testimonis as $testi)
                            <tr class="hover:bg-zinc-50/80 transition-colors">
                                <td class="py-2.5 px-3 font-semibold text-zinc-400 text-xs">{{ ($testimonis->currentPage() - 1) * $testimonis->perPage() + $loop->iteration }}</td>
                                <td class="py-2.5 px-3">
                                    <a href="{{ $testi->image_url }}" target="_blank" class="block w-12 h-12 rounded-xl overflow-hidden border border-zinc-200 bg-zinc-100 hover:opacity-80 transition-opacity shadow-xs">
                                        <img src="{{ $testi->image_url }}" alt="{{ $testi->display_title }}" class="w-full h-full object-cover">
                                    </a>
                                </td>
                                <td class="py-2.5 px-3">
                                    <div class="font-bold text-zinc-900 text-xs max-w-xs truncate" title="{{ $testi->Judul }}">{{ $testi->Judul }}</div>
                                </td>
                                <td class="py-2.5 px-3 text-zinc-500 max-w-xs truncate font-mono text-[11px]">
                                    {{ $testi->Foto_url }}
                                </td>
                                <td class="py-2.5 px-3 text-right space-x-1.5">
                                    <a href="{{ route('admin.testimoni.edit', $testi->Id_testimoni) }}" class="px-2.5 py-1 bg-zinc-100 hover:bg-zinc-200 text-zinc-700 rounded-lg font-bold inline-block">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.testimoni.destroy', $testi->Id_testimoni) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus testimoni ini?')">
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
                                <td colspan="5" class="text-center py-8 text-zinc-400">Belum ada foto testimoni.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pt-2">
            {{ $testimonis->links() }}
        </div>
    </div>

@endsection
