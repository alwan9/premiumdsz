@extends('layouts.admin')

@section('title', 'Edit Testimoni - Admin Premium Design')
@section('page_title', 'Edit Testimoni')

@section('content')

    <div class="max-w-xl bg-white rounded-2xl border border-zinc-200 shadow-sm p-8 space-y-6">
        <div class="border-b border-zinc-100 pb-4">
            <h2 class="text-base font-bold text-zinc-900 font-heading">Edit Foto Testimoni</h2>
            <p class="text-xs text-zinc-500">Perbarui judul review atau ganti gambar bukti</p>
        </div>

        <form action="{{ route('admin.testimoni.update', $testimoni->Id_testimoni) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Judul Testimoni -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Judul Testimoni / Review <span class="text-rose-500">*</span></label>
                <input type="text" name="Judul" value="{{ old('Judul', $testimoni->Judul) }}" required class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>

            <!-- Preview Foto Saat Ini -->
            @if ($testimoni->image_url)
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-zinc-700">Foto Bukti Saat Ini</label>
                    <div class="flex items-center space-x-3">
                        <img src="{{ $testimoni->image_url }}" alt="Preview" class="w-24 h-24 object-cover rounded-xl border border-zinc-200 shadow-sm">
                        <span class="text-[11px] text-zinc-500">Upload file baru di bawah jika ingin mengganti gambar.</span>
                    </div>
                </div>
            @endif

            <!-- Upload Ganti Foto -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Upload Ganti Foto Bukti (Opsional)</label>
                <input type="file" name="foto_file" accept="image/*" class="w-full px-4 py-2 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-600 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100">
            </div>

            <!-- Foto URL Alternatif -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Atau Nama File / URL Gambar</label>
                <input type="text" name="Foto_url" value="{{ old('Foto_url', $testimoni->Foto_url) }}" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>

            <div class="pt-4 flex items-center justify-end space-x-3 border-t border-zinc-100">
                <a href="{{ route('admin.testimoni.index') }}" class="px-5 py-2.5 bg-zinc-100 hover:bg-zinc-200 text-zinc-700 rounded-xl text-xs font-bold transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-brand-gradient hover:brightness-110 text-white rounded-xl text-xs font-bold shadow-md shadow-brand-700/20 transition-all">
                    Perbarui Foto Testimoni
                </button>
            </div>
        </form>
    </div>

@endsection
