@extends('layouts.admin')

@section('title', 'Tambah Kategori - Admin Premium Design')
@section('page_title', 'Tambah Kategori Baru')

@section('content')

    <div class="max-w-xl bg-white rounded-2xl border border-slate-200 shadow-sm p-8 space-y-6">
        <div class="border-b border-slate-100 pb-4">
            <h2 class="text-base font-bold text-slate-900">Form Kategori Baru</h2>
            <p class="text-xs text-slate-500">Tambahkan kelompok kategori portofolio & produk</p>
        </div>

        <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama Kategori -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Nama Kategori <span class="text-rose-500">*</span></label>
                <input type="text" name="Nama_kategori" value="{{ old('Nama_kategori') }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Contoh: 3D Illustration & Motion">
            </div>

            <!-- Deskripsi Kategori -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Deskripsi Kategori</label>
                <textarea name="Des_kategori" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Penjelasan singkat kategori...">{{ old('Des_kategori') }}</textarea>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.kategori.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold shadow-md transition-colors">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>

@endsection
