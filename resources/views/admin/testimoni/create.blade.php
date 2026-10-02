@extends('layouts.admin')

@section('title', 'Tambah Testimoni - Admin Premium Design')
@section('page_title', 'Tambah Testimoni Baru')

@section('content')

    <div class="max-w-xl bg-white rounded-2xl border border-slate-200 shadow-sm p-8 space-y-6">
        <div class="border-b border-slate-100 pb-4">
            <h2 class="text-base font-bold text-slate-900">Form Foto Testimoni Baru</h2>
            <p class="text-xs text-slate-500">Tambahkan gambar screenshot bukti review atau kepuasan klien</p>
        </div>

        <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Judul Testimoni -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Judul Testimoni / Review <span class="text-rose-500">*</span></label>
                <input type="text" name="Judul" value="{{ old('Judul') }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Contoh: Testimoni Desain Kemasan Standing Pouch Kopi">
            </div>

            <!-- Upload Foto Gambar Bukti -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Upload Foto Bukti Review (Screenshot)</label>
                <input type="file" name="foto_file" accept="image/*" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-600 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100">
                <p class="text-[11px] text-slate-400">Pilih gambar dari komputer (JPG, PNG, WebP).</p>
            </div>

            <!-- Foto URL Alternatif -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Atau Nama File / URL Gambar</label>
                <input type="text" name="Foto_url" value="{{ old('Foto_url') }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Contoh: nama_file.jpg atau https://...">
                <p class="text-[11px] text-slate-400">Gunakan ini jika foto sudah ada di folder public/assets/testimoni/ atau link URL.</p>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.testimoni.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold shadow-md transition-colors">
                    Simpan Foto Testimoni
                </button>
            </div>
        </form>
    </div>

@endsection
