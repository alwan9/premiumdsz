@extends('layouts.admin')

@section('title', 'Kelola Software Aplikasi - Admin Premium Design')
@section('page_title', 'Software & Tools Desain')

@section('content')

    <div class="space-y-6">
        <!-- Header & Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-base font-bold text-slate-900 font-heading">Daftar Software & Tools Aplikasi</h2>
                <p class="text-xs text-slate-500">Kelola aplikasi desain grafis yang digunakan pada produk & karya</p>
            </div>
            <a href="{{ route('admin.software.create') }}"
                class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold shadow-md shadow-brand-700/20 transition-all">
                <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                <span>Tambah Software</span>
            </a>
        </div>

        <!-- Software Grid Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            @forelse ($softwares as $soft)
                <div class="bg-white rounded-2xl border border-slate-200 p-5 flex flex-col justify-between space-y-4 hover:border-brand-400 hover:shadow-md transition-all">
                    <div>
                        <!-- Header with Logo and Product Count -->
                        <div class="flex items-start justify-between">
                            <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-200 p-2.5 flex items-center justify-center overflow-hidden">
                                <img src="{{ $soft->logo_full_url }}" alt="{{ $soft->Nama_software }}" class="max-w-full max-h-full object-contain">
                            </div>
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-brand-50 text-brand-700 border border-brand-100">
                                {{ $soft->produks_count }} Produk
                            </span>
                        </div>

                        <div class="mt-3.5 space-y-1">
                            <h3 class="text-sm font-bold text-slate-900">{{ $soft->Nama_software }}</h3>
                            <p class="text-[11px] text-slate-500 line-clamp-2 leading-relaxed">
                                {{ $soft->Des_software ?? 'Software grafis profesional untuk pengerjaan karya.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                        <span class="text-[10px] text-slate-400 font-mono truncate max-w-[120px]">{{ $soft->Logo_url }}</span>
                        <div class="flex items-center space-x-1.5">
                            <a href="{{ route('admin.software.edit', $soft->Id_software) }}"
                                class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs inline-flex items-center space-x-1 transition-colors"
                                title="Edit">
                                <iconify-icon icon="lucide:edit-3" class="text-xs"></iconify-icon>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('admin.software.destroy', $soft->Id_software) }}" method="POST"
                                onsubmit="return confirm('Hapus software {{ $soft->Nama_software }}? Relasi ke produk akan dilepas.')"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-1.5 rounded-lg bg-rose-50 hover:bg-rose-500 text-rose-600 hover:text-white transition-colors"
                                    title="Hapus">
                                    <iconify-icon icon="lucide:trash-2" class="text-xs"></iconify-icon>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center bg-white rounded-2xl border border-slate-200 p-8">
                    <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center text-xl mx-auto mb-3">
                        <iconify-icon icon="lucide:layers"></iconify-icon>
                    </div>
                    <h4 class="text-sm font-bold text-slate-800">Belum ada data software</h4>
                    <p class="text-xs text-slate-500 mt-1">Tambahkan software baru untuk dikaitkan dengan produk desain Anda.</p>
                </div>
            @endforelse
        </div>

        @if ($softwares->hasPages())
            <div class="mt-6">
                {{ $softwares->links() }}
            </div>
        @endif
    </div>

@endsection
